<?php
/**
 * Register Testimonial menu in admin area.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Add Testimonials Menu to Admin
---------------------------------------------------------------------------------- */
function thinkup_register_testimonialpost() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'experon' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'experon' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'experon', 'experon' ),
		'add_new_item'       => __( 'Add New Testimonial', 'experon' ),
		'edit_item'          => __( 'Edit Testimonial', 'experon' ),
		'new_item'           => __( 'New Testimonial', 'experon' ),
		'view_item'          => __( 'View Testimonial', 'experon' ),
		'search_items'       => __( 'Search Testimonials', 'experon' ),
		'not_found'          =>  __( 'No testimonials found', 'experon' ),
		'not_found_in_trash' => __( 'No testimonials found in Trash', 'experon' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Testimonials', 'experon' ),
	);
	  
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonials' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => array('category'),
		'menu_icon'          => 'dashicons-format-chat'
	);

	/* Register Testimonial menu */
	register_post_type( 'testimonial', $args );


	/* Fixes redirect to 404 error template */
	flush_rewrite_rules();
	  
	/* Initialise New Taxonomy Labels */
	$labels = array(
		'name'              => _x( 'Tags', 'taxonomy general name', 'experon' ),
		'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'experon' ),
		'search_items'      => __( 'Search Types', 'experon' ),
		'all_items'         => __( 'All Tags', 'experon' ),
		'parent_item'       => __( 'Parent Tag', 'experon' ),
		'parent_item_colon' => __( 'Parent Tag:', 'experon' ),
		'edit_item'         => __( 'Edit Tags', 'experon' ),
		'update_item'       => __( 'Update Tag', 'experon' ),
		'add_new_item'      => __( 'Add New Tag', 'experon' ),
		'new_item_name'     => __( 'New Tag Name', 'experon' ),
	);

	/*  Register custom taxonomy for Testimonial tags */
	register_taxonomy( 'tagtestimonial', array( 'testimonial' ), array(
		'hierarchical' => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array( 'slug' => 'tag-testimonial' ),
	));
	  
}
add_action('init', 'thinkup_register_testimonialpost');
	

/* ----------------------------------------------------------------------------------
	Custom Testimonial Messages
---------------------------------------------------------------------------------- */
function thinkup_register_testimonialmessages( $messages ) {
global $post, $post_ID;

	$messages[ 'testimonial' ] = array(
		0 => '',
		1 => sprintf( 'Testimonial updated. <a href="%s">View testimonial</a>', esc_url( get_permalink( $post_ID ) ) ),
		2 => 'Custom field updated.',
		3 => 'Custom field deleted.',
		4 => 'Testimonial updated.',
		5 => isset($_GET[ 'revision' ]) ? sprintf( 'Testimonial restored to revision from %s', wp_post_revision_title( (int) 

$_GET[ 'revision' ], false ) ) : false,
		6 => sprintf( 'Testimonial published. <a href="%s">View testimonial</a>', esc_url( get_permalink( $post_ID ) ) ),
		7 => 'Testimonial saved.',
		8 => sprintf( 'Testimonial submitted. <a target="_blank" href="%s">Preview testimonial</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( 'Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview testimonial</a>',
		  date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( 'Testimonial draft updated. <a target="_blank" href="%s">Preview testimonial</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'thinkup_register_testimonialmessages' );