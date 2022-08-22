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

<!-- HERO SLIDER START -->
<section class="hero-section overlay bg-cover" data-background="<?php echo  get_post_meta( get_the_ID(), 'slider-bg-img', true ); ?>">
  <div class="container">
    <div class="hero-slider">

      <!-- Slider -->
      <?php
          $prefix = '_cmb_';
    
    
          $entries = get_post_meta(get_the_ID() , $prefix . 'slider', true);
          
          
          foreach((array)$entries as $key => $entry) {
          
          
              $slider_title = $slider_subtitle = $slider_btn_url = $slider_btn_text = $slider_img = '';
              
          if ( isset( $entry[ $prefix . 'slider_title' ] ) ) 

                  $slider_title = esc_html( $entry[ $prefix . 'slider_title' ] );
                  
                              
          if ( isset( $entry[ $prefix .'slider_subtitle' ] ) )
                      
                  $slider_subtitle = $entry[ $prefix . 'slider_subtitle' ];

          if ( isset( $entry[ $prefix .'slider_btn_url' ] ) )
                      
                  $slider_btn_url = $entry[ $prefix . 'slider_btn_url' ];

          if ( isset( $entry[ $prefix .'slider_btn_text' ] ) )
                      
                  $slider_btn_text = $entry[ $prefix . 'slider_btn_text' ];

          if ( isset( $entry['slider_img_id'] ) ) {
                  $slider_img = wp_get_attachment_image( $entry[ $prefix . 'slider_img_id'], 'share-pick', null, array(
                      'class' => 'hero-section overlay bg-cover',
                  ) );
                }
          
           ?>

      <!-- SLIDER ITEM -->
      <div class="hero-slider-item" data-background="<?php echo esc_html($slider_img); ?>">
        
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1"><?php echo esc_html($slider_title); ?></h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4"><?php echo esc_html($slider_subtitle); ?></p>
            <a href="<?php echo esc_html($slider_btn_url); ?>" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7"><?php echo esc_html($slider_btn_text); ?></a>
          </div>
        </div>
      </div>


        
   <?php } //* end foreach;
       ?>



    </div>
  </div>
</section>
<!-- HERO SLIDER END -->

<!-- BANNER FEATURE START -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="<?php echo  get_post_meta( get_the_ID(), 'banner-feature-img', true ); ?>" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
      <!-- Slider -->
      <?php
          $prefix = '_cmb_';
    
    
          $entries = get_post_meta(get_the_ID() , $prefix . 'banner-f', true);
          
          
          foreach((array)$entries as $key => $entry) {
          
          
              $banner_icon = $banner_title = $banner_subtitle = '';
              
          if ( isset( $entry[ $prefix . 'banner_icon' ] ) ) 

                  $banner_icon = esc_html( $entry[ $prefix . 'banner_icon' ] );
                  
                              
          if ( isset( $entry[ $prefix .'banner_title' ] ) )
                      
                  $banner_title = $entry[ $prefix . 'banner_title' ];

          if ( isset( $entry[ $prefix .'banner_subtitle' ] ) )
                      
                  $banner_subtitle = $entry[ $prefix . 'banner_subtitle' ];

          
           ?>

          <!-- Banner ITEM -->
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="<?php echo esc_html($banner_icon); ?> mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4"><?php echo esc_html($banner_title); ?></h3>
            <p><?php echo esc_html($banner_subtitle); ?></p>
          </div>


        
   <?php } //* end foreach;
       ?>





        </div>
      </div>
    </div>
  </div>
</section>
<!-- BANNER FEATURE END -->

<!-- ABOUT US START -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title"><?php echo  get_post_meta( get_the_ID(), 'about-title', true ); ?></h2>
        <p><?php echo  get_post_meta( get_the_ID(), 'about-subtitle', true ); ?></p>
        <a href="<?php echo  get_post_meta( get_the_ID(), 'about-btn-link', true ); ?>" class="btn btn-primary-outline"><?php echo  get_post_meta( get_the_ID(), 'about-btn-text', true ); ?></a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="<?php echo  get_post_meta( get_the_ID(), 'about-img', true ); ?>" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- ABOUT US END -->

<!-- COURSES START -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3"><?php echo  get_post_meta( get_the_ID(), 'training-title', true ); ?></h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="<?php echo  get_post_meta( get_the_ID(), 'training-btn-link', true ); ?>" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block"><?php echo  get_post_meta( get_the_ID(), 'training-btn-text', true ); ?></a>
          </div>
        </div>
      </div>
    </div>
    <!-- COURSE LIST -->
<div class="row justify-content-center">
  <?php
    $products = new WP_Query(array(
    'post_type' => 'product',
    ));

    while($products->have_posts()) : $products->the_post(); ?>
  <!-- COURSE ITEM -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <?php the_post_thumbnail('medium', array('class' => 'card-img-top rounded-0')); ?>
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i><?php the_time( 'm-d-Y' ); ?></li>
          <li class="list-inline-item"><?php
$terms = get_the_terms( $post->ID , 'product_cat' );
foreach ( $terms as $term ) {
echo esc_html($term->name);
}
?></li>
        </ul>
        <a href="<?php the_permalink(); ?>">
          <h4 class="card-title"><?php the_title(); ?></h4>
        </a>
        <p class="card-text mb-4"> <?php echo wp_trim_words(get_the_content(), 20, ''); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo "Apply now" ?></a>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</div>
<!-- COURSE LIST END -->
    <!-- SEE ALL - FOR MOBILE -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="<?php echo  get_post_meta( get_the_ID(), 'training-btn-link', true ); ?>" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block"><?php echo  get_post_meta( get_the_ID(), 'training-btn-text', true ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- COURSES END -->

<!-- CTA START -->
<section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0"><?php echo  get_post_meta( get_the_ID(), 'cta-subtitle', true ); ?></h6>
        <h2 class="section-title text-white"><?php echo  get_post_meta( get_the_ID(), 'cta-title', true ); ?></h2>
        <a href="<?php echo  get_post_meta( get_the_ID(), 'cta-btn-link', true ); ?>" class="btn btn-secondary"><?php echo  get_post_meta( get_the_ID(), 'cta-btn-text', true ); ?></a>
      </div>
    </div>
  </div>
</section>
<!-- CTA END -->

<!-- SUCCESS STORY START -->
<section class="section bg-cover" data-background="<?php echo  get_post_meta( get_the_ID(), 'success-story-img', true ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="<?php echo  get_post_meta( get_the_ID(), 'success-story-vid', true ); ?>" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title"><?php echo  get_post_meta( get_the_ID(), 'success-story-title', true ); ?></h2>
          <p><?php echo  get_post_meta( get_the_ID(), 'success-story-subtitle', true ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SUCCESS STORY END -->

<!-- EVENTS START -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3"><?php echo  get_post_meta( get_the_ID(), 'event-title', true ); ?></h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="<?php echo  get_post_meta( get_the_ID(), 'event-btn-link', true ); ?>" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block"><?php echo  get_post_meta( get_the_ID(), 'event-btn-text', true ); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">

      <?php 
            $count = get_post_meta( get_the_ID(), 'event-number', true );
            $events = new WP_Query(array(
              'post_type' => 'events',
              'posts_per_page' => $count,
            ));

            while($events->have_posts()) : $events->the_post(); ?>
      <!-- EVENT -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
            <div class="card-date"><span><?php echo  get_post_meta( get_the_ID(), 'events-date', true ); ?></span><br></div>
          </div>
          <div class="card-body">
            <!-- LOCATION -->
            <p><i class="ti-location-pin text-primary mr-2"></i><?php echo  get_post_meta( get_the_ID(), 'events-location', true ); ?></p>
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
          </div>
        </div>
      </div>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>


  </div>
    <!-- SEE ALL -FOR MOBILE -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="course.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- EVENTS END -->

<!-- TEACHERS START -->

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title"><?php echo  get_post_meta( get_the_ID(), 'teacher-home-title', true ); ?></h2>
      </div>

      <?php 
          $count = get_post_meta( get_the_ID(), 'teacher-home-number', true );
          $teachers = new WP_Query(array(
            'post_type' => 'teachers',
            'posts_per_page' => $count,
          ));

          while($teachers->have_posts()) : $teachers->the_post(); ?>
      <!-- TEACHER -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
            <p>Teacher</p>
            <?php 

            $facebook  = get_post_meta( get_the_ID(), 'facebookurl', true );
            $twitter  = get_post_meta( get_the_ID(), 'twitterurl', true );
            $skype  = get_post_meta( get_the_ID(), 'skypeurl', true );


            ?>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($facebook); ?>"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($twitter); ?>"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($skype); ?>"><i class="ti-skype"></i></a></li>
            
            </ul>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</section>
<!-- TEACHERS END -->

<!-- BLOG START -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title"><?php echo  get_post_meta( get_the_ID(), 'blog-title', true ); ?></h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php

      $count = get_post_meta( get_the_ID(), 'blog-number', true );
          $blog_post = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $count,
          ));

      while($blog_post->have_posts()) : $blog_post->the_post(); ?>
      <!-- BLOG POST -->
      <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
                <!-- POST META -->
                <ul class="list-inline mb-3">
                  <!-- POST DATE -->
                  <li class="list-inline-item mr-3 ml-0"><?php the_time('F d, Y'); ?></li>
                  <!-- AUTHOR -->
                  <li class="list-inline-item mr-3 ml-0">By <?php the_author(); ?></li>
                </ul>
                <a href="<?php the_permalink(); ?>">
                  <h4 class="card-title"><?php the_title(); ?></h4>
                </a>
                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 7, ''); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">read more</a>
              </div>
        </div>
      </article>
      <?php endwhile; ?>

    </div>
  </div>
</section>
<!-- BLOG END -->

<?php get_footer(); ?>