<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'email';

		$config['controller'] = 'pagos';
		$config['where'] = array('estado' => 1, 'tipo_pago' => 1);
		$config['table'] = 'pagos';
		$config['title'] = array('espanol' => 'Registro de Pagos Únicos');
		$config['type'] = 'table';
		$config['export'] = TRUE;
		$config['status'] = array('campo' => 'activado', 'items' => array('Error de Pago', 'Pagado', 'Pendiente'), 'colors' => array('danger', 'success', 'warning'));

		// Botones
		// $buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar una Estadística'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));

		if($this->mostrar_session('nivel') == 3)
		{
			$config['where']['correo_electronico'] = $this->mostrar_session('correo_electronico');
			$buttons['actualizar_membresia'] = array('type' => 'javascript', 'text' => array('espanol' => 'Actualizar Membresía'), 'icon' => 'refresh', 'function' => 'actualizar_membresia');
		}
		// $buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['pagos']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'readonly' => TRUE);
		}
		$items['token'] = array('type' => 'text', 'text' => array('espanol' => 'ID Cargo'), 'readonly' => TRUE, 'table' => TRUE);
		$items['tipo_pago'] = array('type' => 'select', 'text' => array('espanol' => 'Tipo de Donación'), 'readonly' => TRUE, 'items' => array('', 'PAGO UNICO', 'PAGO MENSUAL'));
		$items['nombres'] = array('type' => 'text', 'text' => array('espanol' => 'Nombres'), 'readonly' => TRUE, 'table' => TRUE);
		$items['apellido_paterno'] = array('type' => 'text', 'text' => array('espanol' => 'Apellido Paterno'), 'readonly' => TRUE, 'table' => TRUE);
		$items['apellido_materno'] = array('type' => 'text', 'text' => array('espanol' => 'Apellido Materno'), 'readonly' => TRUE, 'table' => TRUE);
		$items['correo_electronico'] = array('type' => 'text', 'text' => array('espanol' => 'Correo electrónico'), 'readonly' => TRUE, 'table' => TRUE);
		$items['telefono'] = array('type' => 'text', 'text' => array('espanol' => 'Celular'), 'readonly' => TRUE);
		$items['tipo_documento'] = array('type' => 'select', 'text' => array('espanol' => 'Tipo de Documento'), 'readonly' => TRUE, 'table' => TRUE, 'items' => array('', 'DNI', 'CE', 'OTRO'));
		$items['otro_tipo_documento'] = array('type' => 'text', 'text' => array('espanol' => 'Otro Tipo de Documento'), 'readonly' => TRUE);
		$items['numero_documento'] = array('type' => 'text', 'text' => array('espanol' => 'Número de Documento'), 'readonly' => TRUE, 'table' => TRUE);
		$items['pais'] = array('type' => 'select', 'text' => array('espanol' => 'País'), 'items' => $this->module_model->seleccionar('paises', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'paises'), 'readonly' => TRUE);

		$items['moneda'] = array('type' => 'select', 'text' => array('espanol' => 'Moneda'), 'items' => array('PEN' => 'SOLES', 'USD' => 'DOLARES'), 'readonly' => TRUE);
		$items['total'] = array('type' => 'text', 'text' => array('espanol' => 'Monto Total'), 'readonly' => TRUE);
		$items['cantidad_apoyo'] = array('type' => 'text', 'text' => array('espanol' => 'Cantidad Apoyo'), 'required' => TRUE, 'table' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
