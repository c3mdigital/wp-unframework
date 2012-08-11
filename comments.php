<?php
/**
 * Comments Template
 *
 * @package WP Unframework
 * @subpackage comments.php
 */

 if ( post_password_required() ) : ?>

		<p class="no password">This post is password protected. Enter the password to view any comments.</p>

	<?php return; endif; ?>

	<?php if ( have_comments() ) : ?>

		<h2 id="comments-title">
			<?php printf( _n( 'One reply on &ldquo;%2$s&rdquo;', '%1$s replies on &ldquo;%2$s&rdquo;', get_comments_number(), 'wpu' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav id="comment-nav-above">
			<h1 class="assistive-text">Comment navigation</h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wpu' ) ); ?></div>
			<div class="nav-next">Newer Comments &rarr; </div>
		</nav>

		<?php endif; ?>

		<ol class="comment list">
			<?php wp_list_comments(); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text">Comment navigation</h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wpu' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wpu' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php endif; ?>

	<?php comment_form(); ?>