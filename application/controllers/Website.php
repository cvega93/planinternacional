<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (file_exists("assets/culqi-php-master/lib/culqi.php")) {
	require_once 'assets/Requests-master/Requests-master/library/Requests.php';
	Requests::register_autoloader();
	require_once "assets/culqi-php-master/lib/culqi.php";
}

class Website extends MY_Controller
{
	public $redes_sociales = array();

	// Pasarela de Pagos Culqi..
	public $comercio = "";
	public $key_secret = "";
	public $como_comprar = [];

	function __construct()
	{
		parent::__construct();

		// CULQI...
		$this->comercio = $this->configuracion['comercio_culqi'];
		$this->key_secret = $this->configuracion['key_secret_culqi'];

		$this->redes_sociales = array('facebook-f' => 'facebook', 'twitter' => 'twitter', 'instagram' => 'instagram', 'youtube' => 'youtube', 'linkedin' => 'linkedin');
	}

	function facturacion()
	{
		$input = file_get_contents("php://input");
		$event_json = json_decode($input);

		// Escribir el Webhook en mi archivo "log/log-webhooks.json" de ejemplo
		$this->enviar_email('', "kluizsv@gmail.com", 'Facturación - Culqi', $input);

		//Respuesta a Culqi
		http_response_code(200);
		$array = array(
			"response" => "Webhook de Culqi recibido"
		);

		echo json_encode($array);
	}

	function prueba()
	{
		$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));

		$ignore = array('milagros.majino@plan-international.org', 'milagros.majino@gmail.com');

		foreach ($ignore as $key => $value) {
			$pagos = $this->module_model->seleccionar('pagos', array('correo_electronico' => $value));

			foreach ($pagos as $k => $v) {
				$this->module_model->eliminar('pagos', $v['id']);
			}

			$clientes = $this->module_model->seleccionar('administrador', array('correo_electronico' => $value));

			foreach ($clientes as $k => $v) {
				$this->module_model->eliminar('administrador', $v['id']);
			}
		}

		$customers = (array)$culqi->Customers->all();

		foreach ($customers['data'] as $key => $value) {
			$value = (array)$value;

			if (in_array($value['email'], $ignore)) {
				foreach ($value['cards'] as $k => $v) {
					$v = (array)$v;
					$culqi->Cards->delete($v['id']);
				}

				$culqi->Customers->delete($value['id']);
			}
		}

		$customers = (array)$culqi->Customers->all();

		echo '<pre>';
		print_r($customers['data']);
		echo '</pre>';

		/*
        $usuarios = $this->module_model->seleccionar('pagos', array('estado' => 1, 'activado' => 1));

        foreach($usuarios as $key => $value)
        {
            $busqueda = $this->module_model->total('administrador', array('correo_electronico' => $value['correo_electronico']));

            if($busqueda == 0)
            {
                $usuario = array(); $contrasenia = $this->contrasenia_aleatoria();

                $usuario['nivel'] = 3;
                $usuario['correo_electronico'] = $value['correo_electronico'];
                $usuario['contrasenia'] = sha1($contrasenia);
                $usuario['nombres'] = $value['nombres'];
                $usuario['apellidos'] = $value['apellido_paterno'] . ' ' . $value['apellido_materno'];
                $usuario['estado'] = 1;
                $usuario['activado'] = 1;
                $usuario['usuario_creacion'] = 1;
                $usuario['usuario_modificacion'] = 1;
                $usuario['fecha_creacion'] = $this->fecha();
                $usuario['fecha_modificacion'] = $this->fecha();

                $this->module_model->guardar('administrador', $usuario);

                $contacto = ""; $destinatario = $usuario['correo_electronico']; $asunto = "Registro de Donación - " . $this->configuracion['titulo'];
                $_html = 'Hola ' . $value['nombres'] . ', puede visualizar sus donaciones en el siguiente enlace: <a href="' . backend_url() . '" target="_blank">' . backend_url() . '</a><br /><br />';
                $_html .= 'Sus credenciales son:<br />';
                $_html .= 'Usuario: ' . $value['correo_electronico'] . '<br />';
                $_html .= 'Contraseña: ' . $contrasenia . '<br /><br />';
                $_html .= 'Enviado el ' . date("d-m-Y") . ' a las ' . date("H:i:s");

                $this->enviar_email($contacto, $destinatario, $asunto, $_html);
                $this->enviar_email($contacto, "kluizsv@gmail.com", $asunto, $_html);
            }
        }
        */
	}

	function save_transaction ($data) {
		$client = new GuzzleHttp\Client();
		$request = $client->request('post', 'https://forms.hubspot.com/uploads/form/v2/4390725/6a00b861-1dfd-4f85-a3f0-c4b4aefa979b', [
			'query' => [
				'email' => $data['correo_electronico'],
				'estado_donacion_culqi' => $data['estado'],
				'fecha_transacci_n' => date("Y-m-d H:i:s"),
				'id_cargo' => $data['charge'],
				'bank' => $data['bank'],
				'tarjeta' => $data['tarjeta'],
				'estado' => $data['estado']
			]
		]);
		return $request;
	}
	function save_contact($data)
	{
		$client = new GuzzleHttp\Client();
		$request = $client->request('post', 'https://forms.hubspot.com/uploads/form/v2/4390725/3543b760-c8ab-4e8c-a616-b8dc74771066', [
			'query' => [
				'email' => $data['correo_electronico'],
				'firstname' => $data['nombres'],
				'lastname' => $data['apellido_paterno'],
				'fecha_de_nacimiento' => $data['cumpleanios'],

				'pais' => $data['pais'],
				'tipo_de_documento' => $data['tipo_documento'],
				'n_mero_de_documento' => $data['numero_documento'],
				'genero' => $data['genero'],
				'tienes_hijos' => $data['tienes_hijos'],
				'celular' => $data['telefono'],
				'tipo_de_donaci_n' => $data['dec_donacion'],
				'moneda' => $data['moneda'],
				'monto_de_donacion' => $data['total'],
				'estado_donacion_culqi' => 0,
				'fecha_transacci_n' => 0,
				'id_cargo' => 0,
				'bank' =>0,
				'tarjeta' =>0,
				'estado' =>0
			]
		]);
		return $request;
	}

	function unete()
	{
		$campania = $this->module_model->seleccionar('campanias', array('estado' => 1, 'activado' => 1), 1, 1);
		$ignore = array('terminos');

		if (count($campania) > 0) {
			if (isset($_POST) AND count($_POST) > 0) {
				$array = array();
				$array['id_padre'] = $campania['id'];

				foreach ($_POST as $key => $value) {
					if (!in_array($key, $ignore)) {
						$array[$key] = $value;
					}
				}

				$array['estado'] = 1;
				$array['fecha_creacion'] = $this->fecha();
				$array['fecha_modificacion'] = $this->fecha();
				$array['usuario_creacion'] = 1;
				$array['usuario_modificacion'] = 1;

				$data = [
					'estado' => 1,
					'fecha_creacion' => $this->fecha(),
					'fecha_modificacion' => $this->fecha(),
					'usuario_creacion' => 1,
					'usuario_modificacion' => 1
				];

				$this->module_model->guardar('formularios', $array);

				$message = array('type' => 'success', 'content' => 'Se registró correctamente. En unos minutos se comunicarán 11con usted.');
				$this->session->set_flashdata('message', $message);
			}
		}
		die();
		redirect("/#message", "refresh");
	}


	function crearUsuario () {
		$campania = $this->module_model->seleccionar('campanias', array('estado' => 1, 'activado' => 1), 1, 1);
		$pedidoId = date("Ymd") . date("His");

		$total = 0;
		if ($_POST['monto_total'] == 1) {
			$total = (double)$_POST['otro_monto'];
		} else {
			$total = (double)$_POST['monto_total'];
		}

		$moneda = $_POST['tipo_moneda'];
		$_detalle = '';
		$activado = 2;

		$array['id'] = $pedidoId;
		$array['token'] = $this->input->post('token');
		$array['id_padre'] = $campania['id'];
		$array['tipo_pago'] = $this->input->post('tipo_pago'); // 1 = UNICA || 2 = MENSUAL
		$array['nombres'] = $this->input->post('nombres');
		$array['apellido_paterno'] = $this->input->post('apellido_paterno');
		$array['apellido_materno'] = '.';
		$array['correo_electronico'] = $this->input->post('email');
		$array['telefono'] = $this->input->post('celular');
		$array['tipo_documento'] = $this->input->post('tipo_documento') === 4 ? 'pasaporte' : $this->input->post('tipo_documento');
		$array['otro_tipo_documento'] = $this->input->post('otro_tipo_documento');
		$array['numero_documento'] = $this->input->post('numero_documento');
		$array['country'] = $this->input->post('pais');
		$array['cantidad_apoyo'] = $total;
		$array['genero'] = $this->input->post('genero');
		$array['tienes_hijos'] = $this->input->post('tienes_hijos');
		$array['moneda'] = $moneda;
		$array['total'] = $total;
		$array['detalle'] = '';
		$array['estado'] = 1;
		$array['activado'] = $activado;
		$array['usuario_creacion'] = 1;
		$array['usuario_modificacion'] = 1;

		$array['fecha_creacion'] = $this->fecha();
		$array['fecha_modificacion'] = $this->fecha();
		$array['dec_donacion'] = $_POST['tipo_pago'] == 1 ? 'Donación única': 'Donación mensual';

		$array['cumpleanios'] = $this->input->post('cumpleanios');

		$guardado = $this->module_model->guardar('pagos', $array);
		$res = ['id'=> $pedidoId, 'guardado'=> $guardado];
		$this->save_contact($array);
		header('Content-Type: application/json');
		echo json_encode( $res );
	}

	function checkout()
	{
		$campania = $this->module_model->seleccionar('campanias', array('estado' => 1, 'activado' => 1), 1, 1);

		if (count($campania) > 0) {
			if (isset($_POST) AND count($_POST) > 0) {
				$data = array();
				$pedidoId = $this->input->post('pedidoId');
				$array = [];
				$total = 0;
				if ($_POST['monto_total'] == 1) {
					$total = (double)$_POST['otro_monto'];
				} else {
					$total = (double)$_POST['monto_total'];
				}
				$descripcion = $_POST['tipo_pago'] == 1 ? 'primer_tipo_donacion': 'segundo_tipo_donacion';
				$moneda = $_POST['tipo_moneda'];

				if ($total > 0) {
					$_detalle = '';
					$activado = 2;

					$array['id'] = $pedidoId;
					$array['token'] = $this->input->post('token');
					$array['id_padre'] = $campania['id'];
					$array['tipo_pago'] = $this->input->post('tipo_pago'); // 1 = UNICA || 2 = MENSUAL
					$array['nombres'] = $this->input->post('nombres');
					$array['apellido_paterno'] = $this->input->post('apellido_paterno');
					$array['apellido_materno'] = '.';
					$array['correo_electronico'] = $this->input->post('email');
					$array['telefono'] = $this->input->post('celular');
					$array['tipo_documento'] = $this->input->post('tipo_documento') === 4 ? 'pasaporte' : $this->input->post('tipo_documento');
					$array['otro_tipo_documento'] = $this->input->post('otro_tipo_documento');
					$array['numero_documento'] = $this->input->post('numero_documento');
					$array['pais'] = $this->input->post('pais');
					$array['cantidad_apoyo'] = $total;
					$array['genero'] = $this->input->post('genero');
					$array['tienes_hijos'] = $this->input->post('tienes_hijos');
					$array['moneda'] = $moneda;
					$array['total'] = $total;
					$array['detalle'] = '';
					$array['estado'] = 1;
					$array['activado'] = $activado;
					$array['usuario_creacion'] = 1;
					$array['usuario_modificacion'] = 1;
					$array['fecha_creacion'] = $this->fecha();
					$array['fecha_modificacion'] = $this->fecha();
					$array['dec_donacion'] = $_POST['tipo_pago'] == 1 ? 'Donación única': 'Donación mensual';
//					$this->module_model->guardar('pagos', $array);
					$id_padre = $pedidoId;

					// Procesamiento con Culqi..
					try {
//						$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));
						$culqi = new Culqi\Culqi(array('api_key' => 'sk_test_zR8bdfx1LnL3uyDr'));

						if ($array['tipo_pago'] == 1) // Pago unico
						{
							$charge = $culqi->Charges->create(
								array(
									"amount" => ($total * 100),
									"capture" => true,
									"currency_code" => $moneda,
									"description" => $campania[$descripcion],
									"email" => $array['correo_electronico'],
									"installments" => 0,
									"source_id" => $array['token']
								)
							);
						}

						if ($array['tipo_pago'] == 2) // Pago mensual
						{
							$plan = $culqi->Plans->create(
								array(
									"alias" => "plan-culqi" . uniqid(),
									"amount" => ($total * 100),
									"currency_code" => $moneda,
									"interval" => "meses",
									"interval_count" => 1,
									"name" => $campania[$descripcion]
								)
							);
							$pais = $this->module_model->buscar('paises', $array['pais']);
							$tipos_documento = array('', 'DNI', 'CE', 'Otro');
							$metadata = array();
							$metadata['tipo_documento'] = $array['tipo_documento'];
							$metadata['numero_documento'] = $array['numero_documento'];
							//Crear Cliente
							$cliente = $culqi->Customers->create(
								array(
									"country_code" => $array['pais'],
									"address_city" => $array['pais'],
									"address" => $pais['titulo'] . ' - ' . $pais['codigo_iso'],
									"email" => $array['correo_electronico'],
									"first_name" => $array['nombres'],
									"last_name" => $array['apellido_paterno'],
										"metadata" => $metadata,
									"phone_number" => ($array['telefono'] != '') ? $array['telefono'] : '999999999'
								)
							);
							//Crear Tarjeta
							$tarjeta = $culqi->Cards->create(
								array(
									"customer_id" => $cliente->id,
									"token_id" => $array['token'],
									"validate" => false
								)
							);
							$suscripcion = $culqi->Subscriptions->create(
								array(
									"card_id" => $tarjeta->id,
									"plan_id" => $plan->id
								)
							);
							$charge = $suscripcion->charges[0];
						}

						$array['charge'] = $charge->id;
						$array['bank'] = $charge->source->iin->issuer->name;
						$array['tarjeta'] = $charge->source->iin->card_brand;
						$array['estado'] = $charge->outcome->type;
						$this->save_transaction($array);
//						var_dump($charge);
//						die();
						//if($data['codigo_respuesta'] == 'venta_exitosa' OR $data['codigo_respuesta'] == 'venta_registrada')
						if ($charge->outcome->code == 'AUT0000') {
							$_detalle = $charge->outcome->user_message;
							$activado = 1;
							$message = array('type' => 'success', 'content' => 'Se registró la donación correctamente.');
						} else {
							$message = array('type' => 'danger', 'content' => $charge);
							$activado = 0;
						}

						$this->session->set_flashdata('message', $message);

						$compra = $this->module_model->buscar('pagos', $pedidoId);
						$estados = array('Error de Pago', 'Pagado', 'Pendiente');

						$html = '';
						$contacto = $campania['email_contacto'];
						$destinatario = $compra['correo_electronico'];
						$asunto = $campania['titulo'] . ' - Detalle de Donación';

						$html .= 'Fecha de Donación: ' . date("d/m/Y", strtotime($compra['fecha_creacion'])) . '<br />';
						$html .= 'Número de Orden: ' . $compra['id'] . '<br />';
						$html .= 'Método de Pago: ' . $campania[$descripcion] . '<br />';
						$html .= 'Estado de la Transacción: ' . $estados[$activado] . '<br />';

						if ($activado == 1) // Pagado..
						{
							$html .= '<hr /><strong>Su donación ha sido exitosa.</strong><br />';
						}

						$html .= '<hr />';
						$html .= '<h4>Datos del Cliente</h4>';
						$html .= 'Nombres y Apellidos: ' . $compra['nombres'] . ' ' . $compra['apellido_paterno'] . ' ' . $compra['apellido_materno'] . '<br />';
						$html .= 'Correo Electrónico: ' . $compra['correo_electronico'] . '<br />';
						$html .= 'Teléfono: ' . $compra['telefono'] . '<br />';
						$html .= 'Total: <strong> ' . number_format($compra['total'], 2) . ' ' . $compra['moneda'] . '</strong><br />';
						$html .= '<hr />';
						$html .= date("Y-m-d H:i:s");

						//$_html = $this->render_email($asunto, 'Tu donación se está procesando, gracias por la confianza.', $html);
						$_html = $html;

						$this->enviar_email($contacto, $destinatario, $asunto, $_html);
						// Correo para plan international..
						$this->enviar_email($contacto, $contacto, $asunto, $_html);

						$this->cargar_session('html', $html);

						if ($activado == 1 OR $activado == 0) {
							if ($compra['tipo_pago'] == 2) // Donación Mensual..
							{
								$_update = array('activado' => $activado, 'detalle' => $_detalle, 'customer' => $cliente->id, 'tarjeta' => $tarjeta->id, 'plan' => $plan->id, 'suscripcion' => $suscripcion->id, 'cargo' => $charge->id, 'html' => $_html);

								// Creando el usuario para validar su membresía..

								$cantidad = $this->module_model->total('administrador', array('correo_electronico' => $this->input->post('correo_electronico')));

								if ($cantidad == 0) {
									$usuario = array();
									$contrasenia = $this->contrasenia_aleatoria();

									$usuario['nivel'] = 3;
									$usuario['correo_electronico'] = $this->input->post('correo_electronico');
									$usuario['contrasenia'] = sha1($contrasenia);
									$usuario['nombres'] = $this->input->post('nombres');
									$usuario['apellidos'] = $this->input->post('apellido_paterno') . ' ' . $this->input->post('apellido_materno');
									$usuario['estado'] = 1;
									$usuario['activado'] = 1;
									$usuario['usuario_creacion'] = 1;
									$usuario['usuario_modificacion'] = 1;
									$usuario['fecha_creacion'] = $this->fecha();
									$usuario['fecha_modificacion'] = $this->fecha();

									$this->module_model->guardar('administrador', $usuario);

									$contacto = "";
									$destinatario = $this->input->post('correo_electronico');
									$asunto = "Registro de Donación - " . $this->configuracion['titulo'];
									$_html = 'Hola ' . $usuario['nombres'] . ', puede visualizar sus donaciones en el siguiente enlace: <a href="' . backend_url() . '" target="_blank">' . backend_url() . '</a><br /><br />';
									$_html .= 'Sus credenciales son:<br />';
									$_html .= 'Usuario: ' . $usuario['correo_electronico'] . '<br />';
									$_html .= 'Contraseña: ' . $contrasenia . '<br /><br />';
									$_html .= 'Enviado el ' . date("d-m-Y") . ' a las ' . date("H:i:s");

									$this->enviar_email($contacto, $destinatario, $asunto, $_html);
								}
							}

							if ($compra['tipo_pago'] == 1) // Donación Única..
							{
								$_update = array('activado' => $activado, 'detalle' => $_detalle, 'cargo' => $charge->id, 'html' => $_html);
							}
							$this->module_model->actualizar('pagos', $_update, $pedidoId);

							redirect("/#message", "refresh");
						} else {
							redirect("/", "refresh");
						}
					} catch (Exception $e) {

						$response = (array)json_decode($e->getMessage());
						$activado = 0;
						$message = array('type' => 'danger', 'content' => $response['merchant_message']);
						$this->session->set_flashdata('message', $message);
						redirect("/", "refresh");
					}
				} else {
					// Error de Monto a pagar..
					$message = array('type' => 'danger', 'content' => 'El monto a pagar no alcanza al monto de compra. Por favor, revise el monto ingresado con el total de compra.');
					$this->session->set_flashdata('message', $message);

					redirect("/", "refresh");
				}
			} else {
				redirect("/", "refresh");
			}
		} else {
			redirect("/", "refresh");
		}
	}

	function avisos()
	{
		/*
        $fecha = strtotime("-1 month", strtotime(date("Y-m-d")));

        $pagos = $this->module_model->seleccionar('pagos', array('tipo_pago' => 2, 'fecha_creacion' => $fecha, 'estado' => 1, 'activado' => 1));

        foreach($pagos as $key => $value)
        {
            $campania = $this->module_model->buscar('campanias', $value['id_padre']);

            $html = ''; $contacto = $campania['email_contacto']; $destinatario = $value['correo_electronico']; $asunto = $campania['titulo'] . ' - Renovación de Pago Mensual';

            $html .= 'Fecha de Donación: ' . date("d/m/Y", strtotime($value['fecha_creacion'])) . '<br />';
            $html .= 'Número de Orden: ' . $value['id'] . '<br />';
            $html .= 'Método de Pago: ' . $campania['segundo_tipo_donacion'] . '<br />';
            $html .= 'Estado de la Compra: ' . $value[$activado] . '<br />';

            if($activado == 1 OR $activado == 0)
            {
                $html .= '<hr /><strong>' . $_detalle . '</strong><br />';
            }

            $html .= '<hr />';
            $html .= '<h4>Datos del Cliente</h4>';
            $html .= 'Nombres y Apellidos: ' . $value['nombres'] . ' ' . $value['apellido_paterno'] . ' ' . $value['apellido_materno'] . '<br />';
            $html .= 'Correo Electrónico: ' . $value['correo_electronico'] . '<br />';
            $html .= 'Teléfono: ' . $value['telefono'] . '<br />';
            $html .= 'Total: <strong>S/ ' . number_format($value['total'], 2) . '</strong><br />';

            $this->enviar_email($contacto, $destinatario, $asunto, $html);
        }

        redirect("/", "refresh");
        */
	}

	function index()
	{
		$data = array();
		$data['campania'] = $this->module_model->seleccionar('campanias', array('estado' => 1, 'activado' => 1), 1, 1);

		if (count($data['campania']) > 0) {
			$where = array('id_padre' => $data['campania']['id'], 'estado' => 1, 'activado' => 1);

			$config['item_order'] = array('key' => 'orden', 'value' => 'asc');
			$this->initialize($config);

			$data['banners'] = $this->module_model->seleccionar('banners', $where);
			$data['testimonios'] = $this->module_model->seleccionar('testimonios', $where);
			$data['estadisticas'] = $this->module_model->seleccionar('estadisticas', $where);

			$_where = $where;
			$_where['tipo_donacion'] = 1;
			$data['precios_tipo_uno'] = $this->module_model->seleccionar('precios', $_where);

			$_where = $where;
			$_where['tipo_donacion'] = 2;
			$data['precios_tipo_dos'] = $this->module_model->seleccionar('precios', $_where);

			$data['programas'] = $this->module_model->seleccionar('programas', $where);
			$data['aliados'] = $this->module_model->seleccionar('aliados', $where);
			$this->clear_data();

			$data['paises'] = $this->module_model->seleccionar('paises', array('estado' => 1));

			$this->load->view("frontend/index_view", $data);
		} else {
			$this->show_404();
		}
	}

	function show_404()
	{
		echo "Error de Visualización";
	}
}
