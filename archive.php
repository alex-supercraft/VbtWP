<?php
/**
 * The archive template file
 * Plantilla para archivos
 *
 * @package vbt
 */
?>
<?php get_header(); ?>

	<!-- #vbt-main -->
	<div role="main" id="vbt-main">
		<div class="container">
			<div class="row">
				<!-- #vbt-content -->
				<?php get_template_part( 'loop' ); ?>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>