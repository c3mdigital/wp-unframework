<?php
/**
 * WordPress Template: init.php
 * 
 * This file is loaded from functions.php
 * 
 *
 * @package Unframework
 * @subpackage Templates
 */

 class Wpu {

	 function __construct() {
		 require_once( THEME_LIB . '/functions.php' );
		 require_once( THEME_LIB . '/scripts.php' );
		 require_once( THEME_LIB . '/sidebars.php' );
		 require_once( THEME_LIB . '/widgets.php' );
		 require_once( THEME_LIB . '/taxonomies.php' );
		 require_once( THEME_LIB . '/custom_posts.php' );

		 if ( ! is_admin() ) {
		    require_once( THEME_ADMIN . '/example-functions.php' );
		    require_once( THEME_ADMIN . '/dashboard-cleanup.php' );
		 }
	 }

 	function init() {
		$this->setup();
 	}

	function setup() {
		add_action( 'after_setup_theme', array( $this, 'actions' ) );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'thumb', 200, 200, TRUE );
		add_theme_support( 'automatic-feed-links' );
		add_editor_style( THEME_CSS_URI . 'editor-style.css' );
		register_nav_menu( 'primary-nav', 'Primary Navigation' );
		add_theme_support( 'post-formats', array ( 'aside', ) );
		add_theme_support( 'automatic-feed-links' );
		$image_set = get_option( 'image_default_link_type' );
		if ( ! $image_set == 'none' ) {
			update_option( 'image_default_link_type', 'none' );
		}
	}
	
	function actions() {
		add_action( 'wp_enqueue_scripts', 'scripts' );
		add_action( 'widgets_init', 'sidebars' );
		add_action( 'widgets_init', 'wpu_register_widgets' );
		add_action( 'init', 'taxonomies' );
		add_action( 'init', 'custom_posts' );
	}

} //End class Wpu