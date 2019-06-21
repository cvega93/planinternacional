<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanias extends MY_Controller {

	function __construct() {
		parent::__construct();

		$items = array(); $buttons = array();

		$config['campo_referencia'] = 'titulo';

		$config['controller'] = 'campanias';
		$config['where'] = array('estado' => 1);
		$config['table'] = 'campanias';
		$config['title'] = array('espanol' => 'Listado de Campañas');
		$config['order'] = TRUE;
		$config['publish'] = TRUE;
		$config['type'] = 'table';

		// Botones
		$buttons['agregar'] = array('type' => 'add', 'text' => array('espanol' => 'Agregar una Campaña'));
		$buttons['actualizar'] = array('type' => 'update', 'text' => array('espanol' => 'Actualizar'));
		$buttons['eliminar'] = array('type' => 'delete', 'text' => array('espanol' => 'Eliminar'));
		// Fin de los Botones

		// Elementos
		$items['logo_gracias'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Logo (590x87 píxeles)'), 'validate' => 'required');
		$items['titulo'] = array('type' => 'text', 'text' => array('espanol' => 'Título'), 'validate' => 'required', 'table' => TRUE);
		$items['fondo_menu'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo Menú (211x350 píxeles)'), 'validate' => 'required');
		$items['titulo_uno_menu'] = array('type' => 'text', 'text' => array('espanol' => 'Título 1 - Menú'), 'validate' => 'required');
		$items['titulo_dos_menu'] = array('type' => 'text', 'text' => array('espanol' => 'Título 2 - Menú'), 'validate' => 'required');
		$items['titulo_tres_menu'] = array('type' => 'text', 'text' => array('espanol' => 'Título 3 - Menú'), 'validate' => 'required');
		$items['titulo_cuatro_menu'] = array('type' => 'text', 'text' => array('espanol' => 'Título 4 - Menú'), 'validate' => 'required');
		$items['primer_contenido'] = array('type' => 'label', 'text' => array('espanol' => 'Contenido Intermedio - Parte I'));
		$items['fondo_primer_contenido'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Primer Contenido (1099x587 píxeles)'), 'validate' => 'required');
		$items['color_fondo_primer_contenido'] = array('type' => 'color', 'text' => array('espanol' => 'Color de Fondo - Primer Contenido'), 'validate' => 'required');
		$items['primera_imagen'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Primera Imagen (450x203 píxeles)'), 'validate' => 'required');
		$items['video'] = array('type' => 'youtube', 'text' => array('espanol' => 'Video YouTube'), 'validate' => 'required');
		$items['fondo_video'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Video (816x359 píxeles)'), 'validate' => 'required');
		$items['fondo_video_responsive'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Video - Móviles (550x539 píxeles)'), 'validate' => 'required');
		$items['segunda_imagen'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Segunda Imagen (500x769 píxeles)'), 'validate' => 'required');
		$items['titulo_testimonios'] = array('type' => 'text', 'text' => array('espanol' => 'Título Testimonios'), 'validate' => 'required');
		$items['fondo_testimonios'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo de los Testimonios (376x184 píxeles)'), 'validate' => 'required');
		$items['primer_separador_contenido'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Separador entre el primer y segundo contenido (1920x173 píxeles)'), 'validate' => 'required');
		$items['segundo_contenido'] = array('type' => 'label', 'text' => array('espanol' => 'Contenido Intermedio - Parte II'));
		$items['fondo_segundo_contenido'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Segundo Contenido (524x317 píxeles)'), 'validate' => 'required');
		$items['color_fondo_segundo_contenido'] = array('type' => 'color', 'text' => array('espanol' => 'Color de Fondo - Segundo Contenido'), 'validate' => 'required');
		$items['tercera_imagen'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Primera Imagen (340x489 píxeles)'), 'validate' => 'required');
		$items['fondo_estadisticas'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo Estadísticas (498x574 píxeles)'), 'validate' => 'required');
		$items['fondo_estadisticas_responsive'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo Estadísticas - Móviles (380x384 píxeles)'), 'validate' => 'required');
		$items['cuarta_imagen'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Segunda Imagen (284x179 píxeles)'), 'validate' => 'required');
		$items['primer_tipo_donacion'] = array('type' => 'text', 'text' => array('espanol' => 'Primer Tipo Donación'), 'validate' => 'required');
		$items['segundo_tipo_donacion'] = array('type' => 'text', 'text' => array('espanol' => 'Segundo Tipo Donación'), 'validate' => 'required');
		$items['fondo_tipo_donacion'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Tipo de Donación (228x59 píxeles)'), 'validate' => 'required');
		$items['fondo_primer_tipo_donacion'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Primer Tipo de Donación (320x144 píxeles)'), 'validate' => 'required');
		$items['fondo_segundo_tipo_donacion'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Segundo Tipo de Donación (320x144 píxeles)'), 'validate' => 'required');
		$items['alerta_asterisco'] = array('type' => 'textarea', 'text' => array('espanol' => 'Alerta Asterisco'), 'validate' => 'required');
		$items['monto_minimo'] = array('type' => 'text', 'text' => array('espanol' => 'Monto Mínimo'));
		$items['tercer_contenido'] = array('type' => 'label', 'text' => array('espanol' => 'Contenido Intermedio - Parte III'));
		$items['fondo_tercer_contenido'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Fondo del Tercer Contenido (1099x587 píxeles)'), 'validate' => 'required');
		$items['unete'] = array('type' => 'text', 'text' => array('espanol' => 'Únete'), 'validate' => 'required');
		$items['subtitulo_unete'] = array('type' => 'text', 'text' => array('espanol' => 'Subtítulo Únete'), 'validate' => 'required');
		$items['dona'] = array('type' => 'text', 'text' => array('espanol' => 'Dona'), 'validate' => 'required');
		$items['subtitulo_dona'] = array('type' => 'text', 'text' => array('espanol' => 'Subtítulo Dona'), 'validate' => 'required');
		$items['metas'] = array('type' => 'label', 'text' => array('espanol' => 'Detalle - Metas'));
		$items['imagen_metas'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Imagen Metas (286x141 píxeles)'), 'validate' => 'required');
		$items['meta'] = array('type' => 'select', 'text' => array('espanol' => 'Meta Actual'), 'validate' => 'required', 'items' => array(0, 1, 2, 3, 4, 5), 'table' => TRUE);
		$items['titulo_rango_uno'] = array('type' => 'text', 'text' => array('espanol' => 'Título - Rango 1'), 'validate' => 'required');
		$items['titulo_rango_dos'] = array('type' => 'text', 'text' => array('espanol' => 'Título - Rango 2'), 'validate' => 'required');
		$items['titulo_rango_tres'] = array('type' => 'text', 'text' => array('espanol' => 'Título - Rango 3'), 'validate' => 'required');
		$items['titulo_rango_cuatro'] = array('type' => 'text', 'text' => array('espanol' => 'Título - Rango 4'), 'validate' => 'required');
		$items['titulo_rango_cinco'] = array('type' => 'text', 'text' => array('espanol' => 'Título - Rango 5'), 'validate' => 'required');
		$items['titulo_gracias'] = array('type' => 'text', 'text' => array('espanol' => 'Título Gracias'), 'validate' => 'required');
		$items['contenido_gracias'] = array('type' => 'textarea', 'text' => array('espanol' => 'Contenido Gracias'), 'validate' => 'required');
		$items['subtitulo_derecha'] = array('type' => 'textarea', 'text' => array('espanol' => 'Título Derecha'), 'validate' => 'required');
		$items['slogan'] = array('type' => 'text', 'text' => array('espanol' => 'Slogan'), 'validate' => 'required');
		$items['imagen_ninias'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Imagen Niñas (889x643 píxeles)'), 'validate' => 'required');
		$items['cuarto_contenido'] = array('type' => 'label', 'text' => array('espanol' => 'Contenido Intermedio - Parte IV'));
		$items['fondo_cuarto_contenido'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Imagen de Fondo'));
		$items['fondo_cuarto_contenido_responsive'] = array('type' => 'photo', 'original' => TRUE, 'text' => array('espanol' => 'Imagen de Fondo - Responsive (458x260 píxeles)'));
		$items['color_fondo_cuarto_contenido'] = array('type' => 'color', 'text' => array('espanol' => 'Color de Fondo'));
		$items['footer'] = array('type' => 'label', 'text' => array('espanol' => 'Pie de Página'));
		$items['titulo_programas'] = array('type' => 'text', 'text' => array('espanol' => 'Título Programas'), 'validate' => 'required');
		$items['email_contacto'] = array('type' => 'text', 'text' => array('espanol' => 'Correo Electrónico'));
		$items['telefono'] = array('type' => 'text', 'text' => array('espanol' => 'Teléfono'), 'validate' => 'required');
		$items['direccion'] = array('type' => 'text', 'text' => array('espanol' => 'Dirección'), 'validate' => 'required');
		$items['titulo_enlace'] = array('type' => 'text', 'text' => array('espanol' => 'Título del Enlace - Footer'), 'validate' => 'required');
		$items['destino_enlace'] = array('type' => 'text', 'text' => array('espanol' => 'Destino del Enlace - Footer'), 'validate' => 'required');
		$items['redes_sociales'] = array('type' => 'label', 'text' => array('espanol' => 'Redes Sociales'));
		$items['facebook'] = array('type' => 'text', 'text' => array('espanol' => 'Facebook'));
		$items['twitter'] = array('type' => 'text', 'text' => array('espanol' => 'Twitter'));
		$items['instagram'] = array('type' => 'text', 'text' => array('espanol' => 'Instagram'));
		$items['youtube'] = array('type' => 'text', 'text' => array('espanol' => 'YouTube'));
		$items['linkedin'] = array('type' => 'text', 'text' => array('espanol' => 'Linkedin'));
		$items['titulo_aliados'] = array('type' => 'text', 'text' => array('espanol' => 'Título Aliados'), 'validate' => 'required');
		$items['posicionamiento_seguimiento'] = array('type' => 'label', 'text' => array('espanol' => 'Posicionamiento y Seguimiento'));
		$items['keywords'] = array('type' => 'textarea', 'text' => array('espanol' => 'Palabras Claves', 'english' => 'Keywords'), 'placeholder' => 'Ingrese las palabras claves de su empresa');
		$items['titulo_seo'] = array('type' => 'text', 'text' => array('espanol' => 'Título SEO'));
		$items['descripcion_seo'] = array('type' => 'textarea', 'text' => array('espanol' => 'Descripción SEO'));
		$items['imagen_seo'] = array('type' => 'photo', 'text' => array('espanol' => 'Imagen SEO ()'));
		$items['google_analytics'] = array('type' => 'textarea', 'text' => array('espanol' => 'Código de Seguimiento - Google Analytics'));
		// Fin de los Elementos

		$config['buttons'] = $buttons;
		$config['items'] = $items;

		$this->initialize($config);
	}
}
