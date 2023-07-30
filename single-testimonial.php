<?php get_header(); ?>
<main id="post">
	<div class="hero flex _interior">
    <div class="container">
      <div class="hero-content flex">
        <h1><?php the_field("name"); ?>'s Story</h1>
      </div>
    </div>
  </div>
  <section>

		<div class="container">			
				<?php the_field("post_content"); ?>
      <a href="/testimonials" class="btn">&LeftArrow; Go back</a>
		</div>
  </section>
</main>
<?php get_footer(); ?>
