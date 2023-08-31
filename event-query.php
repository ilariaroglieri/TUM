  <?php 
    $cats = get_the_terms($post->ID, 'event-category');
    $venues = get_the_terms($post->ID, 'event-venue');
    $years = get_the_terms($post->ID, 'event_year');
  ?>
  <div class="event <?php echo $cats[0]->slug; ?> d-flex column between spacing-p-t-1 spacing-p-b-1" data-year="<?php echo $years[0]->slug; ?>" data-type="<?php echo $cats[0]->slug; ?>">
    <?php if ($years[0]->slug == '2021'): ?>
      <div class="svg-container animated-shape">
        <?php $cat = $cats[0]->slug; ?>
        <?php include ('svg-shapes.php'); ?>
      </div>
    <?php elseif ($years[0]->slug == '2022'): ?>
      <div class="svg-container animated-pattern">
      </div>
    <?php elseif ($years[0]->slug == '2023'): ?>
      <div class="svg-container animated-shape-23">
        <?php $cat = $cats[0]->slug; ?>
        <?php include('svg-shapes-2023.php'); ?>
      </div>
    <?php endif; ?>

    <div class="d-flex flex-row between p-relative">
      <div class="tag">
        <?php foreach( $cats as $cat ) { ?>
          <h5 class="uppercase"><?php echo $cat->name ?></h5>
        <?php } ?>
      </div>

      <div class="date-time">
        <?php 
        $month = eo_get_the_start('F');
        $shortMonth = substr($month, 0, 3);
        ?>
        <h5 class="uppercase"><?php eo_the_start('d'); ?> <?php echo $shortMonth; ?> <?php eo_the_start('Y'); ?> <?php _e ('H','sf64_theme');?><?php eo_the_start(get_option('time_format')); ?>  
        </h5>
      </div>
    </div>

    <div class="title flex-row spacing-p-t-2 spacing-p-b-2 p-relative">
      <h3 class="uppercase s-medium"><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></h3>
    </div>

    <div class="d-flex flex-row between p-relative">
      <div class="venues">
        <?php if ($venues):
          foreach( $venues as $venue ): ?>
            <h5 class="venue uppercase"><?php echo $venue->name; ?></h5>
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