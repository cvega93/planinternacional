<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formulario extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'email';

		$config['controller'] = 'formulario';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'formularios';
		$config['title'] = array('espanol' => 'Listado de Registros');
		$config['type'] = 'table';
		$config['export'] = TRUE;

		// Botones
		// $buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar una Estadística'));
		// $buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['formulario']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['nombres'] = array('type' => 'text', 'text' => array('espanol' => 'Nombres'), 'validate' => 'required', 'table' => TRUE);
		$items['apellido_paterno'] = array('type' => 'text', 'text' => array('espanol' => 'Apellido Paterno'), 'validate' => 'required', 'table' => TRUE);
		$items['apellido_materno'] = array('type' => 'text', 'text' => array('espanol' => 'Apellido Materno'), 'table' => TRUE);
		$items['email'] = array('type' => 'text', 'text' => array('espanol' => 'Correo electrónico'), 'validate' => 'required|valid_email', 'table' => TRUE);
		$items['celular'] = array('type' => 'text', 'text' => array('espanol' => 'Celular'), 'validate' => 'required|numeric', 'table' => TRUE);
		$items['tipo_documento'] = array('type' => 'select', 'text' => array('espanol' => 'Tipo de Documento'), 'validate' => 'required', 'table' => TRUE, 'items' => array('', 'DNI', 'CE', 'OTRO'));
		$items['otro_tipo_documento'] = array('type' => 'text', 'text' => array('espanol' => 'Otro Tipo de Documento'));
		$items['numero_documento'] = array('type' => 'text', 'text' => array('espanol' => 'Número de Documento'), 'validate' => 'required|numeric', 'table' => TRUE);
		$items['pais'] = array('type' => 'select', 'text' => array('espanol' => 'País'), 'items' => $this->module_model->seleccionar('paises', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'paises'), 'readonly' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
