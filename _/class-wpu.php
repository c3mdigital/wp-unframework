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
	 * @var array Custom post types
	 * @since 1.0
	 */
	protected static $post_types;

	/**
	 * @var array Registered sidebars
	 * @since 1.0
	 */
	protected static $sidebars;

	/**
	 * @var array Custom taxonomies
	 * @status protected
	 * @since 1.0
	 */
	protected static $taxonomies;

	/**
	 * @var array Custom Widgets
	 * @since 1.0
	 */
	public static $widgets;

	/**
	 * @var array Javascript files to enqueue
	 * @since 1.0
	 */
	protected static $scripts;

	/**
	 * @var array Registered nav menus
	 * @status private
	 * @since 1.0
	 */
	private $nav_menus;


	function __construct() {
		$this->_set_vars();
		$this->actions();

		if( ! is_admin() )
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
				'rewrite'   => true,
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
	}

	function theme_setup() {

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'aside', 'link' ) );
		add_theme_support( 'custom-header' );

		add_image_size( 'mini-thumb', 110, 110, true );
		add_editor_style( THEME_CSS_URI . 'editor-style.css' );

		register_nav_menus( $this->nav_menus );

		$image_set = get_option( 'image_default_link_type' );
		if( 'none' !== $image_set )
			update_option( 'image_default_link_type', 'none' );

	}
	
	function actions() {
		add_action( 'after_setup_theme', array ( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( new Wpu_Sidebars(), 'sidebars' ) );
		add_action( 'widgets_init', 'wpu_register_widgets' );
		add_action( 'init', array( new Wpu_Taxonomies(), 'taxonomies' ) );
		add_action( 'init', array( new Wpu_Custom_Post_Types(), 'post_types' ) );
	}

} //End class Wpu
