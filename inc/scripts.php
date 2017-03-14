<?php
/**
 * Scripts and Styles
 * Scripts y estilos
 *
 * @package vbt
 */

if ( ! function_exists( 'vbt_scripts' ) ):
	/**
	 * Scripts
	 */
	function vbt_scripts() {
		wp_deregister_script('jquery');
		//wp_register_script('jquery', 'http://code.jquery.com/jquery-1.10.2.min.js', array(), '1.10.2', true);
		wp_register_script('jquery',  get_template_directory_uri() . '/js/lib/jquery-3.1.0.min.js', array(), '3.1.0', true);
		wp_enqueue_script('jquery');

		wp_register_script('bootstrap-script', get_template_directory_uri() . '/js/lib/bootstrap.min.js', array(), '3.3.7', true);
		wp_enqueue_script('bootstrap-script');
  }
endif;

if ( ! function_exists( 'vbt_styles' ) ):
	/**
	 * Styles
	 */
	function vbt_styles() {
	  	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), false,'all' );
	  	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7','all' );
	  	wp_enqueue_style( 'bootstrap-social-style', get_template_directory_uri() . '/css/bootstrap-social.css', array(), false,'all' );
	  	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.3','all' );
	  	wp_enqueue_style( 'vbt-style', get_template_directory_uri() . '/css/vbt-style.css', array(), '1.0.0','all' );
	  	wp_enqueue_style( 'base-style', get_template_directory_uri() . '/style.css', array(), '1.0.0','all' );
	}    
endif;
add_action('wp_enqueue_scripts', 'vbt_scripts');
add_action('wp_enqueue_scripts', 'vbt_styles');
?>