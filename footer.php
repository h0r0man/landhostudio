		<footer role="contentinfo" class="footer">
			<p>&copy; 2014 – <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved', 'landhostudio'); ?>. <a href="//www.iubenda.com/privacy-policy/7970188" target="_blank" rel="nofollow"><?php esc_html_e('Privacy Policy', 'landhostudio'); ?></a>.</p>
		</footer>

    <span class="browser"><?php esc_html_e('To improve your experience please upgrade your browser', 'landhostudio'); ?></span>

		<?php wp_footer(); ?>
    <?php if (get_field('options_analytics', option)): ?>
			<script>
				<?php the_field('options_analytics', option); ?>
			</script>
		<?php endif; ?>
	</body>
</html>
