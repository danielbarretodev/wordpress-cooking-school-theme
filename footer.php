<footer class="footer p-5">
    <div class="conatiner">
        <div class="row">
            <div class="col-md-6">
              

                <?php 
                
                    $args = array (

                        'menu_class' => 'nav text-uppercase flex-column flex-md-row text-center',
                        'theme_location' => 'menu_principal'

                    );

                    wp_nav_menu($args);
                
                
                ?>


            </div>
            <div class="col-md-6 ">
                <p class="copyright text-center text-md-right">Todos los derechos reservados
                    <?php echo date('Y'); ?>
                </p>
            </div>
        </div>
    </div>
</footer>


<?php  wp_footer(); ?>

</body>
</html>