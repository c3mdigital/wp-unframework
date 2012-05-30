<?php
/**
 * WordPress Template: Taxonomies
 * 
 * This file is loaded from init.php
 * 
 *
 * @package WP UnFramework
 * @subpackage Theme Lib
 */

function taxonomies() {
  	$taxonomies = array(
 	
 /**
 * Each taxonomy should be in the taxonomies array
 * The foreach loop at the bottom of the page loops through each and registers it
 * @since 0.1
 *
 */
	 'custom_tax' => array(
	 //Begin Labels 
	'name' => 'SampleTaxonomies',
    	'singular_name' => 'SampleTaxonomy',
    	'search_items' =>  'Search SampleTaxonomies',
    	'all_items' => 'All SampleTaxonomies',
    	'parent_item' => 'Parent SampleTaxonomy',
    	'parent_item_colon' => 'Parent SampleTaxonomy:',
    	'edit_item' => 'Edit SampleTaxonomy',
    	'update_item' => 'Update SampleTaxonomy',
    	'add_new_item' => 'Add New SampleTaxonomy',
    	'new_item_name' => 'New SampleTaxonomy Name',
    	'menu_name' => 'SampleTax',
				
	//Begin Args
	'public' => true,
	'show_in_nav_menus'	=> true,
	'show_tagcloud' => false,  //Not here but maybe in a non hierarchical tax
    	'hierarchical' => true,
    	'show_ui' => true,
    	'query_var' => true,
    	'capabilities' => array( 'post' ),
    	'rewrite' => array( 'slug' => 'sample-tax' ),
    	'object_type' => 'wpuf_custom'
		)
		);
 
 /**
 * Registers taxonomies
 * 
 * Do not edit below this section it uses the values from the array above to
 * register the taxonomies
 * @since 0.1.0
 *
 */
 
 	foreach ( $taxonomies as $key => $value ) :
 	
		$labels = array(
 			'name' => $value[ 'name' ],
    			'singular_name' => $value[ 'singular_name' ],
    			'search_items' => $value[ 'search_items' ],
    			'all_items' => $value[ 'all_items' ],
    			'parent_item' => $value[ 'parent_item' ],
    			'parent_item_colon' => $value[ 'parent_item_colon' ],
    			'edit_item' => $value[ 'edit_item' ],
    			'update_item' => $value[ 'update_item' ],
    			'add_new_item' => $value[ 'add_new_item' ],
    			'new_item_name' => $value[ 'new_item_name' ],
    			'menu_name' => $value[ 'menu_name' ]
			);
			
		$args = array(
			'labels' => $labels,
			'public' => $value[ 'public' ],
			'show_in_nav_menus'	=> $value[ 'show_in_nav_menus' ],
			'show_tagcloud' => $value[ 'show_tagcloud' ],
    			'hierarchical' => $value[ 'hierarchical' ],
    			'show_ui' => $value[ 'show_ui' ],
    			'query_var' => $value[ 'query_var' ],
    			'capabilities' => $value[ 'capabilities' ],
    			'rewrite' => $value[ 'rewrite' ]	
			);
			
register_taxonomy( $key, array( $value[ 'object_type' ] ), $args );
    		
	endforeach;
}
 