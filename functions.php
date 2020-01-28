<?php

/**
 * Agregar CMB2
 */

require_once dirname(__FILE__) . '/cmb2.php';



/**
 * Queries reutilizables
 */

 require_once dirname(__FILE__) . '/inc/queries.php';






/**
 * Carga campos personalizados
 * es una archivo creado a partir de cmb2, con menos funciones
 */

require_once dirname(__FILE__) . '/inc/custom-fields.php';


/**
 * Carga los post types (post personalizados con su propia fila en el dashboard)
 */

require_once dirname(__FILE__) . '/inc/posttypes.php' ;


add_action( 'init', 'cocina_imagen_destacada');
function cocina_imagen_destacada($id){


    
    //TRAIGO LA IMAGEN DE BASE DE DATOS
    $imagen = get_the_post_thumbnail_url($id, 'full');


    $html = '';
    $clase = false;
    



    if($imagen) {
        $clase=true;
        $html .= '<div class="container">';
        $html .=   '<div class="row imagen-destacada"></div>';
        $html .= '</div>';

        //Agregar estilos linealmente
        wp_register_style('custom', false);
        wp_enqueue_style( 'custom');

        //creamos el css para el custom

        $imagen_destacada_css = "
        .imagen-destacada {
            background-image: url({$imagen});
        }
        ";

        wp_add_inline_style( 'custom', 
        $imagen_destacada_css);

    }

    return array($html,$clase);

}



/**
 * Funciones que se cargan al activar el theme
 */
 function cocina_setup(){
    //habilitamos imagen destacada
    add_theme_support( 'post-thumbnails' );
  
    //Menu de navegación
    register_nav_menus( array(
        'menu_principal' => esc_html__( 'Menu Principal', 'escueladecocina' )
    ) );
}

add_action( 'after_setup_theme', 'cocina_setup');

//definir tamaños de imágenes
add_image_size( 'mediano', 510, 340, true);



/**
 * Agrega la clase nav-link de boostrap al menu principal
 */
 function cocina_enlace_class($atts, $item, $args){

    if($args->theme_location == 'menu_principal') {
        $atts['class'] = 'nav-link';
    }
    return $atts;

 }

 add_filter( 'nav_menu_link_attributes', 'cocina_enlace_class', 10, 3 );

/*
* Carga los Scripts y CSS del theme
*/
function cocina_scripts(){
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/css/bootstrap.css' , false, '4.1.3');


    wp_enqueue_style( 'style', get_stylesheet_uri() , array('bootstrap-css') );

    /** Scripts **/ 

    /**jquery ya lo tiene wordpress integrado */
    wp_enqueue_script( 'jquery');

    wp_enqueue_script( 'popper',get_template_directory_uri() . '/js/popper.js' , array('jquery'), '1.0', true);

    wp_enqueue_script( 'bootstrap-js',get_template_directory_uri() . '/js/bootstrap.js' , array('jquery'), '4.1.0', true);


}

add_action( "wp_enqueue_scripts", 'cocina_scripts');


/**
 * Agregamos mensaje personalizado a la pagina en el admin
 */

 add_filter( 'display_post_states', 'cocina_cambiar_estado', 10, 2 );

 function cocina_cambiar_estado($states, $post) {
     if('page' == get_post_type($post->ID) && 'page-clases.php'== get_page_template_slug( $pos->ID ))
    {
        $states[] = __('Página de Clases <a href="edit.php?post_type=clases_cocina">Administrar Clases</a>');

    }

    return $states;
}

add_filter('page_row_actions', 'add_admin_cursos_link', 10, 2);


function add_admin_cursos_link($actions, $page_object)
{
    if('page' == get_post_type($post->ID) && 'page-clases.php'== get_page_template_slug( $pos->ID ))
    {
        $actions['administrar-cursos'] = '<a href="edit.php?post_type=clases_cocina" >Administrar Clases</a>';

    }
   return $actions;
}