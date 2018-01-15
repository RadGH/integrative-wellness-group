<?php
/**
 * Register team_member post type
 */
function aa_register_team_member() {
    $labels = array(
        'name' => _x( 'Team Members', 'team_member' ),
        'singular_name' => _x( 'Team Member', 'team_member' ),
        'add_new' => _x( 'Add New', 'team_member' ),
        'add_new_item' => _x( 'Add New Team Member', 'team_member' ),
        'edit_item' => _x( 'Edit Team Member', 'team_member' ),
        'new_item' => _x( 'New Team Member', 'team_member' ),
        'view_item' => _x( 'View Team Member', 'team_member' ),
        'search_items' => _x( 'Search Team Member', 'team_member' ),
        'not_found' => _x( 'No Team Member found', 'team_member' ),
        'not_found_in_trash' => _x( 'No Team Member found in Trash', 'team_member' ),
        'parent_item_colon' => _x( 'Parent Team Member:', 'team_member' ),
        'menu_name' => _x( 'Team Members', 'team_member' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'thumbnail' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'team_member', $args );
}
add_action( 'init', 'aa_register_team_member' );

/**
 * Register success_story post type
 */
function aa_register_success_story() {
    $labels = array(
        'name' => _x( 'Success Stories', 'success_story' ),
        'singular_name' => _x( 'Success Story', 'success_story' ),
        'add_new' => _x( 'Add New', 'success_story' ),
        'add_new_item' => _x( 'Add New Success Story', 'success_story' ),
        'edit_item' => _x( 'Edit Success Story', 'success_story' ),
        'new_item' => _x( 'New Success Story', 'success_story' ),
        'view_item' => _x( 'View Success Story', 'success_story' ),
        'search_items' => _x( 'Search Success Story', 'success_story' ),
        'not_found' => _x( 'No Stories found', 'success_story' ),
        'not_found_in_trash' => _x( 'No Stories found in Trash', 'success_story' ),
        'parent_item_colon' => _x( 'Parent Story:', 'success_story' ),
        'menu_name' => _x( 'Success Stories', 'success_story' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-format-quote',

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'success_story', $args );
}
add_action( 'init', 'aa_register_success_story' );

/**
 * Register success_story post type
 */
function aa_register_event() {
    $labels = array(
        'name' => _x( 'Events', 'event' ),
        'singular_name' => _x( 'Event', 'event' ),
        'add_new' => _x( 'Add New', 'event' ),
        'add_new_item' => _x( 'Add New Event', 'event' ),
        'edit_item' => _x( 'Edit Event', 'event' ),
        'new_item' => _x( 'New Event', 'event' ),
        'view_item' => _x( 'View Event', 'event' ),
        'search_items' => _x( 'Search Event', 'event' ),
        'not_found' => _x( 'No Stories found', 'event' ),
        'not_found_in_trash' => _x( 'No Stories found in Trash', 'event' ),
        'parent_item_colon' => _x( 'Parent Story:', 'event' ),
        'menu_name' => _x( 'Events', 'event' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'thumbnail' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-calendar-alt',

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'event', $args );
}
add_action( 'init', 'aa_register_event' );

// Register Event Categories
function event_categories() {

	$labels = array(
		'name'                       => 'Event Categories',
		'singular_name'              => 'Event Category',
		'menu_name'                  => 'Event',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'event_category', array( 'event' ), $args );

}
add_action( 'init', 'event_categories', 0 );
