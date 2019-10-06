<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta <?php bloginfo('charset'); ?>>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cp' ); ?></a>
		<header id="masthead"  class = "site-header">
			<div id = "main-header">
				<div class = "site-brand">
					<?php if ( !is_single() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<div class ="description">
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
					</div>
					<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<div class ="description">
						<div class="site-description"><?php the_title(); ?></div>
					</div>
					<?php endif; ?>
				</div>

				<div id="site-header-menu" class="site-header-menu">
					<div class ="social-and-toggle">
						<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'cp' ); ?>">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'social',
										'menu_class'  => 'social-links-menu',
										'depth'       => 1,
										'link_before' => '<span class="screen-reader-text">',
										'link_after'  => '</span>',
									)
								);
							?>
						</nav>
						<?php endif; ?>
							
						<div id="toggle">
							<?php cp_toggle(); ?>
						</div>
								
					</div>
								
					<div class ="popout-panel">
						<div class="popout-panel-container">
							<div id="site-header-menu-search-form"><?php get_search_form(); ?></div>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'cp' ); ?>">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu') ); ?>
							</nav>
							<?php endif; ?>
							<?php get_sidebar('menu'); ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="content" class="site-content">