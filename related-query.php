<?php 
$currPostID = get_queried_object_id();
$terms = wp_get_object_terms( $currPostID, 'event-category');
$years = wp_get_object_terms( $currPostID, 'event_year');

// select same category + same year
$args = array( 
  'post_type' => 'event',
  'posts_per_page' => 5,
  'post__not_in' => array($currPostID),
  'tax_query' => array(
    array(
      'taxonomy' => 'event_year',
      'field'    => 'slug',
      'terms'    => $years[0]->slug,
      'operator' => 'IN',
    ),
    array(
      'taxonomy' => 'event-category',
      'field'    => 'slug',
      'terms' => $terms[0]->slug,
      'orderby'  => 'menu_order',
    ),
  ),
);

$relatedEvents = new WP_Query($args);

if( $relatedEvents->have_posts() ) :?>
  <div class="container-fluid">
    <div id="related-header" class="white-header">
      <div class="d-flex flex-row baseline between">
        <h3 class="uppercase s-large">Eventi correlati:</h3>
      </div>
    </div>
    <div id="events-related" class="container-fluid">

      <?php while( $relatedEvents->have_posts() ) : $relatedEvents->the_post(); 
        include ('event-query.php');
      endwhile; ?>
    </div>
  </div>
<?php endif;

wp_reset_query();
?>