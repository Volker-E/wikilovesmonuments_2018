<?php
/**
 * The template for single regular posts
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header();

// Start the Loop.
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
?>
<?php
	// if ( get_post_format() == 'gallery' ) {
	// }
		/* Image with Lightbox.
		elseif( get_post_format() == 'image' ){ ?>
			<div id="post-thumbnail"><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' )?>" tile="<?php _e( 'View Full-Size', 'wikilovesmonuments' ); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wikilovesmonuments_img( 'blog_width' ), wikilovesmonuments_img( 'blog_height' ), wikilovesmonuments_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>"></a></div>
		<?php } else {
			if( has_post_thumbnail() ) { ?>
			<div id="post-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wikilovesmonuments_img( 'blog_width' ), wikilovesmonuments_img( 'blog_height' ), wikilovesmonuments_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>"></div>
		<?php }
		} */ ?>

	<div class="col col--main">
		<article <?php post_class( 'entry' ); ?>>
		<?php
		// Show header on all post formats except quotes.
		if( get_post_format() !== 'quote' ) { ?>
			<header>
				<h1><?php the_title(); ?></h1>
				<ul class="entry__meta">
					<li><?php the_author_posts_link(); ?> <span class="is-aural">posted</span> on <?php echo get_the_date(); ?></li>
					<?php if ( comments_open() ) { ?><li class="lnk--comments"><?php comments_popup_link( __( '0 Comments', 'wikilovesmonuments' ), __( '1 Comment', 'wikilovesmonuments' ), __( '% Comments', 'wikilovesmonuments' ), 'comments-link' ); ?></li><?php } ?>
				</ul>
			</header>
		<?php } ?>
			<?php the_content(); // This is your main post content output ?>
			<?php if( get_post_format() == 'quote' ){ ?><div class="quote-author">&#8211; <?php the_title(); ?></div><?php } ?>
		</article>

		<?php wp_link_pages(); // Paginate pages when <!- next --> is used. ?>

		<?php
		// Show author bio on all post formats except quotes.
		// Volker E.: We don't have quotes enabled for this theme
		// if( get_post_format() !== 'quote' ) { ?>
			<div id="single-author">
				<h4 class="heading"><span>Posted by <?php the_author_posts_link(); ?></span></h4>
				<div class="author-image">
				   <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '45', '' ); ?></a>
				</div>
				<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
			</div>
		<?php // } ?>

		<?php comments_template(); ?>
	</div>

<?php
// End the Loop.
	}
}
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
