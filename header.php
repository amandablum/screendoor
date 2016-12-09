<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package hana
 * @since hana 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<!-- Google Fonts
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700|IM+Fell+DW+Pica:400,400i" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
<!-- nav menu page conditional -->
		<?php
		if ( is_front_page() ) {
		?>
			<div id="masthead" class="site-header" role="banner">
			<hgroup>
				<div id="homemenu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
				?>
				</div>
			</hgroup>
			</div>
		<?php
		}
		else {
		?>
			<div id="masthead" class="site-header" role="banner">
			<hgroup>
			<div id="logotop"><h1 class="site-title"><a href="http://screendoorrestaurant.com/" class="svgx"><object data="http://screendoorrestaurant.com//wp-content/uploads/2016/06/screendoorlogosmall.svg" width="235" height="75">
  </object></a></h1></div>
				<div id="secondarymenu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
				?>
				</div>
			</hgroup>
			</div><!-- end masthead -->

<div id="mobilelogo"><a href="http://screendoorrestaurant.com/" class="svgx"><object data="http://screendoorrestaurant.com/wp-content/uploads/2016/07/screendoorlogosmallblue.svg" width="235" height="75">
  </object></a></div><!-- mob only logo -->
		<?php }
		?>
		<!-- nav menu page conditional -->