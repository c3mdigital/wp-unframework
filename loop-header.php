	
	<?php if ( is_single() ) { ?>
	
		<h1 class="posttitle"><?php the_title(); ?></h1>
			<em>Posted on:</em> <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('F jS, Y') ?></time>
		<span class="byline author vcard">
			<em>by</em> <span class="fn"><?php the_author() ?></span>
		</span>
	
		<?php if ( comments_open() ) comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>

	<?php } elseif ( is_page() ) { ?>
	
		<h1 class="pagetitle"><?php the_title(); ?></h1>
	
	<?php } else { ?>
	
		<h3 class="entrytitle"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<em>Posted on:</em> <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('F jS, Y') ?></time>
		<span class="byline author vcard">
			<em>by</em> <span class="fn"><?php the_author() ?></span>
		</span>
		
		<?php if ( comments_open() ) comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
		
	<?php } ?>
	
	
	
	
	
	
	
	
