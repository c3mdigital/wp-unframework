<?php
/**
 * Theme functions file. Defines constants, initializes the Theme class
 * and includes theme lib files
 *
 * @package WP Unframework
 * @subpackage functions.php
 * @version 1.0
 */

/**
 * Define constants
 *
 * @since 0.1.0
 */
 
define( 'THEME_DIR', get_template_directory() );
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

/**
 * Uncomment custom_posts.php to create custom post types
 *   post types are defined in @class wpu.  @see class-wpu.php & @class Wpu_Custom_Post_Types
 *
 * Uncomment taxonomies.php to create custom taxonomies
 *   taxonomies are defined in @class wpu.  @see class-wpu.php & @class Wpu_Taxonomies
 */
function wpu_global_includes() {
//	require_once( THEME_LIB . '/custom_posts.php' );
	require_once( THEME_LIB . '/sidebars.php' );
	require_once( THEME_LIB . '/widgets.php' );
//	require_once( THEME_LIB . '/taxonomies.php' );
}

/**
 * Uncomment custom-meta-boxes.php to include the custom metabox library
 *  see: @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 *  for complete documentation.
 *
 * dashboard-cleanup.php enables the removal of any or all dashboard menus and meta boxes
 *    The action hooks are commented out and disabled by default. @see admin/dashboard-cleanup.php
 */
function wpu_admin_includes() {
//	require_once( THEME_ADMIN . '/custom-meta-boxes.php' );
	require_once( THEME_ADMIN . '/dashboard-cleanup.php' );
}

function wpu_public_includes() {
	require_once( THEME_LIB . '/scripts.php' );
	require_once( THEME_LIB . '/functions.php' );
}