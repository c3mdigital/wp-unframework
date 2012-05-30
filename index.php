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
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
		<header class="post-meta header">
			<?php get_template_part( 'loop', 'header' ); ?>
		</header>

			<div class="entry">
				<fig class="excerpt-thumbnail">
					<?php if ( has_post_thumbnail() ) the_post_thumbnail(); ?>
				</fig>
		
				<?php the_excerpt(); ?>
			</div><!-- .entry -->

			<footer class="post-meta footer">
				<?php get_template_part( 'loop', 'footer' ); ?>
			</footer>
			
	</article>

		<?php endwhile; ?>
			
		<nav class="navigation">
			<?php get_template_part( 'loop', 'post_nav' ); ?>
		</nav>
				
		<?php else : ?>

			<h2>No Posts Found</h2>

		<?php endif; ?>
</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
