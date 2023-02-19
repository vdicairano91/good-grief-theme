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
		<div class="blog-post-hero">
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
</main>

<?php get_footer(); ?>

