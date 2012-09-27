<?php
/**
 * Archive Template
 *
 * @package WP Unframework
 * @subpackage archive.php
 */

get_header(); ?>

<div class="main" role="main">
	<?php

		if ( have_posts() ) :

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

			printf( '<h2>%1$s</h2>', __( 'Nothing Found', 'wpu' ) );

		endif; ?>

</div><!-- .main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>