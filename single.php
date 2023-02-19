<?php get_header(); ?>
<main id="post">
	<div class="hero flex _interior">
    <div class="container">
      <div class="hero-content flex">
        <h1> <?php echo get_the_title(); ?></h1>
        <h2> <?php echo get_the_date(); ?></h2>
      </div>
    </div>
  </div>
  <section>

		<div class="container">			
				<?php the_field("post_content"); ?>
      <a href="/blog" class="btn">&LeftArrow; Go back</a>
		</div>
  </section>
</main>
<?php get_footer(); ?>
