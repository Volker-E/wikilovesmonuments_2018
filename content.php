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
			<?php if ( comments_open() ) { ?><li class="lnk--comments"><?php comments_popup_link( __( '0 Comments', 'wikilovesmonuments' ), __( '1 Comment', 'wikilovesmonuments' ), __( '% Comments', 'wikilovesmonuments' ), 'comments-link' ); ?></li><?php } ?>
		</ul>
	</div>
</article>
