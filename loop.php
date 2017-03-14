<?php
/**
 * The loop
 * El loop
 *
 * @package vbt
 */
?>

<?php if (! is_home()): ?>
	<div class="page-header">
		<h1><?php echo vbt_get_loop_title(); ?></h1>
	</div>

	<?php if (is_author()): ?>
		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<section id="vbt-author-info">
				<figure>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'vbt_author_bio_avatar_size', 60 ) ); ?>
				</figure>

				<h2>
					<?php printf( __( 'Acerca de %s', 'vbt' ), get_the_author() ); ?>
				</h2>

				<p class="description"><?php the_author_meta( 'description' ); ?></p>
			</section>
		<?php endif ?>
	<?php endif ?>
<?php endif; ?>

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
						<div class="image-not-found">
							<img
								class="attachment-large size-large wp-post-image"
								width="700"
								height="354"
								alt="<?php echo __('Imagen no encontrada'); ?>"
								src="<?php echo get_template_directory_uri(); ?>/images/image-not-found.png"
								sizes="(max-width: 700px) 100vw, 700px">
						</div>
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
							<b><?php echo __( 'Publicado en' , 'vbt' ) . ': ';?></b>
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

				<?php edit_post_link( __( 'Editar', 'vbt' ), '<p class="edit">', '</p>' ); ?>
			</footer>
		</article>
	<?php endwhile; // end post loop?>
</section>