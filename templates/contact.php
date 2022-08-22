<?php 
/* template name: Contact */
get_header(); ?>

<!-- CONTACT START -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title">Get in Touch</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
        <?php the_content(); ?>

      </div>
      <div class="col-lg-5"> 
      	<?php echo get_post_meta( get_the_ID(), 'c_info', true );?>
        <a href="tel:<?php echo get_post_meta( get_the_ID(), 'c_phone', true );?>" class="text-color h5 d-block"><?php echo get_post_meta( get_the_ID(), 'c_phone', true );?></a>
        <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'c_mail', true );?>" class="mb-5 text-color h5 d-block"><?php echo get_post_meta( get_the_ID(), 'c_mail', true );?></a>
        <p><?php echo get_post_meta( get_the_ID(), 'c_location', true );?></p>
      </div>
    </div>
  </div>
</section>
<!-- CONTACT END -->

<!-- GOOGLE MAP START -->
<section class="section pt-0">
  <!-- GOOGLE MAP -->
  <iframe src="<?php echo get_post_meta( get_the_ID(), 'c_g_map', true );?>" width="100%" height="600" style="border:3px solid black;" allowfullscreen="" loading="lazy"></iframe>
</section>
<!-- GOOGLE MAP END -->

<?php get_footer(); ?>
