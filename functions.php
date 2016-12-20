<?php

	if (!function_exists('landhostudio_setup')) {
		function landhostudio_setup() {

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
        wp_enqueue_style('all-css', get_template_directory_uri() . '/dist/css/all.css', true, true);

        wp_register_script('all-top-js', get_template_directory_uri() . '/dist/js/all-top.js', array(), '', true);
        wp_enqueue_script('all-top-js');
        
        wp_register_script('all-bottom-js', get_template_directory_uri() . '/dist/js/all-bottom.js', array(), '', true);
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
      add_theme_support('soil-disable-asset-versioning');
      add_theme_support('soil-disable-trackbacks');
      add_theme_support('soil-nav-walker');
      add_theme_support('soil-relative-urls');
      
			// Social ----------------------------------------------------------------

			function social_description() {
				if (is_home() || is_page() || is_search()) {
					bloginfo('description');
				} else {
					while (have_posts()) {
						the_post();
						the_excerpt_rss();
					}
				}
			}

			function og_type() {
				if (is_home() || is_page() || is_search()) {
					echo "company";
				} else {
					echo "article";
				}
			}

			function og_url() {
				if (is_home()) {
					echo site_url();
				} else {
					echo get_permalink($post->ID);
				}
			}

			function og_image() {
				if (is_home() || is_page()) {
					echo site_url();
					the_field('options_image', 'option');
				} else {
					if (has_post_thumbnail()) {
            echo site_url();
						$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
						echo $url;
					} else {
						echo site_url();
						the_field('options_image', 'option');
					}
				}
			}

			function twitter_card() {
				if (is_home() || is_page() || is_search()) {
					echo "summary";
				} else {
					echo "summary_large_image";
				}
			}

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
        get_template_part('template-parts/newsletter');
        return ob_get_clean();
      }
      add_shortcode('newsletter', 'newsletter_shortcode');
      
			// ACF options -----------------------------------------------------------
			
			if (function_exists('acf_add_options_page')) {
				acf_add_options_page();
			}
			
			if (function_exists('acf_add_local_field_group')) {

				acf_add_local_field_group(array (
					'key' => 'group_58494ffd12135',
					'title' => 'Page',
					'fields' => array (
						array (
							'sub_fields' => array (
								array (
									'tabs' => 'all',
									'toolbar' => 'full',
									'media_upload' => 1,
									'default_value' => '',
									'delay' => 0,
									'key' => 'field_5849501f61b3b',
									'label' => 'Colonna',
									'name' => 'page_column',
									'type' => 'wysiwyg',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
							),
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Aggiungi colonna',
							'collapsed' => '',
							'key' => 'field_5849500961b3a',
							'label' => 'Colonne',
							'name' => 'page_columns',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'page',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => array (
						0 => 'the_content',
					),
					'active' => 1,
					'description' => '',
				));

				acf_add_local_field_group(array (
					'key' => 'group_5840634ca5460',
					'title' => 'Opzioni',
					'fields' => array (
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_58446876e8079',
							'label' => 'Header',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'post_type' => array (
								0 => 'page',
							),
							'taxonomy' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'allow_archives' => 0,
							'key' => 'field_584467e7e8078',
							'label' => 'Chi siamo',
							'name' => 'options_about',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_5844688fe807a',
							'label' => 'Homepage',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'sub_fields' => array (
								array (
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => 'jpg,jpeg,png,gif',
									'key' => 'field_5840661e3c17d',
									'label' => 'Immagine',
									'name' => 'options_carousel_image',
									'type' => 'image',
									'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '25',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'return_format' => 'url',
									'library' => 'all',
									'min_size' => '',
									'max_size' => '',
									'mime_types' => 'mp4',
									'key' => 'field_584066733c17e',
									'label' => 'Video',
									'name' => 'options_carousel_video',
									'type' => 'file',
									'instructions' => 'Verrà riprodotto automaticamente per una durata di ~ 6 secondi.<br>Video codec supportato: `H.264/MPEG-4 AVC` con estensione file obbligatoria `.mp4` e rapporto del video 16:9',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '25',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'default_value' => '',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'key' => 'field_584067203c180',
									'label' => 'Titolo',
									'name' => 'options_carousel_title',
									'type' => 'text',
									'instructions' => 'Caso 1: Titolo solamente<br>Caso 2: Titolo insieme al link',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '25',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'default_value' => '',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'key' => 'field_584066cf3c17f',
									'label' => 'Link',
									'name' => 'options_carousel_link',
									'type' => 'text',
									'instructions' => 'Caso 1: Link relazionale ad esempio: `/work/keyline/`<br>Caso 2: Link intero ad esempio: `https://nomesito.com/ciao/`',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '25',
										'class' => '',
										'id' => '',
									),
								),
							),
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Aggiungi Slide',
							'collapsed' => '',
							'key' => 'field_5840635f3c179',
							'label' => 'Carosello',
							'name' => 'options_carousel',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_5849d6c9ea44a',
							'label' => '404',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'new_lines' => 'br',
							'maxlength' => '',
							'placeholder' => '',
							'rows' => 2,
							'key' => 'field_5849d68fea449',
							'label' => 'Titolo',
							'name' => 'options_404_title',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'return_format' => 'array',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => 'jpg,jpeg,png,gif',
							'key' => 'field_5849d6e6ea44b',
							'label' => 'Immagine',
							'name' => 'options_404_image',
							'type' => 'image',
							'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_584e9a1ef477b',
							'label' => 'Statistiche',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'new_lines' => '',
							'maxlength' => '',
							'placeholder' => '',
							'rows' => 4,
							'key' => 'field_584e9a6ff477c',
							'label' => 'Statistiche',
							'name' => 'options_analytics',
							'type' => 'textarea',
							'instructions' => 'Inserire il codice JavaScript generato dal servizio di statistiche',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'key' => 'field_584ea49c6893a',
							'label' => 'Verifica la proprietà del sito',
							'name' => 'options_google_verification',
							'type' => 'text',
							'instructions' => 'Inserire il numero generato da Google Site Verification',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_584ea576909ed',
							'label' => 'Social',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'return_format' => 'url',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => 'jpg, jpeg, png, gif',
							'key' => 'field_584ea57f909ee',
							'label' => 'Immagine',
							'name' => 'options_image',
							'type' => 'image',
							'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '33.333333',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'key' => 'field_584ea9cfcf7b3',
							'label' => 'Facebook App ID',
							'name' => 'options_facebook_app',
							'type' => 'text',
							'instructions' => 'Inserire il testo generato.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '33.333333',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'placement' => 'top',
							'endpoint' => 0,
							'key' => 'field_5853e05cf6e62',
							'label' => 'Newsletter',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'key' => 'field_5853e06cf6e63',
							'label' => 'MailChimp ID',
							'name' => 'options_mailchimp_id',
							'type' => 'text',
							'instructions' => 'Inserire il codice di MailChimp List ID',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'options_page',
								'operator' => '==',
								'value' => 'acf-options',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
					'active' => 1,
					'description' => '',
				));

				acf_add_local_field_group(array (
					'key' => 'group_583f0ea02dd8c',
					'title' => 'Hello',
					'fields' => array (
						array (
							'sub_fields' => array (
								array (
									'default_value' => '',
									'maxlength' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'key' => 'field_583f0ef1ee6ab',
									'label' => 'Citazione',
									'name' => 'hello_testimonial_quote',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'tabs' => 'all',
									'toolbar' => 'basic',
									'media_upload' => 0,
									'default_value' => '',
									'delay' => 0,
									'key' => 'field_583f0f36ee6ac',
									'label' => 'Autore',
									'name' => 'hello_testimonial_author',
									'type' => 'wysiwyg',
									'instructions' => '[Nome Autore] – [Ruolo] di [Nome Azienda]',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '50',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => 'jpg, jpeg, png, gif',
									'key' => 'field_58484c20c88f5',
									'label' => 'Immagine',
									'name' => 'hello_testimonial_image',
									'type' => 'image',
									'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '50',
										'class' => '',
										'id' => '',
									),
								),
							),
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Aggiungi testimone',
							'collapsed' => 'field_583f0ef1ee6ab',
							'key' => 'field_583f0ea9ee6aa',
							'label' => 'Testimoni',
							'name' => 'hello_testimonial',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'page_template',
								'operator' => '==',
								'value' => 'template-pages/hello.php',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => array (
						0 => 'the_content',
					),
					'active' => 1,
					'description' => '',
				));

				acf_add_local_field_group(array (
					'key' => 'group_583f0833e83b3',
					'title' => 'Work',
					'fields' => array (
						array (
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'key' => 'field_584009a50f23f',
							'label' => 'Informazioni tecniche',
							'name' => 'work_technical',
							'type' => 'text',
							'instructions' => 'Esempio: `HD Video/ 118’ / 2015`',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'tabs' => 'all',
							'toolbar' => 'basic',
							'media_upload' => 0,
							'default_value' => '',
							'delay' => 0,
							'key' => 'field_583f0bc225a1e',
							'label' => 'Contenuto 1',
							'name' => 'work_content_1',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'tabs' => 'all',
							'toolbar' => 'basic',
							'media_upload' => 0,
							'default_value' => '',
							'delay' => 0,
							'key' => 'field_583f0c17c4614',
							'label' => 'Contenuto 2',
							'name' => 'work_content_2',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'return_format' => 'url',
							'library' => 'all',
							'min_size' => '',
							'max_size' => '',
							'mime_types' => 'mp4',
							'key' => 'field_583f08affc4a8',
							'label' => 'Anteprima: Video',
							'name' => 'work_video_preview',
							'type' => 'file',
							'instructions' => 'Video codec supportato: `H.264/MPEG-4 AVC` con estensione file obbligatoria `.mp4` e rapporto del video 16:9',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '33',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'return_format' => 'id',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => 'jpg,jpeg,png,gif',
							'key' => 'field_583f099f9ca00',
							'label' => 'Anteprima: Immagine',
							'name' => 'work_image_preview',
							'type' => 'image',
							'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '33',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'multiple' => 0,
							'allow_null' => 0,
							'choices' => array (
								'small' => 'Small',
								'medium' => 'Medium',
								'large' => 'Large',
							),
							'default_value' => array (
								0 => 'small',
							),
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'return_format' => 'value',
							'key' => 'field_583f083a51d3d',
							'label' => 'Dimensione',
							'name' => 'work_size',
							'type' => 'select',
							'instructions' => 'Dimensione delle anteprime dei lavori',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '33',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'width' => '',
							'height' => '',
							'key' => 'field_583f08e7fc4a9',
							'label' => 'Video Embed',
							'name' => 'work_video_embed',
							'type' => 'oembed',
							'instructions' => 'Copiare un link diretto al video, esempio: `https://vimeo.com/51860800`',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'key' => 'field_583f0ce8d0339',
							'label' => 'Paginazione',
							'name' => 'work_pages',
							'type' => 'text',
							'instructions' => 'Se assente verrà visualizzato “See you next time”',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
						array (
							'sub_fields' => array (
								array (
									'return_format' => 'id',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => 'jpg,jpeg,png,gif',
									'key' => 'field_58400baf8e7c3',
									'label' => 'Immagine',
									'name' => 'work_gallery_image',
									'type' => 'image',
									'instructions' => 'Estensioni del file supportati: `jpg, jpeg, png, gif` di cui rapporto a 16:9',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'return_format' => 'url',
									'library' => 'all',
									'min_size' => '',
									'max_size' => '',
									'mime_types' => 'mp4',
									'key' => 'field_58400bd98e7c4',
									'label' => 'Video',
									'name' => 'work_gallery_video',
									'type' => 'file',
									'instructions' => 'Video codec supportato: `H.264/MPEG-4 AVC` con estensione file obbligatoria `.mp4` e rapporto del video 16:9',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'default_value' => 0,
									'message' => 'Si',
									'ui' => 0,
									'ui_on_text' => '',
									'ui_off_text' => '',
									'key' => 'field_58400c768e7c5',
									'label' => 'Audio',
									'name' => 'work_gallery_video_audio',
									'type' => 'true_false',
									'instructions' => 'Riprodurre l’audio del video?',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'default_value' => 0,
									'message' => 'Si',
									'ui' => 0,
									'ui_on_text' => '',
									'ui_off_text' => '',
									'key' => 'field_58400cf2ec503',
									'label' => 'Autoplay',
									'name' => 'work_gallery_video_autoplay',
									'type' => 'true_false',
									'instructions' => 'Riprodurre automaticamente il video?',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'multiple' => 0,
									'allow_null' => 0,
									'choices' => array (
										'medium' => 'Medio',
										'large' => 'Grande',
									),
									'default_value' => array (
										0 => 'large',
									),
									'ui' => 0,
									'ajax' => 0,
									'placeholder' => '',
									'return_format' => 'value',
									'key' => 'field_58400aa08e7c2',
									'label' => 'Dimensione',
									'name' => 'work_gallery_size',
									'type' => 'select',
									'instructions' => 'Dimensione dell’elemento: `foto/video`',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
								array (
									'default_value' => 0,
									'message' => 'Inserire la cornice del browser',
									'ui' => 0,
									'ui_on_text' => '',
									'ui_off_text' => '',
									'key' => 'field_58542723c3e93',
									'label' => 'Cornice',
									'name' => 'work_gallery_frame',
									'type' => 'true_false',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
								),
							),
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'collapsed' => '',
							'key' => 'field_58400a648f4a8',
							'label' => 'Galleria',
							'name' => 'work_gallery',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'post',
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => array (
						0 => 'the_content',
					),
					'active' => 1,
					'description' => '',
				));

      }

      // Disable support for comments and trackbacks in post types -------------

      function disable_comments_post_types_support() {
        $post_types = get_post_types();

        foreach ($post_types as $post_type) {
          if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
          }
        }
      }
      add_action('admin_init', 'disable_comments_post_types_support');

      // Close comments on the front-end ---------------------------------------

      function disable_comments_status() {
         return false;
      }
      add_filter('comments_open', 'disable_comments_status', 20, 2);
      add_filter('pings_open', 'disable_comments_status', 20, 2);

      // Hide existing comments ------------------------------------------------

      function disable_comments_hide_existing_comments($comments) {
        $comments = array();
        return $comments;
      }
      add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

      // Remove comments page in menu ------------------------------------------

      function disable_comments_admin_menu() {
        remove_menu_page('edit-comments.php');
      }
      add_action('admin_menu', 'disable_comments_admin_menu');

      // Redirect any user trying to access comments page ----------------------

      function disable_comments_admin_menu_redirect() {
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
          wp_redirect(admin_url()); exit;
        }
      }
      add_action('admin_init', 'disable_comments_admin_menu_redirect');

      // Remove comments metabox from dashboard --------------------------------

      function disable_comments_dashboard() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
      }
      add_action('admin_init', 'disable_comments_dashboard');

      // Remove comments links from admin bar ----------------------------------

      function disable_comments_admin_bar() {
        if (is_admin_bar_showing()) {
          remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
      }
      add_action('init', 'disable_comments_admin_bar');

    }
  }
  add_action( 'after_setup_theme', 'landhostudio_setup' );
