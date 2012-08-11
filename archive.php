<?php
/**
 * Archive Template
 *
 * @package WP Unframework
 * @subpackage archive.php
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

		get_template_part( 'loop', 'postnav' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>