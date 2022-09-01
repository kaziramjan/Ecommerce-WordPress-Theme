<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'event-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="notice-single.html"><?php echo "Upcoming Events"; ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted"><?php echo "Event Details" ?></li>
        </ul>

        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'event-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<!-- EVENT SINGLE START -->
<section class="section-sm">
	<?php while(have_posts()) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title"><?php the_title(); ?></h2>
      </div>
      <!-- EVENT IMAGE -->
      <div class="col-12 mb-4">
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
      </div>
    </div>
    <!-- EVENT INFO -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-9">
        <ul class="list-inline">
          <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
            <div class="d-flex align-items-center">
              <i class="ti-location-pin text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0"><?php echo "LOCATION"; ?></h6>
                <p class="mb-0"><?php echo  get_post_meta( get_the_ID(), 'events-location', true ); ?></p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
            <div class="d-flex align-items-center">
              <i class="ti-calendar text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0"><?php echo "DATE"; ?></h6>
                <p class="mb-0"><?php echo  get_post_meta( get_the_ID(), 'events-date', true ); ?> <?php echo  get_post_meta( get_the_ID(), 'events-month', true ); ?></p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
            <div class="d-flex align-items-center">
              <i class="ti-time text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0"><?php echo "TIME"; ?></h6>
                <p class="mb-0"><?php echo  get_post_meta( get_the_ID(), 'events-time', true ); ?></p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
            <div class="d-flex align-items-center">
              <i class="ti-wallet text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0"><?php echo "ENTRY FEE" ?></h6>
                <p class="mb-0"><?php echo "From: ৳"; ?><?php echo  get_post_meta( get_the_ID(), 'events-fee', true ); ?></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 text-lg-right text-left">
        <a target="_blank" href="<?php echo  get_post_meta( get_the_ID(), 'events-apply-link', true ); ?>" class="btn btn-primary"><?php echo "Apply Now"; ?></a>
      </div>
      <!-- BORDER -->
      <div class="col-12 mt-4 order-4">
        <div class="border-bottom border-primary"></div>
      </div>
    </div>
    <!-- EVENT DETAILS -->
    <div class="row">
      <div class="col-12 mb-50">
        <h3><?php echo 'About Event'; ?></h3>
        <p><?php the_content(); ?></p>
      </div>
    </div>
    <!-- EVENT SPEAKERS -->
    <div class="row">
      <div class="col-12">
        <h3 class="mb-4"><?php echo 'Event Speakers'; ?></h3>
      </div>
      <!-- SPEAKERS -->
      <?php
          $prefix = '_cmb_';
          $entries = get_post_meta(get_the_ID() , $prefix . 'metaboxjff_sections', true);   
          foreach((array)$entries as $key => $entry) {
              $img = $title = $content = '';    
          if ( isset( $entry[ $prefix . 'test_title_2' ] ) ) 
                  $title = esc_html( $entry[ $prefix . 'test_title_2' ] );                   
          if ( isset( $entry[ $prefix .'test_content_2' ] ) )             
                  $content = $entry[ $prefix . 'test_content_2' ];
          if ( isset( $entry[$prefix . 'speaker_img_id'] ) ) {
              $img = wp_get_attachment_image( $entry[$prefix . 'speaker_img_id'], 'share-pick', null, array(
                  'class' => 'mr-3 img-fluid',               
              ) );
          } ?>
        <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
          <div class="media"> 
            <?php echo esc_html($img); ?>
            <div class="media-body">
            <h4 class="mt-0"><?php echo esc_html($title); ?></h4>
            <?php echo esc_attr($content); ?>      
            </div>
          </div>
        </div> 


        
   <?php } //* end foreach;
       ?>

      <!-- BORDER -->
      <div class="col-12 mt-4 order-4">
        <div class="border-bottom border-primary"></div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</section>
<!-- EVENT SINGLE END -->


<!-- MORE EVENTS STARTS -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title"><?php echo "More Events"; ?></h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php
          $events = new WP_Query(array(
          'post_type' => 'events',
          'posts_per_page' => 3,
          ));
        while($events->have_posts()) : $events->the_post(); ?>
      <!-- EVENT -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
            <div class="card-date"><span><?php echo  get_post_meta( get_the_ID(), 'events-date', true ); ?></span><br><?php echo  get_post_meta( get_the_ID(), 'events-month', true ); ?></div>
          </div>
          <div class="card-body">
            <!-- LOCATION -->
            <p><i class="ti-location-pin text-primary mr-2"></i><?php echo  get_post_meta( get_the_ID(), 'events-location', true ); ?></p>
            <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php echo wp_trim_words(get_the_content(), 7, ''); ?></h4></a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>



    </div>
  </div>
</section>
<!-- MORE EVENTS END -->
<?php get_footer(); ?>