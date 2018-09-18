<?php
/**
 * The template for displaying categories, tags and archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header(); ?>

<main id="c" class="content" role="main">
<?php if ( have_posts() ) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2><?php _e( 'Archive for the', 'wikilovesmonuments' ); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e( 'Category', 'wikilovesmonuments' ); ?></h2>
	<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
		<h2><?php _e( 'Posts Tagged', 'wikilovesmonuments' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
		<h2><?php _e( 'Archive for', 'wikilovesmonuments' ); ?> <?php the_time( 'F jS, Y' ); ?></h2>
	<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
		<h2><?php _e( 'Archive for', 'wikilovesmonuments' ); ?> <?php the_time( 'F, Y' ); ?></h2>
	<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
		<h2 class="pagetitle"><?php _e( 'Archive for', 'wikilovesmonuments' ); ?> <?php the_time( 'Y' ); ?></h2>
	<?php /* If this is an author archive */ } elseif ( is_author() ) { ?>
		<h2 class="pagetitle"><?php _e( 'Author Archive', 'wikilovesmonuments' ); ?></h2>
	<?php /* If this is a paged archive */ } elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) { ?>
		<h2 class="pagetitle"><?php _e( 'Blog Archives', 'wikilovesmonuments' ); ?></h2>
	<?php } ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); // Get the post content ?>
	<?php endwhile; ?>
	<?php post_navigation(); ?>
<?php endif; ?>

<?php get_footer(); ?>
