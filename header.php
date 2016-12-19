<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if (is_404()): ?>error-404<?php endif; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <?php wp_head(); ?>
    <?php
      $description = get_bloginfo('description');
      if ($description):
    ?>
      <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    
    <meta name="theme-color" content="#FFF">
    <meta name="google-site-verification" content="<?php the_field('options_google_verification', 'option'); ?>">

    <?php get_template_part('template-parts/social'); ?>
    <?php get_template_part('template-parts/icons'); ?>
  </head>
  <body>

    <header class="header">
      
      <div class="header__item header__item--work">
        <button>
          <span class="state-1"><?php esc_html_e('Work', 'horoman'); ?></span>
          <span class="state-2"><?php esc_html_e('Close', 'horoman'); ?></span>
        </button>
      </div>
      
      <div class="header__item header__item--head">

        <div class="header__item--head-logo">
          <h1>
            <a rel="home" href="<?php echo esc_url(home_url('/')); ?>">
              <span class="hidden"><?php bloginfo('name'); ?></span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 18">
                <title><?php bloginfo('name'); ?></title>
                <g>
                  <path id="r" d="M122.6,0c1.4,0,2.5,1.1,2.4,2.5S123.9,5,122.5,5c-1.4,0-2.5-1.1-2.5-2.5c0-0.7,0.3-1.3,0.7-1.8S121.9,0,122.6,0
                  	L122.6,0z M122.5,0.5c-0.5,0-1,0.2-1.4,0.6c-0.4,0.4-0.6,0.9-0.6,1.4c0,1.1,0.9,1.9,1.9,1.9c1.1,0,1.9-0.9,1.9-1.9
                  	C124.5,1.4,123.6,0.5,122.5,0.5L122.5,0.5z M122.6,1.3c0.5,0,0.9,0.2,0.9,0.7c0,0.3-0.1,0.5-0.4,0.6c0.2,0.1,0.3,0.2,0.3,0.6
                  	c0,0.2,0,0.4,0.1,0.6h-0.6c0-0.2-0.1-0.4-0.1-0.6c0-0.1,0-0.3-0.4-0.3h-0.2v0.9h-0.6V1.3L122.6,1.3z M122.2,1.7v0.7h0.3
                  	c0.1,0,0.4,0,0.4-0.4c0-0.3-0.2-0.3-0.4-0.3H122.2z"/>
                  <path id="O" d="M101,9.2c0-5.7,4.4-9.2,9.1-9.2c5.3,0,9.2,4.2,9.2,9s-3.8,9-9.2,9C104.7,18,101,13.7,101,9.2L101,9.2z M105.4,9
                  	c0,2.6,1.8,5.1,4.8,5.1c3.1,0,4.7-2.9,4.7-5.1s-1.5-5.1-4.7-5.1C107.1,3.9,105.4,6.5,105.4,9L105.4,9z"/>
                  <polygon id="H" points="81.4,17.7 81.4,0.3 85.9,0.3 85.9,6.8 91.5,6.8 91.5,0.3 96,0.3 96,17.7 91.5,17.7 91.5,10.7 85.9,10.7
                  	85.9,17.7 "/>
                  <path id="D" d="M56.2,0.3h5.7c1.9,0,5.4,0,7.7,3.2c1.2,1.7,1.6,3.5,1.6,5.4c0,4.7-2.3,8.7-8.9,8.7h-6.1V0.3z M60.6,13.8h1.9
                  	c3.3,0,4.2-2.3,4.2-4.8c0-1.1-0.3-2.2-0.8-3.2c-0.5-0.8-1.4-1.6-3.4-1.6h-1.9L60.6,13.8z"/>
                  <polygon id="N" points="46.9,10.9 46.9,0.3 51.1,0.3 51.1,17.7 47.2,17.7 40.6,7.2 40.7,17.7 36.5,17.7 36.5,0.3 40.3,0.3 "/>
                  <path id="A" d="M18.9,17.7h-4.8L21,0.3h3.8l6.6,17.3h-4.8l-0.8-2.5h-6.1L18.9,17.7z M22.7,5.6l-1.9,6.1h3.8L22.7,5.6z"/>
                  <polygon id="L" points="0,0.3 4.4,0.3 4.4,13.8 9.6,13.8 9.6,17.7 0,17.7 "/>
                </g>
              </svg>
            </a>
          </h1>
        </div>

        <div class="header__item--head-description">
          <span class="title"></span>
        </div>

      </div>

      <?php
        $about_page = get_field('options_about', option, false, false);
        if ($about_page):
      ?>
        <div class="header__item header__item--hello">
          <a href="<?php the_field('options_about', option); ?>"><?php echo get_the_title($about_page); ?></a>
        </div>
      <?php endif; ?>
      
      <div class="header__item header__item--menu">
        <button>
          <span class="state-1"><?php esc_html_e('Menu', 'horoman'); ?></span>
          <span class="state-2"><?php esc_html_e('Close', 'horoman'); ?></span>
        </button>
      </div>
      
      <nav class="header__menus" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <h2 class="hidden"><?php esc_html_e('Menu', 'horoman'); ?></h2>

        <?php if (get_categories()): ?>
          <div class="categories-page-container">
            <ul id="menu-categories" class="menu">
              <li class="cat-item cat-item-0<?php if (is_home()): ?> current-cat<?php endif; ?>">
                <a rel="home" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('All work', 'horoman'); ?></a>
              </li>
              <?php
                $args = array(
                  'title_li' => '',
                );
                wp_list_categories($args);
              ?>
            </ul>
          </div>
        <?php endif; ?>
        
        <div class="menu-page-container">
          <?php wp_nav_menu(array('theme_location' => 'menu')); ?>
        </div>
      </nav>
      
    </header>
