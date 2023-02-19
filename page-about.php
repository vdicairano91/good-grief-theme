<?php
/*
 Template Name: About
 *
*/

$image = get_field('about_image');

?>

<?php get_header(); ?>

<main id="about">
  <div class="hero flex _interior">
    <div class="container">
      <div class="hero-content flex">
        <h1><?php the_field("title"); ?></h1>
      </div>
    </div>
  </div>
  <section>
  <div class="container">
    <div class="about-content flex">
        <?php if( !empty($image) ): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
      <div class="about-text">
      <h2 class="heading3"><?php the_field("subtitle"); ?></h2>
        <?php the_field("page_content"); ?>
      </div>
    </div>
  </div>
  </div>
  </div>
        </section>
</main>

<?php get_footer(); ?>