<?php $html = cocina_imagen_destacada( get_the_ID());
        echo $html[0];
        // $html[0] retorna el html
        // $html[1] retorna un booleano para indicarnos si la clase existe
    ?>     


<main class="container">
    <div class="row justify-content-center">
        <div class="py-3 px-5 bg-light  contenido-pagina <?php echo $html[1] ? 'col-md-8 destacada' : 'col-md-12 no-destacada'; ?>">
        <h2 class="text-center my-5 separador"><?php the_title();?></h2>
    

        <?php the_content();

            the_author_firstname();

        ?>

            <div class="meta pt-2 pt-md-0 pt-4 d-flex justify-content-end">
                                    <p  class="m-0">
                                        Escrito el <span><?php the_time(get_option('date_format')); ?>
                                                    </span> 
                                        por <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'),
                                                        get_the_author_meta('user_nicename')); ?>">
                                                        
                                                        <?php the_author(); ?>                                                  
                                            </a>
                                    </p>
            </div>            
        </div>
    </div>  
</main>