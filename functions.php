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
		
add_theme_support( 'infinite-scroll', array(
 'container' => 'content',
 'footer' => 'page',
) );
		
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

//Enqueue scripts
function cp_scripts() {
	
	wp_enqueue_style( 'cp-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'iconmoon', get_template_directory_uri() . '/icomoon/icomoon.css');
	
	wp_enqueue_style( 'block-css', get_template_directory_uri() . '/css/block.css');
	
	if (get_theme_mod( 'change_homepage_layout') == 'masonry'):
		wp_enqueue_script('masonry');
		wp_enqueue_script( 'masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), false, true );
	endif;
	
	wp_enqueue_script( 'toggle-menu', get_template_directory_uri() . '/js/function.js', array('jquery'), '0.5', true );
	
	wp_enqueue_script( 'cp-slidepanel', get_template_directory_uri() . '/js/slidepanel.js', array('jquery'), '0.5', true );
	
	wp_enqueue_script( 'cp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '0.5', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'cp_scripts' );

function sticky_header() {
//Functionize sticky header
	if (get_theme_mod( 'change_header') != 'regular_header'):
		wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/js/sticky-header.js');
		if(is_singular()){
			wp_enqueue_script('read-progress-bar', get_template_directory_uri() .'/js/read-progress-bar.js', array('jquery'), '0.5', true );
		}
	endif;
}
add_action('wp_head','sticky_header');


function my_block_plugin_editor_scripts() {
	
    // Enqueue JS for Gutenberg editor
	wp_enqueue_script( 'gutenberg', get_template_directory_uri() . '/js/gutenberg.js', array('jquery'), '0.5', true );

}
add_action( 'enqueue_block_editor_assets', 'my_block_plugin_editor_scripts' );




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



function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_template_directory_uri() . '/js/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}
add_action( 'customize_preview_init', 'cd_customizer' );


function today_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-location"><?php printf(__( 'Location', 'cp' )); ?></label>
            <input name="meta-box-location" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-location", true); ?>">

            <br>

            <label for="meta-box-weather"><?php printf(__( 'Weather', 'cp' )); ?></label>
            <select name="meta-box-weather">
                <?php 
                    $option_values = array(__( 'Sunny', 'cp' ), __( 'Cloudy', 'cp' ), __( 'Partly cloudy', 'cp' ), __( 'Rainy', 'cp' ), __( 'Snowy', 'cp' ), __( 'Sleeting', 'cp' ), __( 'Stormy', 'cp' ), __( 'Lightning', 'cp' ), __( 'Thunder', 'cp' ), __( 'Hailing', 'cp' ), __( 'Windy', 'cp' ), __( 'Foggy', 'cp' ));

                    foreach($option_values as $key => $value) 
                    {
                        if($value == get_post_meta($object->ID, "meta-box-weather", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>

            <br>

            <label for="meta-box-mood"><?php printf(__( 'Mood', 'cp' )); ?></label>
            <select name="meta-box-mood">
                <?php 
                    $option_values = array(__( 'Happy', 'cp' ), __( 'Sad', 'cp' ), __( 'Hypnotic', 'cp' ), __( 'Romantic', 'cp' ), __( 'Mysterious', 'cp' ), __( 'Doubtful', 'cp' ), __( 'Cool', 'cp' ), __( 'Angry', 'cp' ));

                    foreach($option_values as $key => $value) 
                    {
                        if($value == get_post_meta($object->ID, "meta-box-mood", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
			
        </div>
    <?php  
}


function add_today_meta_box()
{
    add_meta_box("today-meta-box", __( 'Today', 'cp' ), "today_meta_box_markup", 'post', "side", "high", null);
}

add_action("add_meta_boxes", "add_today_meta_box");


function save_today_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_location_value = "";
    $meta_box_weather_value = "";
    $meta_box_mood_value = "";

    if(isset($_POST["meta-box-location"]))
    {
        $meta_box_location_value = $_POST["meta-box-location"];
    }   
    update_post_meta($post_id, "meta-box-location", $meta_box_location_value);

    if(isset($_POST["meta-box-weather"]))
    {
        $meta_box_weather_value = $_POST["meta-box-weather"];
    }   
    update_post_meta($post_id, "meta-box-weather", $meta_box_weather_value);

    if(isset($_POST["meta-box-mood"]))
    {
        $meta_box_mood_value = $_POST["meta-box-mood"];
    }   
    update_post_meta($post_id, "meta-box-mood", $meta_box_mood_value);
}

add_action("save_post", "save_today_meta_box", 10, 3);


function filter_aside_posts($args) {
    $args = new WP_Query(array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field'    => 'slug', 
                'terms'    => (get_theme_mod( 'display_aside_or_not', 'display' ) == 'display') ? array():array( 'post-format-aside' ),
                'operator' => 'NOT IN',
            ),
        ),
    ));
    return $args;
}



function cp_loop_post() {
	//$display_aside_or_not = get_theme_mod( 'display_aside_or_not', 'display' );
	$myposts = filter_aside_posts(array());
	
	//foreach ( $myposts as $mypost ) {
	//	setup_postdata( $post );
	//	get_template_part( 'template-parts/content', get_post_format() );
		// HTML...
	//}
	if ( $myposts->have_posts() ) : while ( $myposts->have_posts() ) : $myposts->the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile; 
	endif;
}


function cp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cp_content_width', 900 );
}
add_action( 'after_setup_theme', 'cp_content_width', 0 );


add_filter( 'body_class', 'cp_sidebar_body_class' );

function cp_sidebar_body_class( $classes )
{
    $classes[] = (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) ? 'has-sidebar' : 'no-sidebar';
    return $classes;
}






if ( ! function_exists( 'nimbo_show_post_recent_comments' ) ) {
	function nimbo_show_post_recent_comments( $show_avatar ) {
		// recent comments: show or hide
		$show_recent_comments = 1;
		if ( $show_recent_comments ) {
			// comments number (maximum value)
			$recent_comments_number = 3;
			// arguments
			$recent_comments_args = array(
				'post_id'		=> get_the_ID(),
				'post_type'		=> 'post',
				'status'		=> 'approve',
				'orderby'		=> 'comment_date_gmt',
				'order'			=> 'DESC',
				'number'		=> (int) $recent_comments_number,
				'type'			=> 'comment',
				'hierarchical'	=> 'threaded',
			);
			// get and show comments
			if ( $recent_comments = get_comments( $recent_comments_args ) ) {
				// comment content: number of words (maximum value)
				$comment_words_number = get_theme_mod( 'nimbo_comment_words_number', 8 );
				?>

				<!-- recent comments -->
				<div class="bwp-post-comments">

					<h4 class="bwp-post-comments-title">
						<i class="fas fa-comment fa-fw"></i><?php esc_html_e( 'Recent comments', 'nimbo' ); ?>
					</h4>

					<ul class="bwp-post-comments-list list-unstyled clearfix">

						<?php
						foreach ( $recent_comments as $comment ) {
							// current comment data: id, author email, author name, and comment content (trimmed)
							$current_comment_id = $comment->comment_ID;
							$current_comment_author_email = $comment->comment_author_email;
							$current_comment_author_name = $comment->comment_author;
							$current_comment_content = wp_trim_words( $comment->comment_content, (int) $comment_words_number );
							?>

							<!-- comment -->
							<li>
								<?php if ( $show_avatar ) { ?>
									<figure class="bwp-post-comment-author-avatar">
										<?php echo get_avatar( $current_comment_author_email, '72', '', esc_attr( $current_comment_author_name ) ); ?>
									</figure>
								<?php } ?>
								<div class="bwp-post-comment-content">
									<span class="bwp-post-comment-author"><?php echo esc_html( $current_comment_author_name ); ?></span>
									<div class="bwp-post-comment-excerpt">
										<a href="<?php the_permalink(); ?>#comment-<?php echo (int) $current_comment_id; ?>">
											<?php echo esc_html( $current_comment_content ); ?>
										</a>
									</div>
								</div>
							</li>
							<!-- end: comment -->

							<?php
						} // end: foreach
						?>

					</ul>

					<?php
					if ( comments_open() ) {
						?>
						<a href="<?php the_permalink(); ?>#respond" class="bwp-post-add-comment-link">
							<i class="fas fa-plus fa-fw"></i><?php esc_html_e( 'Add a comment...', 'nimbo' ); ?>
						</a>
						<?php
					} elseif ( get_comments_number() ) {
						?>
						<a href="<?php the_permalink(); ?>#comments" class="bwp-post-add-comment-link bwp-post-comments-closed">
							<i class="fas fa-comment-slash fa-fw"></i><?php esc_html_e( 'Comments are closed.', 'nimbo' ); ?>
						</a>
						<?php
					}
					?>

				</div>
				<!-- end: recent comments -->

				<?php
			}
		}
	}
}