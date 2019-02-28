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

		<form> 
			<p>Author of Quote </p>
			<input type="text" name="author" id="quote-author">
			<br>
			<p>Quote </p>
			<textarea type="text" name="quote" id="quote"></textarea>
			<br>
			<p>Where did you find this quote? (e.g. book name) </p>
			<input type="text" name="quote-location" id="quote-location">
			<br>
			<p>Provide the URL of the quote source, if available </p>
			<input type="url" name="url" id="source">
			<br>
			<button type="submit" id="submit-button">Submit a Quote</button>

		</form>
	</div>

</article><!-- #post-## -->

