<?php get_header(); ?>

	<main class="home">

    <?php if (have_rows('options_carousel', option)): ?>
      <section class="featured">

        <h2 class="hidden"><?php esc_html_e('Featured', 'horoman'); ?></h2>
        
        <div class="featured__slides">

          <?php while (have_rows('options_carousel', option)) : the_row(); ?>
            
            <?php
              $image = get_sub_field('options_carousel_image', option);
              $size = 'large';
              $thumbLarge = $image['sizes'][ $size ];
            ?>
            
            <article class="featured__slide<?php if (get_sub_field('options_carousel_video', option) && $image): ?> featured__slide--video<?php endif; ?>">

              <div class="featured__slide-content">
                <?php if (get_sub_field('options_carousel_title', option) && get_sub_field('options_carousel_link', option)): ?>
                  <h2 class="featured__slide-content__title">
                    <a href="<?php the_sub_field('options_carousel_link', option); ?>"><?php the_sub_field('options_carousel_title', option); ?></a>
                  </h2>
                <?php elseif (get_sub_field('options_carousel_title', option)): ?>
                  <h2 class="featured__slide-content__title"><?php the_sub_field('options_carousel_title', option); ?></h2>
                <?php endif; ?>
              </div>
            
              <?php if (get_sub_field('options_carousel_video', option) && $image): ?>

                <div class="featured__slide-image">
                  <img src="<?php echo $thumbLarge ?>" alt="<?php echo $thumbLarge['alt'] ?>" />
                </div>

                <div class="featured__slide-video">
                  <video preload="none" loop muted<?php if ($image): ?> poster="<?php echo $thumbLarge; ?>"<?php endif; ?>>
                    <source src="<?php the_sub_field('options_carousel_video', option); ?>" type="video/mp4">
                  </video>
                </div>

              <?php elseif ($image): ?>

                <div class="featured__slide-image">
                  <img src="<?php echo $thumbLarge; ?>" alt="<?php echo $thumbLarge['alt'] ?>" />
                </div>

              <?php endif; ?>

            </article>

          <?php endwhile; ?>

        </div>

      </section>
    <?php endif; ?>

    <section class="grid row">

      <h2 class="hidden"><?php esc_html_e('Work', 'horoman'); ?></h2>
        
      <?php if (have_posts()): ?>

        <div class="grid__items">

          <div class="grid__sizer"></div>
          <div class="grid__gutter"></div>

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
