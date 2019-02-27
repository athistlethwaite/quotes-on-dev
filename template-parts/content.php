<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>


	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="main-quote">
		
			<header id="qod-quotes" class="entry-content">
				<?php the_excerpt(); ?>
			</header><!-- .entry-content -->

			<div id="author" class="entry-header">
				- <?php the_title( ); ?>
			</div><!-- .entry-header -->
		
	</div>

</article><!-- #post-## -->

