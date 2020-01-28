<?php

function cocina_query_cursos($cantidad = -1){
    $args = array(
        'post_type' => 'clases_cocina',
        'posts_per_page' => $cantidad
    );

    $clases = new WP_Query($args);

    while($clases->have_posts()) : $clases->the_post();

      //  printf('<pre>%s</pre>', var_export(get_post_custom(get_the_ID()), true));
    
    ?>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                     <img src="<?php echo get_the_post_thumbnail_url( ); ?>" alt="" class="card-img-top">                    <div class="card-meta bg-primary p-3 text-light d-flex justify-content-between align-items-center">
                        <?php
                            $fecha = get_post_meta(get_the_ID(),'cocina_cursos_fecha_inicio_curso',true);
                            $hora = get_post_meta(get_the_ID(),'cocina_cursos_hora_inicio',true);
                            $costo = get_post_meta(get_the_ID(),'cocina_cursos_precio_curso',true);
                        ?>
                        <div>
                            <p class="m-0">Fecha Inicio: <?php echo $fecha; ?></p>
                            <p class="m-0">Hora: <?php echo $hora; ?></p>
                        </div>
                        
                        <span class="badge badge-secondary p-2"><?php echo $costo;  ?></span>
                    </div>

                    <div class="card-body">
                        <h3 class="card-title"><?php the_title( ); ?></h3>
                        <p class="card-subtitle mb-2"><?php $subtitle = get_post_meta(get_the_ID(),'cocina_cursos_subtitulo_curso',true);

                                            echo $subtitle;
                        ?></p>
                        
                        <p class="card-text">
                           <?php echo wp_trim_words( get_the_content(), 10, ' [...]' );?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary d-block d-md-inline">Más Información</a>
                    </div>
                </div>
            </div>
    <?php
    endwhile; wp_reset_postdata();
}
?>