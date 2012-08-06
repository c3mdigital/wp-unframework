<?php
/**
 * Single Post template file
 *
 * @package WP Unframework
 * @subpackage single.php
 */

get_header(); ?>

<div class="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<header class="postmeta">
			<?php get_template_part( 'loop', 'header' ); ?>
		</header>

		<div class="entry-content">

			<?php the_content(); ?>

			<footer class="single">

				<?php get_template_part( 'loop', 'footer' ); ?>

			</footer>

		</div>
			
	</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>