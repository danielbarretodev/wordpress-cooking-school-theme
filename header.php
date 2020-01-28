<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<header class="header py-5">
     <div class="container">
         <div class="row justify-content-center align-items-center">
             <div class="col-md-4 col-sm-8 mb-4 mb-lg-0">
                 <a href="<?php echo esc_url(home_url('/', $schema)); ?>">
                 <img src=" <?php echo get_template_directory_uri(); ?> /img/logo.svg"  class="img-fluid" alt="">
                 </a>
            </div>
             <div class="col-md-8">
                 <nav class="navbar navbar-expand-md navbar-light justify-content-center text-center">
                     <buttom class="navbar-toggler" data-toggle="collapse" 
                        data-target="#nav_principal" aria-expanded="false" type="buttom">
                         <spam class="navbar-toggler-icon"></spam>
                     </buttom>

                        <?php
                            $args= array(
                                'menu_class' => 'nav nav-justified flex-column flex-md-row text-center',
                                'container_id' => 'nav_principal',
                                'container_class' => 'collapse navbar-collapse justify-content-center justify-content-lg-end text-uppercase',
                                'theme_location' => 'menu_principal'
                            );

                            wp_nav_menu($args);
                        ?>

                 </nav><!---.col-md-8--> 
             </div>
         </div>
     </div>
 </header>