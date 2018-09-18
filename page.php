<?php
/**
 * The template for regular pages
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
// Show featured image
if( has_post_thumbnail( get_the_ID() ) ) {
	$wikilovesmonuments_header_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-size' );
	echo '<div id="page-featured-img"><img src="'. $wikilovesmonuments_header_img[0] . '" alt="'. get_the_title() . '"></div>';
} ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>
</div>

<div id="single-page-content">
	<article id="post">
		<div class="entry">
			<?php the_content(); ?>
		</div>
	<?php comments_template(); ?>
	</article>
	<?php
	endwhile;
	endif;
	get_sidebar(); ?>
</div>

<?php get_footer(); ?>
