<?php 

function university_post_types(){
// Campus Post Type
register_post_type('campus', array(
        'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'campuses'), // archive
    'has_archive' => true,
            'public' => true,
    'labels' => array(
      'name' => 'Campuses',
      'add_new_item' => 'Add New Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campus',
      'singular_name' => 'Campus'
      ),
    'menu_icon' => 'dashicons-location-alt',
    'show_in_rest' => true 
  ));


  // Event Post Type
  register_post_type('event', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'), // archive
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
      ),
    'menu_icon' => 'dashicons-calendar-alt' 
  ));
  
  // Program Post Type
  register_post_type('program', array(
    'show_in_rest' => true,
    'supports' => array('title'),
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
      ),
    'menu_icon' => 'dashicons-awards' 
  ));

  // Professor Post Type
  register_post_type('professor', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'professors'),
    'public' => true,
    'labels' => array(
      'name' => 'Professors',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
      ),
    'menu_icon' => 'dashicons-welcome-learn-more' 
  ));

  register_post_type('community', array(
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'communities'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Communities',
      'add_new_item' => 'Add New Community',
      'edit_item' => 'Edit Community',
      'all_items' => 'All Communities',
      'singular_name' => 'Community'
      ),
    'menu_icon' => 'dashicons-rest-api' 
  ));

  register_post_type('student', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'students'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Students',
      'add_new_item' => 'Add New Student',
      'edit_item' => 'Edit Student',
      'all_items' => 'All Students',
      'singular_name' => 'Student'
      ),
    'menu_icon' => 'dashicons-universal-access-alt' 
  ));

}

add_action('init', 'university_post_types');

 ?>

