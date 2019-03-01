<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<?php $source = get_post_meta( get_the_ID(), _qod_quote_source, true); ?>
<?php $source_url = get_post_meta( get_the_ID(), _qod_quote_source_url, true); ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="main-quote">

			<header id="qod-quotes" class="entry-content">
				<?php the_excerpt(); ?>
			</header><!-- .entry-content -->


			<div id="author" class="entry-header">
				 
					<?php the_title( '<h2 id="title" class="entry-title comma">&mdash; ', '</h2>' ); ?>

					<?php if( $source && $source_url ): ?>
						<span id="source" class="source">, <a href="<?php echo $source_url; ?>">
						<?php echo $source; ?></a></span>

						<?php elseif( $source ): ?>

							<span class="source">, <?php echo $source; ?></span>

						<?php else: ?>

							<span class="source"></span>
					
						<?php endif; ?>

			</div><!-- .entry-header -->

	</div>

</article><!-- #post-## -->

