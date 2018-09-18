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

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
<?php
    // if ( get_post_format() == 'gallery' ) {

		// }
		/* Image with Lightbox
		elseif( get_post_format() == 'image' ){ ?>
        	<div id="post-thumbnail"><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' )?>" tile="<?php _e( 'View Full-Size', 'wikilovesmonuments' ); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wikilovesmonuments_img( 'blog_width' ), wikilovesmonuments_img( 'blog_height' ), wikilovesmonuments_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>"></a></div>
        <?php } else {
            if( has_post_thumbnail() ) { ?>
            <div id="post-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wikilovesmonuments_img( 'blog_width' ), wikilovesmonuments_img( 'blog_height' ), wikilovesmonuments_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>"></div>
        <?php }
        } */ ?>

<div id="single-post-content">
    <div id="post">
		<?php
        // Show header on all post formats except quotes.
        if( get_post_format() !== 'quote' ) { ?>
            <header>
                <h1><?php the_title(); ?></h1>
                <ul class="meta">
            		<li>Posted on: <?php echo get_the_date(); ?></li>
            		<li>By: <?php the_author_posts_link(); ?></li>
            		<?php if ( comments_open() ) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__( '0 Comments', 'wikilovesmonuments' ), __( '1 Comment', 'wikilovesmonuments' ), __( '% Comments', 'wikilovesmonuments' ), 'comments-link' ); ?></li><?php } ?>
                </ul>
            </header>
        <?php } ?>

        <article <?php post_class( 'entry' ); ?>>
        	<div class="inner-post">
            	<?php the_content(); // This is your main post content output ?>
                <?php if( get_post_format() == 'quote' ){ ?><div class="quote-author">&#8211; <?php the_title(); ?></div><?php } ?>
            </div>
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
                <div class="author-bio">
                    <p><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
        <?php // } ?>

        <?php comments_template(); ?>
    </div>

    <?php
    // End the loop
    endwhile;
    endif;
    ?>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
