<?php get_header(); ?>

<?php $currentID = $wp_query->queried_object_id; ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid-w-p">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="spacing-p-t-1 s-large uppercase"><?php the_title(); ?></h1>
        <div class="main-text spacing-t-2 spacing-b-2">
          <?php the_content(); ?>
        </div>

        <?php if ($currentID == 86 || $currentID == 5): ?>
          <div class="button spacing-b-2">
            <a href="<?php echo get_page_link(42); ?>">Registrati</a>
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