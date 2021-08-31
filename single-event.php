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
            <div class="tag">
              <?php $tags = get_the_terms($post->ID, 'event-category'); ?>
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
        </div>

        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <div class="event-img half-height" style="background: <?php if ($img):?>url( <?php echo $img[0]; ?>) <?php endif; ?> center center no-repeat">
          <div class="event-shape"></div>
        </div>
        
        <div class="max-width d-flex t-column flex-row spacing-p-t-2 spacing-p-b-1">
          <div class="main-text d-whole">
            <?php the_content(); ?>
          </div>
        </div>

        <?php if( have_rows('persona') ): ?>
          <div class="border-top">
            <div class="max-width d-flex t-column flex-row spacing-p-t-3 spacing-p-b-1">
              <div class="speakers-list d-half t-whole">
                <h2 class="uppercase">Speakers</h2>

                <?php while( have_rows('persona') ) : the_row();

                  $name = get_sub_field('nome');
                  $qualifica = get_sub_field('qualifica');
                  $ritratto = get_sub_field('ritratto');
                  $bio = get_sub_field('bio'); ?>

                  <div class="speaker accordion-btn d-flex flex-row-neg t-column spacing-p-b-2">
                    <div class="portrait d-one-third t-whole" style="background: url( <?php echo $ritratto['url'];?> )"></div>
                    <div class="info d-two-thirds t-whole">
                      <h3 class="uppercase"><?= $name; ?></h3>
                      <h6 class="s-small spacing-b-1"><?= $qualifica; ?></h6>
                    </div>
                  </div>

                  <div class="accordion-content">
                    <?= $bio; ?>
                  </div>

                <?php endwhile; ?>
              </div>

              <div class="moderator-list d-half t-whole">
                <?php if( have_rows('moderator') ): ?>
                  <h2 class="uppercase">Moderatore</h2>

                  <?php while( have_rows('moderator') ) : the_row();

                    $name = get_sub_field('nome');
                    $qualifica = get_sub_field('qualifica');
                    $ritratto = get_sub_field('ritratto');
                    $bio = get_sub_field('bio'); ?>

                    <div class="speaker accordion-btn d-flex flex-row-neg t-column spacing-p-b-2">
                      <div class="portrait d-one-third t-whole" style="background: url( <?php echo $ritratto['url'];?> )"></div>
                      <div class="info d-two-thirds t-whole">
                        <h3 class="uppercase"><?= $name; ?></h3>
                        <h6 class="s-small spacing-b-1"><?= $qualifica; ?></h6>
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

        <div class="button flex-row spacing-t-2 spacing-b-2">
          <a href="<?php echo get_page_link(42); ?>">Registrati</a>
        </div>

      </article>
    </div>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>