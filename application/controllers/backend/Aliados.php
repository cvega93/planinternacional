<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aliados extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'aliados';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'aliados';
		$config['title'] = array('espanol' => 'Nuestros Aliados');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un Aliado'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['aliados']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Aliado'), 'validate' => 'required', 'table' => TRUE);
		$items['imagen'] = array('type' => 'photo', 'text' => array('espanol' => 'Logo (183x60 píxeles)'), 'validate' => 'required', 'original' => TRUE, 'table' => TRUE);
		$items['enlace'] = array('type' => 'text', 'text' => array('espanol' => 'Enlace'), 'validate' => 'prep_url', 'table' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
