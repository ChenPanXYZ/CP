<?php
/**
 * The template for displaying all single posts and attachments
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );



			if ( is_singular( 'attachment' ) ) {
				the_post_navigation(
					array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'cp' ),
					)
				);
			} elseif ( is_singular( 'post' ) ) {
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next:', 'cp' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'cp' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous:', 'cp' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'cp' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					)
				);
			}
			
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile;
		?>

	</main>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>