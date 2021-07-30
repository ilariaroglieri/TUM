<?php get_header(); ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid-w-p">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="s-large uppercase"><?php the_title(); ?></h1>
        
        <?php if( have_rows('riga_loghi') ): ?>
          <?php  while( have_rows('riga_loghi') ) : the_row(); ?>
            <?php $title = get_sub_field('etichetta');?>

            <?php if ($title): ?>
              <div class="spacing-p-b-1 spacing-p-t-3">
                <h3 class="title-row s-big uppercase"><?php echo $title; ?></h3>
              </div>
            <?php endif; ?>

            <div class="partner-row d-flex wrap v-center center">
              <?php if( have_rows('immagine_logo') ): ?>
                <?php  while( have_rows('immagine_logo') ) : the_row(); ?>
                  <?php $logo = get_sub_field('logo');?>
                  <?php $link = get_sub_field('link');?>

                  <div class="logo d-flex v-center center">
                  <?php if ($link): ?>
                    <a class="no-border" href="<?php echo $link; ?>" target='_blank'>
                      <img src="<?php echo $logo['url']; ?>" />
                    </a>
                  <?php else: ?>
                    <img src="<?php echo $logo['url']; ?>" />
                  <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>

            </div>
          <?php endwhile; ?>
        <?php endif; ?>

      </article>
    </div>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>