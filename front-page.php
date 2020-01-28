<?php get_header(); ?>

<?php $id_home = get_option('page_on_front'); ?>

<div class="container-fluid imagenes-principales">
    <div class="row imagen-superior imagen">
        <div class="col-md-6 bg-primary">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-sm-8 col-md-6">
                    <div class="contenido text-center text-light py-3">
                        <?php echo get_post_meta($id_home, 'cocina_homepage_texto_superior_1',true); ?>
                    </div>
                </div>
            </div>         
        </div><!--col-md-6-->
        <div class="col-md-6 imagen-fondo" style="background-image:url(    <?php echo get_post_meta($id_home, 'cocina_homepage_imagen_superior_1',true); ?>);    background-size: cover !important;
    background-position: top center !important;"></div> 
    </div><!--row-->

    <div class="row imagen-inferior imagen">
        <div class="col-md-6 bg-secondary">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-sm-8 col-md-6">
                    <div class="contenido text-center py-3">
                    <?php echo get_post_meta($id_home, 'cocina_homepage_texto_superior_2',true);?>
                    </div>
                </div>
            </div>
        </div><!--col-md-6-->
        <div class="col-md-6 imagen-fondo" style="background-image:url(    <?php echo get_post_meta($id_home, 'cocina_homepage_imagen_superior_2',true); ?>);    background-size: cover !important;
    background-position: top center !important;"></div> 
     </div><!--row-->

</div>


<?php
    $nosotros = new WP_Query('pagename=nosotros');
    while($nosotros->have_posts() ): $nosotros->the_post();
        get_template_part( 'template-parts/iconos','');
    endwhile; 
    wp_reset_postdata();
?>

<div class="container-fluid">
    <section class="clases mt-5 py-5">
        <h1 class="separador text-center mb-3">Próximas Clases</h1>
        <div class="container">
            <div class="row">
                <?php cocina_query_cursos(3); ?>
            </div>
            <div class="row mt-4">
            
                <div class="container col-sm-8 col-lg-4">
                    <a class="btn btn-primary d-block" href="<?php echo get_permalink(get_page_by_title("Clases")); ?>">Más Clases</a>
                </div>
            </div>
        </div>
    </section>
</div>


<div class="licenciatura" style="background-image:url(    <?php echo get_post_meta($id_home, 'cocina_homepage_imagen_licenciatura',true); ?>);">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="contenido text-light text-center">
                <?php echo get_post_meta($id_home, 'cocina_homepage_texto_licenciatura',true);?>
     
                    <?php $contacto = get_page_by_title( 'Contacto');?>
                    <a href="<?php echo get_permalink( $contacto->ID);?>" class="btn btn-primary text-uppercase">Más Información</a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

</body>
</html>