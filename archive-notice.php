esc_html(<?php get_header('archive'); ?>
<!-- PAGE TITLE START -->
<section class="page-title-section overlay" data-background="<?php echo esc_html($title = atzi_get_option( 'notice-title-image' )); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary"><?php echo esc_html($title = atzi_get_option( 'notice-title' )); ?></a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"><?php echo esc_html($subtitle = atzi_get_option( 'notice-subtitle' ) );?></p>
      </div>
    </div>
  </div>
</section>
<!-- PAGE TITLE END -->


<!-- NOTICE START -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="list-unstyled">

          <?php 

            $notice = new WP_Query(array(
              'post_type' => 'notice',
            ));

            while($notice->have_posts()) : $notice->the_post(); ?>

          <!-- NOTICE ITEM -->
          <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
            <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span class="h2 d-block"><?php the_time('d'); ?></span><?php the_time('M,Y'); ?></div>
            <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
              <a href="<?php the_permalink(); ?>" class="h4 mb-3 d-block"><?php the_title(); ?></a>
              <p class="mb-0"><?php echo wp_trim_words(get_the_content(), 30, ''); ?></p>
            </div>
            <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="<?php the_permalink(); ?>" class="btn btn-primary">read more</a></div>
          </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- NOTICE END -->




<?php get_footer(); ?>