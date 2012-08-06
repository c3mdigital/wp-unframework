<?php get_header(); ?>

<div class="main">
	<?php if ( have_posts() ) : ?>

		<h2>Search Results for: <?php the_search_query(); ?></h2>

		<?php get_template_part( 'loop', 'postnav' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<header class="postmeta search">
				
					<?php get_template_part( 'loop', 'header' ); ?>
				
				</header>
				
					<div class="entry">

						<?php the_excerpt(); ?>

					</div>

			</article>

		<?php endwhile; ?>
		
			<nav class="navigation">

				<?php get_template_part( 'loop', 'postnav' ); ?>
				
			</nav>


	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>
</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
