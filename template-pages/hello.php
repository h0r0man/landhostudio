<?php
/**
 * Template Name: Hello
 */
get_header(); ?>

<?php get_header(); ?>

	<?php while (have_posts()): the_post(); ?>
    
		<?php
		
			// 1. le quotes vanno sullo stesso slider di homepage
			// 2. l’immagine non è obbligatoria?
		
		?>
		
		<article class="page page--hello" itemscope itemtype="http://schema.org/CreativeWork">

			<h2 class="hidden"><?php the_title(); ?></h2>
			
      <?php if (have_rows('hello_testimonial')): ?>

				<section class="testimonials">

					<h3 class="hidden"><?php _e('Testimonials', 'horoman'); ?></h3>

          <div class="testimonials__slides">

					  <?php while (have_rows('hello_testimonial')) : the_row(); ?>

              <?php
                $quote = get_sub_field('hello_testimonial_quote');
                $image = get_sub_field('hello_testimonial_image');
                $size = 'large';
                $thumbLarge = $image['sizes'][ $size ];
              ?>

  						<div class="testimonials__slide<?php if ($image): ?> testimonials__slide--image<?php endif; ?>">

  							<?php if ($quote): ?>
                  <div class="testimonials__slide-content">
                    <p class="testimonials__slide-content-title"><?php the_sub_field('hello_testimonial_quote'); ?></p>
                    <?php the_sub_field('hello_testimonial_author'); ?>
                  </div>
  							<?php endif; ?>

                <?php if ($image): ?>
                  <div class="testimonials__slide-image">
                    <img src="<?php echo $thumbLarge ?>" alt="<?php echo $thumbLarge['alt'] ?>" />
                  </div>
                <?php endif; ?>

  						</div>

            <?php endwhile; ?>

          </div>

				</section>

			<?php endif; ?>
			
      <?php if(have_rows('page_columns')): ?>

        <div class="page__columns">

          <?php while (have_rows('page_columns')) : the_row(); ?>
            <?php if (get_sub_field('page_column')): ?>
              <div class="page__column">
                <?php the_sub_field('page_column'); ?>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>

        </div>

      <?php endif; ?>
      
		</article>
    
	<?php endwhile; ?>

<?php get_footer(); ?>
