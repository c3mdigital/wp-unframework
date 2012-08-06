
	<?php if ( is_page() ) { ?>
	
		<nav class="post-navigation">
		
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		
		</nav>
		
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php } else { ?>
	
		<p><?php the_tags('Tagged as: ', ', ', '<br />'); ?></p>
		
		<p>Posted in <?php the_category(', '); ?></p>
			
	<?php }