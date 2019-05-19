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
 * @package Crensoft
 */

while ( have_posts() ) :
	the_post();
	$meta = get_post_meta( get_the_ID() );

	if (!empty($meta['styles'])) {
		get_template_part( 'template-parts/content', 'component' );
	} else {
		get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			get_sidebar();
			get_footer();
	}
endwhile; // End of the loop.