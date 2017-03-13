<?php
/**
 * The main template file
 * El archivo principal de la plantilla
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
					<!-- Posts loop -->
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="post-header">
								<div class="post-thumbnail">
									<?php if(has_post_thumbnail()): ?>
										<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>" rel="nofollow">
											<?php the_post_thumbnail('large'); ?>
										</a>
									<?php else:?>
										<span class="image-not-found">Imagen no encontrada</span>
									<?php endif; ?>
								</div>
								<div class="post-info">
									<ul class="list-unstyled list-inline">
										<li>
											<span class="glyphicon glyphicon-time"></span> <?php echo get_the_date(); ?>
										</li>
										<li>
											<span class="glyphicon glyphicon-user"></span>
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="nofollow">
												<i><?php echo get_the_author(); ?></i>
											</a>
										</li>
										<li>
											<span class="glyphicon glyphicon-folder-open"></span>
											<b><?php echo __( 'Publicado en' , 'gb' ) . ': ';?></b>
											<?php the_category(', '); ?>
										</li>
										<li>
											<span class="glyphicon glyphicon-comment"></span>
											<?php comments_popup_link( '0', '1', '%' ); ?>
										</li>
									</ul>
								</div>
								<div class="post-title">
									<h2>
										<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
								</div>
							</header>
							<div class="the-content">
								<?php the_excerpt( __( 'Saber más;' , 'vbt' ) ); ?>
							</div>
							<footer class="post-footer">
								<?php $tags_list = get_the_tag_list( '', ' ' ); ?>
					
								<?php if ( $tags_list ): ?>

									<div class="post-tags">
										<span class="glyphicon glyphicon-tags"></span>
										<?php echo $tags_list ; ?>
									</div>

								<?php endif; ?>

								<?php edit_post_link( __( 'Editar', 'gb' ), '<p class="edit">', '</p>' ); ?>
							</footer>
						</article>
					<?php endwhile; // end post loop?>
				</section>
				<!-- #vbt-sidebar -->
				<section id="vbt-sidebar" class="col-md-4">
					<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
						<aside class="sidebar-search panel panel-default">
							<div class="panel-heading">
								<h3><?php echo __( 'Buscar' , 'vbt'); ?></h3>
							</div>
							<div class="panel-body">
								<?php get_search_form(); ?>
							</div>
						</aside><!-- .search -->

						<aside class="sidebar-categories panel panel-default">
							<div class="panel-heading">
								<h3><?php echo __( 'Categorías' , 'vbt'); ?></h3>
							</div>
							<ul class="list-group">
								<?php $categories = get_categories( ); foreach ($categories as $cat): ?>
									<li class="list-group-item"><a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>		
								<?php endforeach; ?>
							</ul>
						</aside><!-- .categories -->

						
						<aside class="sidebar-tags panel panel-default">
							<div class="panel-heading">
								<h3><?php echo __( 'Tags' , 'vbt'); ?></h3>
							</div>
							<div class="panel-body">
								<?php wp_tag_cloud(); ?>
							</div>
						</aside><!-- .tags -->

						
						<aside class="sidebar-links panel panel-default">
							<div class="panel-heading">
								<h3><?php echo __( 'Links' , 'vbt'); ?></h3>
							</div>
							<div class="panel-body">
								<ul>
								<?php
									$bookmarks = get_bookmarks( array(
										'orderby'        => 'name',
										'order'          => 'ASC',
										));

									foreach ( $bookmarks as $bm ) :
										printf( '<li><a href="%s" title="%s">%s</a></li>', $bm->link_url, __($bm->link_name), __($bm->link_name) );
									endforeach;
								?>
								</ul>
							</div>
						</aside><!-- .links -->
					<?php endif; // end sidebar widget area ?>
				</section>
			</div>
		</div>
	</div>
	<!-- end #vbt-main -->

<?php get_footer(); ?>