<?php
/**
 * The template for displaying search results pages.
 *
*/

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'cp' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
		</header><!-- .page-header -->
		
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'cp' ),
					'next_text'          => __( 'Next page', 'cp' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cp' ) . ' </span>',
				)
			);
		

	else :

		get_template_part( 'template-parts/content', 'none' );
		endif; ?>

	</main>
</section>

<?php get_footer(); ?>
