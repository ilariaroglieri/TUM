<div class="container-fluid filters border-top">
  <div class="d-whole spacing-p-t-2">
    <h5 class="s-regular uppercase">Filtra per: </h5>
  </div>

  <div class="d-flex flex-row d-column spacing-p-t-1 spacing-p-b-2">

    <!-- categories -->
    <?php $cat = 'event-category'; ?>
    <?php $cats = get_terms( array(
      'taxonomy' => $cat,
      'hide_empty' => true,
      'orderby' => 'slug',
      'order' => 'ASC',
    ) );

    if ( $cats ) : ?>
      <div id="cat-select" class="custom-select select-cat d-flex">
        <?php foreach( $cats as $cat ) : ?>
          <h3 class="s-regular uppercase filter-element" id="term-id-<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></h3>
        <?php endforeach; ?>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>


  </div>
</div>