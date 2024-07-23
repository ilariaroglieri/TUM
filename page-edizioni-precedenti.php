<?php get_header(); ?>

<?php $currentID = $wp_query->queried_object_id; ?>

<section class="content" id="content-previous-years">
  <?php
    $currYear = date("Y"); 
    $terms = get_terms( array(
      'taxonomy' => 'event_year',
      'orderby' => 'slug',
      'order' => 'DESC',
      'exclude' => $currYear
    ));
  ?>

  <?php foreach( $terms as $term ) : ?>
    <?php if ( $term->slug != $currYear ): ?>
      <div class="container-fluid event-year-row">
        <h2 class="event-year-link spacing-p-t-1 s-large uppercase"><a href="<?php echo get_term_link($term->term_id); ?>">TUM <?= $term->name; ?></a></h2>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>

</section>

<?php get_footer(); ?>