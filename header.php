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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- #vbt-header -->
	<header id="vbt-header">
		<!-- Navbar Fixed Top -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Navbar header -->
				<div class="navbar-header">
					<button
						type="button"
						class="navbar-toggle"
						data-toggle="collapse"
						data-target=".navbar-ex1-collapse">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					</button>
					<div class="site-logo visible-xs">
						<?php if (! the_custom_logo()): ?>
							<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
								<img
									alt="vbt logo"
									src="<?php echo get_template_directory_uri(); ?>/images/vbt-logo.png">
							</a>
						<?php endif ?>
					</div>
				</div>
				<!-- Navbar Content -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<div class="site-identity navbar-left hidden-xs">
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
					</div> 
					<div class="navbar-right">
						<?php if (has_nav_menu('primary')): ?>
							<?php wp_nav_menu( array('theme_location' => 'primary')); ?>
						<?php else: ?>
							<ul class="menu nav navbar-nav">
								<?php echo wp_list_pages(array('title_li' => '')); ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!--  end #vbt-header -->
	