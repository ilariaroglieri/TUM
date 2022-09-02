<?php get_header(); ?>

<?php $current = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<section class="content" id="cat-events-archive">
  <div class="container-fluid border-bottom">

    <div class="flex-row ">
      <h1 class="uppercase s-large"><?php echo $current->name; ?></h1>
    </div>

  </div>

   <?php 
    $currYear = date("Y");
  ?>

  <?php 
    $cptQuery = new WP_Query( array(
      'post_type'         => 'event',
      'posts_per_page'    => -1,
      'order'             => 'ASC',
      'showpastevents'  => true,
      'orderby'           => 'eventstart',
      'tax_query' => array(
        array(
          'taxonomy' => 'event_year',
          'field'    => 'slug',
          'terms'    => array( $currYear ),
          'operator' => 'IN',
        ),
        array(
          'taxonomy' => 'event-category',
          'field'    => 'slug',
          'terms'    => $current->slug,
          'orderby'  => 'menu_order',
        ),
      ),
    ));
    ?>

    <?php if ( $cptQuery->have_posts() ) : ?> 
      <div class="container-fluid">
        <?php while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>

          <?php include('event-query.php'); ?>
      
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php else: ?>

      <div class="container-fluid-w-p">
        <h3 class="spacing-t-1">No content found.</h3>
      </div>

    <?php endif; ?>

</section>

<?php get_footer(); ?>