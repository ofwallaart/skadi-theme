<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skadi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class("no-image"); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<a href="#" rel="home">
		<img class="logo" src="
		<?php 
				if ( get_theme_mod( 'skadi-thumbnail-setting' )) {
					echo esc_url( get_theme_mod( 'skadi-thumbnail-setting' ) );
				}
				else {
					echo "https://skadi-site.e-captain.nl/images/zwart-extern-medium.png";
				}
			?>
		">
		</a>
   		<div class="csstry"></div>
   		<div class="background-image" style="background-image: url(
			   <?php 
				if ( has_post_thumbnail(get_queried_object_id()) ) {
					echo get_the_post_thumbnail_url(get_queried_object_id(),'full');
				}
				else {
					echo get_background_image();
				}
			?>
		   )"></div>
	    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    	<div class="container">
			   <div class="navbar-brand mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			   
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				
		   		<div class="collapse navbar-collapse" id="navbarNav">
	            <?php
	            $args = array(
	              'theme_location' => 'primary',
	              'depth'      => 2,
	              'container'  => false,
	              'menu_class'     => 'navbar-nav',
	              'walker'     => new Bootstrap_Walker_Nav_Menu()
	              );
	            if (has_nav_menu('primary')) {
	              wp_nav_menu($args);
	            }
	            ?>
	          </div>

	        </div>
		</nav> -->
	</header><!-- #masthead -->
	<div id="previous"><a href="javascript:history.back()" data-toggle="tooltip" data-placement="bottom" title="Ga Terug"><i class="material-icons">arrow_back_ios</i></a></div>
	<div id="content" class="site-content">
