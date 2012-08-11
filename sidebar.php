
<aside class="secondary widget-area" role="complementary">

<?php
	if ( is_home() || is_archive() )
		dynamic_sidebar( 'blog' );

	elseif ( is_singular() )
		dynamic_sidebar( 'single' );

	else
		dynamic_sidebar( 'sidebar' );
?>

</aside>