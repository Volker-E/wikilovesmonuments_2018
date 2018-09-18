<?php
/**
 * The template blog post entries
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

// Start loop
while ( have_posts() ) : the_post(); ?>
<article <?php post_class( 'search-entry' ); ?>>
	<?php
	// Get full URL to image.
	$img_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );

	// Resize & crop the image.
	$featured_image = aq_resize( $img_url, 100, 80, true );

	// Show featured image if available.
	if( $featured_image ) {  ?>
	<div class="search-entry-image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>"></a>
	</div>
	<div class="entry entry--search">
	<?php } // Featured image not set ?>
		<header>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<p>
			<?php
			// Show excerpt.
			$content = get_the_content();
			$content_stripped = strip_shortcodes( $content );
			$excerpt = !empty( $post->post_excerpt ) ? get_the_excerpt() : wp_trim_words($content_stripped, 40 );
			echo $excerpt; ?>
		</p>
		<?php if ( $featured_image ) {  ?>
		</div>
		<?php } // Featured image not set ?>
</article>
<?php
// End loop
endwhile; ?>