<?php
/**
 * Template Part: loop header
 *
 * @package WP Unframework
 * @subpackage loop-header.php
 *
 */
?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<header class="post-meta header">

			<?php Wpu_Functions::post_title();

			if ( ! is_page() )
				Wpu_Functions::post_meta();

			comments_popup_link( ' No replies', ' 1 reply', ' % replies', 'comments-link', ''); ?>

		</header>