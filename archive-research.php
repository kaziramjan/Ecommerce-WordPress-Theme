<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'research-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'research-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'research-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<!-- RESEARCH START -->
<section class="section">
  <div class="container">
    <div class="row">
    	<?php 

            $research = new WP_Query(array(
              'post_type' => 'research',
            ));

            while($research->have_posts()) : $research->the_post(); ?>
      <!-- RESEARCH ITEM -->
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 card-img-top rounded-0')); ?></a>
          <div class="card-body">
            <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
            <p class="card-text">
              <?php echo wp_trim_words(get_the_content(), 30, ''); ?>
            </p>
          </div>
        </div>
      </div>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>





    </div>
  </div>
</section>
<!-- RESEARCH END -->
<?php get_footer(); ?>