<?php get_header(); ?>
<!-- BLOG START -->
<section class="section">
  <div class="container">
    <div class="row">
      <?php while( have_posts() ) : the_post(); ?>
      <!-- BLOG POST -->
      <article class="col-lg-4 col-sm-6 mb-5">
        <?php
          $classes = array(
              'card',
              'rounded-0',
              'border-bottom',
              'border-primary',
              'border-top-0',
              'border-left-0',
              'border-right-0',
              'hover-shadow',
          );
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
            <!-- POST META -->
            <ul class="list-inline mb-3">
              <!-- POST DATE -->
              <li class="list-inline-item mr-3 ml-0"><?php the_time('F d, Y'); ?></li>
              <!-- AUTHOR -->
              <li class="list-inline-item mr-3 ml-0">By <?php the_author(); ?></li>
            </ul>
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 7, ''); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">read more</a>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
  </div>

<?php wp_link_pages(); ?>
</section>
<!-- BLOG END -->

<?php get_footer(); ?>