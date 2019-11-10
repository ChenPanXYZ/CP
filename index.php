<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			?><div class = "homepage-content"><?php
				while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			?></div><?php
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'cp' ),
					'next_text'          => __( 'Next page', 'cp' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cp' ) . ' </span>',
				)
			);

		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</main>
	</div>
<?php get_footer(); ?>