<?php
/**
 * Template Name: Skadi Page
 *
 * Displays a full width Skadi page with a sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skadi
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area-full">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card-body">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' );
							echo apply_filters( 'plugins/wp_subtitle/get_subtitle', '', array(
							'before'  => '<h2 class="sub-title primary">',
							'after'   => '</h2>',
							'post_id' => get_the_ID()
						) ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialwp' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

						<?php if ( get_edit_post_link() ) : ?>
							<footer class="entry-footer">
								<?php
									edit_post_link(
										sprintf(
											/* translators: %s: Name of current post */
											esc_html__( 'Edit %s', 'materialwp' ),
											the_title( '<span class="screen-reader-text">"', '"</span>', false )
										),
										'<span class="edit-link">',
										'</span>'
									);
								?>
							</footer><!-- .entry-footer -->
						<?php endif; ?>
					</div><!--  .card-body -->
					</article><!-- #post-## -->
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- row -->
	</div><!-- container -->

<?php
get_sidebar();
get_footer();
