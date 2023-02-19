<?php
/*
 Template Name: Contact
 *
*/

?>

<?php get_header(); ?>

<main id="contact">
  <div class="hero flex _interior">
    <div class="container">
      <div class="hero-content flex">
        <h1><?php the_field("title"); ?></h1>
      </div>
    </div>
  </div>
  <section>
  <div class="container">
    <?php the_field("content"); ?>
    <!-- <div class="contact-form flex">
        <?php echo do_shortcode('[forminator_form id="96"]'); ?>
    </div> -->
  </div>
  </div>
  </div>
</section>
</main>

<?php get_footer(); ?>