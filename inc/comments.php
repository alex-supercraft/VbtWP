<?php
/**
 * Comments
 * Comentarios
 *
 * @package vbt
 */

if (!function_exists('vbt_comments')) :
	/**
	 * Modificar los campos Autor, Email y Sitio web del formulario de comentarios
	 */
	function vbt_modify_comment_fields( $fields )
	{
		//Variables necesarias para que esto funcione
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	 
		$fields =  array(
	 
			'author' =>
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' placeholder="' . __('Tu nombre', 'vbt') . '" />', //Editamos el campo autor

			'email' =>
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' placeholder="' . __('Tu email', 'vbt') . '" />', //Editamos el campo email

			'url' =>
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" placeholder="' . __('Tu sitio web', 'vbt') . '"  />', //Editamos el campo sitio web
			); 
		
		return $fields;
	}
	add_filter('comment_form_default_fields', 'vbt_modify_comment_fields');
endif;
if (!function_exists('vbt_comments')) : 
	function vbt_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
				extract($args, EXTR_SKIP);
		?>
			<li class="media" id="comment-<?php comment_ID() ?>">
				<div class="pull-left">
					<div class="media-object">
						<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</div>
				</div>

				<div class="media-body">
					<h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>

					<div class="comment-content">
						<?php if ($comment->comment_approved == '0') : ?>
							<em class="comment-awaiting-moderation"><?php _e('Tu comentario está esperando moderación.') ?></em>
						<?php endif; ?>

						<?php comment_text() ?>

						<div class="comment-reply">
							<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>

						<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php
								/* translators: 1: date, 2: time */
								printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
								<?php edit_comment_link(__('(Edit)'),'  ','' );
							?>
						</div>
					</div>
				</div>
			</li>
		<?php
	}
endif;
?>