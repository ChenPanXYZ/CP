<?php
/**
 * The template part for displaying aside posts
 */
?>
<div class = "article-wrapper">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<div class="read-progress-bar"></div>
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

	<?php cp_excerpt(); ?>

	<?php cp_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cp' ),
					get_the_title()
				)
			);
			//the_content();

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cp' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'cp' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);

			?>
	</div>

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
</article>
</div>
