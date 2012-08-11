<?php
/**
 * Theme class initialization
 *
 * @class Wpu
 * @package Unframework
 * @subpackage class-wpu.php
 */

class Wpu {

	/**
	 * Custom post types
	 *
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected static $post_types;

	/**
	 * Registered sidebars
	 *
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected static $sidebars;

	/**
	 * Custom taxonomies
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected static $taxonomies;

	/**
	 * Custom Widgets
	 *
	 * @var array
	 * @access public
	 * @since 1.0
	 */
	public static $widgets;

	/**
	 * Javascript files to enqueue
	 *
	 * @var array
	 * @access protected
	 * @since 1.0
	 */
	protected static $scripts;

	/**
	 * Registered nav menus
	 *
	 * @var array
	 * @access private
	 * @since 1.0
	 */
	private $nav_menus;

	/**
	 * Users chosen date format
	 *
	 * @var string
	 * @status public
	 * @since 1.0
	 */
	public static $date_format;


	function __construct() {
		$this->_set_vars();
		$this->actions();
		$this->filters();

		if ( ! is_admin() )
			new Wpu_Scripts();
	 }

	/**
	 * Sets the class variables used in the class extensions
	 * @since 1.0
	 * @status public
	 */
	function _set_vars() {
		self::$post_types = array(
			'custom' => array(
				'singular'  => 'Custom',
				'plural'    => 'Customs',
				'public'    => true,
				'rewrite'   => array( 'slug' => 'custom-pts', 'with_front' => false ),
				'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
				'taxonomies'=> array( 'example' ),
			),
		);
		self::$sidebars = array(
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
		);
		self::$taxonomies = array(
			'example' => array(
				'name'      => 'Examples',
				'singular'  => 'Example',
				'public'    => true,
				'object'    => 'custom',
				'rewrite'   => array( 'slug' => 'example-examples', 'with_front' => false ),
			),
		);
		self::$scripts = array(
			'wpu-functions'  => array(
				'remote'     => false,
				'src'        => 'functions.js',
				'depends'    => array ( 'jquery' ),
				'footer'     => true,
			),
		);
		$this->nav_menus = array(
			'primary'   => 'Primary Navigation Menu',
			'footer'    => 'Footer Navigation Menu',
		);

		self::$date_format = get_option( 'date_format' );
	}

	/**
	 * Theme setup function attached to the after theme setup hook
	 *
	 * @var string $content_width
	 * @var string $image_set Default link used in insert image
	 */
	function theme_setup() {
		global $content_width;
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );

		add_image_size( 'mini-thumb', 110, 110, true );
		add_editor_style( '_/css/editor-style.css' );

		register_nav_menus( $this->nav_menus );

		$image_set = get_option( 'image_default_link_type' );
		if ( 'none' !== $image_set )
			update_option( 'image_default_link_type', 'none' );

		if ( ! isset( $content_width ) )
			$content_width = 600;

	}

	/**
	 * Attaches class methods to WordPress action hooks
	 *
	 * Uncomment taxonomies and post_types init action hooks to add
	 *      custom post types and taxonomies defined in the @static $post_types and
	 *      @static $taxonomies variables.  ( Don't forget to un comment the includes in functions.php
	 */
	function actions() {
		add_action( 'after_setup_theme', array ( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( 'Wpu_Sidebars', 'sidebars' ) );
		add_action( 'widgets_init', 'wpu_register_widgets' );
	//	add_action( 'init', array( 'Wpu_Taxonomies', 'taxonomies' ) );
	//	add_action( 'init', array( 'Wpu_Custom_Post_Types', 'post_types' ) );
	}

	/**
	 * Filters WordPress functions with class methods found in @class Wpu_Functions
	 * @see Wpu_Functions
	 */
	function filters() {
		add_filter( 'excerpt_length', array ( 'Wpu_Functions', 'excerpt_length' ) );
		add_filter( 'excerpt_more', array ( 'Wpu_Functions', 'read_more' ) );
		add_filter( 'get_the_excerpt', array ( 'Wpu_Functions', 'custom_more' ) );
	}

} //End class Wpu
