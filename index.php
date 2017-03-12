<?php
/**
 * The main template file
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
				</div>
				<!-- Navbar Content -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<div class="site-identity navbar-left">
						<h1>
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
	<div role="main" id="vbt-main">
		Main content
	</div>
	<footer id="vbt-footer">
		Footer
	</footer>

	<!-- IE bootstrap support -->

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!--[if lt IE 7 ]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/libs/dd_belatedpng.js"></script>
		<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->

	<?php wp_footer(); ?>
</body>

</html>