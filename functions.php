<?php
/**
 * Functions and utilities
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vbt
 */

/**
 * Gets function file located in the functions directory
 *
 * @param string $file_name Name of the function file
 * @return string
 */
function vbt_get_function_path($file_name)
{
	return get_template_directory() . '/functions/' . $file_name . '.php';
}

// Theme support options
require_once(vbt_get_function_path('theme-support'));

// WordPress Head and other clean options
require_once(vbt_get_function_path('cleanup'));

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