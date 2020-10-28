<?php

function university_files() {
//	handle, file, dependencies, version, in footer boolean
 if (strstr($_SERVER['SERVER_NAME'], 'fictional-university')) {
    wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
  } else {
   echo $_SERVER['SERVER_NAME'];
    wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.920bf068e75aa8ef387f.js'), NULL, '1.0', true);
    wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.729eb6f7584d347d5379.js'), NULL, '1.0', true);
    wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.729eb6f7584d347d5379.css'));
  }
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
//    register_nav_menu('headerMenuLocation', 'Header Menu Location');
//    register_nav_menu('footerLocationOne', 'Footer Location One');
//    register_nav_menu('footerLocationTwo', 'Footer Location Two');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
}

function university_adjust_queries($query){
  if (!is_admin() AND is_post_type_archive('community') AND is_main_query()){
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }
 
  if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )
    ));
  }
}

add_action('after_setup_theme', 'university_features');

add_action('pre_get_posts', 'university_adjust_queries');

