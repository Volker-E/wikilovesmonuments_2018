<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header(); ?>

<?php
// Start the Loop.
if ( have_posts() ) { ?>
	<div class="col col--main">
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'content', get_post_format() );
	}
	?>
	</div>
	<?php // post_navigation(); TODO ?>
<?php
} else { ?>
		<h2><?php _e( 'Nothing Found', 'wikilovesmonuments' ); ?></h2>
<?php
	wp_link_pages(); // Paginate pages when <!- next --> is used.
}
?>
<?php
if ( is_front_page() ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>