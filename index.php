<?php
/**
 * The main index file and default WordPress template
 *
 * @package UnFramework
 * @subpackage index.php
 *
 */

get_header(); ?>
<div class="main">
<?php

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'loop', 'header' );

			Wpu_Functions::post_content();

		get_template_part( 'loop', 'footer' );

		endwhile;

		get_template_part( 'loop', 'postnav' );

		else : ?>

			<h2>No Posts Found</h2>

<?php   endif; ?>
</div><!-- .main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>