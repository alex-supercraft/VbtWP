<?php
/**
 * The blog header
 * La cabecera del blog
 *
 * @package vbt
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="es" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->

<head>
	<!-- Google Adsense code here -->

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
</head>

<body <?php body_class('body-default'); ?>>

	<!-- .site-header-default sets default styles for the .site-header lement -->
	<!-- #vbt-header -->
	<header id="#vbt-header" class="site-header site-header-default">
		<!-- Navbar Top -->
		<nav class="navbar navbar-default" role="navigation">
			<!-- Caneter the content -->
			<div class="container">
				<!-- Visible if device width is lower than 768px -->
				<div class="navbar-header">
					<!-- Button to show and hide menu -->
					<button
						type="button"
						class="navbar-toggle"
						data-toggle="collapse"
						data-target=".navbar-ex1-collapse">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					</button> <!-- end .navbar-toggle -->
					<!-- .visible-xs makes the element visible only if device width is lower than 768px -->
					<!-- Site logo -->
					<div id="navbar-site-logo" class="visible-xs">
						<!--<?php if (! the_custom_logo()): ?>
							<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
								<img
									alt="vbt logo"
									src="<?php echo get_template_directory_uri(); ?>/images/vbt-logo.png">
							</a>
						<?php endif ?>-->
					</div> <!-- end .navbar-site-logo -->
				</div> <!-- end .navbar-header -->
				<!-- Hidden if device width is lower than 768px -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<!-- .navbar-left makes the element floats left -->
					<!-- .hidden-xs hides the element only if device width is lower than 768px -->
					<!-- Site identity -->
					<div class="navbar-left hidden-xs navbar-site-identity ">
						<!--<h1>
							<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
								<?php bloginfo('name'); ?>
							</a>
						</h1>-->
						<h1 class="text-hide">
							<?php if (! the_custom_logo()): ?>
								<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
									<img
										alt="vbt logo"
										src="<?php echo get_template_directory_uri(); ?>/images/vbt-logotipo.png">
								</a>
							<?php else: ?>
								<?php the_custom_logo(); ?>
							<?php endif; ?>
							<?php bloginfo('name'); ?>
						</h1>
					</div> <!-- end navbar-site-identity -->
					<div class="navabr-content navbar-right">
						<?php // if has_nav_menu('primary') has been created on wordpress ?>
						<?php if (has_nav_menu('primary')): ?>
							<?php wp_nav_menu( array('theme_location' => 'primary')); ?>
						<?php else: ?>
							<?php // if not, loads the pages list ?>
							<ul class="menu nav navbar-nav">
								<?php echo wp_list_pages(array('title_li' => '')); ?>
							</ul>
						<?php endif; ?>
					</div> <!-- end .navabr-content -->
				</div> <!-- end .navbar-collapse -->
			</div> <!-- end .container -->
		</nav> <!-- end .navbar -->
	</header> <!-- end #vbt-header -->