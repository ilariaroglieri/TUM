<?php get_header(); ?>

<section class="content" id="content-home">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if( have_rows('slide') ): ?>
      <div class="container-fluid">

        <div class="slider">
          <?php while( have_rows('slide') ) : the_row();

            $title = get_sub_field('testo_grande');
            $text = get_sub_field('testo_descrittivo');
            $img = get_sub_field('immagine');?>

            <div class="slide" style="background: <?php if ($img):?>url( <?php echo $img['url']; ?>) <?php endif; ?> center center no-repeat">
              <div class="flex-row d-flex">
                <div class="d-half t-whole">
                  <h2 class="s-medium uppercase bg-color"><?php echo $title; ?></h2>
                </div>
                <div class="d-half t-whole">
                  <?php echo $text; ?>

                  <div class="button light spacing-t-2">
                    <a href="<?php echo get_page_link(42); ?>" />Registrati</a>
                  </div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>