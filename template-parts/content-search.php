<?php
/**
 * The template part for displaying results in search pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
	
	
	<?php if (strpos( get_the_content(), 'more-link' ) === false) :
		cp_excerpt();
		else:
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cp' ),
				get_the_title()
			)
		);
			endif ?>
	

	<?php if ( 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php cp_entry_meta(); ?>
			<?php
				edit_post_link(
					sprintf(
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'cp' ),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'cp' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->