<?php get_header(); ?>

<?php $currentID = $wp_query->queried_object_id; ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="flex-row">
          <h1 class="spacing-p-t-1 s-large uppercase"><?php the_title(); ?></h1>
        </div>

        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <?php if ($img):?>
          <div class="event-img half-height" style="background: url( <?php echo $img[0]; ?>) center center no-repeat">
          </div>
        <?php endif; ?>

        <div class="main-text flex-row max-width spacing-t-2 spacing-b-2">
          <?php the_content(); ?>
        </div>

        <?php if( have_rows('modulo_categoria') ): ?>
          <div id="festival-cats" class="spacing-t-2">
          <?php while( have_rows('modulo_categoria') ) : the_row(); ?>
            <?php
              $cat = get_sub_field('categoria');
              $title = get_sub_field('titolo');
              $text = get_sub_field('testo');
              $link = get_sub_field('link');
            ?>

            <div class="event <?php echo $cat; ?> d-flex t-column flex-row-neg">
              <div class="d-half t-whole half-max-width">
                <h2 class="uppercase s-big"><?= $title; ?></h2>
              </div>
              <div class="text d-half t-whole">
                <?= $text; ?>

                <?php if ($cat == 'panel'): ?>
                  <div class="button spacing-t-2">
                    <a href="<?php echo get_page_link(115); ?>">Leggi il programma completo</a>
                  </div>
                <?php else: ?>
                  <div class="button spacing-t-2">
                    <a href="<?php get_term_link('panel', 'event-category'); ?>">Scopri di più</a>
                  </div>
                <?php endif; ?>
              </div>
            </div>

          <?php endwhile; ?>
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