<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Precios extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'id';

		$config['controller'] = 'precios';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'precios';
		$config['title'] = array('espanol' => 'Listado de Precios');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un Precio'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['precios']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['tipo_donacion'] = array('type' => 'select', 'items' => array(1 => 'Tipo 1', 2 => 'Tipo 2'), 'validate' => 'required', 'text' => array('espanol' => 'Tipo de Donación'), 'table' => TRUE);
		$items['detalles'] = array('type' => 'text', 'text' => array('espanol' => 'Detalles'), 'validate' => 'required');
		$items['precio'] = array('type' => 'text', 'text' => array('espanol' => 'Precio (S/)'), 'validate' => 'required|numeric', 'table' => TRUE);
		$items['cantidad_apoyo'] = array('type' => 'text', 'text' => array('espanol' => 'Cantidad de niñas apoyadas'), 'validate' => 'required|numeric', 'table' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
