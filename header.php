<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if (is_404()): ?>error-404<?php endif; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php
      $description = get_bloginfo('description');
      if ($description):
    ?>
      <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    <meta name="pinterest" content="nopin">
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
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 454.8 65.41">
                <title><?php bloginfo('name'); ?></title>
                <g>
                  <path id="r" d="M445.87,0a9,9,0,1,1-9.09,9,9,9,0,0,1,9.09-9Zm-.07,1.81A7.12,7.12,0,0,0,438.74,9a7.05,7.05,0,1,0,14.1,0,7.13,7.13,0,0,0-7-7.23Zm.34,2.85c1.65,0,3.14.68,3.14,2.41a2.13,2.13,0,0,1-1.39,2.07c.62.26,1.14.68,1.23,2a6.8,6.8,0,0,0,.26,2.09h-2.07a12.28,12.28,0,0,1-.28-2c-.06-.48-.18-1.25-1.53-1.25h-.84v3.3h-2.13V4.67Zm-1.49,1.47V8.54h1c.44,0,1.47,0,1.47-1.31,0-1.08-.9-1.1-1.35-1.1Z"/>
                  <path id="O" d="M367.47,33.39C367.47,12.77,383.31,0,400.68,0,420.1,0,434,15.16,434,32.7s-13.8,32.7-33.39,32.7c-19.84,0-33.13-15.76-33.13-31.94Zm16.1-.77c0,9.62,6.56,18.65,17.38,18.65,11.41,0,16.95-10.39,16.95-18.48s-5.54-18.65-17.12-18.65c-11.16,0-17.2,9.54-17.2,18.4Z"/>
                  <path id="H" d="M296.26,64.22v-63h16.1V24.87H333V1.19h16.1v63H333V39H312.36V64.22Z"/>
                  <path id="D" d="M204.29,1.19h20.87c7.07,0,19.67,0,27.85,11.75,4.34,6,5.79,12.69,5.79,19.59,0,17.2-8.52,31.68-32.45,31.68H204.29Zm16.1,48.89h6.9c12,0,15.42-8.35,15.42-17.29a22.21,22.21,0,0,0-3.07-11.67c-1.87-2.81-5.11-5.79-12.26-5.79h-7Z"/>
                  <path id="N" d="M170.81,39.6l-.34-38.41h15.41v63h-14l-24.1-38,.34,38H132.74v-63h13.88Z"/>
                  <path id="A" d="M68.77,64.22H51.31l25-63H90.15l24.19,63H96.71l-3-9.11H71.67ZM82.48,20.36l-6.81,22H89.55Z"/>
                  <path id="L" d="M0,1.19H16.1V50.08H34.75V64.22H0Z"/>
                </g>
              </svg>
            </a>
          </h1>
        </div>

        <div class="header__item--head-description">
          <span class="title"></span>
          <span class="description"></span>
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
      
      <nav class="header__menus">
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
