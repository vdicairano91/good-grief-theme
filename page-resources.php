<?php
/*
 Template Name: Resources
 *
*/


?>

<?php get_header(); ?>

<main id="resources">
  <div class="hero flex _interior">
    <div class="container">
      <div class="hero-content flex">
        <h1><?php the_field("title"); ?></h1>
				<h2><?php the_field("subtitle"); ?></h2>
      </div>
    </div>
  </div>
  <section>
  <div class="container">
    <div class="resources-content flex">
      <?php if( have_rows('website_resources') ): ?>
        <?php while( have_rows('website_resources') ): the_row(); ?>
       <h2 id="helpful-websites"><?php the_sub_field('website_title'); ?></h2>
        <p><?php the_sub_field('website_blurb'); ?></p>
        <div class="resources-container grid _websites">
          <?php if( have_rows('website_item') ): ?>
            <?php while( have_rows('website_item') ): the_row(); ?>
            <div class="resource-item">
              <?php $image = get_sub_field('resources_image'); ?>
              <?php if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
              <h3><?php the_sub_field('resources_item_title'); ?></h3>
              <?php the_sub_field('resources_item_content'); ?>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if( have_rows('book_resources_r') ): ?>
        <?php while( have_rows('book_resources_r') ): the_row(); ?>
       <h2 id="<?php the_sub_field('section_id'); ?>"><?php the_sub_field('book_title'); ?></h2>
        <p><?php the_sub_field('book_blurb'); ?></p>
        <div class="resources-container grid _books">
          <?php if( have_rows('book_item') ): ?>
            <?php while( have_rows('book_item') ): the_row(); ?>
            <?php 
            $link = get_sub_field('book_link');
            if( $link ): 
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a class="resource-item" href="<?php echo esc_url( $link_url ); ?>"
              target="<?php echo esc_attr( $link_target ); ?>">
              <?php $image = get_sub_field('resources_image'); ?>
              <?php if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif; ?>
              <p><?php the_sub_field('resources_item_title'); ?></p>
            </a>
          <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  </div>
  </div>
        </section>
</main>

<?php get_footer(); ?>