<?php
/**
 * Custom CP template tags
 *
 */
if ( ! function_exists('cp_breadcrumbs')):
	/*Show Breadcrumbs in content-single if and only if this article is categorized.*/
	
	function cp_breadcrumbs(){
	$home = '<a href="'.home_url().'" rel="nofollow">Home</a>';
	$title = get_the_title();
	$categories_list = get_the_category_list( _x( ' &bull; ', 'Used between list items, there is a space after the comma.', 'cp' ) );
	if ( $categories_list && cp_categorized_blog() ) {
		printf(
			'<div class="breadcrumbs"><span class="screen-reader-text">%1$s </span><div class="breadcrumbs-item">%2$s</div><div class="breadcrumbs-item">%3$s</div><div class="breadcrumbs-item">%4$s</div></div>',
			_x( 'Breadcrumbs', 'Used before entry titles.', 'cp' ),
			$home,
			$categories_list,
			$title
		);
	}
	}
endif;


if ( ! function_exists( 'cp_aside_entry_meta' ) ) :
	function cp_aside_entry_meta() {
		cp_aside_entry_taxonomies();
		cp_entry_date();
	}

endif;


if ( ! function_exists( 'cp_aside_entry_taxonomies' ) ) :

	function cp_aside_entry_taxonomies() {
		$meta_box_location_value = get_post_meta( get_the_ID(), 'meta-box-location', TRUE );
		
		//$post_meta_value = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'cp' ) );
		if ( $meta_box_location_value ) {
			printf(
				'<span class="aside-location"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Location', 'Used before location names.', 'cp' ),
				$meta_box_location_value
			);
		}
		
		$meta_box_weather_value = get_post_meta( get_the_ID(), 'meta-box-weather', TRUE );
		
		//$post_meta_value = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'cp' ) );
		if ( $meta_box_weather_value ) {
			printf(
				'<span class="aside-weather"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Weather', 'Used before Weather names.', 'cp' ),
				$meta_box_weather_value
			);
		}
		
		$meta_box_mood_value = get_post_meta( get_the_ID(), 'meta-box-mood', TRUE );
		
		//$post_meta_value = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'cp' ) );
		if ( $meta_box_mood_value ) {
			printf(
				'<span class="aside-mood"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Mood', 'Used before mood names.', 'cp' ),
				$meta_box_mood_value
			);
		}
		
		
		
		


	}
endif;






if ( ! function_exists( 'cp_entry_meta' ) ) :
	function cp_entry_meta() {
		if('aside' === get_post_format()) {
			cp_aside_entry_meta(); //Special entry meta for aside posts. Show weather. Location. Mood......
			return;
		}
		
		else if ( 'post' === get_post_type() ) {
			printf(
				'<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span> <a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( 'Author', 'Used before post author name.', 'cp' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			cp_entry_date();
		}

		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			printf(
				'<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
				sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'cp' ) ),
				esc_url( get_post_format_link( $format ) ),
				get_post_format_string( $format )
			);
		}

		if ( 'post' === get_post_type() ) {
			cp_entry_taxonomies();
		}

		if (! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'cp' ), get_the_title() ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'cp_entry_date' ) ) :

	function cp_entry_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date()
		);

		printf(
			'<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'cp' ),
			esc_url( get_month_link(get_the_time( 'Y' ), get_the_time( 'm' )) ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'cp_entry_taxonomies' ) ) :

	function cp_entry_taxonomies() {
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'cp' ) );
		if ( $categories_list && cp_categorized_blog() ) {
			printf(
				'<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'cp' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'cp' ) );
		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			printf(
				'<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'cp' ),
				$tags_list
			);
		}
	}
endif;

if ( ! function_exists( 'cp_post_thumbnail' ) ) :

	function cp_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

		<?php
	endif;
	}
endif;

if ( ! function_exists( 'cp_excerpt' ) ) :

	function cp_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) :
			?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>

			</div><!-- .<?php echo $class; ?> -->
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'cp_excerpt_more' ) && ! is_admin() ) :

	function cp_excerpt_more() {
		$link = sprintf(
			'<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cp' ), get_the_title( get_the_ID() ) )
		);
		return ' &hellip; ' . $link;
	}
	add_filter( 'excerpt_more', 'cp_excerpt_more' );
endif;


if ( ! function_exists( 'cp_categorized_blog' ) ) :

	function cp_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'cp_categories' ) ) ) {
			$all_the_cool_cats = get_categories(
				array(
					'fields' => 'ids',
					'number' => 2,
				)
			);

			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'cp_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 || is_preview() ) {
			// This blog has more than 1 category so cp_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so cp_categorized_blog should return false.
			return false;
		}
	}
endif;

function cp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cp_categories' );
}
add_action( 'edit_category', 'cp_category_transient_flusher' );
add_action( 'save_post', 'cp_category_transient_flusher' );

if ( ! function_exists( 'cp_the_custom_logo' ) ) :

	function cp_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :

	function wp_body_open() {

		do_action( 'wp_body_open' );
	}
endif;


function cp_the_posts_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

function cp_comment_form(){
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args =  array(
		  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'cp' ) .
			'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder =  "'. __('Write down your thoughts here!','cp') . '" >' .
			'</textarea></p>',
		  'fields' => array(
			  'author' =>
				'<p class="comment-form-author"><label for="author">' . __( 'Name', 'cp' ) .
				( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . $aria_req . ' placeholder =  "'. __('Name *','cp') . '"/></p>',

			  'email' =>
				'<p class="comment-form-email"><label for="email">' . __( 'Email', 'cp' ) .
				( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' placeholder =  "'. __('Email *','cp') . '"/></p>',

			  'url' =>
				'<p class="comment-form-url"><label for="url">' . __( 'Website', 'cp' ) . '</label>' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" placeholder =  "'. __('Your website','cp') . '"/></p>',
		  ),
	); 
	comment_form($args);
}

function cp_toggle() {
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
		?>
		<style type="text/css">
			#toggle::before {
				display: none;
			}
		</style>
		<?php
	}
	else {
		?>
		<style type="text/css">
			#toggle {
				margin-top: -10px;
			}
		</style>
		<?php
	}
}


function cp_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
	
		<div class="comment-header">
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'cp' ), get_comment_author_link() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','cp' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s', 'cp'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)', 'cp' ), '  ', '' ); ?>
        </div>
		
		</div>
		
		
		<div class = "comment-content">
        <?php comment_text(); ?>
		</div>

        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}