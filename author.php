<?php
/**
 * The template for author pages with a listing of their posts
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header();

// Start the loop
if ( have_posts() ) : ?>
<header id="page-heading">
	<?php
	if ( isset( $_GET['author_name'] ) ) :
		$curauth = get_userdatabylogin( $author_name );
	else :
		$curauth = get_userdata( intval( $author ) );
	endif;
	?>
	<h1><?php _e( 'Posts by', 'wikilovesmonuments' ); ?>: <?php echo $curauth->display_name; ?></h1>
</header>
<div id="blog-wrap" class="blog-isotope">
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;
?>
</div>

<?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>
<?php endif; ?>
<?php get_footer(); ?>