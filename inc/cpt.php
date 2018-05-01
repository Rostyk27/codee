<?php
//Example for Custom Post Type with Taxonimies

/*
    *** You van use dash-icons https://developer.wordpress.org/resource/dashicons/
*/

function add_portfolio_posts(){
	register_post_type(
		'portfolio',
		array(
			'labels'        => array(
				'name'                  => 'Portfolio',
				'singular_name'         => 'Portfolio item',
				'add_new'               => 'Add new',
				'add_new_item'          => 'Add new item',
				'edit'                  => 'Edit',
				'edit_item'             => 'Edit item',
				'new_item'              => 'New item',
				'view'                  => 'View',
				'view_item'             => 'View item',
				'search_items'          => 'Search item',
				'not_found'             => 'Not found',
				'not_found_in_trash'    => 'Not find in trash',
			),
			'public'        => true,
			'hierarchical'  => true,
			'has_archive'   => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				//'post-formats',
				'portfolio_artical_category'
			),
			'can_export' => true,
		)
	);
}
add_action('init','add_portfolio_posts');

function my_taxonomies_portfolio_artical() {
	$labels = array(
		'name'              => _x( 'Category portfolio', 'taxonomy general name' ),
		'singular_name'     => _x( 'Singular name', 'taxonomy singular name' ),
		'search_items'      => __( 'Search items' ),
		'all_items'         => __( 'All item' ),
		'parent_item'       => __( 'Parent item' ),
		'parent_item_colon' => __( 'Parent item colon' ),
		'edit_item'         => __( 'Edit item' ),
		'update_item'       => __( 'Update item' ),
		'add_new_item'      => __( 'Add new item' ),
		'new_item_name'     => __( 'New item name' ),
		'menu_name'         => __( 'Category' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui'           => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'portfolio_artical_category', 'portfolio', $args );
}
add_action( 'init', 'my_taxonomies_portfolio_artical', 0 );