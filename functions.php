<?php

	if (!function_exists('landhostudio_setup')) {
		function landhostudio_setup() {

      // Let WordPress scale image at 80%  -------------------------------------

      add_filter('jpeg_quality', create_function('', 'return 80;' ));

			// Let WordPress manage the document title -------------------------------
			
      add_theme_support('title-tag');

			// Enable support for Post Thumbnails on posts and pages -----------------
			
      add_theme_support('post-thumbnails');

			// Enables dynamic navigation --------------------------------------------

      register_nav_menus( array(
				'menu' => 'Menu'
			));

      // Enables WordPress HTML5 -----------------------------------------------

      add_theme_support('html5', array(
    		'search-form',
    		'comment-form',
    		'comment-list',
    		'gallery',
    		'caption',
    	));

      // Function to change "posts" to "work" in the admin side menu -----------

      function change_post_menu_label() {
          global $menu;
          global $submenu;
          $menu[5][0] = 'Work';
          $submenu['edit.php'][5][0] = 'Work';
          $submenu['edit.php'][10][0] = 'Aggiungi Work';
          $submenu['edit.php'][16][0] = 'Tags';
          echo '';
      }
      add_action( 'admin_menu', 'change_post_menu_label' );

      // Function to change post object labels ---------------------------------

      function change_post_object_label() {
          global $wp_post_types;
          $labels = &$wp_post_types['post']->labels;
          $labels->name = 'Work';
          $labels->singular_name = 'Work';
          $labels->add_new = 'Aggiungi Work';
          $labels->add_new_item = 'Aggiungi Work';
          $labels->edit_item = 'Modifica Work';
          $labels->new_item = 'Work';
          $labels->view_item = 'Apri Work';
          $labels->search_items = 'Cerca Work';
          $labels->not_found = 'Non ci sono';
          $labels->not_found_in_trash = 'Non ce un cazzo…';
      }
      add_action( 'init', 'change_post_object_label' );
      
			// Load the assets -------------------------------------------------------
			
			function init_assets() {
				wp_enqueue_style( $handle, $src, $deps, $ver, $media );
        wp_enqueue_style('all-css', get_template_directory_uri() . '/dist/css/all.css', true, '2.3', false);

        wp_register_script('all-top-js', get_template_directory_uri() . '/dist/js/all-top.js', array(), '2.2', false);
        wp_enqueue_script('all-top-js');
        
        wp_register_script('all-bottom-js', get_template_directory_uri() . '/dist/js/all-bottom.js', array(), '2.2', true);
        wp_enqueue_script('all-bottom-js');

			}
			add_action('wp_enqueue_scripts', 'init_assets');

      // Async load ------------------------------------------------------------
      
      function my_async_scripts( $tag, $handle, $src ) {

        // the handles of the enqueued scripts we want to async
        $async_scripts = array('all-top-js');

        if (in_array($handle, $async_scripts)) {
          return '<script src="' . $src . '" async></script>' . "\n";
        }

        return $tag;

      }
      add_filter('script_loader_tag', 'my_async_scripts', 10, 3);

      // Soil ------------------------------------------------------------------
      
      add_theme_support('soil-clean-up');
      add_theme_support('soil-disable-trackbacks');
      add_theme_support('soil-nav-walker');
      add_theme_support('soil-relative-urls');
      
			// Social ----------------------------------------------------------------

      get_template_part('inc/social');

      // SVG upload ------------------------------------------------------------

      function svg_upload($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
      }
      add_filter('upload_mimes', 'svg_upload');

      // Content width ---------------------------------------------------------

      if ( ! isset( $content_width ) ) $content_width = 640;

      // Shortcode for [newsletter] --------------------------------------------
      
      function newsletter_shortcode() {
        ob_start();
        get_template_part('inc/newsletter');
        return ob_get_clean();
      }
      add_shortcode('newsletter', 'newsletter_shortcode');
      
			// ACF options -----------------------------------------------------------
			
			get_template_part('inc/acf');

      // Comments and trackbacks -----------------------------------------------

      get_template_part('inc/comments');

    }
  }
  add_action( 'after_setup_theme', 'landhostudio_setup' );
