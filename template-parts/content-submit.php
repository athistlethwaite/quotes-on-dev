<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<?php the_title ( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="quote-submission">

	<?php if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) : ?>

		<form id="quote-submission-form"> 
			<p>Author of Quote </p>
			<input type="text" name="quote-author" id="quote-author">
			<br>
			<p>Quote </p>
			<textarea type="text" name="quote-content" id="quote-content"></textarea>
			<br>
			<p>Where did you find this quote? (e.g. book name) </p>
			<input type="text" name="quote-location" id="quote-location">
			<br>
			<p>Provide the URL of the quote source, if available </p>
			<input type="url" name="url" id="quote-source">
			<br>
			<br>
			<input type="submit" value="Submit a Quote" class="submit-a-quote">

		</form>

		<p class="submit-message" style="display:none;"></p>

	</div>

<?php else : ?>
	<p>Sorry, you must be logged in to submit a quote!</p>

	<a href="<?php echo wp_login_url()?>">Click here to login</a>

<?php endif; ?>

</article><!-- #post-## -->
