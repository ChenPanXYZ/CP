<?php
/**
 * CP functions and definitions
*/

if ( ! function_exists( 'cp_setup' ) ) :
	function cp_setup() {
		
		
		load_theme_textdomain( 'cp' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'automatic-feed-links');
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'screen-reader-text' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);
		
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'cp' ),
				'social'  => __( 'Social Links Menu', 'cp' ),
			)
		);
		
		
	}
endif;
add_action( 'after_setup_theme', 'cp_setup' );

function cp_languages_init(){
	load_theme_textdomain('cp', get_template_directory() . '/languages'); 
} 
add_action ('init', 'cp_languages_init');

function cp_scripts() {
	// Add Icomoon, used in the main stylesheet.
	
	wp_enqueue_style( 'cp-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'iconmoon', get_template_directory_uri() . '/icomoon/icomoon.css');
	
	wp_enqueue_style( 'block-css', get_template_directory_uri() . '/css/block.css');
	
	
	wp_enqueue_script( 'toggle-menu', get_template_directory_uri() . '/js/function.js', array('jquery'), '0.5', true );
	
	
	wp_enqueue_script( 'cp-slidepanel', get_template_directory_uri() . '/js/slidepanel.js', array('jquery'), '0.5', true );
	
	wp_enqueue_script( 'cp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '0.5', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cp_scripts' );

function sticky_header() {

  wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/js/sticky-header.js');
if(is_singular()){
	wp_enqueue_script('read-progress-bar', get_template_directory_uri() .'/js/read-progress-bar.js', array('jquery'), '0.5', true );
}

}

add_action('wp_head','sticky_header');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

//Dynamic copyright year(s) for the footer
function cp_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
}

/*For sidebars*/
function cp_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Left Widget Area in the Popout Panel', 'cp' ),
			'id'            => 'menu-1',
			'description'   => __( 'The left widget area in the popout panel.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Middle Widget Area in the Popout Panel', 'cp' ),
			'id'            => 'menu-2',
			'description'   => __( 'The middle widget area in the popout panel.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Right Widget Area in the Popout Panel', 'cp' ),
			'id'            => 'menu-3',
			'description'   => __( 'The right widget area in the popout panel.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer\'s Left Widget Area', 'cp' ),
			'id'            => 'footer-1',
			'description'   => __( 'The left widget area in the footer.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer\'s Middle Widget Area', 'cp' ),
			'id'            => 'footer-2',
			'description'   => __( 'The middle widget area in the footer.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer\'s Right Widget Area', 'cp' ),
			'id'            => 'footer-3',
			'description'   => __( 'The right widget area in the footer.', 'cp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cp_widgets_init' );


add_filter( 'use_default_gallery_style', 'false' );

add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_template_directory_uri() . '/js/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}