<?php
  // select current year events...
  $currYear = date("Y");
  $events = get_posts(array( 
    'post_type'         => 'event',
    'posts_per_page'    => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'event_year',
        'field'    => 'slug',
        'terms'    => array( $currYear ),
        'operator' => 'IN',
      )),
    ),
  );
?>

<div class="container-fluid filters border-top spacing-p-b-2">
  <div class="d-whole spacing-p-t-2">
    <h5 class="s-regular uppercase">Filtra per: </h5>
  </div>

  <div class="d-flex flex-row d-column spacing-p-t-1 spacing-p-b-1">
    <!-- categories -->
    <?php
    // ... the outputs only cats for those posts
    foreach ($events as $event) {
      $fcats = wp_get_post_terms($event->ID, 'event-category');
      $cats[] = $fcats[0]->name;
      $cats_ids[] = $fcats[0]->term_id;
    }

    $cats = array_unique($cats);
    $cats_ids = array_unique($cats_ids);

    if ( $cats ) : ?>
      <div id="cat-select" data-name="event-category" class="custom-select select-cat d-flex m-column">
        <?php foreach( $cats as $a=>$category ) : ?>
          <div class="filter-container d-flex center <?php echo $cat; ?>">
            <h3 class="s-regular uppercase filter-element" data-type="cat-filter" id="<?php echo $cats_ids[$a]; ?>"><?php echo $category; ?></h3>
            <div class="animated-shape">
              <?php include ('svg-shapes.php'); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>
  </div>

  <div class="d-flex flex-row d-column spacing-p-b-1">
    <!-- venues -->
    <?php 
    foreach ($events as $event) {
      $fvenues = wp_get_post_terms($event->ID, 'event-venue');
      $venues[] = $fvenues[0]->name;
      $venues_ids[] = $fvenues[0]->term_id;
    }

    $venues = array_unique($venues);
    $venues_ids = array_unique($venues_ids);

    if ( $venues ) : ?>
      <div id="venue-select" data-name="event-venue" class="custom-select select-venue d-flex m-column">
        <?php foreach( $venues as $i=>$venue) : ?>
          <div class="filter-container">
            <h3 class="s-regular uppercase filter-element" data-type="venue-filter" id="<?= $venues_ids[$i]; ?>"><?php echo $venue; ?></h3>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>
  </div>

  <div class="d-flex flex-row d-column spacing-p-b-1">
    <div id="date-select" class="custom-select select-date d-flex m-column">
      <?php $currDate = date("d-m-Y"); ?>

      <?php $events = eo_get_events( array(
        'event_start_after' => $currDate,
      ) );
      $dates_array = array();

      if ( $events ) :
        foreach( $events as $event ){
          $start = eo_get_the_start( DATETIMEOBJ, $event->ID, null, $event->occurrence_id );
          $end = eo_get_the_end( DATETIMEOBJ, $event->ID, null, $event->occurrence_id );

          $pointer = clone $start;

          while( $pointer <= $end ){
            $dates_array[$start->format( 'Y-m-d' )] = $start->format( 'Y-m-d');  //Add date as array key
            $pointer->modify( '+1 day' );
          }
        } ?>
      <?php endif; ?>

      <?php foreach( $dates_array as $date ) :
        $formatDate = eo_format_date($date, 'd F');
        $formatDateDash = eo_format_date($date, 'Y-m-d'); ?>
        <div class="filter-container">
          <h3 class="s-regular uppercase filter-element" data-type="date-filter" id="<?php echo $formatDateDash; ?>"><?php echo $formatDate; ?></h3>
        </div>
      <?php endforeach; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  </div>


  <div class="d-whole spacing-p-t-2">
    <h5 class="reset-filter uppercase btn"><?php _e ('Reset','tum_theme'); ?></h5>
  </div>
</div>