
<aside class="secondary widget-area" role="complementary">

<?php
	if ( is_home() )
		dynamic_sidebar( 'blog' );

	else
		dynamic_sidebar( 'sidebar' );
	?>

</aside>