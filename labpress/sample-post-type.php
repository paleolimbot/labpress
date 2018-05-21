<?php

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'lp_create_taxonomies', 0 );
function lp_create_taxonomies() {
        
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Sample Tags', 'taxonomy general name', 'text_domain' ),
		'singular_name'              => _x( 'Sample Tag', 'taxonomy singular name', 'text_domain' ),
		'search_items'               => __( 'Search Sample Tags', 'text_domain' ),
		'popular_items'              => __( 'Popular Sample Tags', 'text_domain' ),
		'all_items'                  => __( 'All Sample Tags', 'text_domain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Sample Tag', 'text_domain' ),
		'update_item'                => __( 'Update Sample Tag', 'text_domain' ),
		'add_new_item'               => __( 'Add New Sample Tag', 'text_domain' ),
		'new_item_name'              => __( 'New Sample Tag Name', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate sample tags with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove sample tags', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used sample tags', 'text_domain' ),
		'not_found'                  => __( 'No sample tags found.', 'text_domain' ),
		'menu_name'                  => __( 'Sample Tags', 'text_domain' ),
	);
	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'sample_tag' ),
	);
	register_taxonomy( 'sample_tags', 'sample', $args );
        
}

// create sample post type
add_action('init', 'lp_create_post_types', 0);
function lp_create_post_types() {
    // Register Custom Post Type
    $labels = array(
            'name'                  => _x( 'Samples', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Sample', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Samples', 'text_domain' ),
            'name_admin_bar'        => __( 'Sample', 'text_domain' ),
            'archives'              => __( 'Sample Archives', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Sample:', 'text_domain' ),
            'all_items'             => __( 'All Samples', 'text_domain' ),
            'add_new_item'          => __( 'Add New Sample', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Sample', 'text_domain' ),
            'edit_item'             => __( 'Edit Sample', 'text_domain' ),
            'update_item'           => __( 'Update Sample', 'text_domain' ),
            'view_item'             => __( 'View Sample', 'text_domain' ),
            'search_items'          => __( 'Search Samples', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $rewrite = array(
            'slug'                  => 'sample'
    );
    $args = array(
            'label'                 => __( 'Sample', 'text_domain' ),
            'description'           => __( 'Sample type.', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'revisions', 'custom-fields', ),
            'taxonomies'            => array( 'projects', 'locations', 'sample_tags' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_icon'             => 'dashicons-book',
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'samples',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
    );
    register_post_type( 'sample', $args );
}
