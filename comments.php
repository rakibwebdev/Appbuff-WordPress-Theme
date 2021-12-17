<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
?>
<?php
// If the current post is protected by a password and the visitor has not yet 
// entered the password we will return early without loading the comments.
// ----------------------------------------------------------------------------------------
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() || comments_open()) : ?>
<div id="comments" class="comments-block mt60">

	<?php if ( have_comments()) : ?>

        <h2 class="mb60">
			<?php
				printf( esc_html__( 'Comments:', 'appbuff' ));
			?>
		</h2>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">

				<h1 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'appbuff' ); ?>
				</h1>
				<div class="nav-previous">
					<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'appbuff' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'appbuff' ) ); ?>
				</div>
			
			</nav><!-- #comment-nav-above -->
		<?php endif; //check for comment navigation ?>

		<div class="media">
			<?php
			wp_list_comments( array(
			        'reply_text'        => '<i class="fa fa-mail-reply-all"></i>',
				    'callback'          => 'appbuff_comment_style',
				    'style'			 => 'ul ',
				    'short_ping'	 => false,
				    'type'              => 'all',
                    'format'            => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
				    'avatar_size'	 => 60,
			) );
			?>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-bellow" class="navigation comment-navigation" role="navigation">

				<h1 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'appbuff' ); ?>
				</h1>
				<div class="nav-previous">
					<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'appbuff' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'appbuff' ) ); ?>
				</div>
			
			</nav><!-- #comment-nav-bellow -->
		<?php endif; //check for comment navigation ?>

		<?php if ( !comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'appbuff' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
	$post_id = '';
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id		 = $post_id;

	$commenter		 = wp_get_current_commenter();
	$user			 = wp_get_current_user();
	$user_identity	 = $user->exists() ? $user->display_name : '';


	$req		 = get_option( 'require_name_email' );
	$aria_req	 = ( $req ? " aria-required='true'" : '' );

	$fields = array(
		'author' => '<div class="fieldsets row"><div class="col-md-6"><input placeholder="'.  esc_attr__('Enter Name', 'appbuff').'" id="author" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30"' . $aria_req . ' /></div><div class="col-md-6">',
		'email'	 => '<input Placeholder="'.  esc_attr__('Enter Email', 'appbuff').'" id="email" name="email" type="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="30"' . $aria_req . ' /></div>',
		'url'	 => '<div class="col-md-12"><input Placeholder="'.  esc_attr__('Enter Website', 'appbuff').'" id="url" name="url" type="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" size="30" /></div></div>',
	);

	if ( is_user_logged_in() ) {
		$cl = 'loginformuser';
	} else {
		$cl = '';
	}
	$defaults = [
		'fields'			 => $fields,
		'comment_field'		 => '
			<div class="fieldsets row">
				<div class="col-md-12 ' . $cl . '">
					<textarea 
						Placeholder="'.  esc_attr__('Enter Comments', 'appbuff').'" 
						id="comment" 
						name="comment" 
						cols="45" rows="8" 
						aria-required="true"></textarea>
				</div>
				<div class="clearfix"></div>
			</div>
		',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'		 => '
			<p class="must-log-in">
				' . sprintf( 
						wp_kses_post( 'You must be <a href="%s">logged in</a> to post a comment.', 'appbuff' ), 
						wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) 
					) . '
			</p>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as'		 => '
			<p class="logged-in-as">
				' . sprintf( 
						wp_kses_post( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'appbuff' ), 
						get_edit_user_link(), 
						$user_identity, 
						wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) 
					) . '
			</p>',
		'id_form'			 => 'commentform',
		'id_submit'			 => 'submit',
		'class_submit'		 => 'btn-main bg-btn lnk mt10',
		'title_reply'		 => esc_html__( '', 'appbuff' ),
		'title_reply_to'	 => esc_html__( 'Leave a Reply to %s', 'appbuff' ),
		'cancel_reply_link'	 => esc_html__( 'Cancel reply', 'appbuff' ),
		'label_submit'		 => esc_html__( 'Post Comment', 'appbuff' ),
		'format'			 => 'xhtml',
	];

	comment_form( $defaults );
	?>

</div><!-- #comments -->
<?php endif;