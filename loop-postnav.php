<?php
/**
 * Template Part: loop postnav
 *
 * @package WP Unframework
 * @subpackage loop-postnav.php
 */
?>
	<nav role="navigation" class="post-navigation">

		<?php if ( is_archive() || is_home() || is_search() ) { ?>

			<div class="prev-posts"><?php next_posts_link( __( '&larr; Older Entries', 'wpu' ) ); ?></div>
			<div class="next-posts"><?php previous_posts_link( __( 'Newer Entries &rarr; ', 'wpu' ) ); ?></div>

		<?php } elseif ( is_attachment() ) { ?>

			<div class="next-posts"><?php next_image_link( 'mini-thumb' ); ?></div>
			<div class="prev-posts"><?php previous_image_link( 'mini-thumb' ); ?></div>


		<?php } elseif ( is_singular() )  {

				$args = array ( 'before' => '<p><span class="numeric-pagination"> '. __( 'Page: ', 'wpu' ),
			            'pagelink'=> ' %', 'next_or_number' => 'number', 'after' => '</span></p>',
						'link_before' => '<span class="current">', 'link_after' => '</span>' );

				wp_link_pages( $args );

			} ?>
	</nav>
