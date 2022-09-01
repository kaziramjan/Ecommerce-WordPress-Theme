<!-- FOOTER START -->
<footer>


  <!-- NEWSLETTER -->
  <?php echo do_shortcode('[mc4wp_form id="456"]'); ?>

  <!-- FOOTER CONTENT -->
  <div class="footer bg-footer section border-bottom">
    <div class="container">
      <div class="row">


        <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
          <?php dynamic_sidebar( 'footer1' ); ?>
        </div>
        <!-- COMPANY -->
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <?php dynamic_sidebar( 'footer2' ); ?>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <?php dynamic_sidebar( 'footer3' ); ?>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <?php dynamic_sidebar( 'footer4' ); ?>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <?php dynamic_sidebar( 'footer5' ); ?>
        </div>

      </div>
    </div>
  </div>
  <!-- COPYRIGHT -->
  <div class="copyright py-4 bg-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 text-sm-left text-center">
          <p class="mb-0"><?php echo $copyright = atzi_get_option( 'copyright' ); // phpcs:ignore WordPres?></p> 
        </div>
        <div class="col-sm-5 text-sm-right text-center">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($facebook = atzi_get_option( 'facebook' )); ?>"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($twitter = atzi_get_option( 'twitter' )); ?>"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($linkedin = atzi_get_option( 'linkedin' )); ?>"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a class="d-inline-block p-2 text-color" href="<?php echo esc_html($instagram = atzi_get_option( 'instagram' )); ?>"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- FOOTER END -->



<?php wp_footer(); ?>
</body>
</html>