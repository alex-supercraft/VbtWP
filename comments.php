<section id="vbt-comments" class="panel panel-default">
	<?php /* Important, do not delete | Importante, No borrar */ ?>
	<?php if ( post_password_required() ) : ?>
		<div class="alert alert-warning">
			<?php _e( 'Esta publicación está protegida por contraseña. Ingresa la contraseña para ver los comentarios.', 'vbt' ); ?>
		</div>
	<?php return; endif; ?>
	<?php /* You can edit after this comment | Puedes edotar después de este comentario */ ?>

	<?php if ( have_comments() ) : ?>
		<div class="panel-heading">
			<h3 class="comments-title">
				<?php printf( _n( 'Un comentario en %2$s', '%1$s comenta en %2$s', get_comments_number(), 'vbt' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
			</h3>
		</div>

		<ul class="comment-list media-list">
			<?php wp_list_comments( array( 'callback' => 'vbt_comments', 'avatar_size' => 45) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

			<div class="comment-pagination">
				<?php paginate_comments_links( ) ?>
			</div>

		<?php endif; // check for comment navigation ?>
	<?php else:  // end ! comments_open() ?>
		<?php	if ( ! comments_open() ) : ?>
			<p><?php _e( 'Los comentarios están cerrados.', 'vbt' ); ?></p>
		<?php endif; // end ! comments_open() ?>
	<?php endif; // end have_comments() ?>

	<?php
	/**
	 * Personalizar formulario
	 */
	$fields =  array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . __( 'Nombre' ) . '" '. ( $req ? 'required' : '' ) . ' /></p>',
		'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . __( 'Correo' ) . '" '. ( $req ? 'required' : '' ) . ' /></p>',
		'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Sitio Web' ) . '" /></p>',
	); 
	$comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'. _x( 'Comment', 'noun' ) . '" required></textarea></p>';
	?>
	
	<?php //comment_form(array('fields' => $fields , 'comment_field' => $comment_field)); ?>
	<?php comment_form(); ?>
</section>