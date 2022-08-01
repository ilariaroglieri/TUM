<?php get_header(); ?>

<?php $currentID = $wp_query->queried_object_id; ?>

<section class="content" id="content-page-programma">

    <div class="container-fluid-w-p">
      <div class="title">
        <h1 class="spacing-p-t-1 s-large uppercase"><?php the_title(); ?></h1>
      </div>

      <div class="main-text max-width spacing-t-2 spacing-b-2">
        <?php the_content();?>
      </div>

    </div>

    <?php include ('event-filters.php'); ?>

    <div class="container-fluid">
        
        <div id="events-calendar">
        <?php 
        $cptQuery = new WP_Query( array(
          'post_type'         => 'event',
          'posts_per_page'    => -1,
          'order'             => 'ASC',
          'showpastevents'  => true,
          'orderby'           => 'eventstart'
          ));
        ?>

        <?php if ( $cptQuery->have_posts() ) : 
          while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>
            <?php include('event-query.php'); ?>
          <?php endwhile; ?>
        <?php else: ?>

          <h2>Woops...</h2>
          <p>Sorry, no posts found.</p>

        <?php endif; ?>

      </article>
    </div>

</section>

<?php get_footer(); ?>