<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skadi
 */

?>

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

<body <?php body_class(); ?>>

<div id="content" class="site-content
    <div id="sect4441">
      <div class="container-fluid outercontainer">
        <div class="row" id="row4441">
          <div class="col-xs-12 col-sm-12 col-md-12" id="col4442">
            <div id="pagemain" class="row">
              <div class="col-md-12">
              </div>
            </div>
            <div id="c4440">
              <div id="buttons">
                <a class="btn btn-outline-primary btn-lg btn-landing" href="<?php echo get_permalink(get_theme_mod('skadi-front-callout-link-left'))?>">
                  <?php echo get_theme_mod('skadi-front-callout-button-left') ?>
                </a>
                <a class="btn btn-outline-primary btn-lg btn-landing" href="<?php echo get_permalink(get_theme_mod('skadi-front-callout-link-right'))?>">
                  <?php echo get_theme_mod('skadi-front-callout-button-right') ?>
                </a>
              </div>
              <img class='front-logo' src='<?php echo esc_url( get_theme_mod( 'skadi-front-image-setting' ) ); ?>'>
              <header class="section header hover-item">
                <div class="trapezoid bg"></div>
                <div class="header__text"></div>
              </header>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php wp_footer(); ?>

</body>
</html>
