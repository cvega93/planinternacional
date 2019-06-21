<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'banners';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'banners';
		$config['title'] = array('espanol' => 'Listado de Banners');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un Banner'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		if(!isset($_SESSION['banners']['id_padre']))
		{
			$items['id_padre'] = array('type' => 'select', 'text' => array('espanol' => 'Campaña'), 'items' => $this->module_model->seleccionar('campanias', array('estado' => 1)), 'value' => array('key' => 'id', 'item' => 'titulo', 'table' => 'campanias'), 'table' => TRUE, 'validate' => 'required');
		}

		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Banner'), 'validate' => 'required', 'table' => TRUE);
		$items['logo'] = array('type' => 'photo', 'text' => array('espanol' => 'Logo (590x87 píxeles)'), 'validate' => 'required', 'original' => TRUE);
		$items['imagen_izquierda'] = array('type' => 'photo', 'text' => array('espanol' => 'Imagen Izquierda'), 'original' => TRUE, 'table' => TRUE);
		$items['imagen_fondo'] = array('type' => 'photo', 'text' => array('espanol' => 'Imagen de Fondo (1600x722 píxeles)'), 'validate' => 'required', 'original' => TRUE, 'table' => TRUE);
		$items['imagen_derecha'] = array('type' => 'photo', 'text' => array('espanol' => 'Imagen Derecha'), 'original' => TRUE, 'table' => TRUE);
		$items['imagen_enlace'] = array('type' => 'photo', 'text' => array('espanol' => 'Imagen del Enlace'), 'original' => TRUE);
		$items['enlace'] = array('type' => 'text', 'text' => array('espanol' => 'Enlace'));
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
