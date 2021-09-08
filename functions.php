<?php

//kill gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

//remove admin bar
show_admin_bar(false);

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}

add_action( 'init', 'register_my_menu' );


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

// display all in events
add_action( 'pre_get_posts', function( $query ){
  if ( ! is_admin() && $query->is_main_query() ) {
    if ( is_post_type_archive('event') || is_tax() ) {
      $query->set('posts_per_page', -1 );
    }
  }
});

?>