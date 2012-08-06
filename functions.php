<?php
/**
 * Theme functions file.  Loaded automatically by WordPress
 *
 * @package WP Unframework
 * @subpackage functions.php
 * @version 1.0
 */

/**
 * Define theme constants
 *
 * @since 0.1.0
 */
 
define( 'THEME_DIR', dirname( __FILE__ ) );
define( 'THEME_LIB', THEME_DIR . '/_/inc' );
define( 'THEME_ADMIN', THEME_DIR . '/_/admin' );
define( 'THEME_URI', get_stylesheet_directory_uri() );
define( 'THEME_JS_URI', THEME_URI . '/_/js/' );
define( 'THEME_CSS_URI', THEME_URI . '/_/css/' );
define( 'THEME_IMG_URI', THEME_URI . '/_/images/' );

if ( ! class_exists( 'Wpu' ) ) :
/**
 * Theme setup init 
 * Initializes the theme class Wpu
 * @since 0.1.0
 */
require_once( THEME_DIR . '/_/class-wpu.php' );

wpu_global_includes();

if ( is_admin() )
	wpu_admin_includes();
else
	wpu_public_includes();

new Wpu();

endif;

function wpu_global_includes() {
	require_once( THEME_LIB . '/custom_posts.php' );
	require_once( THEME_LIB . '/functions.php' );
	require_once( THEME_LIB . '/sidebars.php' );
	require_once( THEME_LIB . '/widgets.php' );
	require_once( THEME_LIB . '/taxonomies.php' );
}

function wpu_admin_includes() {
	require_once( THEME_ADMIN . '/example-functions.php' );
	require_once( THEME_ADMIN . '/dashboard-cleanup.php' );
}

function wpu_public_includes() {
	require_once( THEME_LIB . '/scripts.php' );
}