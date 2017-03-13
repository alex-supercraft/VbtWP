<?php
/**
 * The page template file
 * Plantilla para páginas
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
				<section id="vbt-content" class="col-md-8">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="post-header">
								<h1 class="post-title"><?php the_title(); ?></h1>
								<div class="post-info">
									<ul class="list-unstyled list-inline">
										<li>
											<span class="glyphicon glyphicon-time"></span> <?php echo get_the_date(); ?>
										</li>
									</ul>
								</div>
							</header>
							<div class="the-content">
								<?php the_content(); ?>
							</div>
							<footer class="post-footer">
								<?php edit_post_link( __( 'Editar', 'vbt' ), '<p class="edit">', '</p>' ); ?>
							</footer>
						</article>
					<?php endwhile; ?>
				</section>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>