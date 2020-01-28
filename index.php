<?php get_header();?>

<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <blockquote class="subtitulo text-center pl-3">
            <?php 
                $id_blog = get_option('page_for_posts');

                echo get_post_meta($id_blog, 'cocina_blog_slogan_blog',true);
            ?>
            </blockquote>
        </div>
    </div>
</div>




<div class="container">
    <div class="row">
        <main class="col-lg-9 col-md-8">
            <h1 class="separador text-center mb-3">Nuestro Blog </h1>
            
            <?php while(have_posts()) : the_post(); ?>
            <div class="row entrada mb-4">
                <div class="col-md-4">
                        <?php the_post_thumbnail('mediano',array('class' => 'img-fluid'));?>
                </div>
                
                <div class="col-md-8">
                        <div class="contenido-entrada pt-4 pt-md-0">
                           <a href="entrada.html">
                               <h3><?php the_title();?></h3>
                           </a>
                           

                           <div class="meta pt-2 pt-md-0">
                                <p  class="m-0">
                                    Escrito el <span><?php the_time(get_option('date_format')); ?>
                                                </span> 
                                    por <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'),
                                                    get_the_author_meta('user_nicename')); ?>">
                                                    
                                                    <?php the_author();?>
                                                
                                        </a>
                                </p>
                            </div>                                         
                            <p> <?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(  ); ?>" class="btn btn-primary text-light" >Ver Entrada</a>                         
                        </div>
                </div>
            </div><!-- Cierre del row-->
            <?php endwhile; ?>

            <ul class="pagination justify-content-center m-5">
                    <li class="page-item">
                        <?php 
                            previous_posts_link('
                                    <span class="page-link" aria-hidden="true">&laquo;Anteriores</span>
                                    <span class="sr-only">Anteriores</span>
                            ');
                            ?>  
                    </li>
                    <li class="page-item">
                        <?php
                            next_posts_link('
                                    <span class="page-link" aria-hidden="true">Siguiente &raquo;</span>
                                    <span class="sr-only">Anteriores</span>
                            ');
                            ?> 
                    </li>
            </ul>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>