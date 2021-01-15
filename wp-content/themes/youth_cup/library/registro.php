<?php
// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );


// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// let's create the function for the custom type
function registradora() { 
	// creating (registering) the custom type 
	register_post_type( 'registradora', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Registro', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Formulario de registro', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All forms', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'New form', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New form', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Form', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New form', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View form', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search form', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Template para el formulario de registro', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/form-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'registro', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'registro', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	#register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'registradora' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'registradora');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
?>
