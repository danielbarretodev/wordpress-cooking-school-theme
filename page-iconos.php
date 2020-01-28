<?php 
/**
 *  Template Name: Página con Íconos
 * 
 */

get_header();

    while(have_posts()): the_post();

        get_template_part( 'template-parts/contenido', 'pagina');

        get_template_part( 'template-parts/iconos','');

    endwhile;
get_footer(); ?>