<?php
/**
 * The template for displaying the footer
 *https://codepen.io/matheusalmeida/pen/aeLMMr?page=2
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skadi
 */

?>
</div><!-- #content -->
<footer class="footer">
	<div class="container outercontainer">

		<div class="footer__addr">
			<div class="footer-logo">
				<img src='<?php echo esc_url( get_theme_mod( 'skadi-footer-image-left' ) ); ?>' class="footer_logo" style="width:120px">
			</div>
			 	<p>&copy; 2019. Alle rechten voorbehouden.</p>
				<a class="footer__btn" href="mailto:<?php echo get_theme_mod( 'skadi-footer-email-setting' )  ?>">Email Us</a>
		</div>

		<ul class="footer_container">
	    <li class="nav__item">

	      <ul class="nav__ul">
					<?php
					if(is_active_sidebar('footer-1')){
					dynamic_sidebar('footer-1');
					}
					?>
	      </ul>
	    </li>
	    <li class="nav__item">

	      <ul class="nav__ul">
					<?php
					if(is_active_sidebar('footer-2')){
					dynamic_sidebar('footer-2');
					}
					?>
	      </ul>
	    </li>
	    <li class="nav__item">
	      <ul class="nav__ul">
					<?php
					if(is_active_sidebar('footer-3')){
					dynamic_sidebar('footer-3');
					}
					?>
	      </ul>
	    </li>
			<li class="nav__item">
				<ul class="nav__ul">
					<?php
					if(is_active_sidebar('footer-4')){
					dynamic_sidebar('footer-4');
					}
					?>
				</ul>
			</li>
	  </ul>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
