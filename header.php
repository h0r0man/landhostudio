<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
            <a rel="home" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          </h1>
        </div>

        <div class="header__item--head-description">
          <h2><?php echo get_bloginfo('description'); ?></h2>
          <span></span>
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
