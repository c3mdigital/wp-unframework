<?php
/**
 * Theme header called from each template
 *
 * @package WP Unframework
 * @subpackage header.php
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="cleartype" content="on">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

	<!-- For iPhone 4 -->
	<!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png"> -->
	<!-- For the new iPad -->
	<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/h/apple-touch-icon-144x144-precomposed.png"> -->
	<!-- For iPhone 3G, iPod Touch and Android -->
	<!-- <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png"> -->
	<!-- For Desktop Browsers -->
	<!--<link rel="shortcut icon" href="/favicon.ico"> -->

	<!--[if lt IE 9]>
	<script src="<?php echo THEME_JS_URI; ?>html5shiv.js" type="text/javascript"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation menu-nav-container">
			<h1 class="assistive-text"><?php _e( 'Menu', 'wpu' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'wpu' ); ?>"><?php _e( 'Skip to content', 'wpu' ); ?></a></div>

			<?php wp_nav_menu( array ( 'theme_location' => 'primary' ) ); ?>
		</nav>

	</header><!-- #masthead .site-header -->