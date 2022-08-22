<?php 
/* template name: About */
get_header(); ?>

<!-- ABOUT START -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
      	<?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 mb-4')); ?>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<!-- ABOUT END -->

<!-- FUN FACTS START -->
<section class="section-sm bg-primary">
  <div class="container">
    <div class="row">
      <!-- FUN FACTS ITEM -->
      <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="60">0</h2>
          <h5 class="text-white">TEACHERS</h5>
        </div>
      </div>
      <!-- FUN FACTS ITEM -->
      <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="50">0</h2>
          <h5 class="text-white">TRAININGS</h5>
        </div>
      </div>
      <!-- FUN FACTS ITEM -->
      <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
        <div class="text-center">
          <h2 class="count text-white" data-count="1000">0</h2>
          <h5 class="text-white">STUDENTS</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FUN FACTS END -->

<!-- SUCCESS STORY START -->
<section class="section bg-cover" data-background="<?php echo get_post_meta( get_the_ID(), 'success-stories-background-image', true );?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="<?php echo get_post_meta( get_the_ID(), 'success-stories-video', true );?>" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title"><?php echo get_post_meta( get_the_ID(), 'success-stories-title', true );?></h2>
          <?php echo get_post_meta( get_the_ID(), 'success-stories-discriptions', true );?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SUCCESS STORY END -->

<!-- TEACHER START -->
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="section-title">Our Teachers</h2>
        </div>

        <?php 

          $teachers = new WP_Query(array(
            'post_type'       => 'teachers',
            'posts_per_page'  => '3',
          ));

          while($teachers->have_posts()) : $teachers->the_post(); ?>
        <!-- TEACHER 1 -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
            <div class="card-body">
              <a href="<?php the_permalink(); ?>">
                <h4 class="card-title"><?php the_title(); ?></h4>
              </a>
              <div class="d-flex justify-content-between">
                <span>Teacher</span>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="<?php echo get_post_meta( get_the_ID(), 'facebookurl', true ); ?>"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="<?php echo get_post_meta( get_the_ID(), 'twitterurl', true ); ?>"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="<?php echo get_post_meta( get_the_ID(), 'skypeurl', true ); ?>"><i class="ti-skype"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
      </div>
    </div>
  </section>
  <!-- TEACHER END -->


<?php get_footer(); ?>