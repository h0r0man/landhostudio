<!-- Facebook -->
<meta property="og:title" content="<?php wp_title('–', true, 'right'); ?><?php bloginfo('name'); ?>">
<meta property="og:type" content="<?php og_type(); ?>">
<?php if (!is_home()): ?>
<meta property="og:image" content="<?php og_image(); ?>">
<?php endif; ?>
<meta property="og:description" content="<?php social_description(); ?>">
<meta property="og:url" content="<?php og_url(); ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="fb:app_id" content="<?php the_field('options_facebook_app', 'option'); ?>">

<!-- Twitter -->
<meta name="twitter:title" content="<?php wp_title('–', true, 'right'); ?><?php bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php social_description(); ?>">
<meta name="twitter:image" content="<?php og_image(); ?>">
<meta name="twitter:card" content="<?php twitter_card(); ?>">

<!-- Pinterest -->
<meta name="pinterest" content="nopin">
