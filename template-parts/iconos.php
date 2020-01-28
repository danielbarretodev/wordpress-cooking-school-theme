<section class="nosotros mt-5 container">
        
        <?php $titulo = get_post_meta( get_the_ID(), 'cocina_group_titulo_seccion',true);?>
        <h2 class="text-center mb-5 separador">
             <?php echo $titulo; ?>
        </h2>
  
        <div class="row justify-content-center">
        <?php $grupo_iconos = get_post_meta( get_the_ID(), 'cocina_group_nosotros',true);
               foreach($grupo_iconos as $item)
               { 
        ?>
                <div class="col-md-4 text-center informacion">
                    <img src="<?php echo $item['cocina_group_icono']; ?>" alt="icono chef" class="img-fluid mb-3">
                    <h3><?php echo $item['cocina_group_titulo_icono'];  ?></h3>
                    <p><?php echo $item['cocina_group_descripcion'];?></p>
                </div>
               <?php } ?>
        </div>
</section>
