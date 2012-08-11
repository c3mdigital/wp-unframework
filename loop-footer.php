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

				the_tags('<p>Tagged as: ', ', ', '<br /></p>'); ?>

				<p>Posted in <?php the_category(', '); ?></p>

			<?php } ?>

		</footer>

		<?php comments_template(); ?>
	</article>

<?php if ( is_singular() )
		echo '</div>';