<?php
/**
 * The template for a gallery post entry
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>

<article <?php post_class( 'blog-entry' ); ?>>
	<?php
    // Get resize and show featured image: refer to functions/img_defaults.php for default values
    $wikilovesmonuments_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wikilovesmonuments_img( 'blog_entry_width' ), wikilovesmonuments_img( 'blog_entry_height' ), wikilovesmonuments_img( 'blog_entry_crop' ) );
    	if ( $wikilovesmonuments_entry_img ) { ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $wikilovesmonuments_entry_img; ?>" alt="<?php echo the_title(); ?>"></a>
        </div>
    <?php } ?>
    <div class="entry">
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
		<?php
        if ( !empty( $post->post_excerpt ) ) {
            the_excerpt();
        } else {
            echo wp_trim_words( get_the_content(), 20 );
        } ?>
		<ul class="entry__meta">
            <li><?php the_author_posts_link(); ?> <span class="is-aural">posted</span> on <?php echo get_the_date(); ?></li>
            <?php if ( comments_open() ) { ?><li class="lnk--comments"><?php comments_popup_link( __( '0 Comments', 'wikilovesmonuments' ), __( '1 Comment', 'wikilovesmonuments' ), __( '% Comments', 'wikilovesmonuments' ), 'comments-link' ); ?></li><?php } ?>
		</ul>
    </div>
</article>
