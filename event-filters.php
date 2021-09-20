<div class="container-fluid filters border-top spacing-p-b-2">
  <div class="d-whole spacing-p-t-2">
    <h5 class="s-regular uppercase">Filtra per: </h5>
  </div>

  <div class="d-flex flex-row d-column spacing-p-t-1 spacing-p-b-1">
    <!-- categories -->
    <?php $cat = 'event-category'; ?>
    <?php $cats = get_terms( array(
      'taxonomy' => $cat,
      'hide_empty' => true,
      'orderby' => 'slug',
      'order' => 'ASC',
    ) );

    if ( $cats ) : ?>
      <div id="cat-select" data-name="<?= $cat; ?>" class="custom-select select-cat d-flex t-column">
        <?php foreach( $cats as $cat ) : ?>
          <h3 class="s-regular uppercase filter-element" data-type="cat-filter" id="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></h3>
        <?php endforeach; ?>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>
  </div>

  <div class="d-flex flex-row d-column spacing-p-b-1">
    <!-- venues -->
    <?php $venue = 'event-venue'; ?>
    <?php $venues = get_terms( array(
      'taxonomy' => $venue,
      'hide_empty' => true,
      'orderby' => 'slug',
      'order' => 'ASC',
    ) );

    if ( $venues ) : ?>
      <div id="venue-select" data-name="<?= $venue; ?>" class="custom-select select-venue d-flex t-column">
        <?php foreach( $venues as $venue ) : ?>
          <h3 class="s-regular uppercase filter-element" data-type="venue-filter" id="<?php echo $venue->term_id; ?>"><?php echo $venue->name; ?></h3>
        <?php endforeach; ?>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>
  </div>

  <div class="d-flex flex-row d-column spacing-p-b-1">
    <div id="date-select" class="custom-select select-date d-flex t-column">
      <?php $events = eo_get_events( array(
        'event_start_after' => '24-06-2021',
      ) );
      $dates_array = array();

      if ( $events ) :
        foreach( $events as $event ){
          $start = eo_get_the_start( DATETIMEOBJ, $event->ID, null, $event->occurrence_id );
          $end = eo_get_the_end( DATETIMEOBJ, $event->ID, null, $event->occurrence_id );

          $pointer = clone $start;

          while( $pointer <= $end ){
            $dates_array[$start->format( 'l d F' )] = $start->format( 'l d F');  //Add date as array key
            $pointer->modify( '+1 day' );
          }
        } ?>
      <?php endif; ?>

      <?php foreach( $dates_array as $date ) :
        $formatDate = eo_format_date($date, 'd F');
        $formatDateDash = eo_format_date($date, 'Y-m-d'); ?>
        <h3 class="s-regular uppercase filter-element" data-type="date-filter" id="<?php echo $formatDateDash; ?>"><?php echo $formatDate; ?></h3>
      <?php endforeach; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  </div>


  <div class="d-whole spacing-p-t-2">
    <h5 class="reset-filter uppercase btn"><?php _e ('Reset','tum_theme'); ?></h5>
  </div>
</div>