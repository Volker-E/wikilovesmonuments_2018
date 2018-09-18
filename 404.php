<?php
/**
 * The template for displaying 404 (not found) pages
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

 get_header(); ?>

<main id="c" class="content" role="main">
	<section class="page error-404">
		<h2><?php _e( 'Error 404 - Page Not Found', 'wikilovesmonuments' ); ?></h2>
		<p id="error-page-text"><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. Please visit the', 'wikilovesmonuments' ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e( 'homepage','wikilovesmonuments' ); ?></a>.<?php _e( 'It looks like nothing was found at this location. <br>Is one of the following pages <em>the one</em> you\'ve been searching for?', 'wikilovesmonuments' ); ?></p>
		<ul>
		<?php
			$args = array(
				'depth' => 1,
				'title_li' => ''
			);
			wp_list_pages( $args );
		?>
		</ul>
	</section>
</main>

<?php get_footer(); ?>
