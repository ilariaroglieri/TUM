<?php get_header(); ?>

<?php $current = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<section class="content" id="cat-events-archive">
  <div class="container-fluid border-bottom">

    <div class="flex-row ">
      <h1 class="uppercase s-large"><?php echo $current->name; ?></h1>
    </div>

  </div>

  <?php if ( have_posts() ) :?>
    <div class="container-fluid-w-p">
      <?php while ( have_posts() ) : the_post(); ?>

        <?php include('event-query.php'); ?>
    
      <?php endwhile; ?>
    </div>
  <?php else: ?>

  <div class="container-fluid-w-p">
    <h3 class="spacing-t-1">No content found.</h3>
  </div>

  <?php endif; ?>

</section>

<?php get_footer(); ?>