<?php
/**
 * The template for displaying comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				comments_number( '', esc_html__( '1 Comment', 'cp' ), esc_html__( '% Comments', 'cp' ) );
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="commentlist">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 36,
						'callback' => 'cp_comment'

					)
				);
				
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'cp' ); ?></p>
	<?php endif; ?>

	<?php
		cp_comment_form();
		?>

</div><!-- .comments-area -->
