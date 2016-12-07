<article class="single">

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
      <h2><?php the_title(); ?></h2>
      <?php the_excerpt(); ?>
    </div>

    <div class="single__content-body">
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
        <p><?php if (get_next_post_link()): ?><?php next_post_link('%link', 'Next'); ?><?php endif; ?><?php if (get_previous_post_link() && get_next_post_link()): ?> / <?php endif; ?><?php if (get_previous_post_link()): ?><?php previous_post_link('%link', 'Previous'); ?><?php endif; ?></p>
      <?php endif; ?>
      
      <?php if (get_field('work_pages')): ?>
        <p><?php the_field('work_pages'); ?></p>
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
    <div class="gallery">

      <?php while (have_rows('work_gallery')) : the_row(); ?>
      
      
        <div class="item<?php if(get_sub_field('work_gallery_size') == 'medium'): ?> column--medium<?php elseif(get_sub_field('work_gallery_size') == 'large'): ?> column--large<?php endif; ?>">

          <?php
            $image = get_sub_field('work_gallery_image');
            $size = 'large';
            $thumbLarge = $image['sizes'][ $size ];
            if ($image):
          ?>
            <div class="image">
              <img src="<?php echo $thumbLarge ?>" alt="<?php echo $image['alt'] ?>" />
            </div>
          <?php endif; ?>

          <?php if ($image && get_sub_field('work_gallery_video')): ?>
            <div class="video">
              <video preload="none" loop<?php if (get_sub_field('work_gallery_video_autoplay')): ?> autoplay<?php endif; ?><?php if (!get_sub_field('work_gallery_video_audio')): ?> muted<?php endif; ?> poster="<?php echo $thumbLarge ?>">
                <source src="<?php the_sub_field('work_gallery_video'); ?>" type="video/mp4">
              </video>
            </div>
          <?php endif; ?>

        </div>
      <?php endwhile; ?>

    </div>
  <?php endif; ?>

</article>
