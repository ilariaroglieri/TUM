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

        <?php if ($currentID == 86 || $currentID == 5): ?>
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