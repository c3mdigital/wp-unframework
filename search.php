<?php
/**
 * Search results template
 *
 * @package WP Unframework
 * @subpackage search.php
 *
 */

get_header(); ?>

<div class="main">
	<?php if ( have_posts() ) :

			Wpu_Functions::archive_title();

			get_template_part( 'loop', 'postnav' );

		rewind_posts();

		while ( have_posts() ) : the_post();

			get_template_part( 'loop', 'header' );

				Wpu_Functions::post_content();

			get_template_part( 'loop', 'footer' );

		endwhile;

			get_template_part( 'loop', 'postnav' );

		 else :

			printf( __( '<h2>Nothing found for %1$s </h2>', 'wpu' ), get_search_query() );

		endif; ?>
</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>