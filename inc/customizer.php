<?php
add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	
	// Make colors customizable for CP.
	$wp_customize->add_section( 'cp_colors' , array(
		'title'      => __( 'Colors', 'cp' ),
		'priority'   => 30,
	) );
	
	
	// Main_text Color
	$wp_customize->add_setting( 'main_text_color' , array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
		'label'        => __( 'Main Text Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'main_text_color',
	) ) );
	
	
	
	// Layout
	$wp_customize->add_section( 'cp_layout' , array(
	  'title'      => __('Layout', 'cp'),
	  'priority'   => 20,
	) );
	
	// Layout Options
	$wp_customize->add_setting( 'change_layout' , array(
	  'default'     => true,
	  'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'change_layout', array(
	'label' => __('Change Layout', 'cp'),
	'section' => 'cp_layout',
	'settings' => 'change_layout',
	'type' => 'radio',
	'choices' => array(
	'full_width' => __('Full Width', 'cp'),
	'one_column' => __('One Column', 'cp'),
	),
	) );
}


function cp_main_text_color_css()
{
	?>
	<style type="text/css">
		.site-brand .site-title a,
		.entry-title a,
		.entry-content
		{ 
			color: <?php echo get_theme_mod('main_text_color'); ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_main_text_color_css');










add_action( 'wp_head', 'cp_custom_layout_css');
function cp_custom_layout_css()
{
    ?>
	<?php if( get_theme_mod( 'change_layout', 'one_column' ) == 'one_column' ) : ?>
         <style type="text/css">
			#footer-siderbar-container .sidebar:not(last-child) {
				padding-right: 0px;
			}
			#footer-siderbar-container .sidebar:last-child {
				padding-right: 0px;
			}
		 @media screen and (min-width: 61.5625em) {
			 .content-area {display: inline-block; width: 70%;}
			 
			.no-sidebar .content-area {
		float: none;
		margin: 0;
		width: 100%;
		}
			 .site-content {display: flex; }
			 #footer-siderbar-container { 
				width: 30%; 
				padding-top: 32px;
				padding-left: 15px;
				margin-left: 10px;
				display: block;
			 }
			 
			.footer-sidebar {
				display: block;
				width: 100%;
			}
		 }
         </style>
	<?php endif ?>
    <?php
}


?>