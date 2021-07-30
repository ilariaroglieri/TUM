<?php get_header(); ?>

<section class="content" id="content-single-event">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid">
      <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="d-flex column between spacing-p-t-1 spacing-p-b-1">
          <div class="d-flex flex-row between">
            <div class="tag">
              <?php $tags = get_the_terms($post->ID, 'event-tag'); ?>
              <?php foreach( $tags as $tag ) { ?>
                <h5 class="uppercase"><?php echo $tag->name ?></h5>
              <?php } ?>
            </div>

            <div class="date-time">
              <?php 
              $month = eo_get_next_occurrence('F');
              $shortMonth = substr($month, 0, 3);
              ?>
              <h5 class="uppercase"><?php eo_next_occurrence('d'); ?> <?php echo $shortMonth; ?> <?php eo_next_occurrence('Y'); ?> <?php _e ('H','sf64_theme');?><?php eo_next_occurrence(get_option('time_format')); ?>  
              </h5>
            </div>
          </div>


          <div class="title flex-row spacing-p-t-1">
            <h1 class="s-medium uppercase"><?php the_title(); ?></h1>
          </div>
          
        </div>

        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <div class="event-img half-height" style="background: <?php if ($img):?>url( <?php echo $img[0]; ?>) <?php endif; ?> center center no-repeat">
          <div class="event-shape"></div>
        </div>
        
        <div class="main-text flex-row spacing-p-t-2 spacing-p-b-3">
          <?php the_content(); ?>
        </div>

      </article>
    </div>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>