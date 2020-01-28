<?php get_header();

    while(have_posts()): the_post();

        get_template_part( 'template-parts/contenido', 'post');
?>



<div class="container">
    <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="separador text-center my-3">
                    ¿Qué Incluye?
                </h2>
  


                <ul class="list-group">
                        <?php 
                            $incluye = get_post_meta(get_the_ID(), 'cocina_cursos_incluye', true);
                            foreach($incluye as $item): ?>
                                 <li class="list-goup-item list-group-item-secondary text-light">
                   
                                    <?php echo $item; ?>
                            
                                 </li>                        
                        <?php endforeach; ?>
                </ul>

                <h2 class="separador text-center my-3 mt-5">
                    Informacion Extra
                </h2>

                <ul class="list-group">
                    <li class="list-goup-item list-group-item-primary text-light">
                        <?php  echo get_post_meta(get_the_ID(), 'cocina_cursos_cupo', true);?>
                            Cupos Disponibles
                        
                    </li>
                    <li class="list-goup-item list-group-item-primary text-light">
                        <?php 
                            $total = get_post_meta(get_the_ID(), 'cocina_cursos_precio_curso', true);?>
                            Costo:  <?php echo  $total;?> €
                    </li>
                    <li class="list-goup-item list-group-item-primary text-light">
                    <?php 
                            $total = get_post_meta(get_the_ID(), 'cocina_cursos_fecha_inicio_curso', true);?>
                            Fecha Inicio:  <?php echo  $total;?>
                    </li>
                    <li class="list-goup-item list-group-item-primary text-light">
                    <?php 
                            $total = get_post_meta(get_the_ID(), 'cocina_cursos_fecha_fin_curso', true);?>
                            Fecha Fin:  <?php echo  $total;?>
                    </li>
                    <li class="list-goup-item list-group-item-primary text-light">
                    <?php 
                            $ini = get_post_meta(get_the_ID(), 'cocina_cursos_hora_inicio', true);
                             $fin = get_post_meta(get_the_ID(), 'cocina_cursos_hora_fin', true);?>
                            Horario:  <?php echo  $ini;?> - <?php echo $fin ?>
                    </li>
                    <li class="list-goup-item list-group-item-primary text-light">
                    <?php 
                            $total = get_post_meta(get_the_ID(), 'cocina_cursos_indicaciones_dias', true);?>
                            Duración:  <?php echo  $total;?>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <h2 class="separador text-center-mt-5 my-md-3">
                    Imparte
                </h2>
                <?php $instructorID = get_post_meta(get_the_ID(), 'cocina_cursos_chef', true);
                        $args = array(
                            'post_type' => 'chefs',
                            'post_in' => $instructorID,
                            'posts_per_page' => 5
                        );
                        $instructor = new WP_Query($args);

                        while($instructor->have_posts()): $instructor->the_post();
                ?>
            <div>
            <div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">
                            <img src="<?php echo the_post_thumbnail_url( ); ?>" alt="imagen instructor" class="img-fluid rounded-circle">
                        </div>
                    </div>

                    <p class="instructor">
                        <?php the_title( ) ?>
                    </p>

                    <p>
                    <?php the_content(); ?>
                    </p>
                    <?php endwhile; wp_reset_postdata(); ?>
                    </div>    
                </div>
              
        </div>
    </div>
    <?php endwhile; ?>
<?php get_footer(); ?>