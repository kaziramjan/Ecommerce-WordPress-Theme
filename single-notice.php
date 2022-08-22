<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'notice-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="notice-single.html">Notice</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Notice Details</li>
        </ul>

        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'notice-subtitle' )); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->
<section class="section">
  <div class="container">
    <div class="row">


      <?php while(have_posts()) : the_post(); ?>

      <div class="col-12">
        <div class="d-flex">
          <div class="text-center mr-4">
            <div class="p-4 bg-primary text-white">
                <span class="h2 d-block"><?php the_time('d'); ?></span><?php the_time('M,Y'); ?>
            </div>
          </div>
          <!-- NOTICE CONTENT -->
          <div>
            <h3 class="mb-4"><?php the_title(); ?></h3>
            <?php the_content(); ?>
            <a href="#" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>

      <?php endwhile; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>