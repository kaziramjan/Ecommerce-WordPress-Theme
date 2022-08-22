<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'event-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'event-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'event-subtitle' ) );?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<!-- Events START -->
<section class="section">
  <div class="container">
    <div class="row">

      <?php 

            $events = new WP_Query(array(
              'post_type' => 'events',
              'posts_per_page' => 9,
            ));

            while($events->have_posts()) : $events->the_post(); ?>
      <!-- EVENT -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
            <div class="card-date"><span><?php echo  get_post_meta( get_the_ID(), 'events-date', true ); ?></span><br><?php echo  get_post_meta( get_the_ID(), 'events-month', true ); ?></div>
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
  </div>
</section>
<!-- Events END -->
<?php get_footer(); ?>