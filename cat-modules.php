<?php if( have_rows('modulo_categoria') ): ?>
  <div id="festival-cats" class="spacing-t-2">
  <?php while( have_rows('modulo_categoria') ) : the_row(); ?>
    <?php
      $acfTerm = get_sub_field('categoria');
      $title = get_sub_field('titolo');
      $text = get_sub_field('testo');
      $link = get_sub_field('link_esterno');
    ?>

    <div class="event <?php echo $acfTerm; ?> d-flex t-column flex-row-neg" data-type="<?php echo $acfTerm; ?>">
      <div class="d-half t-whole half-max-width">
        <h2 class="uppercase s-big"><?= $title; ?></h2>
      </div>
      <div class="text d-half t-whole">
        <?= $text; ?>

        <?php if ($acfTerm == 'panel'): ?> <!-- change later when programme is complete-->
          <div class="button spacing-t-2">
            <a href="<?php echo get_page_link(115); ?>">Leggi il programma completo</a>
          </div>
        <?php else: ?>


          <?php $terms = get_terms( 'event-category', $args = array(
            'hide_empty' => true, // do not hide empty terms
          ));
          ?>
          <?php foreach( $terms as $term ): 
            if ($acfTerm == $term->slug): ?>
              <div class="button spacing-t-2">
                <a href="<?php echo get_term_link($term, 'event-category'); ?>">Scopri di più</a>
              </div>
            <?php endif;
          endforeach;?>
          
          <?php if ($link): ?>
            <div class="button spacing-t-2">
              <a href="<?php echo $link; ?>">Compra qui</a>
            </div>

          <?php else: ?>
          
          <div class="spacing-t-2">
            <?php echo do_shortcode('[mc4wp_form id="226"]'); ?>
          </div>

          <?php endif; ?>

        <?php endif; ?>

      </div>
    </div>

  <?php endwhile; ?>
  </div>
<?php endif; ?>