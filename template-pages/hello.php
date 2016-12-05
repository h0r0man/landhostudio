<?php
/**
 * Template Name: Hello
 */
get_header(); ?>

<?php get_header(); ?>

	<?php while (have_posts()): the_post(); ?>
    
    <div class="content-page">

    	<h2><?php the_title(); ?></h2>
    	
			<?php if(have_rows('hello_testimonial')): ?>
				<div class="testimonials">

					<h3><?php _e('Testimonials', 'horoman'); ?></h3>

					<?php while (have_rows('hello_testimonial')) : the_row(); ?>
					
						<blockquote>
					
							<?php if (get_sub_field('hello_testimonial_quote')): ?>
								<p><?php the_sub_field('hello_testimonial_quote'); ?></p>
							<?php endif; ?>

							<?php if (get_sub_field('hello_testimonial_author')): ?>
								<footer>
									<?php the_sub_field('hello_testimonial_author'); ?>
								</footer>
							<?php endif; ?>

						</blockquote>

					<?php endwhile; ?>

				</div>
			<?php endif; ?>

			<?php if(have_rows('hello_column')): ?>
				<div class="columns">

					<h3><?php _e('Information', 'horoman'); ?></h3>

					<?php while (have_rows('hello_column')) : the_row(); ?>
						<?php if (get_sub_field('hello_column_text')): ?>
							<div class="column<?php if(get_sub_field('hello_column_size') == 'small'): ?> column--small<?php elseif(get_sub_field('hello_column_size') == 'medium'): ?> column--medium<?php endif; ?>">
								<?php the_sub_field('hello_column_text'); ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>

    </div>
    
	<?php endwhile; ?>

<?php get_footer(); ?>
