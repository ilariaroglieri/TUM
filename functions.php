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

	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '1.0.0', true );
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

// display past events in home
add_action( 'pre_get_posts', function( $query ){
  if ( ! is_admin() && $query->is_main_query() ) {
      $query->set('showpastevents', true);
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

  $currYear = date("Y"); 
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
      ),
      array(
        'taxonomy' => 'event_year',
        'field'    => 'slug',
        'terms'    => array( $currYear ),
        'operator' => 'IN',
      ),
    );
  }

  // check its a venue
  if ( isset($venueTerm) && $venueTerm != '0' ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $venue,
        'field'    => 'id',
        'terms'    => $venueTerm,
      ),
      array(
        'taxonomy' => 'event_year',
        'field'    => 'slug',
        'terms'    => array( $currYear ),
        'operator' => 'IN',
      ),
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
      ),
      array(
        'taxonomy' => 'event_year',
        'field'    => 'slug',
        'terms'    => array( $currYear ),
        'operator' => 'IN',
      ),
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

// Register Custom Taxonomy
function event_year_custom_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Edizione', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Edizione', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Edizione', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Item', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
    'new_item_name'              => __( 'New Item Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Item', 'text_domain' ),
    'edit_item'                  => __( 'Edit Item', 'text_domain' ),
    'update_item'                => __( 'Update Item', 'text_domain' ),
    'view_item'                  => __( 'View Item', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'show_in_rest'               => true,
  );
  register_taxonomy( 'event_year', array( 'event' ), $args );

}
add_action( 'init', 'event_year_custom_taxonomy', 0 );

?>