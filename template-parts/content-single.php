<article class="single" itemscope itemtype="http://schema.org/CreativeWork">

  <?php
    $thumbPost = has_post_thumbnail();
    $thumbLargeDefault = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
  ?>
  
  <?php if ($thumbPost || get_field('work_video_embed')): ?>
    <div class="single__hero">
      <div class="single__hero-container">

        <?php if ($thumbPost && get_field('work_video_embed')): ?>

          <div class="single__hero-play">
            <button><?php esc_html_e('Play', 'horoman'); ?></button>
          </div>
          
          <div class="single__hero-image">
            <img src="<?php echo $thumbLargeDefault[0]; ?>" alt="<?php echo $thumbLargeDefault['alt'] ?>" />
          </div>
          
          <div class="single__hero-iframe">
            <?php the_field('work_video_embed'); ?>
          </div>

        <?php elseif ($thumbPost): ?>
        
          <div class="single__hero-image">
            <img src="<?php echo $thumbLargeDefault[0]; ?>" alt="<?php echo $thumbLargeDefault['alt'] ?>" />
          </div>

        <?php endif; ?>

      </div>
    </div>
  <?php endif; ?>

  <div class="single__content">

    <div class="single__content-header">
      <h2 itemprop="headline"><?php the_title(); ?></h2>
      <?php the_excerpt(); ?>
    </div>

    <div class="single__content-body" itemprop="articleBody">
      <?php if (get_field('work_technical')): ?>
        <p><?php the_field('work_technical'); ?></p>
      <?php endif; ?>
      <p>
        <a href="#more" class="single__content-body-more">
          <span class="stage-1">Read more</span>
          <span class="stage-2">Read less</span>
        </a>
      </p>
    </div>

    <div class="single__content-nav">

      <?php if (get_previous_post_link() || get_next_post_link()): ?>
        <p><?php if (get_previous_post_link()): ?><?php previous_post_link('%link', 'Previous'); ?><?php endif; ?><?php if (get_previous_post_link() && get_next_post_link()): ?> / <?php endif; ?><?php if (get_next_post_link()): ?><?php next_post_link('%link', 'Next'); ?><?php endif; ?></p>
      <?php endif; ?>
      
      <?php if (get_field('work_pages')): ?>
        <p><?php the_field('work_pages'); ?></p>
      <?php else: ?>
        <p><?php esc_html_e('See you next time', 'horoman'); ?></p>
      <?php endif; ?>

    </div>

    <div class="single__content-more" id="more">
  
      <?php if (get_field('work_content_1')): ?>
        <div class="single__content-more-1">
          <?php the_field('work_content_1'); ?>
        </div>
      <?php endif; ?>

      <?php if (get_field('work_content_2')): ?>
        <div class="single__content-more-2">
          <?php the_field('work_content_2'); ?>
        </div>
      <?php endif; ?>

    </div>

  </div>

  <?php if(have_rows('work_gallery')): ?>
    <div class="grid grid--two">

      <div class="grid__items">

        <div class="grid__sizer"></div>
        <div class="grid__gutter"></div>

        <?php while (have_rows('work_gallery')) : the_row(); ?>
        
          <?php
            
            $gallerySize = get_sub_field('work_gallery_size');
            $galleryVideo = get_sub_field('work_gallery_video');
            $galleryVideoAutoplay = get_sub_field('work_gallery_video_autoplay');
            $galleryVideoAudio = get_sub_field('work_gallery_video_audio');

            $image = get_sub_field('work_gallery_image');
            $size = 'large';
            $thumbLarge = $image['sizes'][ $size ];
            
            // without link
            
            // Case 1. content
            // Case 2. image
            // Case 3. video
            
            
            
          ?>

          <div class="grid__item<?php if($gallerySize == 'medium'): ?> grid__item--medium<?php elseif($gallerySize == 'large'): ?> grid__item--large<?php endif; ?><?php if ($image && $galleryVideo): ?> grid__item--video<?php elseif ($image): ?> grid__item--image<?php endif; ?>">

            <div class="grid__item-link">

              <?php if ($image): ?>
                <div class="grid__item-image">
                  <img src="<?php echo $thumbLarge ?>" alt="<?php echo $image['alt'] ?>" />
                </div>
              <?php endif; ?>

              <?php if ($image && $galleryVideo): ?>
                <div class="grid__item-video">
                  <video preload="none" loop<?php if ($galleryVideoAutoplay): ?> autoplay<?php endif; ?><?php if (!$galleryVideoAudio): ?> muted<?php endif; ?> poster="<?php echo $thumbLarge ?>">
                    <source src="<?php the_sub_field('work_gallery_video'); ?>" type="video/mp4">
                  </video>
                </div>
              <?php endif; ?>

            </div>

          </div>
        <?php endwhile; ?>

      </div>

    </div>
  <?php endif; ?>

</article>
