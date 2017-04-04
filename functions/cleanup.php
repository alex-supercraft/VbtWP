<?php
/**
 * Fire all this initial functions at the start
 */
add_action('after_setup_theme','vbt_start', 16);

/**
 * Execute all clean ups and configs
 */
function vbt_start()
{
	// launching operation head cleanup
	add_action('init', 'vbt_head_cleanup');

	//Remove injected CSS for recent comments widget
	add_filter('wp_head', 'vbt_remove_wp_widget_recent_comments_style', 1);

	// Clean up comment styles in the head
	add_action('wp_head', 'vbt_remove_recent_comments_style', 1);

	// Clean up gallery output in wp
	add_filter('gallery_style', 'vbt_gallery_style');

	// My own personal excerpt
	add_filter('excerpt_more', 'vbt_excerpt_more');
} /* end vbt start */

/**
 * Cleaning the head up
 * The default wordpress head is a mess, so let's clean it up
 * by removing all the junk we don't need.
 */
function vbt_head_cleanup()
{
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	add_filter('the_generator', '__return_false');
	// Remove admin bar
	add_filter('show_admin_bar', '__return_false');
} /* end vbt head cleanup() */

/**
 * Remove injected CSS for recent comments widget
 */
function vbt_remove_wp_widget_recent_comments_style()
{
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
} /* end this long name function */

/**
 * Clean up comment styles in the head
 */
function vbt_remove_recent_comments_style()
{
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
} /* end this other long name function */

/**
 * Remove injected CSS from gallery
 */
function vbt_gallery_style($css)
{
	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
} /* end Gallery Style */

/**
 * This removes the annoying […] to a Read More link
 */
function vbt_excerpt_more($more)
{
	return '<a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __('Más', 'vbt') . get_the_title($post->ID).'">'. __('... Saber más &raquo;', 'vbt') .'</a>';
} /* end excerpt more */
?>