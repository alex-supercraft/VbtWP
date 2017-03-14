<?php
/**
 * The main template file
 * El archivo principal de la plantilla
 *
 * @package vbt
 */
?>
<?php
/**
 * The blog header
 * La cabecera del blog
 *
 * @package vbt
 */
?>
<?php get_header(); ?>
	<!-- #vbt-main -->
	<div role="main" id="vbt-main">
		<div class="container">
			<div class="row">
				<?php get_template_part( 'loop' ); ?>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>