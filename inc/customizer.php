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
	
	
	// Primary_text Color
	$wp_customize->add_setting( 'primary_text_color' , array(
		'default'     => '#004f2a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_text_color', array(
		'label'        => __( 'Primary Text Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'primary_text_color',
	) ) );
	
	// Secondary_text Color
	$wp_customize->add_setting( 'secondary_text_color' , array(
		'default'     => '#6d5900',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_text_color', array(
		'label'        => __( 'Secondary Text Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'secondary_text_color',
	) ) );
	
	
	// Link Color
	$wp_customize->add_setting( 'link_color' , array(
		'default'     => '#b55117',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Link Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'link_color',
	) ) );
	
	
	// Background Color
	$wp_customize->add_setting( 'back_ground_color' , array(
		'default'     => '#d1d1d1',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'back_ground_color', array(
		'label'        => __( 'Background Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'back_ground_color',
	) ) );
	
	// Link Color
	$wp_customize->add_setting( 'popout_panel_color' , array(
		'default'     => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'popout_panel_color', array(
		'label'        => __( 'Popout Panel Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'popout_panel_color',
	) ) );
	
	// Selection Color
	$wp_customize->add_setting( 'selection_color' , array(
		'default'     => '#DEB887',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selection_color', array(
		'label'        => __( 'Selection Color', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'selection_color',
	) ) );
	
	
	// Selection Color
	$wp_customize->add_setting( 'theme_color' , array(
		'default'     => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
		'label'        => __( 'Theme Color', 'cp' ),
		'description'        => __( 'Change the color in the address bar, supported by Google Chrome Android.', 'cp' ),
		'section'    => 'cp_colors',
		'settings'   => 'theme_color',
	) ) );
	
	
	// Layout
	$wp_customize->add_section( 'cp_layout' , array(
	  'title'      => __('Layout', 'cp'),
	  'priority'   => 20,
	) );
	
	// Layout Options
	$wp_customize->add_setting( 'change_layout' , array(
		'default'     => 'one_column',
		'sanitize_callback' => 'theme_slug_sanitize_radio',
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
	
	//Sticky header or not
	$wp_customize->add_setting( 'change_header' , array(
		'default'     => 'stikcy_header',
		'sanitize_callback' => 'theme_slug_sanitize_radio',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'change_header', array(
	'label' => __('Header sticky or not', 'cp'),
	'section' => 'cp_layout',
	'settings' => 'change_header',
	'type' => 'radio',
	'choices' => array(
	'stikcy_header' => __('Sticky Header', 'cp'),
	'regular_header' => __('Regular Header', 'cp'),
	),
	) );
	
	
	//Breadcrumbs or not
	$wp_customize->add_setting( 'change_breadcrumbs' , array(
		'default'     => 'display',
		'sanitize_callback' => 'theme_slug_sanitize_radio',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'change_breadcrumbs', array(
	'label' => __('Display breadcrumbs or not', 'cp'),
	'section' => 'cp_layout',
	'settings' => 'change_breadcrumbs',
	'type' => 'radio',
	'choices' => array(
	'display' => __('Display Breadcrumbs', 'cp'),
	'hide' => __('Hide Breadcrumbs', 'cp'),
	),
	) );
	
	
	//Fonts
	$wp_customize->add_section( 'cp_fonts' , array(
		'title'      => __( 'Fonts', 'cp' ),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'change_title_fonts' , array(
		'default'     => 'one',
		'sanitize_callback' => 'theme_slug_sanitize_select',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'change_title_fonts', array(
	'label' => __('Select a font for your website title', 'cp'),
	'section' => 'cp_fonts',
	'settings' => 'change_title_fonts',
	'type' => 'select',
	'choices' => array(
	'one' => __('Display Breadcrumbs', 'cp'),
	'two' => __('Hide Breadcrumbs', 'cp'),
	'three' => __('Hide Breadcrumbs', 'cp'),
	),
	) );
	
	//Fonts
	$wp_customize->add_section( 'cp_others' , array(
		'title'      => __( 'Others', 'cp' ),
		'priority'   => 30,
	) );


	// Whether to show author meta.
	$wp_customize->add_setting( 'control_author_meta' , array(
		'default'     => 'display',
		'sanitize_callback' => 'theme_slug_sanitize_radio',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'control_author_meta', array(
	'label' => __('Show or Hide Author Meta', 'cp'),
	'description' => __('We remmend you hide author meta if the website has only one author.', 'cp'),
	'section' => 'cp_others',
	'settings' => 'control_author_meta',
	'type' => 'radio',
	'choices' => array(
	'display' => __('Display', 'cp'),
	'hide' => __('Hide', 'cp'),
	),
	) );
	
	$wp_customize->add_setting( 'display_aside_or_not' , array(
		'default'     => 'display',
		'sanitize_callback' => 'theme_slug_sanitize_radio',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'display_aside_or_not', array(
	'label' => __('Display Aside or not', 'cp'),
	'description' => __('Display posts of format aside in pages other than Aside Archive or not.', 'cp'),
	'section' => 'cp_others',
	'settings' => 'display_aside_or_not',
	'type' => 'radio',
	'choices' => array(
	'display' => __('Display', 'cp'),
	'hide' => __('Hide', 'cp'),
	),
	) );
	
}


function cp_primary_text_color()
{
	$primary_text_color = get_theme_mod('primary_text_color');
	?>
	<style type="text/css">
		.sticky-post,
		.site-title,
		.site-title a,
		.site-brand .site-title a,
		.entry-title,
		.entry-title a,
		.entry-content,
		.widget-title,
		.textwidget,
		.byline::before,
		.posted-on::before,
		.cat-links::before,
		.tags-links::before,
		.comments-link::before,
		.edit-link::before,
		.recentcomments,
		.breadcrumbs-item,
		.comment-content,
		article,
		p,
		.page-title,
		.current,
		.entry-summary,
		cite,
		li,
		button,
		.popout-panel,
		.nav-menu li a,
		#wp-calendar tbody td#today,
		#wp-calendar thead th,
		#wp-calendar tbody td a,#wp-calendar tfoot td#prev a:hover,#wp-calendar tfoot td#next a:hover,
		.aside-location::before,
		.aside-weather::before,
		.aside-mood::before
		{ 
			color: <?php echo $primary_text_color; ?>; 
		}
		#wp-calendar tbody td#today,
		#wp-calendar tbody td a,#wp-calendar tfoot td#prev a:hover,#wp-calendar tfoot td#next a:hover{
			border-color: <?php echo $primary_text_color; ?>; 
		}
		
		.wp-block-table, .wp-block-table th, .wp-block-table td {
			border-color: <?php echo $primary_text_color; ?>; 
		}
		
		textarea:focus, input:focus {
			outline-color: <?php echo $primary_text_color; ?>;
		}
		
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_primary_text_color');


function cp_secondary_text_color()
{
	$secondary_text_color = get_theme_mod('secondary_text_color');
	?>
	<style type="text/css">
		.site-description,
		.social-navigation a,
		.entry-footer a,
		.comment-meta a,
		.credit a,
		article ul a,
		#wp-calendar tbody td,
		.wp-block-quote cite,
		.aside-location,
		.aside-weather,
		.aside-mood,
		#toggle::before
		{ 
			color: <?php echo $secondary_text_color; ?>; 
		}
		.hentry {
			border-top-color: <?php echo $secondary_text_color; ?>; 
			border-bottom-color: <?php echo $secondary_text_color; ?>;
		}
		#wp-calendar tbody td, 
		.aside-archive-container{
			border-color: <?php echo $secondary_text_color; ?>; 
		}
		.wp-block-quote {
			border-left-color: <?php echo $secondary_text_color; ?>; 
		}
		.wp-block-quote {
			border-right-color: <?php echo $secondary_text_color; ?>; 
		}
		
		textarea, input {
			border-color: <?php echo $secondary_text_color; ?>;   
		}
		
		button {
			background-color: <?php echo $secondary_text_color; ?>;  
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_secondary_text_color');


function cp_link_color_css()
{
	$link_color = get_theme_mod('link_color');
	?>
	<style type="text/css">
		a,
		.wp-block-calendar tfoot a
		{ 
			color: <?php echo $link_color; ?>; 
		}
		.read-progress-bar {
			background-color: <?php echo $link_color; ?>; 
		}
		.sticky-post,
		article ul a,
		article ul em {
			border-bottom-color: <?php echo $link_color; ?>; 
		}
		
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_link_color_css');


function cp_background_color()
{
	$background_color = get_theme_mod('back_ground_color');
	?>
	<style type="text/css">
		body,
		.fixed-at-top,
		#main-header,
		.wp-block-calendar table th
		{ 
			background: <?php echo $background_color; ?>;
		}
		textarea, input {
			background-color: <?php echo $background_color; ?>;
		}
		
		.search-submit {
			color: <?php echo $background_color; ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_background_color');


function cp_popout_panel_color_css()
{
	$popout_panel_color = get_theme_mod('popout_panel_color');
	?>
	<style type="text/css">
		.popout-panel
		{ 
			background-color: <?php echo $popout_panel_color; ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_popout_panel_color_css');


function cp_selection_color()
{
	$selection_color = get_theme_mod('selection_color');
	?>
	<style type="text/css">
		::selection
		{ 
			background: <?php echo $selection_color; ?>; 
		}
		::-moz-selection
		{ 
			background: <?php echo $selection_color; ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'cp_selection_color');

function cp_theme_color()
{
	$theme_color = get_theme_mod('theme_color');
	?>
	<meta name="theme-color" content="<?php echo $theme_color; ?>">

	
	<?php
}
add_action( 'wp_head', 'cp_theme_color');




add_action( 'wp_head', 'cp_custom_layout_css');
function cp_custom_layout_css()
{
    ?>
	<?php if( get_theme_mod( 'change_layout') == 'one_column' ) : ?>
         <style type="text/css">
			#footer-siderbar-container .sidebar:not(last-child) {
				padding-right: 0px;
			}
			#footer-siderbar-container .sidebar:last-child {
				padding-right: 0px;
			}
		 @media screen and (min-width: 61.5625em) {
			 .content-area  {
				 display: inline-block;
				 width: 70%;
			 }
			 
			.no-sidebar .content-area {
				float: none;
				margin: 0;
				width: 100%;
			}
			 
			 .site-content {
				 display: flex; 
			 }
			 #footer-siderbar-container { 
				 width: 30%; 
				 padding-top: 32px;
				 padding-left: 15px;
				 margin-left: 10px;
				 display: block;
				 float: right;
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


add_action( 'wp_head', 'cp_change_header');
function cp_change_header()
{
    ?>
	<?php if( get_theme_mod( 'change_header') == 'regular_header' ) : ?>
         <style type="text/css">
			 .fixed-at-top {
				 position: relative;
			 }
			 
			 
			 @media screen and (min-width: 61.5625em) {
				 .fixed-at-top {
				 	position: relative;
			 	}
				 .read-progress-bar {
					 display: none;
				 }
			 }
			 
         </style>
	<?php endif ?>
    <?php
}

add_action( 'wp_head', 'cp_change_breadcrumbs');
function cp_change_breadcrumbs()
{
    ?>
	<?php if( get_theme_mod( 'change_breadcrumbs') == 'hide' ) : ?>
         <style type="text/css">
			 .breadcrumbs {
				 display: none;
			 }
         </style>
	<?php endif ?>
    <?php
}


add_action( 'wp_head', 'cp_control_author_meta');
function cp_control_author_meta()
{
    ?>
	<?php if( get_theme_mod( 'control_author_meta') == 'hide' ) : ?>
         <style type="text/css">
			 .byline {
				 display: none;
			 }
         </style>
	<?php endif ?>
    <?php
}


function theme_slug_sanitize_select( $input, $setting ){

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

}

function theme_slug_sanitize_radio( $input, $setting ){

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options 
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

}
?>