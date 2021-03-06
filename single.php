<?php
/**
 * Single Post Template
 *
 * @package WP Unframework
 * @subpackage single.php
 */

get_header(); ?>

<div class="main">

	<?php

	 while ( have_posts() ) : the_post();

		get_template_part( 'loop', 'header' );

		Wpu_Functions::post_content();

		get_template_part( 'loop', 'postnav' );

		get_template_part( 'loop', 'footer' );

	endwhile; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>