<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programas extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'programas';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'programas';
		$config['title'] = array('espanol' => 'Listado de Programas');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un Programa'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['programas']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Programa'), 'validate' => 'required', 'table' => TRUE);
		$items['direccion'] = array('type' => 'text', 'text' => array('espanol' => 'Dirección '), 'validate' => 'required', 'table' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
