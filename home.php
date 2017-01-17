<?php get_header(); ?>

	<main class="home">

    <?php if (have_rows('options_carousel', option)): ?>
      <section class="featured">

        <h2 class="hidden"><?php esc_html_e('Featured', 'horoman'); ?></h2>
        
        <div class="featured__slides">

          <?php while (have_rows('options_carousel', option)) : the_row(); ?>
            
            <?php
              $image            = get_sub_field('options_carousel_image', option);
              $size             = 'large';
              $thumbLarge       = $image['sizes'][ $size ];
              $thumbLargeSingle = wp_get_attachment_image_src($image, $size);
            ?>
            
						<?php if ($image): ?>
            	<article class="featured__slide<?php if (get_sub_field('options_carousel_video', option) && $image): ?> featured__slide--video<?php endif; ?>" itemscope itemtype="http://schema.org/CreativeWork">

								<?php if (get_sub_field('options_carousel_link', option)): ?>
									<a href="<?php the_sub_field('options_carousel_link', option); ?>">
								<?php endif; ?>

		              <?php if (get_sub_field('options_carousel_title', option)): ?>
		                <div class="featured__slide-content">
		                  <h2 class="featured__slide-content__title"><?php the_sub_field('options_carousel_title', option); ?></h2>
		                </div>
		              <?php endif; ?>
		            
		              <?php if (get_sub_field('options_carousel_video', option) && $image): ?>
		                <div class="featured__slide-image">
		                  <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
		                </div>

		                <div class="featured__slide-video">
		                  <video preload="auto" loop muted<?php if ($image): ?> poster="<?php echo $thumbLargeSingle[0]; ?>"<?php endif; ?>>
		                    <source src="<?php the_sub_field('options_carousel_video', option); ?>" type="video/mp4">
		                  </video>
		                </div>
		              <?php elseif ($image): ?>
		                <div class="featured__slide-image">
		                  <?php echo wp_get_attachment_image( $image, 'large', false, array() ); ?>
		                </div>
		              <?php endif; ?>

								<?php if (get_sub_field('options_carousel_link', option)): ?>
									</a>
								<?php endif; ?>
            </article>
						<?php endif; ?>

          <?php endwhile; ?>

        </div>

      </section>
    <?php endif; ?>

    <section class="grid grid--three">

      <h2 class="hidden"><?php esc_html_e('Work', 'horoman'); ?></h2>
        
      <?php if (have_posts()): ?>

        <div class="grid__items">

          <div class="grid__sizer"></div>

    			<?php while (have_posts()): the_post(); ?>
    				<?php get_template_part('template-parts/content', 'preview'); ?>
    			<?php endwhile; ?>

        </div>

  		<?php else: ?>

  			<?php get_template_part('template-parts/content', 'none'); ?>

  		<?php endif; ?>

    </section>

  </main>

<?php get_footer(); ?>
