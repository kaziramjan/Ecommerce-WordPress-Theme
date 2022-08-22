<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'blog-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Blog</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Blog Details</li>
        </ul>

        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'blog-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<!-- POST DETAILS START -->
<section class="section-sm bg-gray">
  <div class="container">

    <?php while(have_posts()) : the_post(); ?>
    <div class="row">
      <div class="col-12 mb-4">
        <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100')); ?>
      </div>
      <div class="col-12">
        <ul class="list-inline">
          <a href="<?php the_author(); ?>"><li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><span class="font-weight-bold mr-2">Post:</span><?php the_author(); ?></li></a>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><?php the_time('F d, Y'); ?></li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-book mr-2"></i>Read <?php echo getPostViews(get_the_ID());?></li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><a class="text-light" href="#"><i class="ti-comments mr-2"></i><?php echo get_comments_number(); ?></a></li>
        </ul>
      </div>
      <!-- BORDER -->
      <div class="col-12 mt-4">
        <div class="border-bottom border-primary"></div>
      </div>
      <!-- POST CONTENT -->
      <div class="col-12 mb-5">
        <h2><?php the_title(); ?> </h2>
        <?php the_content(); ?>
      </div>
      <!-- COMMENT BOX -->
      <div class="col-12">
        <?php comments_template(); ?>
      </div>
    </div>

      <?php endwhile; ?>

  </div>
</section>
<!-- POST DETAILS END -->

<!-- RECOMMENDED POST START -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Recommended</h2>
      </div>
    </div>
    <div class="row justify-content-center">
    <?php echo my_related_posts(); ?>
    </div>
  </div>
</section>
<!-- RECOMMENDED POST END -->




<?php get_footer(); ?>