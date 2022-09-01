<?php get_header(); ?>

<?php $current = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
  $editionName = $current->name;
?>

<section class="content" id="content-edizione">

    <div class="container-fluid-w-p">
      <div class="title">
        <h1 class="spacing-p-t-1 s-large uppercase"><?= $editionName; ?></h1>
      </div>

      <div class="main-text max-width spacing-t-2 spacing-b-2">
        <?php the_content();?>
      </div>

    </div>

    <div class="container-fluid">
        
        <div id="events-calendar">

        <?php if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); ?>
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