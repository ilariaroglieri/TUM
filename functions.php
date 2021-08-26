<?php

//kill gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

//remove admin bar
show_admin_bar(false);

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );


function anime_scripts() {
	wp_enqueue_script( 'anime', get_stylesheet_directory_uri() . '/assets/js/anime.min.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'anime_scripts' );

function jquery_scripts() {
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'jquery_scripts' );

add_theme_support( 'post-thumbnails' ); 

// remove_filter('the_content', 'wpautop');

// img attachment defaults

function default_attachment_display_settings() {
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'full' );
}

add_action( 'after_setup_theme', 'default_attachment_display_settings' );

add_filter('body_class','add_category_to_single');

function add_category_to_single($classes) {
    global $post;
  	if (has_term( 'panel', 'event-category') ) {
      $classes[] = 'blue';
    } else if (has_term( 'workshop', 'event-category') ) {
      $classes[] = 'red';
    } else if (has_term( 'tour', 'event-category') ) {
      $classes[] = 'yellow';
    } else if (has_term( 'film', 'event-category') ) {
      $classes[] = 'green';
    } 
  	// return the $classes array
  	return $classes;
}


?>