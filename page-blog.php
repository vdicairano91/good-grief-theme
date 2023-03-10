<?php
/*
 Template Name: Blog
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
		<div class="grid blog-grid">
	<?php

		$array = get_posts(array('posts_per_page' => -1));

		

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

<?php
include( TEMPLATEPATH . '/footer.php');

?>



		