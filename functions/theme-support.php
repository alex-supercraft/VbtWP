<?php
/**
 * Adding all theme support
 */
function vbt_theme_support()
{
	// RSS support.
	add_theme_support('automatic-feed-links');

	// Let WordPress manage the document title.
	add_theme_support('title-tag');

	// Switch default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support('html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			)
		);

	// Enable support for Post Formats.
	// See http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
			)
		);

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Enable support for custom Logo
	add_theme_support('custom-logo',
		array(
			'height' => 50,
			'width' => 300,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('site-title', 'site-description')
			)
		);

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );
} /* end theme support */

add_action( 'after_setup_theme', 'vbt_theme_support' );
?>