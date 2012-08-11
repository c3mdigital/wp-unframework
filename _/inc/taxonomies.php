<?php
/**
 * WordPress Template: Taxonomies
 *
 * @class Wpu_Taxonomies
 * @package WP UnFramework
 * @subpackage taxonomies.php
 */

class Wpu_Taxonomies extends Wpu {

	/**
	 * @var array $taxonomies
	 * @uses Wpu protected $taxonomies
	 * @since 1.0
	 */
	//public static $taxonomies;

 
	/**
	 * Registers taxonomies defined in parent class
	 *
	 * @since 0.1.0
	 */
    function taxonomies() {

		foreach ( Wpu::$taxonomies as $key => $value ) :

		$labels = array(
			'name' => $value['name'],
    		'singular_name' =>              $value['singular'],
    		'search_items'  => 'Search '.   $value['name'],
    		'all_items'     => 'All '.      $value['name'],
    		'edit_item'     => 'Edit '.     $value['singular'],
    		'update_item'   => 'Update '.   $value['singular'],
    		'add_new_item'  => 'Add new '.  $value['singular'],
    		'new_item_name' => 'New '.      $value['singular'],
    		'menu_name'     => isset(       $value['menu_name'] ) ? $value['menu_name'] : $value['name'],
		);
			
		$args = array(
			'labels'        => $labels,
			'public'        =>        $value['public'],
			'show_in_nav_menus'	=>    $value['public'],
			'show_tagcloud' => isset( $value['show_tag_cloud'] ) ? $value['show_tag_cloud'] : false,
			'hierarchical'  => isset( $value['hierarchical'] ) ? $value['hierarchical'] : true,
			'show_ui'       =>        $value['public'],
			'query_var'     => isset( $value['query_var'] ) ? $value['query_var'] : $value['public'],
			'capabilities'  => isset( $value['capabilities'] ) ? $value['capabilities'] : array( 'post' ),
			'rewrite'       => isset( $value['rewrite'] ) ? $value['rewrite'] : true,
			);
			
		register_taxonomy( $key, array( $value['object'] ), $args );
    		
		endforeach;
	}
}