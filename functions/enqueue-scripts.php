<?php
function vbt_site_scripts()
{
	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// Deregister wp jquery script so we can add the version we want
	wp_deregister_script('jquery');

	// Adding scripts file in the footer

	// Jquery
	wp_register_script('jquery',  get_template_directory_uri() . '/js/lib/jquery-3.1.0.min.js', array(), '3.1.0', true);
	wp_enqueue_script('jquery');

	// Bootstrap
	wp_register_script('bootstrap-script', get_template_directory_uri() . '/js/lib/bootstrap.min.js', array(), '3.3.7', true);
	wp_enqueue_script('bootstrap-script');

	// Adding styles to the head

	// Bootstrap
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7','all' );
	// Google fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), false,'all' );
	//Boostrap Social
	wp_enqueue_style( 'bootstrap-social-style', get_template_directory_uri() . '/css/bootstrap-social.css', array(), false,'all' );
	// Font Awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.3','all' );
	// Vvt Style
	wp_enqueue_style( 'vbt-style', get_template_directory_uri() . '/css/vbt-style.css', array(), '1.0.0','all' );
	// Base Style
	wp_enqueue_style( 'base-style', get_template_directory_uri() . '/style.css', array(), '1.0.0','all' );
} /* end site scripts */
add_action('wp_enqueue_scripts', 'vbt_site_scripts', 999);
?>