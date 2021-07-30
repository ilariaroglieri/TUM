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
                <div class="d-half t-whole max-width">
                  <?php echo $text; ?>
                  <div class="d-block">
                    <a class="underline" href="<?php echo get_page_link(86); ?>">Leggi di più...</a>
                  </div>

                  <div class="button light spacing-t-2">
                    <a href="<?php echo get_page_link(42); ?>">Registrati</a>
                  </div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- eventi IN EVIDENZA -->
    <?php if( have_rows('evento_in_evidenza') ): ?>
      <div class="container-fluid">
        <div id="showcase-header" class="spacing-t-2">
          <div class="d-flex flex-row baseline between">
            <h3 class="uppercase s-large">Ultimi eventi</h3>
            <!-- <a class="s-regular uppercase" href="<?php echo get_permalink( get_page_by_title( 'Programma' ) ); ?>"><?php _e ('Vai al calendario','TUM-theme'); ?></a> -->
          </div>
        </div>
        <div id="events-showcase" class="container-fluid">
          <?php while( have_rows('evento_in_evidenza') ) : the_row(); ?>
            <?php 

            $post = get_sub_field('evento');
            setup_postdata($post); ?>

            <?php 
            $tags = get_the_terms($post->ID, 'event-tag');
            $cats = get_the_terms($post->ID, 'event-category');
            $venues = get_the_terms($post->ID, 'event-venue');
            ?>
            <div class="event <?php echo $cats[0]->slug; ?> d-flex column between spacing-p-t-1 spacing-p-b-1">


              <div class="d-flex flex-row between">
                <div class="tag">
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

              <div class="title flex-row spacing-p-t-2 spacing-p-b-2">
                <h3 class="uppercase s-medium"><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></h3>
              </div>

              <div class="d-flex flex-row between">
                <div class="venues">
                  <?php if ($venues):
                    foreach( $venues as $venue ): ?>
                      <h5 class="venue uppercase"><a href="<?php echo get_term_link( $venue->term_id ); ?>"><?php echo $venue->name; ?></a></h5>
                    <?php endforeach; 
                  else: ?>
                    <h5 class="venue uppercase">Online</h5>
                  <?php endif;?>
                </div>
                <div class="more">
                  <h5 class="uppercase"><a href="<?php the_permalink(); ?>">Scopri di più</a></h5>
                </div>
              </div>

            </div>

            <?php wp_reset_postdata(); ?>
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