<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;

get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'training-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'training-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'training-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	

		global $product;

		        $wproduct = new WP_Query(array(
				            'post_type' => 'product',
				            'post_status' => 'publish',
				            'posts_per_page' => -1,
				           ));

		        while($wproduct->have_posts()) : $wproduct->the_post(); 
		    ?>


			  <!-- COURSE ITEM -->
			  <div class="col-lg-4 col-sm-6 mb-5">
			    <div class="card p-0 border-primary rounded-0 hover-shadow">
			      <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" class="card-img-top rounded-0" alt=""/>
			      <div class="card-body">
			        <ul class="list-inline mb-2">
			          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i><?php  echo get_the_date('m-d-Y', $product->get_id()); ?></li>
			          <li class="list-inline-item"><?php echo wc_get_product_category_list($product->get_id()) ?></li>
			        </ul>
			        <a href="<?php the_permalink(); ?>">
			          <h4 class="card-title">
			          	<?php  

			          		// If the WC_product Object is not defined globally
							if ( ! is_a( $product, 'WC_Product' ) ) {
							    $product = wc_get_product( get_the_id() );
							}

							echo esc_html($product->get_name());
			          	?>			          		
			          </h4>
			        </a>
			        <p class="card-text mb-4"><?php echo esc_html($product->get_short_description()); ?></p>
			        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Apply now</a>
			    </div>
			  </div>
			  </div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
<?php get_footer('shop'); ?>
