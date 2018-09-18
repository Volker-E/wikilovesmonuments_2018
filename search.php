<?php
/**
 * The template for search result pages
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header();
?>

<header id="page-heading">
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wikilovesmonuments' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header>
<div id="search-results-page">
    <div id="post">
		<?php
		if ( have_posts() ) {
			// Show posts using the search loop
			get_template_part( 'content', 'search' );
		}
		else {
			_e( 'Sorry, no results where found', 'wikilovesmonuments' );
		};
		?>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>

<?php get_footer(); ?>
