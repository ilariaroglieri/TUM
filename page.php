<?php get_header(); ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid-w-p">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="s-large uppercase"><?php the_title(); ?></h1>
        <div class="main-text spacing-t-2 spacing-b-2">
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