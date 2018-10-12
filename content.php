<?php
/**
 * The template for standard post entry
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>

<article <?php post_class( 'blog-entry' ); ?>>
	<div class="entry">
		<header>
		<?php
		if ( has_post_thumbnail() ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wikilovesmonuments-featured-image' );

			// Calculate aspect ratio: h / w * 100%.
			$ratio = $thumbnail[2] / $thumbnail[1] * 100;
			?>
			<div class="entry__thumb" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
				<div class="entry__thumb-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
			</div>
		<?php } ?>
			<h2 class="entry__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<?php
		if( !empty( $post->post_excerpt ) ) {
			the_excerpt();
			echo "\n";
		} else {
			echo wp_trim_words( get_the_content(), 20 ) . "\n";
		} ?>
		<ul class="entry__meta">
			<li><?php the_author_posts_link(); ?> <span class="is-aural">posted</span> on <?php echo get_the_date(); ?></li>
			<?php
			if ( comments_open() ) { ?>
			<li><?php comments_popup_link( __( '0 Comments', 'wikilovesmonuments' ), __( '1 Comment', 'wikilovesmonuments' ), __( '% Comments', 'wikilovesmonuments' ), 'lnk--comments' ); ?></li>
			<?php } ?>
		</ul>
	</div>
</article>
