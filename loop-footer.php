<?php
/*
 * Template part: loop footer
 *
 * @package WP Unframework
 * @subpackage loop-footer.php
 */
?>
		<footer class="post-footer meta">

			<?php if ( is_page() ) { ?>

				<nav class="post-navigation">
		
					<?php wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>
		
				</nav>

			<?php } else {

				the_tags( __( '<p>Tagged as: ', 'wpu' ), ', ', '<br /></p>' );

				printf( __( '<p>Posted in %1$s </p>', 'wpu' ), get_the_category_list(', ') );

			    } ?>

		</footer>

		<?php comments_template(); ?>

	</article>