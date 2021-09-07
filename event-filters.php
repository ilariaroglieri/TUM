<div class="container-fluid filters border-top">
  <div class="d-flex flex-row t-column spacing-p-b-4">
    <!-- autore -->
    <?php $cat = 'event-category'; ?>
    <?php $cats = get_terms( array(
      'taxonomy' => $cat,
      'hide_empty' => true,
      'orderby' => 'slug',
      'order' => 'ASC',
    ) );

    if ( $cats ) : ?>
      <div class="categories filter d-flex d-three-twelfth t-whole spacing-p-b-2">
        <p><?php _e ('Autore:','alc_theme'); ?></p>
        
        <div id="author-select" class="custom-select select-author d-flex">
          <select name="<?php echo $cat; ?>">
            <option value=""><?php _e ('Tutti','alc_theme'); ?></option>
            <?php foreach( $cats as $cat ) : ?>
              <option value="<?php echo $author->slug; ?>" id="term-id-<?php echo $author->term_id; ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>


    <!-- Decade -->
    <div class="works filter d-flex d-three-twelfth t-whole spacing-p-b-2">
      <p><?php _e ('Decade:','alc_theme'); ?></p>
      
      <div id="decade-select" class="custom-select select-author d-flex">
          <?php $decades = ['s. d.','1960-69','1970-79','1980-89','1990-99','2000-09','2010-19','2020-29']; ?>
          <select name="decade">
            <option value=""><?php _e ('Tutte','alc_theme'); ?></option>
            <?php foreach($decades as $decade):
                $initDec = substr($decade, 0, 3);  print($initDec);?>
                <option data-display="<?php echo $decade; ?>" value="<?php echo $initDec;?>"><?php echo $decade; ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    </div>

    <!-- Anno (had to query to have custom fields) -->
    <div class="works filter d-flex d-three-twelfth t-whole spacing-p-b-2">
        <p><?php _e ('Anno:','alc_theme'); ?></p>
        <?php $cptQuery = new WP_Query( array(
          'post_type'         => 'opere',
          'posts_per_page'    => -1,
          'meta_key'          => 'anno',
          'meta_type'         => 'NUMERIC',
          'orderby'           => 'meta_value_num',
          'order'             => 'ASC',
        ));

      if( $cptQuery->have_posts() ): ?>
        <div id="year-select" class="custom-select select-author d-flex">
          <select name="year">
            <option value=""><?php _e ('Tutti','alc_theme'); ?></option>
             <!-- check for duplicates -->
            <?php $prevYear = null; ?>
            <?php while( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>
              <?php $year = get_field( 'anno' ); ?>
              <?php if (($year) && ($prevYear !== $year)) {
                $initYear = substr($year, 0, 3); ?>
                <option value="<?php echo $initYear; ?>" data-display="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php $prevYear = $year; ?>
              <?php } ?>

            <?php endwhile; ?>
          </select>
        </div>
      <?php endif; wp_reset_postdata(); ?>
    </div>

    <!-- collezione -->
    <?php $tax2 = 'project_collection'; ?>
    <?php $collections = get_terms( array(
      'taxonomy' => $tax2,
      'hide_empty' => true,
      'orderby' => 'title',
      'order' => 'ASC',
    ) );

    if ( $collections ) : ?>
      <div class="works filter d-flex d-three-twelfth t-whole spacing-p-b-2">
        <p><?php _e ('Collezione:','alc_theme'); ?></p>
        
        <div id="collection-select" class="custom-select select-author d-flex">
          <select name="<?php echo $tax; ?>">
            <option value=""><?php _e ('Tutti','alc_theme'); ?></option>
            <?php foreach( $collections as $collection ) : ?>
              <option value="<?php echo $collection->slug; ?>" id="term-id-<?php echo $collection->term_id; ?>"><?php echo $collection->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    <?php endif;
    wp_reset_postdata(); ?>

  </div>
</div>