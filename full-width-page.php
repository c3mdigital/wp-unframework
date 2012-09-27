<?php
/**
 * Full Width Page Template
 *
 * Template Name: Fullwidth
 *
 * @package WP Unframework
 * @subpackage page.php
 *
 */
get_header(); ?>

<div class="main full-width" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'loop', 'header' );

			Wpu_Functions::post_content();

			get_template_part( 'loop', 'footer' );

		endwhile; endif; ?>

</div><!-- .main -->
<?php get_footer(); ?>