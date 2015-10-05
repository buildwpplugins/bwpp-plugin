<?php
/**
 * Plugin Name: BWPP Site Functionality
 * Description: Holds primary functionality for this site.
 * Version: 0.1
 * Author: Daron Spence
 * Text Domain: bwpp
 */

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function BWPP_post_types() {

	$labels = array(
		'name'                => __( 'Tutorials', 'bwpp' ),
		'singular_name'       => __( 'Tutorial', 'bwpp' ),
		'add_new'             => _x( 'Add New Tutorial', 'bwpp', 'bwpp' ),
		'add_new_item'        => __( 'Add New Tutorial', 'bwpp' ),
		'edit_item'           => __( 'Edit Tutorial', 'bwpp' ),
		'new_item'            => __( 'New Tutorial', 'bwpp' ),
		'view_item'           => __( 'View Tutorial', 'bwpp' ),
		'search_items'        => __( 'Search Tutorials', 'bwpp' ),
		'not_found'           => __( 'No Tutorials found', 'bwpp' ),
		'not_found_in_trash'  => __( 'No Tutorials found in Trash', 'bwpp' ),
		'parent_item_colon'   => __( 'Parent Tutorial:', 'bwpp' ),
		'menu_name'           => __( 'Tutorials', 'bwpp' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'tutorials' ),
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'comments','page-attributes'
			)
	);

	register_post_type( 'tutorial', $args );
}

add_action( 'init', 'BWPP_post_types' );

add_action( 'admin_init', function(){
	include_once('gf-acf-field.php');
});
