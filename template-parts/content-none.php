<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Nothing Found', 'cp' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cp' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Nothing matched your search terms. Please try again with some different keywords.', 'cp' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'There is nothing. Perhaps searching can help!', 'cp' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>