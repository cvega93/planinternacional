<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(file_exists("assets/culqi-php-master/lib/culqi.php"))
{
    require_once 'assets/Requests-master/Requests-master/library/Requests.php';
    Requests::register_autoloader();
    require_once "assets/culqi-php-master/lib/culqi.php";
}

class Dashboard extends MY_Controller
{
	// Pasarela de Pagos Culqi..
    public $comercio = "";
    public $key_secret = "";

	function __construct()
	{
		parent::__construct();

		$this->comercio = $this->configuracion['comercio_culqi'];
        $this->key_secret = $this->configuracion['key_secret_culqi'];
	}

	function idioma($titulo = FALSE)
	{
		$this->validar_usuario();

		if($titulo <> FALSE)
		{
			$this->session->set_userdata('language', $titulo);
		}
	}

	function index($retorno = FALSE, $data = array())
	{
		if($this->mostrar_session('correo_electronico') == '')
		{
			/*
			if(isset($_COOKIE[$this->session_name]))
			{
				if($this->input->post() === FALSE)
				{
					$data['usuario'] = $this->mostrar_cookie('usuario');
					$data['imagen'] = $this->mostrar_cookie('imagen');
					$this->load->view("backend/locked_view", $data);
				}
				else
				{
					$this->identificarse($this->mostrar_cookie('correo_electronico'));
				}
			}
			else
			{
			*/
				$this->identificarse($this->input->post("correo_electronico"));
			/*
			}
			*/
		}
		else
		{
			if($this->input->post("logout") == "true")
			{
				$this->cerrar_session();
			}
			else
			{
				$where = []; $cantidad_por_pagina = 20; $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 0;

				if(@$_GET['fecha_inicio'] != '')
				{
					$where['DATE_FORMAT(fecha, "%Y-%m-%d") >='] = date("Y-m-d", strtotime($_GET['fecha_inicio']));
				}

				if(@$_GET['fecha_fin'] != '')
				{
					$where['DATE_FORMAT(fecha, "%Y-%m-%d") <='] = date("Y-m-d", strtotime($_GET['fecha_fin']));
				}

				if(@$_GET['usuario'] != '')
				{
					$where['usuario'] = $_GET['usuario'];
				}

				$data['logs'] = $this->module_model->paginacion('log_administrador', $cantidad_por_pagina, $pagina, array('fecha', 'desc'), $where);

				$totales = $this->module_model->total('log_administrador', $where);
        		$data['links'] = ceil($totales / $cantidad_por_pagina);

				$usuarios = $this->module_model->seleccionar('administrador', array('estado' => 1, 'activado' => 1, 'nivel >' => 0));

				foreach($usuarios as $key => $value)
				{
					$data['usuarios'][$value['id']] = $value;
				}

				if($this->mostrar_session('nivel') == 3)
				{
					$config['item_order'] = array('key' => 'fecha_creacion', 'value' => 'desc'); $this->initialize($config);
					$data['pagos'] = $this->module_model->seleccionar('pagos', array('correo_electronico' => $this->mostrar_session('correo_electronico'), 'estado' => 1, 'activado' => 1));
					$this->clear_data();
				}

				$this->load->view("backend/home_view", $data);
				
				//$this->verificar_tipo(); // Verificamos el tipo de proceso que se hará.
			}
		}
	}

	function token()
	{
		$data['token'] = $this->mostrar_session('token');
		$this->load->view("backend/templates/json_view", array('resultado' => $data));
	}

	function perfil()
	{
		$this->validar_usuario(); // Verificando la sesión del usuario..

		// Items para el Perfil..
		$items['correo_electronico'] = array('type' => 'text', 'text' => array('espanol' => 'Correo Electrónico', 'english' => 'Email'), 'placeholder' => 'Ingrese su correo electrónico', 'validate' => 'required|valid_email', 'session' => TRUE);
		$items['nombres'] = array('type' => 'text', 'text' => array('espanol' => 'Nombres', 'english' => 'Name'), 'placeholder' => 'Ingrese sus nombres', 'validate' => 'required', 'session' => TRUE);
		$items['apellidos'] = array('type' => 'text', 'text' => array('espanol' => 'Apellidos', 'english' => 'Last Name'), 'placeholder' => 'Ingrese sus apellidos', 'validate' => 'required', 'session' => TRUE);
		$items['imagen'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Imagen', 'english' => 'Photo'), 'sizes' => array('33x33'), 'session' => TRUE);
		$items['acerca_de'] = array('type' => 'textarea', 'text' => array('espanol' => 'Información Adicional', 'english' => 'Information Aditional'), 'placeholder' => 'Ingrese una información adicional', 'session' => TRUE);
		// Fin de los Items para el Perfil..

		$config['title'] = array('espanol' => 'Perfil', 'english' => 'Profile');
		$config['items'] = $items;
		$config['table'] = 'administrador';
		$config['controller'] = 'perfil';
		$config['breadcrumb'] = FALSE;

		$buttons = array();
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar el Perfil', 'english' => 'Update Profile'));

		$config['buttons'] = $buttons;

		$this->initialize($config); // Inicializando valores..
		$this->actualizar($this->mostrar_session('id'));
	}

	function contrasenia()
	{
		$this->validar_usuario(); // Verificando la sesión del usuario..

		// Items para el Perfil..
		$items['contrasenia_anterior'] = array('type' => 'password', 'text' => array('espanol' => 'Contraseña Anterior', 'english' => 'Old Password'), 'placeholder' => 'Ingrese su contraseña anterior', 'validate' => 'required');
		$items['nueva_contrasenia'] = array('type' => 'password', 'text' => array('espanol' => 'Nueva Contraseña', 'english' => 'New Password'), 'placeholder' => 'Ingrese su nueva contraseña' , 'validate' => 'required');
		$items['repetir_contrasenia'] = array('type' => 'password', 'text' => array('espanol' => 'Repetir Contraseña', 'english' => 'Repeat Password'), 'placeholder' => 'Repita su nueva contraseña', 'validate' => 'required');
		// Fin de los Items para el Perfil..

		$config['table'] = 'administrador';
		$config['controller'] = 'contrasenia';
		$config['title'] = array('espanol' => 'Contraseña', 'english' => 'Password');
		$config['items'] = $items;
		$config['breadcrumb'] = FALSE;

		$buttons = array();
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar la Contraseña', 'english' => 'Update Password'));

		$config['buttons'] = $buttons;

		$this->initialize($config);

		if(!isset($_POST) OR count($_POST) == 0)
		{
			$this->actualizar($this->mostrar_session('id'));
		}
		else
		{
			$busqueda = $this->module_model->buscar($this->table, $this->mostrar_session('id'));
			
			if($this->encrypt->hash($this->input->post('contrasenia_anterior')) == $busqueda['contrasenia'])
			{
				if($this->input->post('nueva_contrasenia') === $this->input->post('repetir_contrasenia'))
				{
					$array['contrasenia'] = $this->encrypt->hash($this->input->post('nueva_contrasenia'));
					$data['mensaje'] = $this->module_model->actualizar($this->table, $array, $this->mostrar_session('id')); // Guardar datos
				}
				else
				{
					$data['mensaje'] = $this->lang->line('contrasenias_no_coinciden');;
				}
			}
			else
			{
				$data['mensaje'] = $this->lang->line('contrasenia_incorrecta');
			}

			$data['url'] = NULL;

			if($this->input->post('retorno') == 1)
			{
				$data['url'] = $this->controller; // Verificando que se quiere cerrar el formulario.
			}

			$this->load->view("backend/templates/print_json_view", array('data' => $data));
		}
	}

	function configuracion()
	{
		$this->validar_usuario(); // Verificando la sesión del usuario..

		// $items['logo'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Logo (590x87 píxeles)'), 'validate' => 'required');
		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Título', 'english' => 'Title'), 'placeholder' => 'Ingrese el título de la empresa', 'validate' => 'required');
		$items['culqi'] = array('type' => 'label', 'text' => array('espanol' => 'Culqi'));
		$items['aceptar_culqi'] = array('type' => 'checkbox', 'text' => array('espanol' => '¿Aceptar Culqi?'));
		$items['comercio_culqi'] = array('type' => 'text', 'text' => array('espanol' => 'Comercio (pk_XXXX_XXXXXXXXXX)'), 'class' => 'col-xs-6');
		$items['key_secret_culqi'] = array('type' => 'text', 'text' => array('espanol' => 'Clave Secreta (sk_XXXX_XXXXXXXXXX)'), 'class' => 'col-xs-6');

		$config['title'] = array('espanol' => 'Configuración', 'english' => 'Configuration');
		$config['items'] = $items;
		$config['table'] = 'configuracion';
		$config['controller'] = 'configuracion';
		$config['breadcrumb'] = FALSE;

		$buttons = array();
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar Configuración', 'english' => 'Update Configuration'));

		$config['buttons'] = $buttons;

		$this->initialize($config);
		$this->actualizar(1);
	}

	function desactivar_membresia()
	{
		if(isset($_POST['id_membresia']) AND $_POST['id_membresia'] != '')
		{
			$pago = $this->module_model->buscar('pagos', $_POST['id_membresia']);

			$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));

			try
			{
				$culqi->Subscriptions->delete($pago['suscripcion']);
				$mensaje = 'La suscripción ha sido desactivada correctamente.';
				$type = 'ok';

				$this->module_model->actualizar('pagos', array('membresia_inactiva' => 1), $pago['id']);
			}
			catch(Exception $ex)
			{
				$mensaje = (array) $ex->getMessage();
				$mensaje = (array) json_decode($mensaje[0]);
				$mensaje = $mensaje['merchant_message'];

				$type = 'error';
			}

			$data['mensaje'] = $mensaje; $data['url'] = 'suscripciones'; $data['type'] = $type;

			$this->load->view("backend/templates/json_view", array('resultado' => $data));
		}
	}

	function activar_membresia()
	{
		if(isset($_POST['id_membresia']) AND $_POST['id_membresia'] != '')
		{
			$pago = $this->module_model->buscar('pagos', $_POST['id_membresia']);

			$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));

			try
			{
				$culqi->Subscriptions->delete($pago['suscripcion']);

				$suscripcion = $culqi->Subscriptions->create(
					array(
						"card_id" => $pago['tarjeta'],
						"plan_id" => $pago['plan']
					)
				);

				$charge = $suscripcion->charges[0];

				$_update = array('suscripcion' => $suscripcion->id, 'cargo' => $charge->id);

				$this->module_model->actualizar('pagos', $_update, $pago['id']);

				$type = 'ok';
				$mensaje = 'La suscripción ha sido activada correctamente.';

				$this->module_model->actualizar('pagos', array('membresia_inactiva' => 0), $pago['id']);
			}
			catch(Exception $ex)
			{
				$mensaje = (array) $ex->getMessage();
				$mensaje = (array) json_decode($mensaje[0]);
				$mensaje = $mensaje['merchant_message'];
				$type = 'error';
			}

			$data['mensaje'] = $mensaje; $data['url'] = NULL; $data['type'] = $type;

			$this->load->view("backend/templates/json_view", array('resultado' => $data));
		}
	}

	function cambiar_tarjeta()
	{
		if(isset($_POST['id_membresia']) AND $_POST['id_membresia'] != '')
		{
			$pago = $this->module_model->buscar('pagos', $_POST['id_membresia']);

			$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));

			try
			{
				if($pago['membresia_inactiva'] == 1)
				{
					$culqi->Cards->delete($pago['tarjeta']);
					$culqi->Subscriptions->delete($pago['suscripcion']);

					$tarjeta = $culqi->Cards->create(
                        array(
                            "customer_id" => $pago['cliente'],
                            "token_id" => $this->input->post('token'),
                            "validate" => false
                        )
                    );

					$suscripcion = $culqi->Subscriptions->create(
						array(
							"card_id" => $tarjeta->id,
							"plan_id" => $pago['plan']
						)
					);

					$charge = $suscripcion->charges[0];

					$_update = array('tarjeta' => $tarjeta->id, 'suscripcion' => $suscripcion->id, 'cargo' => $charge->id);

					$this->module_model->actualizar('pagos', $_update, $pago['id']);
				}
					
				$type = 'ok';
				$mensaje = 'La suscripción ha sido activada correctamente.';
			}
			catch(Exception $ex)
			{
				$mensaje = (array) $ex->getMessage();
				$mensaje = (array) json_decode($mensaje[0]);
				$mensaje = $mensaje['merchant_message'];
				$type = 'error';
			}

			$data['mensaje'] = $mensaje; $data['url'] = NULL; $data['type'] = $type;

			$this->load->view("backend/templates/json_view", array('resultado' => $data));
		}
	}

	function facturacion()
    {
        // Recuperar el cuerpo de la solicitud y analizarlo como JSON
        $input = file_get_contents("php://input");
        $event_json = json_decode($input);

        $this->enviar_email($campania['email_contacto'], "kluizsv@gmail.com", "Respuesta de WebHooks Culqi", $event_json);

        //Respuesta a Culqi
        http_response_code(200);
        $array = array(
            "response" => "Webhook de Culqi recibido"
        );
        echo json_encode($array);
    }

    function remover_pruebas()
    {
		$this->validar_usuario(); // Verificando la sesión del usuario..

		// Items para el Perfil..
		$items['correo_electronico'] = array('type' => 'text', 'text' => array('espanol' => 'Correo Electrónico'), 'validate' => 'required', 'help' => 'Si quiere eliminar varios, separar por comas');
		// Fin de los Items para el Perfil..

		$config['table'] = 'administrador';
		$config['controller'] = 'remover_pruebas';
		$config['title'] = array('espanol' => 'Remover Pruebas');
		$config['items'] = $items;
		$config['breadcrumb'] = FALSE;

		$buttons = array();
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Remover Pruebas'));

		$config['buttons'] = $buttons;

		$this->initialize($config);

		if(isset($_POST) AND count($_POST) > 0)
		{
			if($_POST['correo_electronico'] != '')
			{
				$culqi = new Culqi\Culqi(array('api_key' => $this->key_secret));

		        $ignore = explode(",", $_POST['correo_electronico']);

		        foreach($ignore as $key => $value)
		        {
		        	$value = trim($value); // Limpiar los correos..

		        	$pagos = $this->module_model->seleccionar('pagos', array('correo_electronico' => $value));

		            foreach($pagos as $k => $v)
		            {
		                $this->module_model->eliminar('pagos', $v['id']);
		            }

		            $clientes = $this->module_model->seleccionar('administrador', array('correo_electronico' => $value));

		            foreach($clientes as $k => $v)
		            {
		                $this->module_model->eliminar('administrador', $v['id']);
		            }
		        }

		        $customers = (array) $culqi->Customers->all();

		        foreach($customers['data'] as $key => $value)
		        {
		            $value = (array) $value;

		            if(in_array($value['email'], $ignore))
		            {
		                foreach($value['cards'] as $k => $v)
		                {
		                    $v = (array) $v; $culqi->Cards->delete($v['id']);
		                }

		                $culqi->Customers->delete($value['id']);
		            }
		        }

				$data['mensaje'] = 'Correos electrónicos eliminados correctamente.';
			}
			else
			{
				$data['mensaje'] = 'Escriba un correo electrónico para poder eliminar las pruebas realizadas.';
			}
			
			$data['url'] = NULL;

			$this->load->view("backend/templates/print_json_view", array('data' => $data));
		}
		else
		{
			$this->actualizar(0);
		}
    }
}

?>
