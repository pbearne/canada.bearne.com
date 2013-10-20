<?php



if ( ! function_exists('first_nations') ) {

// Register Custom Post Type
function first_nations() {

	$labels = array(
		'name'                => _x( 'First Nations', 'Post Type General Name', 'canada_bearne' ),
		'singular_name'       => _x( 'First Nation', 'Post Type Singular Name', 'canada_bearne' ),
		'menu_name'           => __( 'First Nations', 'canada_bearne' ),
		'parent_item_colon'   => __( 'Parent First Nation:', 'canada_bearne' ),
		'all_items'           => __( 'All First Nations', 'canada_bearne' ),
		'view_item'           => __( 'View First Nation', 'canada_bearne' ),
		'add_new_item'        => __( 'Add First Nation', 'canada_bearne' ),
		'add_new'             => __( 'New First Nation', 'canada_bearne' ),
		'edit_item'           => __( 'Edit First Nation', 'canada_bearne' ),
		'update_item'         => __( 'Update First Nation', 'canada_bearne' ),
		'search_items'        => __( 'Search First Nations', 'canada_bearne' ),
		'not_found'           => __( 'NoFirst Nations found', 'canada_bearne' ),
		'not_found_in_trash'  => __( 'No First Nations found in Trash', 'canada_bearne' ),
	);
	$rewrite = array(
		'slug'                => 'first-nations',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'first_nations', 'canada_bearne' ),
		'description'         => __( 'First Nations pages', 'canada_bearne' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'post-formats', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'first_nations', $args );

}

// Hook into the 'init' action
add_action( 'init', 'first_nations', 0 );

}

function wpa82763_custom_type_in_categories( $query ) {
    if ( $query->is_main_query()
    && ( $query->is_category() || $query->is_tag() ) ) {
        $query->set( 'post_type', array( 'post', 'first_nations' ) );
    }
}
add_action( 'pre_get_posts', 'wpa82763_custom_type_in_categories' );