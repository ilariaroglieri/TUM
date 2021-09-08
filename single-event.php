<?php get_header(); ?>

<section class="content" id="content-single-event">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container-fluid">
      <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="d-flex column between spacing-p-t-1 spacing-p-b-1">

          <div class="title flex-row spacing-p-b-1">
            <h1 class="s-medium uppercase"><?php the_title(); ?></h1>
          </div>
          
          <div class="d-flex flex-row between">
            <div class="cat">
              <?php $cats = get_the_terms($post->ID, 'event-category'); ?>
              <?php foreach( $cats as $cat ) { ?>
                <h5 class="uppercase"><?php echo $cat->name ?></h5>
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
        </div>

        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <div class="event-img half-height" style="background: <?php if ($img):?>url( <?php echo $img[0]; ?>) <?php endif; ?> center center no-repeat">
          <div class="svg-container light-color">
            <?php $cat = $cats[0]->slug; ?>
            <?php include ('svg-shapes.php'); ?>
          </div>
        </div>

        <div class="dark-bnd">
          <div class="d-flex flex-row between spacing-p-t-1 spacing-p-b-1">
            <div class="event_type">
              <?php $eventType = get_field('tipo_evento'); ?>
              <h4 class="uppercase"><?= $eventType; ?></h4>
            </div>

            <div class="venue">
              <?php $venues = get_the_terms($post->ID, 'event-venue'); ?>
              <?php if ($venues): ?>
                <?php foreach( $venues as $venue ) { ?>
                  <h4 class="uppercase"><?php echo $venue->name ?></h4>
                <?php } ?>
              <?php else: ?>
                <h4 class="uppercase">Online</h4>
              <?php endif; ?>
            </div>
          </div>
        </div>

        
        <div class="max-width d-flex t-column flex-row spacing-p-t-2 spacing-p-b-2">
          <div class="main-text">
            <?php the_content(); ?>
          </div>
        </div>

        <?php if( have_rows('persona') ): ?>
          <div class="dark-bnd">
            <div class="max-width d-flex t-column spacing-p-t-2 spacing-p-b-1">
              <div class="speakers-list d-half t-whole">
                <?php $title = get_field('titolo_blocco'); ?>
                <h2 class="uppercase spacing-b-1"><?= $title; ?></h2>

                <?php while( have_rows('persona') ) : the_row();

                  $name = get_sub_field('nome');
                  $qualifica = get_sub_field('qualifica');
                  $buttonTxt = get_sub_field('testo_bottone');
                  $ritratto = get_sub_field('ritratto');
                  $bio = get_sub_field('bio'); ?>

                  <div class="speaker accordion-btn d-flex flex-row-neg t-column spacing-p-b-2">
                    <div class="portrait d-one-third t-whole" style="background: url( <?php echo $ritratto['url'];?> )"></div>
                    <div class="info d-two-thirds t-whole">
                      <h3 class="s-big uppercase"><?= $name; ?></h3>
                      <h6 class="s-small spacing-b-1"><?= $qualifica; ?></h6>
                      <?php if ($bio): ?>
                        <h4 class="btn s-small uppercase"><?= $buttonTxt; ?></h4>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="accordion-content">
                    <?= $bio; ?>
                  </div>

                <?php endwhile; ?>
              </div>

              <div class="moderator-list d-half t-whole">
                <?php if( have_rows('moderator') ): ?>
                  <?php $title = get_field('titolo_blocco_2'); ?>
                  <h2 class="uppercase spacing-b-1"><?= $title; ?></h2>

                  <?php while( have_rows('moderator') ) : the_row();

                    $name = get_sub_field('nome');
                    $qualifica = get_sub_field('qualifica');
                    $ritratto = get_sub_field('ritratto');
                    $bio = get_sub_field('bio'); ?>

                    <div class="speaker accordion-btn d-flex flex-row-neg t-column spacing-p-b-2">
                      <div class="portrait d-one-third t-whole" style="background: url( <?php echo $ritratto['url'];?> )"></div>
                      <div class="info d-two-thirds t-whole">
                        <h3 class="s-big uppercase"><?= $name; ?></h3>
                        <h6 class="s-small spacing-b-1"><?= $qualifica; ?></h6>
                        <h4 class="btn s-small uppercase">Leggi bio</h4>
                      </div>
                    </div>

                    <div class="accordion-content">
                      <?= $bio; ?>
                    </div>

                  <?php endwhile;
                endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="d-flex half-max-width flex-row spacing-p-b-2 spacing-p-t-2">
          <?php $link = get_field('link_esterno'); ?>
          <?php if ($eventType == 'Evento gratuito con prenotazione'): ?>
            <?php if ($link): ?>
              <div class="button">
                <a class="uppercase" href="<?php echo $link; ?>">Registrati qui</a>
              </div>
            <?php else: ?>
              <?php echo do_shortcode('[mc4wp_form id="226"]'); ?>
            <?php endif; ?>
          <?php elseif ($eventType == 'Evento a pagamento'): ?>
            <?php if ($link): ?>
              <div class="button">
                <a class="uppercase" href="<?php echo $link; ?>">Compra qui</a>
              </div>
            <?php else: ?>
              <?php echo do_shortcode('[mc4wp_form id="226"]'); ?>
            <?php endif; ?>
          <?php else: ?>
            <?php $embed = get_field('embed_esterno'); ?>
            <?php if ($embed): ?>
              <div class="button">
                <p class="uppercase">Guarda in streaming su questo sito</p>
              </div>
            <?php else: ?>
               <?php echo do_shortcode('[mc4wp_form id="226"]'); ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        </div>

      </article>
    </div>

    <?php include('related-query.php'); ?>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>