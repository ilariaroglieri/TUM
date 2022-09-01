<?php get_header(); ?>

<?php 
  $current = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
  $editionName = $current->name;

  $term = get_queried_object(); 
  $taxonomy = $term->taxonomy;
  $term_id = $term->term_id;
?>

<section class="content" id="content-edizione">

    <div class="container-fluid-w-p">
      <div class="title">
        <h1 class="spacing-p-t-1 s-large uppercase"><?= $editionName; ?></h1>
      </div>

      <div class="main-text max-width spacing-t-2 spacing-b-2">
        <?= term_description();?>
      </div>
    </div>

    <!-- rassegna stampa -->
    <div class="container-fluid d-flex column rassegna">
      <?php $print = get_field('rassegna_stampa', $taxonomy.'_'.$term_id); ?>
      <div class="section-label">
        <h4 class="uppercase">Dicono di noi</h4>
      </div>
      <div class="main-text flex-row max-width spacing-t-2 spacing-b-2">
        <?= $print; ?>
      </div>

    </div>

    <!-- streaming area -->
    <?php $showEmbed = get_field('mostra_area_streaming', $taxonomy.'_'.$term_id); ?>
    <?php $title = get_field('titolo_area_streaming', $taxonomy.'_'.$term_id); ?>

    <?php if ($showEmbed == 1): ?>
      <?php if( have_rows('area_streaming', $taxonomy.'_'.$term_id) ): ?>
        <div class="container-fluid streaming-area">
          <?php if ($title): ?>
            <div class="streaming-header" class="white-header">
              <div class="flex-row">
                <h3 class="uppercase s-large"><?= $title; ?></h3>
              </div>
            </div>
          <?php endif; ?>

          <?php while( have_rows('area_streaming', $taxonomy.'_'.$term_id) ) : the_row();

            $link_video = get_sub_field('link_video');
            $time = get_sub_field('orario');
            $title = get_sub_field('titolo'); ?>
            <div class="video-label d-flex baseline between">
              <h4 class="uppercase"><?php echo $title; ?></h4>
              <h4 class="uppercase"><?php echo $time; ?></h4>
            </div>
            <div id="embed-wrapper" class="d-flex d-center center">
              <div id="embed">
                <?php echo $link_video; ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>


    <!-- archived program -->
    <?php include ('event-filters+download.php'); ?>

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
      </div>
    </div>

</section>

<?php get_footer(); ?>