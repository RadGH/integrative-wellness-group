<?php
/**
 * Starter functions common to all projects
 * Optional, frequently-useful functions are here too,
 * most of them arae commented out. Use as needed.
 */

/*************************
General Functions
*************************/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function aa_theme_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	
	// Style the dashboard slightly.
	function aa_custom_admin_styles() {
		/*wp_register_style('custom_admin_colors', get_template_directory_uri(). '/_static/styles/_admin/colors.css');
		wp_enqueue_style('custom_admin_colors');

		wp_register_style('custom_admin_styles_bare_theme', get_template_directory_uri(). '/_static/styles/_admin/bare-theme.css');
		wp_enqueue_style('custom_admin_styles_bare_theme');*/

		wp_register_style('custom_admin_styles', get_template_directory_uri(). '/_static/styles/_admin/admin-styles.css');
		wp_enqueue_style('custom_admin_styles');
	}
	add_action( 'admin_init', 'aa_custom_admin_styles' );
	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary' ),
	) );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	add_image_size( 'event', 196, 214 );
	add_image_size( 'treatment-quote', 400, 555, true );
}
add_action( 'after_setup_theme', 'aa_theme_setup' );

/**
 * Including ACF Pro
 * @version 5.3.4
 */
// Customize ACF path
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/_includes/acf-pro/';

    return $path;
}
add_filter('acf/settings/path', 'my_acf_settings_path');
// Customize ACF dir
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/_includes/acf-pro/';

    return $dir;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');
// Include ACF
include_once( get_stylesheet_directory() . '/_includes/acf-pro/acf.php' );


/**
 * Add ACF Addons
 */
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-image-crop/acf-image-crop.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-sidebar-selector-field/acf-sidebar_selector.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-menu-selector-field/acf-menus.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-background/acf-background.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-rgba-color-field/acf-rgba-color-picker.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-code-field/acf-code-field.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-font-awesome/acf-font-awesome.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-justified-image-grid/acf-justified-image-grid.php');
include_once( get_stylesheet_directory() . '/_includes/acf-addons/acf-medium-editor/acf-medium-editor.php');

/**
 * Add custom post types count action to WP Dashboard
 */
function aa_custom_post_type_dashboard_glance() {
	$glances = array();

	$args = array(
		'public'   => true,  // Showing public post types only
		'_builtin' => false  // Except the build-in wp post types (page, post, attachments)
	);

	// Getting the custom post types
	$post_types = get_post_types($args, 'object', 'and');

	foreach ($post_types as $post_type) {
		// Counting each post
		$num_posts = wp_count_posts($post_type->name);
		// Number format
		$num   = number_format_i18n($num_posts->publish);
		// Text format
		$text  = _n($post_type->labels->singular_name, $post_type->labels->name, intval($num_posts->publish));
		// If use capable to edit the post type
		if (current_user_can('edit_posts')) {
			// Show with link
			$glance = '<a class="'.$post_type->name.'-count" href="'.admin_url('edit.php?post_type='.$post_type->name).'">'.$num.' '.$text.'</a>';
		} else {
			// Show without link
			$glance = '<span class="'.$post_type->name.'-count">'.$num.' '.$text.'</span>';
		}
		// Save in array
		$glances[] = $glance;
	}
	// return them
	return $glances;
}
add_action('dashboard_glance_items', 'aa_custom_post_type_dashboard_glance');


/**
 * Force admin theme choice for all users
 */
// function aa_change_admin_color($result) {
//     return 'custom-theme';
// }
// add_filter('get_user_option_admin_color', 'aa_change_admin_color');


/**
 * Register widget area.
 *
 */
 function aa_widgets_init() {
 	register_sidebar( array(
 		'name'          => esc_html__( 'Blog Sidebar' ),
 		'id'            => 'sidebar-blog',
 		'description'   => '',
 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
 		'after_widget'  => '</section>',
 		'before_title'  => '<h2 class="widget-title">',
 		'after_title'   => '</h2>',
 	) );
 }
 add_action( 'widgets_init', 'aa_widgets_init' );



/**
 * Disable the auto genereated email sent to the admin after a core update
 */
// apply_filters( 'auto_core_update_send_email', false );


/**
 * Move Yoast WP SEO box to bottom of edit page/post
 */
function aa_yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'aa_yoast_to_bottom');


/**
 * Hide Yoast SEO metabox on [custom_post_type]
 */
// function aa_remove_wp_seo_meta_box() {
//     remove_meta_box( 'wpseo_meta', 'custom_post_type', 'normal' );
// }
// add_action( 'add_meta_boxes', 'aa_remove_wp_seo_meta_box', 1000 );


/**
 * Custom Excerpt length and formatting
 */
// function aa_get_the_excerpt($length = 50) {
// 	global $post;
// 	$explicit_excerpt = $post->post_excerpt;
//
// 	if ( '' == $explicit_excerpt ) {
// 		$text = get_the_content('');
// 		$text = apply_filters('the_content', $text);
// 		$text = str_replace(']]>', ']]>', $text);
// 	}
// 	else {
// 		$text = apply_filters('the_content', $explicit_excerpt);
// 	}
//
// 	$text = strip_shortcodes( $text ); // optional
// 	$allowed_tags = '<p>'; /*** dd the allowed HTML tags separated by a comma.***/
// 	$text = strip_tags($text, $allowed_tags);
// 	$excerpt_length = $length;
// 	$words = explode(' ', $text, $excerpt_length + 1);
//
// 	if (count($words) > $excerpt_length) {
// 		array_pop($words);
// 		array_push($words, '...');
// 		$text = implode(' ', $words);
// 		$text = apply_filters('the_excerpt',$text);
// 	}
//
// 	return $text;
// }
// add_filter('get_the_excerpt', 'aa_get_the_excerpt');

/*************************
WooCommerce Functions
*************************/

/**
 * Declare WooCommerce Support
 */
function aa_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'aa_woocommerce_support' );


/**
 * Remove the Woocommerce tabs from the single product
 */
// function aa_remove_product_tabs($tabs) {
//     unset( $tabs['description'] );      	// Remove the description tab
//     unset( $tabs['reviews'] ); 			// Remove the reviews tab
//     unset( $tabs['additional_information'] );  	// Remove the additional information tab
//     return $tabs;
// }
// add_filter( 'woocommerce_product_tabs', 'aa_remove_product_tabs', 98 );


/**
 * Remove Reviews metafield from editor
 */
// function aa_remove_post_metaboxes() {
// 	remove_meta_box( 'commentsdiv' , 'product' , 'normal' );
// }
// add_action('admin_menu', 'aa_remove_post_metaboxes', 50);


/**
 * Remove content editor from single product
 */
// function aa_remove_product_editor() {
// 	remove_post_type_support( 'product', 'editor' );
// }
// add_action( 'init', 'aa_remove_product_editor' );


/**
 * Remove Woocommerce Breadcrumbs
 */
// function aa_remove_wc_breadcrumbs() {
//     remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
// }
// add_action( 'init', 'aa_remove_wc_breadcrumbs' );


/**
 * Remove Install Woothemes Updater notice from Dashboard
 */
// remove_action( 'admin_notices', 'woothemes_updater_notice' );


/**
 * Display 16 products per page
 */
// add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );


/**
 * Change 'Shop' page title
 */
// function aa_wc_shop_page_title($page_title) {
//     if( 'Shop' == $page_title ) {
//         return 'All';
//     } else {
//         return $page_title;
//     }
// }
// add_filter( 'woocommerce_page_title', 'aa_wc_shop_page_title');
