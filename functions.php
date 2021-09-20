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
  wp_localize_script('custom', 'wpAjax',
    array(
      'ajaxUrl' => admin_url('admin-ajax.php')
    )
  );
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

// Utenti autenticati
add_action( 'wp_ajax_nopriv_filterCat', 'filterCatAjax' );
// Utenti non autenticati
add_action( 'wp_ajax_filterCat', 'filterCatAjax' );

// AJAX
function filterCatAjax() {
    
  $catTerm = $_POST['catTerm'];
  $category = $_POST['category'];

  $venueTerm = $_POST['venueTerm'];
  $venue = $_POST['venue'];

  $date = $_POST['date'];

  $args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
  );

  // check its a cat
  if ( isset($catTerm) && $catTerm != '0' ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $category,
        'field'    => 'id',
        'terms'    => $catTerm,
        'operator' => 'IN',
      )
    );
  }

  // check its a venue
  if ( isset($venueTerm) && $venueTerm != '0' ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $venue,
        'field'    => 'id',
        'terms'    => $venueTerm,
      )
    );
  } 

  if ( isset($catTerm) && $catTerm != '0' && isset($venueTerm) && $venueTerm != '0' ) {
    $args['tax_query'] = array(
      'relation' => 'AND',
      array(
        'taxonomy' => $category,
        'field'    => 'id',
        'terms'    => $catTerm,
      ),
      array(
        'taxonomy' => $venue,
        'field'    => 'id',
        'terms'    => $venueTerm,
      )
    );
  };

  if ( isset($date) && $date != '0' ) {
    $args['ondate'] = $date;
    // $args['event_start_after'] = $date;
    // $args['event_end_before'] = $date;
  }

  $ajaxQuery = new WP_Query($args);

  if ($ajaxQuery->have_posts()) :
    while ($ajaxQuery->have_posts()) : $ajaxQuery->the_post(); ?>
      <?php include('event-query.php'); ?>
    <?php endwhile; 
    wp_reset_postdata(); ?>
  <?php else: ?>
    <?php include('empty-query.php'); ?>
    <?php wp_reset_postdata(); ?>
  <?php endif;

  die();
}

?>