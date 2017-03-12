<?php
/**
 * Vbt Functions
 *
 * @package vbt
 */
if (! function_exists('vbt_setup')):
	/** 
	 * Tells WordPress to run vbt_setup() when the 'after_setup_theme' hook runs.
	 */
	function vbt_setup()
	{
	
		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain('vbt', TEMPLATEPATH . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		add_theme_support('title-tag');

		// Switch default core markup for search form, comment form, and comments
		// to output valid HTML5.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			));

		// Enable support for Post Formats.
		// See http://codex.wordpress.org/Post_Formats
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			));

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');

		// Enable suppor for custom Logo
		add_theme_support('custom-logo', array(
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description')
			));
	
		// Register Menus
		register_nav_menus(
			array(
				'primary' => __('Primary Nav')
				));
	}
endif;
add_action( 'after_setup_theme', 'vbt_setup' );

if (!function_exists('vbt_widgets_init')):
	/**
	 * Register Widget Area
	 */
	function vbt_widgets_init()
	{
		register_sidebar( array(
			'name' => __('Main Sidebar', 'vbt'),
			'id' => 'main-sidebar',
			'description' => __( 'The sidebar', 'vbt' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));

	}
endif;
?>