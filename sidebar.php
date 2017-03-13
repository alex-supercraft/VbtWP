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