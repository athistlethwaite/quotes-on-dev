<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */


?>


	
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<?php the_title ( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<!-- Author -->
	<div class="post-archives">
		<h2>Quote Authors</h2>
		<ul>
				<?php
					global $post;
					$args = array( 'posts_per_page' => 55, 'offset'=> 1, );

					$myposts = get_posts( $args );
					
					foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
				
				<?php endforeach; wp_reset_postdata();?>

		</ul>
	</div>

<!-- Categories -->
	<div class="category-archives"> 
		<h2>Categories</h2>
		<ul>
				<?php wp_list_categories( 'title_li='); ?> 
		</ul>
	</div>

<!-- Tags -->

	<div class="tag-archives">
		<h2>Tags</h2>

		<?php wp_tag_cloud( array(
			'unit' 						=> 'rem',
			'smallest' 				=> 1.25,
			'largest' 				=> 1.25, 
		));
		?>

	</div>
</section><!-- #post-## -->

