<?php get_header(); ?>

<?php $currentID = $wp_query->queried_object_id; ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="flex-row">
          <h1 class="title spacing-p-t-1 s-large uppercase"><?php the_title(); ?></h1>
        </div>

        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <?php if ($img):?>
          <div class="event-img half-height" style="background: url( <?php echo $img[0]; ?>) center center no-repeat">
          </div>
        <?php endif; ?>

        <!-- display streaming area for Mappa page -->
        <?php $showEmbed = get_field('mostra_area_streaming'); ?>
        <?php $title = get_field('titolo_area_streaming'); ?>

        <?php if ($showEmbed == true): ?>
          <?php if( have_rows('area_streaming') ): ?>
            <div class="container-fluid streaming-area border-top grey">

              <?php while( have_rows('area_streaming') ) : the_row();
                $link_video = get_sub_field('link_video');
                $time = get_sub_field('orario');
                $title = get_sub_field('titolo'); ?>
                <div id="embed-wrapper" class="d-flex d-center center">
                  <div id="embed">
                    <?php echo $link_video; ?>
                  </div>
                </div>
                <div class="video-label d-flex baseline between">
                  <h4 class="uppercase"><?php echo $title; ?></h4>
                  <h4 class="uppercase"><?php echo $time; ?></h4>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <div class="main-text flex-row max-width spacing-t-2 spacing-b-2">
          <?php the_content(); ?>
        </div>

        <?php if ($currentID == 86 || $currentID == 5 || $currentID == 1315): ?>
          <div class="container-fluid-w-p">
            <div class="button spacing-b-2">
              <a href="<?php echo get_page_link(42); ?>">Registrati</a>
            </div>
          </div>
        <?php endif; ?>
      </article>
    </div>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>