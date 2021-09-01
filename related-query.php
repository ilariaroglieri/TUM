<?php 
$currPostID = get_queried_object_id();
$terms = wp_get_object_terms( $currPostID, 'event-category');

$tax_query[] = array(
  'taxonomy' => 'event-category',
  'field' => 'slug',
  'terms' => $terms[0]->slug,
);

// put all the WP_Query args together
$args = array( 
  'post_type' => 'event',
  'posts_per_page' => 5,
  'post__not_in' => array($currPostID),
  'tax_query' => $tax_query 
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