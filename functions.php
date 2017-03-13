<?php
/**
 * Vbt Functions
 * Funciones y utilidades
 *
 * @package vbt
 */
if (! function_exists('vbt_setup')):
	/** 
	 * Tells WordPress to run vbt_setup() when the 'after_setup_theme' 
	 * hook runs.
	 * Le dice a wordpress que ejecute vbt_setup() cuando el hook
	 * 'after_setup_theme' este corriendo.
	 */
	function vbt_setup()
	{
	
		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		// Haz el tema traducible
		// Las traducciones se encuentran en el directorio /languages/
		load_theme_textdomain('vbt', TEMPLATEPATH . '/languages');

		// Add default posts and comments RSS feed links to head.
		// Agrega links de RSS fed de posts y comentarios al head
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		// Permitele a wordpres colocar el titulo
		add_theme_support('title-tag');

		// Switch default core markup for search form, comment form, and comments
		// to output valid HTML5.
		// Cambia las etiquetas default para el formulario de busqueda y los
		// comentarios para que sea HTML5.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			));

		// Enable support for Post Formats.
		// Activa el soporte para tipos de posts
		// See http://codex.wordpress.org/Post_Formats
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			));

		// Enable support for Post Thumbnails on posts and pages.
		// Activa el soporte para Thumbanails en los posts y páginas.
		add_theme_support('post-thumbnails');

		// Enable support for custom Logo
		// Activa el soporte para custom logo
		add_theme_support('custom-logo', array(
			'height' => 50,
			'width' => 300,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description')
			));
	
		// Register Menus
		// Registra menus
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
	 * Registra las areas de Widgets
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

if (!function_exists('vbt_remove_headlinks')):
	/**
	 * Removes some links from the header
	 * Remueve algunos links del header
	 */
	function vbt_remove_headlinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	}
endif;
add_action('init', 'vbt_remove_headlinks');

/**
 * Removing the WP version
 * Quita la version de wordpress
 */
add_filter('the_generator', '__return_false');

/**
 * Remove admin bar
 * Quita la barra de admin
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Get some information for loop.php
 */
if (!function_exists('vbt_get_loop_title')) :
	function vbt_get_loop_title()
	{
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	
		if (is_category()) : $title = __( 'Categoria' , 'vbt' ) . ' : ' . single_cat_title( '', false );
		elseif (is_tag()) : $title = __( 'Etiqueta' , 'vbt' ) . ' : ' . single_tag_title( '', false);
		elseif (is_month()) : $title = __( 'Archivos Mensuales' , 'vbt' ) . ' : ' . get_the_date('F Y');
		elseif (is_year()) : $title = __( 'Archivos Anuales' , 'vbt' ). ' : ' . get_the_date('Y');
		elseif (is_search()) : $title = __( 'Buscar resultados de' , 'vbt' ) . ' : ' . get_search_query();
		elseif (is_author()) : $title = __( 'Autor de Archivos', 'vbt' ) . ' : ' . $curauth->display_name;
		elseif (is_archive()) : $title = __( 'Archivo' , 'vbt' );
		endif;
		
		return $title;
	}
endif;

/**
 * Make menus compatibles with .navbar from Bootstrap
 * Hace los menus compatibles con .navbar de bootstrap
 */
if (!function_exists('vbt_change_menu_class')):
	function vbt_change_menu_class($menu)
	{  
		$menu = preg_replace('/class="menu"/','class="menu nav navbar-nav"', $menu);
		$menu = preg_replace('/class="sub-menu"/','class="sub-menu dropdown-menu"', $menu);
		$menu = preg_replace('/(menu-item-has-children)/','$1 dropdown', $menu);
		$menu = preg_replace('/<a(.*)href="#">(.*)<\/a>/','<a$1href="#" class="dropdown-toggle" data-toggle="dropdown">$2 <b class="caret"></b></a>', $menu);

	    return $menu;  
	}
endif;
add_filter('wp_nav_menu','vbt_change_menu_class');

require_once('inc/scripts.php');
require_once('inc/searchform.php');
require_once('inc/comments.php');
?>