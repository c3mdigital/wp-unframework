<?php
/**
 * The header for our theme
 *
 * @package WP Unframework
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="cleartype" content="on">

	<title><?php wp_title( '' ); ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php if( is_single() ) echo '<meta name="author" content="'. get_the_author_meta( 'display_name' ).'">'; ?>

	<!-- For iPhone 4 -->
	<!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png"> -->
	<!-- For iPad 1-->
	<!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png"> -->
	<!-- For the new iPad -->
	<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/h/apple-touch-icon-144x144-precomposed.png"> -->
	<!-- For iPhone 3G, iPod Touch and Android -->
	<!-- <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png"> -->
	<!-- For Nokia -->
	<!-- <link rel="shortcut icon" href="img/l/apple-touch-icon.png"> -->
	<!-- For everything else -->
	<link rel="shortcut icon" href="/favicon.ico">

	<!--iOS -->
	<!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->
	<!-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->
	<!-- <link rel="apple-touch-startup-image" href="img/splash.png"> -->

	<!-- <script>(function(){var p,l,r=window.devicePixelRatio;if(navigator.platform==="iPad"){p=r===2?"img/startup/startup-tablet-portrait-retina.png":"img/startup/startup-tablet-portrait.png";l=r===2?"img/startup/startup-tablet-landscape-retina.png":"img/startup/startup-tablet-landscape.png";document.write('<link rel="apple-touch-startup-image" href="'+l+'" media="screen and (orientation: landscape)"/><link rel="apple-touch-startup-image" href="'+p+'" media="screen and (orientation: portrait)"/>');}else{p=r===2?"img/startup/startup-retina.png":"img/startup/startup.png";document.write('<link rel="apple-touch-startup-image" href="'+p+'"/>');}})()</script> -->
	<!--Microsoft -->

	<!-- Prevents links from opening in mobile Safari -->
	<!-- <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script> -->

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo THEME_JS_URI; ?>html5shiv.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content' ); ?>"><?php _e( 'Skip to content' ); ?></a></div>

			<?php wp_nav_menu( array ( 'theme_location' => 'primary-nav' ) ); ?>
		</nav>
		<?php get_template_part( 'searchform' ); ?>
	</header><!-- #masthead .site-header -->

	<div id="content" class="main-content" role="main">