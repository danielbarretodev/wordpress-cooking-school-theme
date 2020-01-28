<?php
/**
 * Metaboxes para el Homepage
 */


 /**
  * Metaboxes para el Homepage
  */
add_action( 'cmb2_admin_init', 'cocina_campos_homepage' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cocina_campos_homepage() {
	$prefix = 'cocina_homepage_';
    $id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cocina_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Campos Homepage', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
	) );

	$cocina_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 1', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cocina_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 1', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_1',
		'type' => 'file',
		) );

	$cocina_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 2', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	
	$cocina_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 2', 'cmb2' ),
		'desc' => esc_html__( 'Segunda imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_2',
		'type' => 'file',
	) );

	// Campos de licenciatura

	$cocina_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Licenciatura', 'cmb2' ),
		'desc'    => esc_html__( 'Añada el texto para la licenciatura', 'cmb2' ),
		'id'      => $prefix . 'texto_licenciatura',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	
	$cocina_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen fondo licenciatura', 'cmb2' ),
		'desc' => esc_html__( 'Imagen de fondo para la sección licenciatura', 'cmb2' ),
		'id'   => $prefix . 'imagen_licenciatura',
		'type' => 'file',
	) );

	

}


add_action( 'cmb2_admin_init', 'cocina_seccion_nosotros' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function cocina_seccion_nosotros() {
	$prefix = 'cocina_group_';

	/**
	 * Repeatable Field Groups
	 */


	$cocina_iconos = new_cmb2_box( array(
		'id'          	=> $prefix . 'metabox',
		'title'       	=> esc_html__( 'Iconos con Descripción', 'cmb2' ),
		'object_types'	=> array( 'page' ),
		'context'      => 'normal',
		'priority'		=>	'high',
		'show_names'	=> 'true',
		'show_on'		=> array(
			'key'		=> 'page-template',
			'value' 	=> 'page-iconos.php'
		),
	) );

	$cocina_iconos->add_field( array(
		'name' => esc_html__( 'Titulo Sección', 'cmb2' ),
		'desc' => esc_html__( 'Añada un título para la sección', 'cmb2' ),
		'id'   => $prefix . 'titulo_seccion',
		'type' => 'text',
	) );
	
	// $group_field_id is the field id string, so in this case: 'yourprefix_group_demo'
	$group_field_id = $cocina_iconos->add_field( array(
		'id'          => $prefix . 'nosotros',
		'type'        => 'group',
		'description' => esc_html__( 'Agregue las opciones que sean necesarias', 'cmb2' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Característica {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Añadir otra entrada', 'cmb2' ),
			'remove_button'  => esc_html__( 'Eliminar entrada', 'cmb2' ),
			'sortable'       => true,
			//'closed'      => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );



	$cocina_iconos->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Añade un titulo', 'cmb2' ),
		'id'         => $prefix .  'titulo_icono',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cocina_iconos->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Descripcion', 'cmb2' ),
		'description' => esc_html__( 'Agregue una descripción a esta característica', 'cmb2' ),
		'id'          => $prefix . 'descripcion',
		'type'        => 'textarea_small',
	) );

	$cocina_iconos->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Icono', 'cmb2' ),
		'id'   => $prefix . 'icono',
		'type' => 'file',
	) );
}



add_action( 'cmb2_admin_init', 'cocina_campos_blog' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cocina_campos_blog() {
	$prefix = 'cocina_blog_';
    $id_blog = get_option('page_for_posts');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cocina_campos_blog = new_cmb2_box( array(
		'id'           => $prefix . 'blog',
		'title'        => esc_html__( 'Campos blog', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_blog ),
		), // Specific post IDs to display this metabox
	) );


	$cocina_campos_blog->add_field( array(
		'name' => esc_html__( 'Slogan Blog', 'cmb2' ),
		'desc' => esc_html__( 'Añada un slogan a la página del blog', 'cmb2' ),
		'id'   => $prefix . 'slogan_blog',
		'type' => 'text',
	) );
}


/**
 * Añade campos al postype de clases
 */

add_action( 'cmb2_admin_init', 'cocina_campos_cursos' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cocina_campos_cursos() {
	$prefix = 'cocina_cursos_';
 	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cocina_campos_cursos = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Campos Cursos', 'cmb2' ),
		'object_types' => array( 'clases_cocina' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );


	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Subtitulo Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada un subtítulo al curso', 'cmb2' ),
		'id'   => $prefix . 'subtitulo_curso',
		'type' => 'text',
	) );

	$cocina_campos_cursos->add_field( array(
		'name'     => esc_html__( 'Información sobre la fecha y Horarios del curso', 'cmb2' ),
		'desc'     => esc_html__( 'Añada información relacionada a fecha, días y horas para el curso', 'cmb2' ),
		'id'       => $prefix . 'separador_fecha',
		'type'     => 'title',
		'on_front' => false,
	) );


	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Indicaciones de los dias', 'cmb2' ),
		'desc' => esc_html__( 'Añada las indicaciones de los dias ej: Todos los sábados', 'cmb2' ),
		'id'   => $prefix . 'indicaciones_dias',
		'type' => 'text',
	) );


	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de Inicio de Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada la fehca de Inicio de Curso', 'cmb2' ),
		'id'   => $prefix . 'fecha_inicio_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );

	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de Inicio', 'cmb2' ),
		'desc' => esc_html__( 'Añada la hora de inicio', 'cmb2' ),
		'id'   => $prefix . 'hora_inicio',
		'type' => 'text_time'
		// 'time_format' => 'H:i', // Set to 24hr format
	) );

	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Fecha de Fin de Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada la fehca de Fin de Curso', 'cmb2' ),
		'id'   => $prefix . 'fecha_fin_curso',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'column' => true
	) );

	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Hora de Fin', 'cmb2' ),
		'desc' => esc_html__( 'Añada la hora de fin', 'cmb2' ),
		'id'   => $prefix . 'hora_fin',
		'type' => 'text_time'
		// 'time_format' => 'H:i', // Set to 24hr format
	) );


	// Añade Información sobre cupos, precios, etc
	$cocina_campos_cursos->add_field( array(
		'name'     => esc_html__( 'Información extra del curso', 'cmb2' ),
		'desc'     => esc_html__( 'Añada cupo, precio, instructor en esta sección', 'cmb2' ),
		'id'       => $prefix . 'separador_inf_extra',
		'type'     => 'title',
		'on_front' => false,
		'column' => true
	) );

	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Precio del Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada el precio del curso', 'cmb2' ),
		'id'   => $prefix . 'precio_curso',
		'type' => 'text_money',
		'before_field' => '€', // override '$' symbol if needed
		'column' => true
	) );


	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Cupo', 'cmb2' ),
		'desc' => esc_html__( 'Cupo para el curso', 'cmb2' ),
		'id'   => $prefix . 'cupo',
		'type' => 'text',
	) );


	$cocina_campos_cursos->add_field( array(
		'name' => esc_html__( 'Que Incluye El Curso', 'cmb2' ),
		'desc' => esc_html__( 'Añada lo que incluye el curso', 'cmb2' ),
		'id'   => $prefix . 'incluye',
		'type' => 'text',
		'repeatable' => true
	) );

	$cocina_campos_cursos->add_field( array(
		'name'      	=> esc_html__( 'Chef Instructor del Curso', 'cmb2' ),
		'desc'        	=> esc_html__('Seleccione el chef que impartá el curso', 'cmb2'),
		'id'			=> $prefix . 'chef',
		'type'      	=> 'post_search_ajax',
		'limit'			=> 10,
		'query_args'	=> array(
			'post-type' 	=> array('chefs'),
			'post_status'	=> array('publish'),
			'post_per_page' => -1

		)
	) );
	
}