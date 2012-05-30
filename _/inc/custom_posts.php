<?php
/**
 * WordPress Template: Custom Posts
 * 
 * This file is loaded from init.php
 * 
 *
 * @package WP UnFramework
 * @subpackage Theme include lib
 */
 
				
/**
 * Post Labels Description	
 * name -				general name for the post type, usually plural. The same as, and overridden by $post_type_object->label
 * singular_name -		name for one object of this post type. Defaults to value of name
 * add_new -			the add new text. The default is Add New for both hierarchical and non-hierarchical types. When internationalizing this string, please use a gettext context matching your post type. Example: _x('Add New', 'product');
 * all_items -			the all items text used in the menu. Default is the Name label
 * add_new_item - 		the add new item text. Default is Add New Post/Add New Page
 * edit_item - 			the edit item text. Default is Edit Post/Edit Page
 * new_item - 			the new item text. Default is New Post/New Page
 * view_item - 			the view item text. Default is View Post/View Page
 * search_items - 		the search items text. Default is Search Posts/Search Pages
 * not_found - 			the not found text. Default is No posts found/No pages found
 * not_found_in_trash -	the not found in trash text. Default is No posts found in Trash/No pages found in Trash
 * parent_item_colon -	the parent text. This string isn't used on non-hierarchical types. In hierarchical ones the default is Parent Page
 * menu_name - 			the menu name text. This string is the name to give menu items. Defaults to value of name
 *
 */

function custom_posts() {
 	$post_types = array(
 	
 /**
 * Each post type should be listen in the post_types array
 * The foreach loop at the bottom of the page loops through each and registers it
 * @since 0.1
 *
 */
	 	'wpuf_custom' => array(
	 	//Begin Labels 
			'name'	=> 'Custom',	
			'singular_name'	=> 'Custom', 		
			'add_new' => 'Add New',				
			'all_items' => 'All Customs', 			
			'add_new_item' => 'New Custom',			
			'edit_item' => 'Edit Custom',			
			'new_item' => 'New Custom',				
			'view_item' => 'View Custom', 			
			'search_items' => 'Search The Customs',			
			'not_found' => 'No Customs Found',			
			'not_found_in_trash' => 'No Customs Found in the Garbage Dude!!', 	
			'parent_item_colon' => 'Parent Custom',
			'menu_name' => 'Custom',
				
		//Begin Args			
    		'public' => true,
    		'publicly_queryable' => true,
    		'show_ui' => true, 
    		'show_in_menu' => true, 
    		'query_var' => true,
    		'rewrite' => true,
    		'capability_type' => 'post',
    		'has_archive' => true, 
    		'hierarchical' => true,
    		'menu_position' => 15,
    		'has_archive'	=> true,
    		'can_export'	=> true,
    		'show_in_nav_menus' => true,
    		'taxonomies' => array( 'custom_tax', 'tags', 'categories' ),
    		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )				
			)				
		);
 
 /**
 * Registers custom post types
 *
 * @since 0.9.0
 *
 */
 
 	foreach ( $post_types as $key => $value ) :
		$labels = array(
 			'name' => $value[ 'name' ],
			'singular_name' => $value[ 'singular_name' ],		
			'add_new' => $value[ 'add_new' ],				
			'all_items' => $value[ 'all_items' ],			
			'add_new_item' => $value[ 'add_new_item' ],		
			'edit_item' => $value[ 'edit_item' ],		
			'new_item' => $value[ 'new_item' ],			
			'view_item' => $value[ 'view_item' ],			
			'search_items' => $value[ 'search_items' ],	
			'not_found' => $value[ 'not_found' ],		
			'not_found_in_trash' => $value[ 'not_found_in_trash' ],	
			'parent_item_colon' => $value[ 'parent_item_colon' ],
			'menu_name' => $value[ 'menu_name' ]
			);
			
		$args = array(
			'labels' => $labels,		
 			'public' => $value[ 'public' ],
 			'publicly_queryable' => $value[ 'publicly_queryable' ],
    		'show_ui' => $value[ 'show_ui' ],
    		'show_in_menu' => $value[ 'show_in_menu' ],
    		'query_var' => $value[ 'query_var' ],
    		'rewrite' => $value[ 'rewrite' ],
    		'capability_type' => $value[ 'capability_type' ],
    		'has_archive' => $value[ 'has_archive' ],
    		'hierarchical' => $value[ 'hierarchical' ],
    		'menu_position' => $value[ 'menu_position' ],
    		'has_archive' => $value[ 'has_archive' ],
    		'can_export' => $value[ 'can_export' ],
    		'show_in_nav_menus' => $value[ 'show_in_nav_menus' ],
    		'taxonomies' => $value[ 'taxonomies' ],
    		'supports' => $value[ 'supports' ]
			);
			
register_post_type( $key, $args );
    		
	endforeach;
}
 	
 	 
 
 	