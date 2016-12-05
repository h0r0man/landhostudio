<article class="content<?php if(get_field('work_size') == 'small'): ?> content--small<?php elseif(get_field('work_size') == 'medium'): ?> content--medium<?php elseif(get_field('work_size') == 'large'): ?> content--large<?php endif; ?> preview">

  <a href="<?php the_permalink(); ?>">
    <div class="content">

      <h2><?php the_title(); ?></h2>

      <?php if (get_the_excerpt()): ?>
        <div class="content-excerpt">
          <?php the_excerpt(); ?>
        </div>
      <?php endif; ?>

      <?php if (get_field('work_technical')): ?>
        <div class="content-technical">
          <p><?php the_field('work_technical'); ?></p>
        </div>
      <?php endif; ?>

    </div>
  
    <?php
      $image = get_field('work_image_preview');
      $size = 'large';
      $thumbLarge = $image['sizes'][ $size ];
      
      $thumbPost = has_post_thumbnail();
      $thumbLargeDefault = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
    ?>

    <?php if (get_field('work_video_preview')): ?>

      <?php if ($image || $thumbPost): ?>
        <div class="image for-video">
          <?php if ($image): ?>
            <img src="<?php echo $thumbLarge ?>" alt="<?php echo $thumbLarge['alt'] ?>" />
          <?php elseif ($thumbPost): ?>
            <img src="<?php echo $thumbLargeDefault[0]; ?>" alt="<?php echo $thumbLargeDefault['alt'] ?>" />
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="video">
        <video preload="none" loop muted<?php if ($image || $thumbPost): ?> poster="<?php if ($image): ?><?php echo $thumbLarge; ?><?php elseif ($thumbPost): ?><?php echo $thumbLargeDefault[0]; ?><?php endif; ?>"<?php endif; ?>>
          <source src="<?php the_field('work_video_preview'); ?>" type="video/mp4">
        </video>
      </div>

    <?php elseif ($image || $thumbPost): ?>
      
      <div class="image">
        <?php if ($image): ?>
          <img src="<?php echo $thumbLarge; ?>" alt="<?php echo $thumbLarge['alt']; ?>" />
        <?php elseif ($thumbPost): ?>
          <img src="<?php echo $thumbLargeDefault[0]; ?>" alt="<?php echo $thumbLargeDefault['alt']; ?>" />
        <?php endif; ?>
      </div>
      
    <?php endif; ?>

  </a>

</article>
