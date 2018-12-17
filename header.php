<?php
/**
 * The template for displaying the header
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="js--off">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<?php // `<title>` handled by `add_theme_support( 'title-tag' )` in functions.php ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="header" class="header" role="banner">
		<div class="header__mood">
			<div class="content-box">
				<a href="#content" class="is-aural is-focusable"><?php _e( 'Skip to content', 'wikilovesmonuments' ); ?></a>
				<a href="#navigation" class="is-aural is-focusable"><?php _e( 'Skip to navigation', 'wikilovesmonuments' ); ?></a>
		<?php
			if ( is_front_page() ) {
				echo '<h1 class="site__title">';
			}
			else {
				echo '<strong class="site__title">';
			}
		?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
		<?php
			if ( is_front_page() ) {
				echo '</h1>';
				echo "\n";
				echo '<p class="header__attribution"> <a href="https://commons.wikimedia.org/wiki/File:Vakil_mosque_Panorama.jpg" title="Show on Wikimedia Commons">Vakil mosque Panorama</a> by Mohammad Reza Domiri Ganji CC BY-SA 4.0</p>';
			}
			else {
				echo '</strong>';
				echo "\n";
			}
		?>
			</div>
		</div>
		<div class="content-box navigation-box">
			<nav id="navigation" class="nav nav--main" role="navigation">
				<h2><?php _e( 'Wikipedia photo contest with 250,000+ images of the world\'s monuments contributed in 2018', 'wikilovesmonuments' ); ?></h2>
				<?php wp_nav_menu( array(
					'container'      => false,
					'theme_location' => 'main_menu',
					'sort_column'    => 'menu_order',
					'menu_class'     => 'nav--main__menu',
					'menu_id'        => 'nav--main__menu'
				)); ?>
			</nav>
		</div>
	</header>
	<main id="content" class="content" role="main">
		<div class="content-box">