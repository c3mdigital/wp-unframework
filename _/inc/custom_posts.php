<?php
/**
 * Registers custom post types
 * @class Wpu_Custom_Post_types
 *
 * @package WP UnFramework
 * @subpackage Theme include lib
 */


class Wpu_Custom_Post_Types extends Wpu {

	/**
	 * Custom post types
	 *
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected static $post_types;

	/**
	 * Registers custom post types defined in parent class
	 * @param array Wpu::post_types
	 */
	function post_types() {

		foreach ( parent::$post_types as $key => $value ) :
			$labels = array(
				'name'          => $value['singular'],
				'singular_name' => $value['singular'],
				'add_new'       => 'Add new '.$value['singular'],
				'all_items'     => 'All '.$value['plural'],
				'add_new_item'  => 'Add new '.$value['singular'],
				'edit_item'     => $value['singular'],
				'new_item'      => $value['singular'],
				'view_item'     => $value['singular'],
				'search_items'  => 'Search '.$value['plural'],
				'not_found'     => $value['singular']. ' not found',
				'not_found_in_trash' => $value['singular']. ' not found in trash',
				'parent_item_colon' => NULL,
				'menu_name'     => $value['plural']
			);
			
			$args = array(
				'labels'        => $labels,
				'public'        => $value['public'],
				'publicly_queryable' => $value['public'],
				'show_ui'       => $value['public'],
				'show_in_menu'  => $value['public'],
				'query_var'     => $value['public'],
				'rewrite'       => $value['rewrite'],
				'capability_type' => 'post',
				'has_archive'   => isset( $value['archive'] ) ? $value['archive'] : true,
				'hierarchical'  => isset( $value['hierarchical'] ) ? $value['hierarchical'] : false,
				'menu_position' => isset( $value['menu_position'] ) ? $value['menu_position'] : 15,
				'can_export'    => isset( $value[ 'can_export' ] ) ? $value['can_export'] : true,
				'show_in_nav_menus' => isset( $value['show_in_nav_menus'] ) ? $value['show_in_nav_menus'] : true,
				'taxonomies'    => $value[ 'taxonomies' ],
				'supports'      => $value[ 'supports' ]
			);
			
		register_post_type( $key, $args );

		endforeach;
	}
}
