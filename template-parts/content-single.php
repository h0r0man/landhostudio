<article class="single" itemscope itemtype="http://schema.org/CreativeWork">

  <?php
    $thumbPost = has_post_thumbnail();
    $thumbLargeDefault = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
    $imagePost = get_field('work_image_preview');
  ?>

  <?php if ($thumbPost || $imagePost): ?>
    <div class="single__hero">
      <div class="single__hero-container">

        <?php if (($thumbPost && get_field('work_video_embed')) || ($imagePost && get_field('work_video_embed'))): ?>

          <div class="single__hero-play">
            <button><?php esc_html_e('Play', 'horoman'); ?></button>
          </div>
          
          <div class="single__hero-image">
            <?php if ($thumbPost): ?>
              <?php the_post_thumbnail(); ?>
            <?php elseif ($imagePost): ?>
              <?php echo wp_get_attachment_image( $imagePost, 'large', false, array() ); ?>
            <?php endif; ?>
          </div>
          
          <div class="single__hero-iframe">
            <?php the_field('work_video_embed'); ?>
          </div>

        <?php elseif ($thumbPost || $imagePost): ?>
        
          <div class="single__hero-image">
            <?php if ($thumbPost): ?>
              <?php the_post_thumbnail(); ?>
            <?php elseif ($imagePost): ?>
              <?php echo wp_get_attachment_image( $imagePost, 'large', false, array() ); ?>
            <?php endif; ?>
          </div>

        <?php endif; ?>

      </div>
    </div>
  <?php endif; ?>

  <span class="header__breakpoint"></span>

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
    <div class="grid-2 grid-2--two">

      <div class="grid-2__items">

        <div class="grid-2__sizer"></div>
        <div class="grid-2__gutter"></div>

        <?php while (have_rows('work_gallery')) : the_row(); ?>
        
          <?php
            
            $gallerySize          = get_sub_field('work_gallery_size');
            $galleryVideo         = get_sub_field('work_gallery_video');
            $galleryVideoAutoplay = get_sub_field('work_gallery_video_autoplay');
            $galleryVideoAudio    = get_sub_field('work_gallery_video_audio');
            $galleryFrame         = get_sub_field('work_gallery_frame');

            $image                = get_sub_field('work_gallery_image');
            $size                 = 'large';
            $thumbLarge           = $image['sizes'][ $size ];
            $thumbLargeSingle     = wp_get_attachment_image_src($image, $size);

          ?>

          <div class="grid-2__item grid-2__item--single<?php if ($galleryFrame): ?> grid-2__item--frame<?php endif; ?><?php if($gallerySize == 'medium'): ?> grid-2__item--medium<?php elseif($gallerySize == 'large'): ?> grid-2__item--large<?php endif; ?><?php if ($image && $galleryVideo): ?> grid-2__item--video<?php if (!$galleryVideoAutoplay): ?> grid-2__item--play<?php endif; ?><?php elseif ($image): ?> grid-2__item--image<?php endif; ?><?php if ($galleryVideoAutoplay): ?> grid-2__item--autoplay<?php endif; ?>">

            <div class="grid-2__item-link">

              <?php if ($image): ?>
                <div class="grid-2__item-image">
                  <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
                </div>
              <?php endif; ?>

              <?php if ($image && $galleryVideo): ?>
                <div class="grid-2__item-video">
                  <video preload="auto" loop<?php if ($galleryVideoAutoplay): ?> autoplay<?php endif; ?><?php if (!$galleryVideoAudio): ?> muted<?php endif; ?> poster="<?php echo $thumbLargeSingle[0]; ?>">
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
