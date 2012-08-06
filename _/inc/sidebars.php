<?php
/**
 * Registers Sidebars
 *
 * @class Wpu_Sidebars
 * @package WP UnFramework
 * @subpackage sidebars.php
 *
 */
 

class Wpu_Sidebars extends Wpu {

	/**
	 * @var array $sidebars
	 * @uses Wpu protected $sidebars
	 */
	public static $sidebars;

	function __construct() {
		$this->sidebars();
	}

	/**
	 * Register sidebars defined in parent class
	 *
	 * @since 1.0
	 */
	function sidebars() {
		foreach ( Wpu::$sidebars as $key => $value ) :
	
			register_sidebar( array(
                'name'            => $key,
                'id'              => $key,
                'description'     => $value['desc'],
                'before_widget'   => '<section id="%1$s" class="module %2$s">',
                'after_widget'    => '</section>',
                'before_title'    => '<h3>',
                'after_title'     => '</h3>'
            ));
        
		endforeach;
	}
}