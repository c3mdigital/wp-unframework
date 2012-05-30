<?php
/**
 * 
 * Custom Functions File
 * Include any additional custom functions needed here
 * We're still in the Wpu Class namespace so no prefixes or 
 *  long function names needed (Sample Function included)
 *
 * @package UnFramework
 *
 */
 
 add_action( 'wp_footer', 'hello' );
 function hello() {
 
 	echo '<!-- Hello World -->';
 }

add_action( 'wp_footer', 'ga_analytics' );

/**
 * @param string $ga_account Enter your Google Analytics account id here
 */
function ga_analytics( $ga_account = 'UA-XXXXX-X' ) { ?>
	<script>
	var _gaq=[["_setAccount","<?php echo $ga_account; ?>"],["_trackPageview"]];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
	s.parentNode.insertBefore(g,s)}(document,"script"));
	</script>
<?php }


