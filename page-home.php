<?php
/*
 Template Name: Home
 *
*/
?>

<?php get_header(); ?>

<main id="home">
	<div class="hero flex">
		<div class="container">
			<div class="hero-content flex">
				<h1><?php the_field("title"); ?></h1>
				<h2><?php the_field("subtitle"); ?></h2>
				<?php 
          $link = get_field('button');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
          <a class="btn" href="<?php echo esc_url( $link_url ); ?>"
              target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
			</div>
		</div>
	</div>
  <section>
		<div class="container">
		<div class="blog-grid grid">
	<?php

		$array = get_posts(array('posts_per_page' => 1));

		

		foreach($array as $post) {

			$date = $post->post_date;
			$id = $post->ID;

			echo "<a href='" . get_post_permalink($id) . "' class='blog-post'>";
			echo get_the_post_thumbnail();
			echo "<div><div class='blog-info'>";
			echo "<p class='blog-date'>" .  date('F j, Y', strtotime($date)) . "</p><p class='excerpt'>";
			echo the_field("excerpt");
			echo "</p><p class='read-more btn'>Read More</p></div></div></a>";

		}

		wp_reset_postdata();
		
	?>
		</div>
	</section>
<section>
		<div class="container">
			<h3>Featured Articles</h3>
			<div class="grid featured blog-grid">
      <?php if( have_rows('featured_articles') ): ?>
        <?php while( have_rows('featured_articles') ): the_row(); ?>
				<?php
					$featured_post = get_sub_field('featured_post');
					$date = $featured_post->post_date;
					$formateDate = date('F j, Y', strtotime($date));

					if( $featured_post ): ?>
					<a href="<?php echo esc_html( $featured_post->post_link ); ?>" class="blog-post">
					<?php echo get_the_post_thumbnail( $featured_post->ID ); ?>
						<div>
							<div class='blog-info'>
								<p class='blog-date'><?php echo esc_html($formateDate); ?></p>
								<p class='excerpt'><?php echo esc_html( $featured_post->post_excerpt ); ?></p>
								<p class='read-more btn'>Read More</p>
							</div>
						</div>
					</a>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>

