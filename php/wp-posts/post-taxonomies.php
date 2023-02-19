<?php

add_action('init', 'create_my_taxonomies', 0);
function create_my_taxonomies() {

  // register_taxonomy(
  //   'project_categories',
  //   'projects',
  //     array(
  //       "hierarchical" => true,
  //       "label" => "Project Categories",
  //       "singular_label" => "Project Category",
  //       'update_count_callback' => '_update_post_term_count',
  //       'query_var' => true,
  //       'rewrite' => array(
  //              'slug' => 'project-detail',
  //               'with_front' => true
  //       ),
  //      'public' => true,
  //      'show_ui' => true,
  //      'show_admin_column' => true,
  //      'show_tagcloud' => true,
  //      '_builtin' => false,
  //      'show_in_nav_menus' => false)
  // );

}