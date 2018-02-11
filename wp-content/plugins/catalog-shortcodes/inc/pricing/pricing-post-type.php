<?php
if ( ! function_exists('catalog_pricing_post_type') ) {

// Register Custom Post Type
function catalog_pricing_post_type() {

	$labels = array(
		'name'                => _x( 'Pricing tables', 'Post Type General Name', 'catalog' ),
		'singular_name'       => _x( 'Pricing table', 'Post Type Singular Name', 'catalog' ),
		'menu_name'           => __( 'Pricing table', 'catalog' ),
		'parent_item_colon'   => __( 'Parent Item:', 'catalog' ),
		'all_items'           => __( 'All Items', 'catalog' ),
		'view_item'           => __( 'View Item', 'catalog' ),
		'add_new_item'        => __( 'Add New Item', 'catalog' ),
		'add_new'             => __( 'Add New', 'catalog' ),
		'edit_item'           => __( 'Edit Item', 'catalog' ),
		'update_item'         => __( 'Update Item', 'catalog' ),
		'search_items'        => __( 'Search Item', 'catalog' ),
		'not_found'           => __( 'Not found', 'catalog' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'catalog' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'pricing', $args );

}

// Hook into the 'init' action
add_action( 'init', 'catalog_pricing_post_type', 0 );

}


include 'meta-boxes-pricing.php';

?>