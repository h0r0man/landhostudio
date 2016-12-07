<?php get_header(); ?>

	<main class="index">

    <?php if (get_the_archive_title()): ?>
      <h2 class="hidden"><?php single_cat_title(); ?></h2>
    <?php endif; ?>

		<?php if (have_posts()): ?>

      <div class="grid grid--three">
        <div class="grid__items">

          <div class="grid__sizer"></div>
          <div class="grid__gutter"></div>

    			<?php while (have_posts()): the_post(); ?>
    				<?php get_template_part('template-parts/content', 'preview'); ?>
    			<?php endwhile; ?>

        </div>
      </div>

		<?php else: ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
