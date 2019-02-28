<?php
/**
 * The template for displaying the about page.
 *
 * @package QOD_Starter_Theme
 */

	/* Template Name:page-submit-a-quote */
	
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'submit' ); ?>

			<?php endwhile; // End of the loop. ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
