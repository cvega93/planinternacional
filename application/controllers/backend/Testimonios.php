<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonios extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'testimonios';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'testimonios';
		$config['title'] = array('espanol' => 'Listado de Testimonios');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un Testimonio'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['testimonios']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Contacto'), 'validate' => 'required', 'table' => TRUE);
		$items['edad'] = array('type' => 'text', 'text' => array('espanol' => 'Edad'), 'validate' => 'required|numeric', 'class' => 'col-md-6', 'table' => TRUE);
		$items['ubicacion'] = array('type' => 'text', 'text' => array('espanol' => 'Ubicación'), 'validate' => 'required', 'class' => 'col-md-6', 'table' => TRUE);
		$items['comentario'] = array('type' => 'textarea', 'text' => array('espanol' => 'Comentario'), 'validate' => 'required');
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
