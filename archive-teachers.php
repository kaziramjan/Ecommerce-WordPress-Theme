<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'teacher-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'teacher-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'teacher-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<section class="section">
  <div class="container">


    <div class="row"> 
      <div class="col-12">
        <!-- TEACHER CATEGORY LIST -->
        <ul class="list-inline text-center filter-controls mb-5">
          <li class="list-inline-item m-3 text-uppercase active" data-filter="all">All</li>
          <?php 
            $terms=get_terms('department');
            foreach($terms as $term){ 
          ?>
          <li class="list-inline-item m-3 text-uppercase active" data-filter=".<?php echo esc_html($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
          <?php 
            }
          ?>

        </ul>
      </div>
    </div>



    <!-- TEACHER LIST -->
    <div class="row filtr-container">



      <!-- TEACHER -->
      <?php
        $teacher = new WP_Query(array(
          'post_type'     => 'teachers',
          'posts_per_page'  => 3,
          ));
        while($teacher->have_posts()){
          $teacher->the_post(); ?>

      <div data-category="<?php $terms= get_the_terms(get_the_id(),'department');

                        foreach($terms as $term){

                          echo esc_html($term->slug. " ");

                        }
                         ?>" class="col-lg-4 col-sm-6 mb-5 filtr-item">
        <div class="card border-0 rounded-0 hover-shadow">
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($facebook  = get_post_meta( get_the_ID(), 'facebookurl', true )); ?>"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($twitter  = get_post_meta( get_the_ID(), 'twitterurl', true )); ?>"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="<?php echo  esc_html($skype  = get_post_meta( get_the_ID(), 'skypeurl', true )); ?>"><i class="ti-skype"></i></a></li>
            
            </ul>
          </div>
        </div>
      </div>
<?php } ?>
    
    <?php wp_reset_postdata(); ?>



    </div>
  </div>
</section>
<?php get_footer(); ?>


