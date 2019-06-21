<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paises extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'paises';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'paises';
		$config['title'] = array('espanol' => 'Listado de Países');
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar un País'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'País'), 'validate' => 'required', 'table' => TRUE);
		$items['codigo_iso'] = array('type' => 'text', 'text' => array('espanol' => 'Código ISO'), 'validate' => 'required', 'table' => TRUE, 'help' => 'Enlace de Referencia: <a href="https://es.wikipedia.org/wiki/ISO_3166-1" target="_blank">https://es.wikipedia.org/wiki/ISO_3166-1</a>');
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
