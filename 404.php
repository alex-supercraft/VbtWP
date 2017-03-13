<?php get_header(); ?>

	<!-- #vbt-main -->
	<div role="main" id="vbt-main">
		<div class="container">
			<div class="row">
				<!-- #vbt-content -->
				<section id="vbt-content" class="col-md-8">
					<article id="vbt-error-404">
						<header class="post-header">
							<div class="post-title">
								<h1><?php echo __('No encontrado'); ?></h1>
							</div>
						</header>
						<div class="the-content">
							<p>
								<?php echo __('No pudimos encontrar lo que buscas... Utiliza el buscador'); ?>
							</p>
						</div>
					</article>
				</section>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>