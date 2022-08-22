<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'teacher-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="notice-single.html">Our Teacher</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted"><?php the_title(); ?></li>
        </ul>

        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'teacher-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<section class="section">
  <?php while(have_posts()) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5 mb-5">
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
      </div>
      <div class="col-md-6 mb-5">
        <h3><?php the_title(); ?></h3>
        <?php
          $depertment_details  = get_post_meta( get_the_ID(), 'department-details', true );
          $activity_interest = get_post_meta( get_the_ID(), 'sum-activity-interest', true );
          $biography  = get_post_meta( get_the_ID(), 'biography-info', true );
          $mail  = get_post_meta( get_the_ID(), 'mail', true );
          $phone  = get_post_meta( get_the_ID(), 'phone-number', true );
          $facebook  = get_post_meta( get_the_ID(), 'facebookurl', true );
          $twitter  = get_post_meta( get_the_ID(), 'twitterurl', true );
          $skype  = get_post_meta( get_the_ID(), 'skypeurl', true );
          $website  = get_post_meta( get_the_ID(), 'website', true );
          $location  = get_post_meta( get_the_ID(), 'location', true );

        ?>
        <h6 class="text-color">


          <?php 

                          $terms = get_the_terms(get_the_id(), 'department');


                          foreach($terms as $term){
                            echo esc_html($term->name);
                          }



          ?></h6>
        <p class="mb-5"><?php echo esc_html($depertment_details); ?></p>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h4 class="mb-4"><?php echo "CONTACT INFO:" ?></h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="mailto:<?php echo  esc_html($mail); ?>"><i class="ti-email mr-2"></i><?php echo  esc_html($mail); ?></a></li>
              <li class="mb-3"><a class="text-color" href="callto:<?php echo  esc_html($phone); ?>"><i class="ti-mobile mr-2"></i><?php echo  esc_html($phone); ?></a></li>
              <li class="mb-3"><a class="text-color" href="<?php echo  esc_html($facebook); ?>"><i class="ti-facebook mr-2"></i><?php the_title(); ?></a></li>
              <li class="mb-3"><a class="text-color" href="<?php echo  esc_html($twitter); ?>"><i class="ti-twitter-alt mr-2"></i><?php the_title(); ?></a></li>
              <li class="mb-3"><a class="text-color" href="<?php echo  esc_html($skype); ?>"><i class="ti-skype mr-2"></i><?php the_title(); ?></a></li>
              <li class="mb-3"><a class="text-color" href="<?php echo  esc_html($website); ?>"><i class="ti-world mr-2"></i><?php echo  esc_html($website); ?></a></li>
              <li class="mb-3"><a class="text-color" href="<?php echo  esc_html($location); ?>"><i class="ti-location-pin mr-2"></i><?php echo  esc_html($location); ?></a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4 class="mb-4"><?php echo "SUMMARY OF ACTIVITIES/INTERESTS" ?></h4>
            <?php echo esc_html($activity_interest); ?>
          </div>
        </div>
      </div>
      <div class="col-12">
        <h4 class="mb-4"><?php echo "BIOGRAPHY" ?></h4>
        <p class="mb-5"><?php echo  esc_html($biography); ?></p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12">
        <h4 class="mb-4"><?php echo 'TRAININGS'; ?></h4>
      </div>
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
          <?php the_post_thumbnail('medium', array('class' => 'card-img-top rounded-0')); ?>
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
  <?php endwhile; ?>
</section>
<?php get_footer(); ?>