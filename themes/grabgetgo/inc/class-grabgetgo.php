<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if (!class_exists('Grabgetgo')):
	
	class Grabgetgo {

		public function __construct() {

			add_action( 'after_setup_theme',  array( $this, 'setup' ) );
			add_action( 'widgets_init', 			array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			
			add_filter( 'wp_nav_menu', array( $this, 'grabgetgo_add_menuclass' ) );
		}

		public function setup() {
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable support for site logo
			add_theme_support( 'custom-logo', apply_filters( 'grabgetgo_custom_logo_args', array(
				'height'      => 110,
				'width'       => 470,
				'flex-width'  => true,
			) ) );

			// Declare WooCommerce support.
			add_theme_support( 'woocommerce', apply_filters( 'grabgetgo_woocommerce_args', array(
				'single_image_width'    => 416,
				'thumbnail_image_width' => 324,
				'product_grid'          => array(
					'default_columns' => 3,
					'default_rows'    => 4,
					'min_columns'     => 1,
					'max_columns'     => 6,
					'min_rows'        => 1
				)
			) ) );

			// Add PhotoSwiper Support
			add_theme_support( 'wc-product-gallery-lightbox' );
		}


		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'          => __( 'Sidebar', 'grabgetgo' ),
				'id'            => 'sidebar-1',
				'description'   => 'The is sidebar to show on post and pages'
			);

			$rows    = intval( apply_filters( 'grabgetgo_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'grabgetgo_footer_widget_columns', 5 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 == $rows ) {
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'grabgetgo' ), $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'grabgetgo' ), $region );
					} else {
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'grabgetgo' ), $row, $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'grabgetgo' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			$sidebar_args = apply_filters( 'grabgetgo_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="s-text12 p-b-30">',
					'after_title'   => '</h4>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'grabgetgo_header_widget_tags'
				 * 'grabgetgo_sidebar_widget_tags'
				 *
				 * 'grabgetgo_footer_1_widget_tags'
				 * 'grabgetgo_footer_2_widget_tags'
				 * 'grabgetgo_footer_3_widget_tags'
				 * 'grabgetgo_footer_4_widget_tags'
				 * 'grabgetgo_footer_5_widget_tags'
				 */
				$filter_hook = sprintf( 'grabgetgo_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		// enqueue style - script
		public function scripts() {
			global $grabgetgo_version;

			// Styles
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '4.1.1' );
			// FONT AND ICONS
			wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css', array(), '4.7.0' );

			// ANIMATION
			wp_enqueue_style( 'animsition', get_template_directory_uri() . '/vendor/animsition/css/animsition.min.css', array(), '4.0.2' );

			// LOAD OUR MAIN STYLESHEET.
			wp_enqueue_style( 'Swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '4.2.6' );
			wp_enqueue_style( 'Main', get_template_directory_uri() . '/css/main.css', array(), '1.0' );
			wp_enqueue_style( 'grabgetgo-style', get_template_directory_uri() . '/style.css', '', $grabgetgo_version );
			wp_style_add_data( 'grabgetgo-style', 'rtl', 'replace' );


			// Scripts
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'animsition', get_template_directory_uri() . '/vendor/animsition/js/animsition.min.js', array(), '1.0', true );
			wp_enqueue_script( 'popperJs', get_template_directory_uri() . '/vendor/bootstrap/js/popper.js', array(), '1.0', true );
			wp_enqueue_script( 'bootstrapJs', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array(), '1.0', true );
			wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );
			wp_enqueue_script( 'typeaheadjs', get_template_directory_uri() . '/js/typeahead.min.js', array(), '0.11.1', true );
			wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/swiper.min.js', array(), '4.2.6', true );
			wp_enqueue_script( 'scriptjs', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );
			wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );


			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		// add class to anchor tag
		public function grabgetgo_add_menuclass($ulclass) {
			return preg_replace('/<a/', '<a class="nav-link d-none d-sm-block"', $ulclass, -1);
		}

	}

endif;

return new Grabgetgo();

