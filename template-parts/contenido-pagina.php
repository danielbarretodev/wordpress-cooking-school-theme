<?php $html = cocina_imagen_destacada( get_the_ID());
        echo $html[0];
        // $html[0] retorna el html
        // $html[1] retorna un booleano para indicarnos si la clase existe
    ?>     


<main class="container">
   
    <div class="row justify-content-center">
        <div class="py-3 px-5  contenido-pagina bg-light <?php echo $html[1] ? 'col-md-8 destacada' : 'col-md-12 no-destacada'; ?>">
            <h2 class="text-center my-5 separador"><?php the_title();?></h2>
            <?php the_content();?>
           
        </div>
    </div>  
</main>