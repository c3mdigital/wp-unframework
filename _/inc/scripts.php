<?php
/**
 * WordPress Template: Scripts
 * 
 * This file is loaded by init.php
 *
 * @package UnFramework
 * @subpackage Scripts
 */
 
/**
 * 	Register and enqueue javascript and css.  Also checks for Gravity Forms and adds custom
 *  style sheet if plugin is active.  Comments css and comment-rely.js only added on singular
 *  pages with comments open.
 *
 * @var array|string handle
 * @var bool remote	optional default false
 * @var string src required
 * @var array deps dependencies optional
 * @var bool footer optional default false
 */

	function scripts() {
 	$scripts = array(
 		'functions'	=> array(
			'remote'    => false,
 			'src'		=> 'functions.js',
 			'deps'		=> array( 'jquery', 'jquery.cycle' ),
 			'footer'	=> true,
 			),
		 'jquery.cycle' => array(
			 'remote'   => false,
			 'src'      => 'jquery-cycle/jquery.cycle.min.js',
			 'deps'     => array( 'jquery' ),
			 'footer'   => true,
		 ),

 	);

 	foreach ( $scripts as $key => $value ) :
       
      if ( is_array( $value ) && array_key_exists( 'src', $value ) ) :
      
        $src = !empty( $value[ 'remote' ] ) ? $value[ 'src' ] : THEME_JS_URI . $value[ 'src' ];
		
        	if ( ! $value['deps'] == null ) :
        	wp_register_script( $key, $src, $value[ 'deps' ], false, !empty( $value[ 'footer' ] ) );
        	
        	else :
        	wp_register_script( $key, $src, false, !empty( $value[ 'footer' ] ) );
        	endif;
       
      else :

	      if ( isset( $src ) ) {
		      wp_register_script( $key, THEME_JS_URI . $src, $value, false );
	      }
        
      endif;
      
      	wp_enqueue_script( $key );

    endforeach;
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'gravityforms/gravityforms.php' ) )
		wp_enqueue_style( 'gravityforms-css', THEME_CSS_URI . 'gravity-forms.css', array ( 'style' ) );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
      	wp_enqueue_script( 'comment-reply' );
	if ( is_singular() && comments_open() )
		wp_enqueue_style( 'comments-css', THEME_CSS_URI . 'comments.css', array( 'style') );
	}
