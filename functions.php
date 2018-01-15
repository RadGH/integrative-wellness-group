<?php
/**
 * The various functions are split up and included in the following 3 files.
 * This file is otherwise kept (mostly) bare for you to add your custom functions here.
 */

/**
 * Include optional functions common to all projects
 */
include_once('_includes/common-functions.php');
/**
 * Include Custom Post Types
 */
include_once("_includes/custom-post-types.php");
/**
 * Include scripts and stylesheets from JS plugins
 */
include_once('_includes/enqueue-scripts.php');
/**
 * Bootstrap 4 Navwalker
 * @link https://github.com/dupkey/bs4navwalker
 */
include_once('_includes/bs4navwalker.php');
/**
 * Includes for admin customisation
 */
// include_once('_includes/admin/dashboard-widgets.php' ); // Add custom tweaks to the adman dashboard on the back end.
include_once('_includes/admin/welcome-panel.php' ); // Add a custom welcome panel on the back end.
//
// // Custom Dashboard
// function my_custom_dashboard() {
//     $screen = get_current_screen();
//     if( $screen->base == 'dashboard' ) {
//         include '_includes/admin/welcome-panel.php';
//     }
// }
// add_action('admin_notices', 'my_custom_dashboard');

/**
 * Register ACF Options page and base theme fields
 */
if( function_exists('acf_add_options_page') ) {
	$user = wp_get_current_user();
	$user = $user->user_login;

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	if( $user == 'alchemyandaim' ) :
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Developer Settings',
		'menu_title'	=> 'Developer',
		'parent_slug'	=> 'theme-general-settings',
	));
	endif;
}
require_once( get_template_directory() . '/_includes/acf-base.php' );


/**
 * Define some global variables
 * @var string $images_dir 		Directory for the theme images
 */
$images_dir = get_bloginfo('template_directory') . '/_static/images';


/**
 * Customize admin login logo
 */
function aa_custom_login_logo() {
	echo '<style type="text/css">
	h1 a {
		background-image:url('. get_template_directory_uri() .'/_static/images/site-Logo-full.png) !important;
		padding-bottom: 0px !important;
		margin-bottom: 0 !important;
		background-size: 220px !important;
		height: 80px !important;
		width: 100% !important;
	}
	#loginform .button-primary {
		// border-color: #bbbdc0;
		// background: #bbbdc0;
	}
	</style>';
}
add_action('login_head', 'aa_custom_login_logo');

/*
* Add A+A button shortcode
*/
function aa_shortcode_button( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'href' => '#',
			'text' => '',
			'type' => 'btn-primary',
		),
		$atts,
		'button'
	);
	return "<a href='" . $atts['href'] . "' class='btn " . $atts['type'] . "'>" . $atts['text'] . "</a>";
}
add_shortcode( 'button', 'aa_shortcode_button' );

/*
 * Add a search button dynamically to the main nav
 */
function main_nav_wrap() {
	// default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
	// Define the new nav item
	$new_item = '<li class="menu-item menu-item-type-post_type menu-item-object-page nav-item">
					<a id="search-Button" href="#" title="View your shopping cart"><i class="fa fa-search fa-flip-horizontal"></i></a>
				</li>';

	// open the <ul>, set 'menu_class' and 'menu_id' values
	$wrap  = '<ul id="%1$s" class="%2$s">';

	// get nav items as configured in /wp-admin/
	$wrap .= '%3$s';

	// the view cart link
	$wrap .= $new_item;

	// close the <ul>
	$wrap .= '</ul>';
	// return the result
	return $wrap;
}


/*
 * Add a custom button dynamically to the top nav
 */
function top_nav_wrap() {
	// default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'

	$page_id = 367; // get started page

	if ( get_field('include_custom_button', $page_id) && is_page($page_id) ) {
		// Define the new nav item
		$new_item = '<li class="btn-blue menu-item nav-item">
						<a href="' . get_field('custom_nav_button_url', $page_id) . '" class="nav-link">' . get_field('custom_nav_button_text', $page_id) . '</a>
					</li>';
	}

	// open the <ul>, set 'menu_class' and 'menu_id' values
	$wrap  = '<ul id="%1$s" class="%2$s">';

	// get nav items as configured in /wp-admin/
	$wrap .= '%3$s';

	// the view cart link
	$wrap .= $new_item;

	// close the <ul>
	$wrap .= '</ul>';
	// return the result
	return $wrap;
}

/**
 * Output header banner content fields.
 * Included on most templates.
 */
function aa_header_banner() {
	// If on the blog page
	if ( is_home() || is_singular('post') ) {
		$header_banner = get_field('include_header_banner', get_option('page_for_posts'));
		$override_form = get_field('override_ifs_form', get_option('page_for_posts'));
	} else {
		$header_banner = get_field('include_header_banner');
		$override_form = get_field('override_ifs_form');
	}
	$form_code;

	if ( $override_form ) {
		// If on the blog page
		if ( is_home() || is_singular('post') ) {
			$form_code = get_field('signup_banner_form-header', get_option('page_for_posts'));
		} else {
			$form_code = get_field('signup_banner_form-header');
		}
	} else {
		$form_code = get_field('ifs_signup_form_code', 'option');
	}

    if ( $header_banner == 'newsletter' ) {
		// If on the blog page
		if ( is_home() || is_singular('post') ) {
        	set_query_var('banner_content', get_field('signup_banner_heading-header', get_option('page_for_posts')));
		} else {
			set_query_var('banner_content', get_field('signup_banner_heading-header'));
		}
        set_query_var('banner_form', $form_code);
        get_template_part('_template-parts/component', 'banner-signup');
    } elseif ( $header_banner == 'content' ) {
		// If on the blog page
		if ( is_home() || is_singular('post') ) {
        	set_query_var('banner_content', get_field('custom_content_banner-header', get_option('page_for_posts')));
		} else {
			set_query_var('banner_content', get_field('custom_content_banner-header'));
		}
        get_template_part('_template-parts/component', 'banner-content');
    }
}

/**
 * Output footer banner content fields.
 * Included on most templates.
 */
function aa_footer_banner() {
	$footer_banner = get_field('include_footer_banner');
	$override_form = get_field('override_ifs_form-footer');
	$form_code;

	if ( $override_form ) {
		$form_code = get_field('signup_banner_form-header');
	} else {
		$form_code = get_field('ifs_signup_form_code', 'option');
	}

    if ( $footer_banner == 'newsletter' ) {
        set_query_var('banner_content', get_field('signup_banner_heading-footer'));
		set_query_var('banner_form', $form_code);
        get_template_part('_template-parts/component', 'banner-signup');
    } elseif ( $footer_banner == 'content' ) {
        set_query_var('banner_content', get_field('custom_content_banner-footer'));
        get_template_part('_template-parts/component', 'banner-content');
    }
}

/*---------------------------------
	Register Menu Areas
------------------------------------*/
register_nav_menus( array(  
'primary' => __( 'Main Navigation', 'alchemyaim' ),
'mobile' => __( 'Mobile Navigation', 'alchemyaim' ),
) );

/**
 * Custom Excerpt length and formatting
 */
function aa_get_the_excerpt($length = 45) {
	global $post;
	$explicit_excerpt = $post->post_excerpt;

	if ( '' == $explicit_excerpt ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	else {
		$text = apply_filters('the_content', $explicit_excerpt);
	}

	$text = strip_shortcodes( $text ); // optional
	$allowed_tags = '<p>'; /*** dd the allowed HTML tags separated by a comma.***/
	$text = strip_tags($text, $allowed_tags);
	$excerpt_length = $length;
	$words = explode(' ', $text, $excerpt_length + 1);

	if (count($words) > $excerpt_length) {
		array_pop($words);
		array_push($words, '...');
		$text = implode(' ', $words);
		$text = apply_filters('the_excerpt',$text);
	}

	return $text;
}
add_filter('get_the_excerpt', 'aa_get_the_excerpt');

/**
 * Custom Comments Area
 * called by wp_list_comments
 */
function aa_custom_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <article id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>

            <div class="comment-meta">
                <div class="comment-author vcard">
                    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    <?php printf( __( '<cite class="fn">%s</cite> / ' ), get_comment_author_link() ); ?>
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                    <br />
                <?php endif; ?>

                <div class="comment-metadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf( __('%1$s'), get_comment_date('m.d.Y') ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
                    ?>
                </div>
            </div>

            <div class="comment-content">
                <?php comment_text(); ?>
            </div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
            <?php if ( 'div' != $args['style'] ) : ?>
        </article>
    <?php endif; ?>
<?php
}
/***/

function my_post_queries( $query ) {
  if (!is_admin() && $query->is_main_query()){

    if(is_post_type_archive('events')){
      $query->set('order', 'DESC');
    }
  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

/**
 * Prevent update notices for certain plugins
 */
function filter_plugin_updates( $value ) {
    unset( $value->response['wp-migrate-db-pro/wp-migrate-db-pro.php'] );
    unset( $value->response['wp-migrate-db-pro-media-files/wp-migrate-db-pro-media-files.php'] );
    unset( $value->response['simple-podcast-press/simple-podcast-press.php'] );

    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

function _remove_script_version( $src ){
	if( strpos($src, 'font') !== false ){
		return $src;
	}
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );