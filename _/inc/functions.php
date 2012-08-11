<?php
/**
 * Custom Functions File
 *  Include any additional custom functions needed here
 *      We're still in the Wpu Class namespace so no prefixes or
 *      long function names needed (Sample Function included)
 *      Usage: Wpu_Functions::function_name();
 *
 * @package WP UnFramework
 * @subpackage functions.php
 *
 */

class Wpu_Functions extends Wpu {

	function __construct() {
		parent::__construct();
	}

	function excerpt_length( $length ) {
		return 65;
	}

	function read_more_link() {
		return '<a href="'.esc_url( get_permalink() ).'" title="'.the_title_attribute( array( 'before' => __( 'Permalink to ', 'wpu' ), 'echo' => false ) ).'" rel="bookmark">'. __( 'Continue <span class="meta-nav">&rarr;</span>', 'wpu' ).'</a>';
	}

	function read_more( $more ) {
		return ' &hellip; '.self::read_more_link();
	}

	function custom_more( $more ) {
		if ( has_excerpt() && ! is_attachment() )
			$more .= self::read_more_link();

		return $more;
	}

	/**
	 * Outputs the title and category or author description
	 * @static
	 * @since 1.2
	 */
	public static function archive_title() {
		$queried_object = get_queried_object();
		$date_format = Wpu::$date_format;

		echo '<header class="page-header">';

		/** If this is a category archive */
		if ( is_category() ) {
			$title =  __( sprintf( 'Archives for %1$s', single_term_title( '', false ), 'wpu' ) );
			$cat_description = category_description();
			if ( ! empty( $cat_description ) )
				$description = apply_filters( 'category_archive_meta', '<div class="taxonomy-description">'.$cat_description.'</div>' );
		}

		 /** If this is a tag archive */
		elseif ( is_tag() ) {
			$title =  __( sprintf( 'Posts Tagged %1$s', ucfirst( single_term_title( '', false ) ), 'wpu' ) );
			$tag_description = tag_description();
			if( ! empty( $tag_description ) )
				$description = apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">'.$tag_description.'</div>' );
		}
		/** If this is a monthly archive */
		elseif ( is_month() )
			$title =  __( sprintf( 'Monthly Archives for %1$s', single_month_title( ' ', false ), 'wpu' ) );

		/** If this is a daily archive */
		elseif ( is_day() )
			$title =  __( sprintf( 'Daily Archives for %1s', get_the_time( 'D ' . $date_format ), 'wpu' ) );

		/** If this is a yearly archive */
		elseif ( is_year() )
			$title =  __( sprintf( 'Yearly Archives for %1$s', get_the_time( 'Y ' ), 'wpu' ) );

		/** If this is an author archive */
		elseif ( is_author() ) {
			$title =  __( sprintf( 'Author Archives for %1$s', esc_html( ucfirst( $queried_object->display_name )  ), 'wpu' )  );
			$author_description = $queried_object->description;
			if ( ! empty( $author_description ) )
				$description = apply_filters( 'author_archive_meta', '<div class="author-description">'.$author_description.'</div>' );
		}

		/** If this is a search results page */
		elseif ( is_search() )
			$title = __(  sprintf( 'Search Results for: %1$s', esc_html( ucfirst( get_search_query() ) ) ), 'wpu' );

		/** Catchall for any other archive type */
		else
			$title =  __( sprintf( 'Archives for %1$s', esc_html( ucfirst( $queried_object->name ) ), 'wpu' ) );

		echo  "<h2 class='page-title'>$title</h2>";

			if ( isset( $description ) )
				echo $description;

		echo '</header>';

	 }

	/**
	 * Outputs the post title html
	 * @static
	 * @since 1.2
	 */
	static function post_title() {

		if ( is_single() )
			$title = '<h1 class="post-title">'.esc_html( get_the_title() ).'</h1>';

		elseif ( is_page() )
			$title = '<h1 class="page-title">'.esc_html( get_the_title() ).'</h1>';

		else
			$title = '<h3 class="entry-title"><a href="'.esc_url( get_permalink() ).'" title="'.the_title_attribute( array( 'before' =>  __( 'Permalink to ', 'wpu' ), 'echo' => 0 )  ).'" rel="bookmark">'.get_the_title().'</a></h3>';

	   echo $title;
	}

	/**
	 * Outputs post metadata
	 * @static
	 * @since 1.2
	 */
	static function post_meta() {
		printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a> </span> </span> ', 'wpu' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url(  get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'wpu' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);
	}

	/**
	 * Displays post content including post thumbnail on blog page
	 * @static
	 * @since 1.2
	 */
	static function post_content() {
		$content = '';

		if ( is_home() )
			$thumbnail = has_post_thumbnail() ? get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class' => 'alignleft' ) ) : NULL;

		if ( isset( $thumbnail ) )
			$content .= '<fig class="excerpt-thumbnail"><a href="'.esc_url( get_permalink() ).'" title="'.the_title_attribute( array( 'before' => __( 'Permalink to ', 'wpu' ), 'echo' => 0 ) ).'" rel="bookmark">'.$thumbnail.'</a></fig>';

		$content .= is_home() || is_archive() || is_search() ? apply_filters( 'the_excerpt', get_the_excerpt() ) : apply_filters( 'the_content', get_the_content() );

		echo $content;
	}

	/**
	 * Returns class used to display post content
	 * @static
	 * @since 1.2
	 * @param string $class
	 * @return string post entry class
	 */
	static function entry_class( $class ='entry' ) {
		if ( is_archive() )
			return 'archive-excerpt';

		if ( is_home() )
			return 'blog-excerpt';

		if ( is_page() && is_singular() )
			return 'page-entry';

		if ( is_single() )
			return 'post-entry';

		return $class;
	}

}