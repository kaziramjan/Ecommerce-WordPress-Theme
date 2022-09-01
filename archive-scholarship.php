<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'scholarship-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'scholarship-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'scholarship-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->

<!-- SCHOLARSHIP START -->
<section class="section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 mb-4 mb-md-0">
        
      	<img class="img-fluid" src="<?php echo esc_html($feature_image = atzi_get_option( 'scholarship-feature-image' )); ?>" alt="scholarship news">
        
      </div>
      <div class="col-md-6">
        <h2><?php echo esc_html($content_title = atzi_get_option( 'scholarship-content-title' )); ?></h2>
        <?php echo $descriptions = atzi_get_option( 'scholarship-descriptions' ); // phpcs:ignore WordPres ?>
      </div>
    </div>
    <div class="row justify-content-center">

    	<?php 

            $scholarship = new WP_Query(array(
              'post_type' => 'scholarship',
            ));

            while($scholarship->have_posts()) : $scholarship->the_post(); ?>

      <!-- SCHOLARSHIP ITEM -->
      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
        <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
          <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
          <div class="card-body">
            <a href="<?php the_permalink(); ?>"><h4 class="card-title mb-3"><?php the_title(); ?></h4></a>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

    </div>
  </div>
</section>
<!-- SCHOLARSHIP END-->

<?php get_footer(); ?>