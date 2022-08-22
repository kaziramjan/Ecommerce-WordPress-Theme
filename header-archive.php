<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <!-- MOBILE RESPONSIVE META -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


  <!--FAVICON-->
  <link rel="shortcut icon" href="<?php echo esc_html($favicon = atzi_get_option( 'favicon-logo-upload' )); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo esc_html($favicon = atzi_get_option( 'favicon-logo-upload' )); ?>" type="image/x-icon">
  <?php wp_head(); ?>
 <?php wp_body_open(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- PRELOADER START -->
  <div class="preloader">
    <img src="<?php echo esc_html($preloader = atzi_get_option( 'preloader-logo-upload' )); ?>" alt="preloader">
  </div>
  <!-- PRELOADER END -->

<!-- HEADER START -->
<header class="fixed-top header">
  <!-- TOP BAR START -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="callto: <?php echo esc_html($phone = atzi_get_option( 'phone-update' )); ?>"><strong><?php echo "CALL"; ?></strong> <?php echo esc_html($phone = atzi_get_option( 'phone-update' )); ?></a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($facebook = atzi_get_option( 'facebook' )); ?>"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($twitter = atzi_get_option( 'twitter' )); ?>"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($linkedin = atzi_get_option( 'linkedin' )); ?>"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($instagram = atzi_get_option( 'instagram' )); ?>"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
        <?php 
            wp_nav_menu(array(
                'container'            => 'div',
                'container_class'      => 'col-lg-8 text-center text-lg-right',
                'theme_location'       => 'top-menu',
                'add_li_class'         => 'list-inline-item'
              ));
          ?>
      </div>
    </div>
  </div>
  <!-- TOP BAR END -->
  <!-- NAVBAR -->
  <div class="navigation w-100">
    <div class="container">
      
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo esc_html($logo = atzi_get_option( 'logo-upload' )); ?>"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


            <?php 
            wp_nav_menu(array(
                'menu'                 => '',
                'container'            => 'div',
                'container_class'      => 'collapse navbar-collapse',
                'container_id'         => 'navigation',
                'container_aria_label' => '',
                'menu_class'           => 'menu',
                'menu_id'              => '',
                'echo'                 => true,
                'fallback_cb'          => 'wp_page_menu',
                'before'               => '',
                'after'                => '',
                'link_before'          => '',
                'link_after'           => '',
                'items_wrap'           => '<ul class="navbar-nav ml-auto text-center">%3$s</ul>',
                'item_spacing'         => 'preserve',
                'depth'                => 0,
                'walker'               => '',
                'theme_location'       => 'main-menu',
                'add_li_class'         => 'nav-item'
              ));
          ?>

      </nav>

    </div>
  </div>
</header>
<!-- HEADER END -->
