<?php get_header(); ?>
<div class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
	<article class="page" id="post-<?php the_ID(); ?>">

		<header class="post-meta header">
			<?php get_template_part( 'loop', 'header' ); ?>
		</header>

		<div class="entry">

				<?php the_content(); ?>

		</div>
		<footer class="post-meta footer">
			
			<?php get_template_part( 'loop', 'footer' ); ?>
			
		</footer>

	</article>
		
	<?php endwhile; endif; ?>
</div><!-- .main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
