<?php
/**
 * 404 Error Page Template
 *
 * @package WP Unframework
 * @subpackage 404.php
 */

get_header();

	 _e( '<h2>Error 404 - Page Not Found</h2>','wpu' );
	 _e( '<p>Sorry about this but the page you were looking for was not found</p>', 'wpu' );

get_sidebar();
get_footer();