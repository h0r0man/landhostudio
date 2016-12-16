<?php

// Post custom fields
$postSize          = get_field('work_size');
$postVideoPreview  = get_field('work_video_preview');
$image             = get_field('work_image_preview');
$size              = 'large';
$thumbLarge        = $image['sizes'][ $size ];

// Post thumbnail
$thumbPost         = has_post_thumbnail();
$thumbLargeDefault = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");

// 1. grid__item
// 2. grid__item--small || grid__item--medium || grid__item--large
// 3. grid__item--image || grid__item--video

// INTERN

// 1. grid__item-content
// 2. grid__item-image
// 3. grid__item-video

?>

<article class="grid__item<?php if($postSize == 'small'): ?> grid__item--small<?php elseif($postSize == 'medium'): ?> grid__item--medium<?php elseif($postSize == 'large'): ?> grid__item--large<?php endif; ?><?php if ($postVideoPreview): ?> grid__item--video grid__item--play<?php elseif ($image || $thumbPost): ?> grid__item--image<?php endif; ?>"<?php if (!is_single()): ?> itemscope itemtype="http://schema.org/CreativeWork"<?php endif; ?>>

  <a rel="bookmark" class="grid__item-link grid__item-link--enabled" href="<?php the_permalink(); ?>">

    <div class="grid__item-content">
      <h2 itemprop="headline"><?php the_title(); ?></h2>
    </div>

    <?php if ($postVideoPreview): ?>

      <?php if ($image || $thumbPost): ?>
        <div class="grid__item-image">
          <?php if ($image): ?>
            <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
          <?php elseif ($thumbPost): ?>
            <?php the_post_thumbnail(); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="grid__item-video" itemprop="video">
        <video preload="none" loop muted<?php if ($image || $thumbPost): ?> poster="<?php if ($image): ?><?php echo $thumbLarge; ?><?php elseif ($thumbPost): ?><?php echo $thumbLargeDefault[0]; ?><?php endif; ?>"<?php endif; ?>>
          <source src="<?php the_field('work_video_preview'); ?>" type="video/mp4">
        </video>
      </div>

    <?php elseif ($image || $thumbPost): ?>
      
      <div class="grid__item-image">
        <?php if ($image): ?>
          <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
        <?php elseif ($thumbPost): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>
      </div>
      
    <?php endif; ?>

  </a>

</article>
