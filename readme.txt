 = WP UnFramework - WordPress Starter Developer Theme =

== DEMO ==

Go to [C3MDigital.com](http://c3mdigital.com) to see WP Unframework in action.

== Summary: ==

The WP UnFramework WordPress theme is a blank developer starter theme. It's a great empty slate upon which to build your own HTML5-based Wordpress themes.
Basic css structure has been added to give you a good starting place.  Most classes are left either undefined or with just minimal styling.


== WPU Framework Class ==

The framework class includes almost everything you need to get started.  The class initializes sidebars, widgets, custom post types, taxonomies, scripts via wp_enqueue_script, wp_nav_menus, custom meta boxes and more.  Just the minimal <del>framework</del> un framework exists for you to build on.

### WP UnFramework Includes:

1. A style sheet designed to strip initial files from browsers with just basic structure defined.
2. Easy to customize -- remove whatever you don't need, keep what you do.
3. Custom.js (functions file), jQuery Cycle, jQuery Fancybox snippets in place that you can choose to include or not
4. Semantic HTML 5 markup.  Nothing to get in the way of an SEO plugin like WordPress SEO
5. Responsive design ready including @media queries for all modern mobile devices
7. All functions and classes are commented and documented using PhpDoc Block standards
8. Compatible with PHP 5.4
9. All code uses WordPress best practices and up to date APIs (tested up to 3.5 alpha (583210)


== Class Wpu ==

Wpu is the theme class which is extended to add support for custom post types, taxonomies, custom widgets, javascript and css.

Static class variables are defined in the main Wpu class then used in the child classes.  For instance the sidebars are defined
in the protected static $sidebars variable as an array

`self::$sidebars = array(
 			'sidebar'   => array(
 				'name'  => 'Sidebar',
 				'desc'  => 'The main sidebar widget area'
 			),
 			'blog' => array(
 				'name'  => 'Blog Sidebar',
 				'desc'  => 'The blog page sidebar'
 			),
 			'single' => array(
 				'name'  => 'Single Sidebar',
 				'desc'  => 'Sidebar for single posts and pages'
 			),
 		);'

The child class Wpu_Sidebars uses the parent member variable to build the sidebars.  So to add new sidebars you simply define them
in the array.  The same method is used for custom taxonomies (disabled by default), custom post types (disabled by default)

== Javascript and CSS ==

The same class methods are used to enqueue javascript and css.  you simply define them in the protected static variable then they
are parsed by the Wpu_Scripts child class. The main style.css / a blank custom.js file and the comment reply script are enabled and
already defined for you.

The theme includes the latest version of jQuery Cycle and jQuery Fancybox.  To use either of these scripts they will need to be added to the
protected static $scripts variable in class-wpu.php like so:

`self::$scripts = array(
			'wpu-functions'  => array(
				'remote'     => false,
				'src'        => 'functions.js',
				'depends'    => array ( 'jquery', 'jquery-cycle', 'jquery-fancybox' ),
				'footer'     => true,
			),
			'jquery.cycle'   => array(
				'remote'     => false
				'src'        => 'jquery-cycle/jquery.cycle.min.js',
				'depends'    => array( 'jquery' ),
				'footer'     => true,
			),
			'jquery-fancybox' => array(
				'remote'     => false,
				'src'        => 'fancybox/jquery.fancybox-1.3.4.js',
				'depends'    => array( 'jquery' ),
				'footer'     => true,
		);`

**Note: Fancybox also requires the fancybox.css script that will need the wp_enqueue_style call  to be manually added to _/inc/scripts.php

== Class Wpu_Functions ==

This class holds custom functions, action hook callbacks, and filters.  This would be the best place to add any custom functions to the theme.
Any hooks or actions you need to attach are added to the main wpu class.  Example:

`add_filter( 'get_the_excerpt', array ( 'Wpu_Functions', 'custom_more' ) );`

The custom_more function is defined in class Wpu_Functions and the example filter above is added to the class actions() method and parsed
automatically.  To call any defined functions you add to the class use:

`Wpu::function_name();`

Since the functions are all defined within the class they are not floating around in the public namespace.  This allows you to use short
meaningful function names without having to prefix them.

== Support ==
Please use the wordpress.org forums or the github repository for support:
The project can be found at https://github.com/c3mdigital/wp-unframework
contributions are welcome :)


