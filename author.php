<?php get_header(); ?>

	<!-- #vbt-main -->
	<div role="main" id="vbt-main">
		<div class="container">
			<div class="row">
				<!-- #vbt-content -->
				<section id="vbt-content" class="col-md-8">
					<?php get_template_part( 'loop' ); ?>
				</section>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>