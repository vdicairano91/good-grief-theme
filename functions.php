<?php

// *****************************
// Admin Scripts/Styles
// *****************************

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/library/css/admin.css');
}
add_action('login_enqueue_scripts', 'admin_style');


// *****************************
// Theme Support
// *****************************

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

remove_filter ('the_content', 'wpautop');
remove_filter ('acf_the_content', 'wpautop');


// *****************************
// Image Sizes
// *****************************

// add_image_size( 'single-post-thumbnail', 205, 170 );


// *****************************
// Remove Stuff
// *****************************

remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('welcome_panel', 'wp_welcome_panel');
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'acf_the_content', 'wpautop' );
remove_filter( 'the_title', 'wptexturize'); 
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'acf_the_content', 'wptexturize' );
remove_action('template_redirect', 'redirect_canonical');


// *****************************
// Update Footer on Admin Screen
// *****************************

function update_footer_admin () {
  //echo 'Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>';
}
// add_filter('admin_footer_text', 'update_footer_admin');


// *****************************
// Disables Yoast JSON-LD
// *****************************

function remove_yoast_json( $data ){
  $data = array();
  return $data;
}
add_filter('wpseo_json_ld_output', 'remove_yoast_json', 10, 1);


// *****************************
// SEO
// *****************************

add_filter('wpseo_enable_xml_sitemap_transient_caching', '__return_false');


// *****************************
// Enqueue Scripts/Styles
// *****************************

add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );
function scripts_and_styles() {
  global $wp_styles, $post;

  if (!is_admin()) {
    wp_enqueue_script( 'jquery' );

    // if (WP_ENV == 'local') {
    //   wp_register_script( 'main-bundle-js', get_stylesheet_directory_uri() . '/library/javascript/main.bundle.js', array('jquery'), '', true );
    //   wp_enqueue_script( 'main-bundle-js' );
    //   wp_localize_script( 'main-bundle-js', 'ONUREG_', array(
    //     'pageID' => $post->ID,
    //     'ajaxurl' => admin_url( 'admin-ajax.php' )
    //   ));
    //   // deactivate_plugins( array( '/really-simple-ssl/rlrsssl-really-simple-ssl.php', '/w3-total-cache/w3-total-cache.php' ), true);
    // }
    // else {
      wp_register_script('main-bundle-js', get_stylesheet_directory_uri() . '/library/javascript/main.bundle.js', array('jquery'), '', 'all');
      wp_enqueue_script('main-bundle-js');
    //   wp_localize_script( 'main-bundle-js', 'ONUREG_', array(
    //     'pageID' => $post->ID,
    //     'ajaxurl' => admin_url( 'admin-ajax.php' ))
    //   );
    // }

    /** Styles **/
    wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/styles.css', array(), '', 'all' );
    wp_enqueue_style( 'stylesheet' );
  }
}


// *****************************
// Post Types
// *****************************

include("php/wp-posts/post-types.php");


// *****************************
// Post Taxonomies
// *****************************

include("php/wp-posts/post-taxonomies.php");

// *****************************
// Ajax Functions
// *****************************

require_once 'php/ajax/ajax.php';


// *****************************
// Shortcodes
// *****************************

// include('php/shortcodes/shortcodes.php');


// *****************************
// HTTP Rewrite Rules
// *****************************

include("php/http-rewrite/rewrite-rules.php");


// *****************************
// Query Vars
// *****************************

include("php/http-rewrite/query-vars.php");


// *****************************
// Custom Functions
// *****************************

function debugArray($array) {
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

function formatTitle($name) {
  $name = str_replace(" ", "-", strtolower($name));
  $name = str_replace("#", "", $name);
  return $name;
}

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ){
  $existing_mimes['svg'] = 'image/svg+xml';
  $existing_mimes['vcf'] = 'text/x-vcard'; 
  return $existing_mimes;
}


add_filter( 'wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1 );

function yoast_change_opengraph_type( $type ) {
    return 'website';
}






/* DON'T DELETE THIS CLOSING TAG */ ?>
