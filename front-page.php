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

get_header();
?>

<html><head>
</head>
  <body data-gr-c-s-loaded="true">
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
                <a class="mat-button" href="<?php echo get_permalink(get_theme_mod('skadi-front-callout-link-right'))?>">
                  <?php echo get_theme_mod('skadi-front-callout-button-right') ?>
                </a>
                <a class="mat-button" href="<?php echo get_permalink(get_theme_mod('skadi-front-callout-link-left'))?>">
                  <?php echo get_theme_mod('skadi-front-callout-button-left') ?>
                </a>
              </div>
              <header class="section header hover-item">
                <div class="trapezoid bg"></div>
                <div class="header__text"></div>
              </header>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
get_footer();
?>
