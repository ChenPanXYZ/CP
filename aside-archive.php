<?php /* Template Name: Aside Archive */ ?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		<?php 

			$old_date = array(9999, 9999, 9999);
			$current_date = array(9999, 9999, 9999);
			$myposts = new WP_Query( array(
				'tax_query' => array(
					array(                
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( 
							'post-format-aside'
						),
						'operator' => 'IN'
					)
				)
			) );

			// Open the loop
			if ( $myposts->have_posts() ) : while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
					<?php 
						$current_date[0] = get_the_time('y');
						$current_date[1] = get_the_time('m');
						$current_date[2] = get_the_time('d');
				
					?>
					<?php if($current_date[0] != $old_date[0]) : ?>
						
						<div class = "aside-archive-year">
							<?php
							the_time( 'Y' );
							$old_date[0] = $current_date[0];
							?>
						</div>
					<?php endif; ?>
					<?php if($current_date[1] != $old_date[1]) : ?>
						
						<div class = "aside-archive-month">
							<?php
							the_time( 'M, Y' );
							$old_date[1] = $current_date[1];
							?>
						</div>
					<?php endif; ?>
					<?php if($current_date[2] != $old_date[2]) : ?>
						
						<div class = "aside-archive-day">
							<?php
							the_time( 'M, d, Y' );
							$old_date[2] = $current_date[2];
							?>
						</div>
					<?php endif; ?>
					<div class = "aside-archive-container">
						<div class="the_article">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="the_day">
							<?php
								cp_aside_entry_taxonomies();
							?>
						</div>
					</div>
				<?php 

			// Close the loop
			endwhile; endif;

			// Reset $post data to default query
			wp_reset_postdata();
		?>
		</main>
	</div>
<?php get_footer(); ?>