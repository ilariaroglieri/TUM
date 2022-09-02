<?php get_header(); ?>

<section class="content" id="content-home">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php if( have_rows('slide') ): ?>
      <div id="intro-text" class="container-fluid">

        <div class="slider">
          <?php while( have_rows('slide') ) : the_row();

            $title = get_sub_field('testo_grande');
            $text = get_sub_field('testo_descrittivo');
            $link = get_sub_field('link');
            $img = get_sub_field('immagine');
            $download = get_sub_field('download');
            ?>

            <div class="slide">
              <div class="d-flex">
                <div class="img-container d-whole t-center">
                  <img src="<?= $img['url']; ?>" />
                </div>
              </div>
              <div class="d-flex t-column spacing-t-2 spacing-b-2">
                <div class="d-half t-whole">
                  <h2 class="s-medium uppercase"><?php echo $title; ?></h2>
                </div>
                <div class="d-half t-whole text max-width">
                  <?php echo $text; ?>
                  <!-- <div class="d-block">
                    <a class="btn uppercase" href="<?php echo get_page_link(5); ?>">Leggi di più</a>
                  </div> -->

                  <?php if ($link): ?>
                    <div class="button spacing-t-2">
                      <a href="<?php echo $link['url']; ?>" target="_blank"><?php echo $link['title']; ?></a>
                    </div>
                  <?php endif; ?>

                  <?php if ($download): ?>
                    <div class="button spacing-t-2">
                      <a href="<?php echo $download['url']; ?>" target="_blank">Scarica il programma</a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- streaming area -->
    <?php $showEmbed = get_field('mostra_area_streaming'); ?>
    <?php $title = get_field('titolo_area_streaming'); ?>

    <?php if ($showEmbed == true): ?>
      <?php if( have_rows('area_streaming') ): ?>
        <div class="container-fluid streaming-area">
          <div class="streaming-header white-header">
            <div class="flex-row">
              <h3 class="uppercase s-large"><?= $title; ?></h3>
            </div>
          </div>

          <?php while( have_rows('area_streaming') ) : the_row();

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

    <!-- il festival -->
    <?php
    $args = array(
      'post_type' => 'page',
      'post__in' => array(1315)
    );
    $festivalQuery = new WP_Query( $args );
    ?>

    <?php while ($festivalQuery -> have_posts()) : $festivalQuery -> the_post(); ?>
      <!-- categories info and links -->
      <?php include('cat-modules.php'); ?>
    <?php endwhile; ?>


    <!-- eventi IN EVIDENZA -->
    <?php if( have_rows('evento_in_evidenza') ): ?>
      <div class="container-fluid">
        <div id="showcase-header" class="white-header">
          <div class="d-flex flex-row baseline between">
            <h3 class="uppercase s-large">News</h3>
            <!-- <a class="s-regular uppercase" href="<?php echo get_permalink( get_page_by_title( 'Programma' ) ); ?>"><?php _e ('Vai al calendario','TUM-theme'); ?></a> -->
          </div>
        </div>
        <div id="events-showcase" class="container-fluid">
          <?php while( have_rows('evento_in_evidenza') ) : the_row(); ?>
            <?php 

            $post = get_sub_field('evento');
            setup_postdata($post); ?>

            <?php include('event-query.php'); ?>

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