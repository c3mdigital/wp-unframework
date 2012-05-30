<?php
/**
 * WordPress Template:
 * 
 * This file is automatically loaded by WordPress.
 *
 * @package Unframework
 * @subpackage Functions
 */

/**
 * Default constants 
 *
 * @since 0.1.0
 *
 */
 
define( 'THEME_DIR', dirname( __FILE__ ) );
define( 'THEME_LIB', THEME_DIR . '/_/inc' );
define( 'THEME_ADMIN', THEME_DIR . '/_/admin' );
define( 'THEME_URI', get_stylesheet_directory_uri() );
define( 'THEME_JS_URI', THEME_URI . '/_/js/' );
define( 'THEME_CSS_URI', THEME_URI . '/_/css/' );
define( 'THEME_IMG_URI', THEME_URI . '/_/images/' );

/**
 * Theme setup init 
 * Initializes the theme class Wpu
 * @since 0.1.0
 *
 */
	
require( THEME_LIB . '/init.php' );

$wpu = new Wpu();
$wpu->init();
	
