<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'training-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'training-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted"><?php while ( have_posts() ) : the_post(); echo the_title(); endwhile;?></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <!-- SECTION -->
            <section class="section-sm">
              <div class="container">
                <div class="row">
                    <?php echo wc_print_notices(); ?>
                  <div class="col-12 mb-4">
                    <!-- COURSE THUMB -->
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
                  </div>
                </div>
                <!-- COURSE INFO -->
                <div class="row align-items-center mb-5">
                  <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
                    <h2><?php the_title(); ?></h2>
                  </div>
                  <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
                    <ul class="list-inline text-xl-center">
                      <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                          <i class="ti-book text-primary icon-md mr-2"></i>
                          <div class="text-left">
                            <h6 class="mb-0"><?php echo 'COURSES' ?></h6>
                            <p class="mb-0"><?php echo  get_post_meta( get_the_ID(), 'training-courses', true ); ?></p>
                          </div>
                        </div>
                      </li>
                      <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                          <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                          <div class="text-left">
                            <h6 class="mb-0"><?php echo 'DURATION' ?></h6>
                            <p class="mb-0"><?php echo  get_post_meta( get_the_ID(), 'training-duration', true ); ?></p>
                          </div>
                        </div>
                      </li>
                      <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                        <div class="d-flex align-items-center">
                          <i class="ti-wallet text-primary icon-md mr-2"></i>
                          <div class="text-left">
                            <h6 class="mb-0"><?php echo 'FEE' ?></h6>
                            <p class="mb-0">
                              <?php 
                                global $product; 
                                echo 'From: '.get_woocommerce_currency_symbol(); 
                                echo esc_html($product->get_price()); 
                              ?>  
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
                    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-primary"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                    </form>
                  </div>
                  <!-- BORDER -->
                  <div class="col-12 mt-4 order-4">
                    <div class="border-bottom border-primary"></div>
                  </div>
                </div>
                <!-- COURSE DETAILS -->
                <div class="row">
                    <?php the_content(); ?>
                </div>
              </div>
            </section>
            <!-- SECTION END -->

        <?php endwhile; // end of the loop. ?>




<!-- RELATED COURSE START -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title"><?php echo 'Related Course'; ?></h2>
      </div>
    </div>
    <div class="row justify-content-center">
    <?php
        global $product;

                $wproduct = new WP_Query(array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                           ));

                while($wproduct->have_posts()) : $wproduct->the_post(); 
    ?>

      <!-- COURSE ITEM -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card p-0 border-primary rounded-0 hover-shadow">
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
            <ul class="list-inline mb-2">
              <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i><?php the_time('F-d-Y'); ?></li>
              <li class="list-inline-item"><a class="text-color" href="<?php the_permalink(); ?>"><?php echo wc_get_product_category_list($product->get_id()) ?></a></li>
            </ul>
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
            <p class="card-text mb-4"><?php echo wp_trim_words(get_the_content(), 18, ''); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo 'Apply now'; ?></a>
          </div>
        </div>
      </div>

    <?php endwhile; // end of the loop. 
    wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<!-- RELATED COURSE END -->

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */