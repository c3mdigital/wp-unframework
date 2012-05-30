<?php
/**
 * Define your theme sidebars here.
 *
 *
 * @package WP UnFramework
 * @subpackage sidebars.php
 *
 */
 
/**
 * Add any extra sidebars in the sidebars array. 'Sidebar Name' => 'sidebar_id'.
 */
function sidebars() {
	$sidebars = array(
		'Home'		=>	'home',
		'Interior'	=>	'interior'
		);
		
		
	foreach ( $sidebars as $key => $value ) :
	
		register_sidebar( array(
            'name'            =>"$key Sidebar",
            'id'              => "aside-$value",
            'description'     => "$value asides sidebar",
            'before_widget'   => '<section id="%1$s" class="module %2$s">', 
            'after_widget'    => '</section>',
            'before_title'    => '<h3>',
            'after_title'     => '</h3>'
        ));
        
	endforeach;
}