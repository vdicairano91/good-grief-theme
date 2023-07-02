<?php
/*
 Template Name: Testimonial
 *
*/




?>

<?php get_header(); 


?>

<main id="blog">
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
		<div class="grid testimonial-grid">
	<?php

		$array = get_posts(array('posts_per_page' => -1,'post_type' => 'testimonial'));

		

		foreach($array as $post) {

			$date = $post->post_date;
			$id = $post->ID;

			echo "<a href='" . get_post_permalink($id) . "' class='testimonial-post'>";
			echo get_the_post_thumbnail();
			echo "<div><div class='testimonial-info'><p class='excerpt'>";
			echo the_field("excerpt");
			echo "</p><p class='read-more btn'>Read More</p></div></div></a>";

		}

		wp_reset_postdata();
		
	?>
		</div>
	</section>
	<section class="cta">
		<div class="container">
			<h2><?php the_field("cta_title", "options"); ?></h2>
			<p><?php the_field("cta_copy", "options"); ?><p>
			<?php 
				$link = get_field("cta_link", "options");
				if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
				<a class="btn" href="<?php echo esc_url( $link_url ); ?>"
						target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
		</div>
	</section>
	
</main>

<?php
include( TEMPLATEPATH . '/footer.php');

?>



		