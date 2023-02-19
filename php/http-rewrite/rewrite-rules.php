<?php

function add_rewrite_rules( $wp_rewrite ) {
	add_rewrite_rule('^education/newsroom/date/([A-Za-z0-9-]+)?/([A-Za-z0-9-]+)?', 'index.php?pagename=education/newsroom&taxonomy=date&dateone=$matches[1]&datetwo=$matches[2]', 'top');
	add_rewrite_rule('^education/newsroom/([A-Za-z0-9-]+)?/([A-Za-z0-9-]+)?', 'index.php?pagename=education/newsroom&taxonomy=$matches[1]&term=$matches[2]', 'top'); 	
 	add_rewrite_rule('^specialities/([A-Za-z0-9-]+)?', 'index.php?pagename=specialities&speciality=$matches[1]', 'top'); 	
  	add_rewrite_rule('^about-us/testimonials/([A-Za-z0-9-]+)?', 'index.php?pagename=about-us/testimonials&testimonial_name=$matches[1]', 'top');
}
// add_action('init', 'add_rewrite_rules');

function custom_rewrite_tag() {
  // add_rewrite_tag('%speciality%', '([^&]+)');
  // add_rewrite_tag('%dateone%', '([^&]+)');
  // add_rewrite_tag('%datetwo%', '([^&]+)');
  // add_rewrite_tag('%testimonial_name%', '([^&]+)');
}
// add_action('init', 'custom_rewrite_tag', 10, 0);



