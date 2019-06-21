<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'estadisticas';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'estadisticas';
		$config['title'] = array('espanol' => 'Estadísticas');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar una Estadística'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['estadisticas']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Estadística'), 'validate' => 'required', 'table' => TRUE);
		$items['contenido'] = array('type' => 'textarea', 'text' => array('espanol' => 'Comentario'), 'validate' => 'required', 'table' => TRUE);
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
