<?php if( have_rows('modulo_categoria') ): ?>
  <div id="festival-cats" class="spacing-t-2 border-top white">
  <?php while( have_rows('modulo_categoria') ) : the_row(); ?>
    <?php
      $acfTerm = get_sub_field('categoria');
      $title = get_sub_field('titolo');
      $text = get_sub_field('testo');
      $link = get_sub_field('link_esterno');
      $link2 = get_sub_field('link_esterno_2');
      $linkArchive = get_sub_field('mostra_link_archivio_categoria');
    ?>

    <div class="event <?php echo $acfTerm; ?> d-flex t-column flex-row-neg" data-type="<?php echo $acfTerm; ?>">
      <div class="d-half t-whole half-max-width">
        <h2 class="uppercase s-big"><?= $title; ?></h2>
      </div>
      <div class="text d-half t-whole">
        <?= $text; ?>

        <?php $terms = get_terms( 'event-category', $args = array(
          'hide_empty' => true, // do not hide empty terms
        ));
        ?>
        <?php foreach( $terms as $term ): 
          if ($acfTerm == $term->slug): ?>
            <?php if ($linkArchive == 1): ?>
              <div class="button spacing-t-2">
                <a href="<?php echo get_term_link($term, 'event-category'); ?>">Scopri i <?= $term->name; ?> </a>
              </div>
            <?php endif; ?>
          <?php endif;
        endforeach;?>
          
        <?php if ($link): ?>
          <div class="button spacing-t-2">
            <a href="<?php echo $link['url']; ?>" target="_blank"><?php echo $link['title']; ?></a>
          </div>


        <?php /* else: */ ?>
        
          <!-- <div class="spacing-t-2"> -->
            <?php /* echo do_shortcode('[mc4wp_form id="226"]'); */ ?>
          <!-- </div>  -->

        <?php endif; ?>

        <?php if ($link2): ?>
          <div class="button spacing-t-2">
            <a href="<?php echo $link2['url']; ?>" target="_blank"><?php echo $link2['title']; ?></a>
          </div>
        <?php endif; ?>

      </div>
    </div>

  <?php endwhile; wp_reset_postdata(); ?>
  </div>
<?php endif; ?>