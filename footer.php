<!-- FOOTER START -->
<footer>


  <!-- NEWSLETTER -->
  <div class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
          <h3 class="text-white"><?php echo 'Subscribe Now'; ?></h3>
          <form action="https://kaziramjan.us14.list-manage.com/subscribe/post?u=c44d422d5095a50eb1a6213e2&amp;id=f506acfab5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">

                <div class="input-wrapper">
                  <input type="email" value="" name="EMAIL" class="form-control border-0" id="mce-EMAIL" placeholder="Enter Your Email...">
                  <button type="submit" value="send" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"><?php echo 'Join'; ?></button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="mc_embed_signup">
    
  </div>

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
          <p class="mb-0"><?php echo $copyright = atzi_get_option( 'copyright' ); ?></p>
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