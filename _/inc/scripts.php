<?php
/**
 * Register and enqueue theme javascript and css
 *
 * @class Wpu_Scripts
 * @package UnFramework
 * @subpackage Scripts.php
 */

class Wpu_Scripts extends Wpu {

	/**
	 * @var array
	 * @uses Wpu protected $scripts
	 * @since 1.0
	 */
	public static $scripts;

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	function scripts() {

 	    foreach ( Wpu::$scripts as $key => $value ) :
       
            if ( is_array( $value ) && array_key_exists( 'src', $value ) ) :
      
                $src = !empty( $value[ 'remote' ] ) ? $value['src'] : THEME_JS_URI . $value['src'];
		
        	    if ( ! $value['depends'] == null ) :
        	            wp_register_script( $key, $src, $value[ 'depends' ], false, !empty( $value['footer'] ) );
        	
        	    else :
        	        wp_register_script( $key, $src, false, !empty( $value['footer'] ) );
        	    endif;
       
            else :

	        if ( isset( $src ) )
		      wp_register_script( $key, THEME_JS_URI . $src, $value, false );
        
            endif;
      
      	    wp_enqueue_script( $key );

        endforeach;

		wp_enqueue_style( 'style', get_stylesheet_uri() );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
      	    wp_enqueue_script( 'comment-reply' );

		if ( is_singular() && comments_open() )
			wp_enqueue_style( 'comments-css', THEME_CSS_URI . 'comments.css', array( 'style') );
	}
}