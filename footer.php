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
				<a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
		</div>

		<ul class="footer_container">
	    <li class="nav__item">
	      <h2 class="nav__title">Ontdek</h2>

	      <ul class="nav__ul">
	        <li>
	          <a href="#">Home</a>
	        </li>
	        <li>
	          <a href="#">Vereniging</a>
	        </li>
	        <li>
	          <a href="#">Evenementen</a>
	        </li>
					<li>
	          <a href="#">Lid Worden</a>
	        </li>
					<li>
	          <a href="#">Samenwerken</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav__item nav__item--extra">
	      <h2 class="nav__title">Bezoek</h2>

	      <ul class="nav__ul">
	        <li>
	          A.R.S.R. "Skadi"
	        </li>
	        <li>
	          Noorderkanaalweg 20-22
	        </li>
	        <li>
	          3037 AV
	        </li>
	        <li>
	          Rotterdam
	        </li>
	      </ul>
	    </li>
	    <li class="nav__item">
	      <h2 class="nav__title">Volg</h2>

	      <ul class="nav__ul">
	        <li>
	          <a href="#">Instagram</a>
	        </li>

	        <li>
	          <a href="#">Facebook</a>
	        </li>

	        <li>
	          <a href="#">Twitter</a>
	        </li>
					<li>
						<a href="#">LinkedIn</a>
					</li>
	      </ul>
	    </li>
			<li class="nav__item">
				<h2 class="nav__title">Meer</h2>

				<ul class="nav__ul">
					<li>
						<a href="#">Skadi Bouwt</a>
					</li>

					<li>
						<a href="#">Oud Skadi</a>
					</li>

					<li>
						<a href="#">Roei Clinics</a>
					</li>
					<li>
						<a href="#">PwC Rottebokaal</a>
					</li>
				</ul>
			</li>
	  </ul>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
