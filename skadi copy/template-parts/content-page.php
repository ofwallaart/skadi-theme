<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Screenr
 */

?>
<div id="sect4358">
		<div class="container-front outer-container-front">
		</div>
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skadi' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

</div>
