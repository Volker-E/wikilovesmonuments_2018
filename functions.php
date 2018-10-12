<?php
/**
 * Functions.php contains all the core functions for your theme to work properly.
 * Be careful when editing this file!
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */


/**
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 * @since 0.7
 */
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option( $name, $default = false ) {
		$optionsframework_settings = get_option( 'optionsframework' );
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		if ( get_option( $option_name ) ) {
			$options = get_option( $option_name );
		}
		if ( isset( $options[$name] ) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

/**
 * Load theme CSS and JavaScript.
 *
 * @since 0.7
 */
add_action( 'wp_enqueue_scripts', 'wikilovemonuments_scripts' );
function wikilovemonuments_scripts() {
	// CSS
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// JavaScripts
	// wp_enqueue_script( 'hoverIntent', get_theme_file_uri( '/js/hoverintent.js' ), array( 'jquery' ), 'r6', true );

	// Load the HTML5 shiv.
	// See https://make.wordpress.org/core/2016/03/08/enhanced-script-loader-in-wordpress-4-5/
	wp_add_inline_script( 'html5shiv', 'window.html5={"shivCSS":false};' ); // TODO: doesn't output script
	wp_enqueue_script( 'html5shiv', get_theme_file_uri( '/js/html5shiv-3.7.3.min.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * Original: Twenty Seventeen 1.0
 * @since 0.7
 */
add_action( 'wp_head', 'wikilovesmonuments_javascript_detection', 0 );
function wikilovesmonuments_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bjs--off\b/,'js--on')})(document.documentElement);</script>\n";
}

/**
 * Define Sidebars & Widgets areas
 */

// Sidebar
register_sidebar( array(
	'name' => __( 'Sidebar', 'wikilovesmonuments' ),
	'id' => 'sidebar',
	'description' => __( 'Widgets in this area are used on the main sidebar region.', 'wikilovesmonuments' ),
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget__title">',
	'after_title' => '</h4>',
));

// Footer Area 1
register_sidebar( array(
	'name' => __( 'Footer Area 1', 'wikilovesmonuments' ),
	'id' => 'footer-one',
	'description' => __( 'Widgets in this area are used in the first footer column', 'wikilovesmonuments' ),
	'before_widget' => '<div class="footer-widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget__title">',
	'after_title' => '</h4>',
));

// Footer Area 2
register_sidebar( array(
	'name' => __( 'Footer Area 2', 'wikilovesmonuments' ),
	'id' => 'footer-two',
	'description' => __( 'Widgets in this area are used in the second footer column', 'wikilovesmonuments' ),
	'before_widget' => '<div class="footer-widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget__title">',
	'after_title' => '</h4>',
));

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function wikilovesmonuments_setup() {

	/*
	 * Make theme available for translation.
	 *
	 * See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 */
	load_theme_textdomain( 'wikilovesmonuments', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'gallery',
			'image',
			'video',
		)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Set default width of primary content area
	$GLOBALS['content_width'] = 960;

	// Register navigation menus
	if ( ! function_exists ( 'wikilovesmonuments_register_nav_menus' ) ) {
		function wikilovesmonuments_register_nav_menus ( ) {
			$wikilovesmonuments_menus = array(
				'main_menu' => __( 'Main', 'wikilovesmonuments' ),
			);
			$wikilovesmonuments_menus = apply_filters ( 'wikilovesmonuments_nav_menus', $wikilovesmonuments_menus );
			register_nav_menus ( $wikilovesmonuments_menus );
		}
	}
	wikilovesmonuments_register_nav_menus();

}
add_action( 'after_setup_theme', 'wikilovesmonuments_setup' );


/**
* Change default read more style.
* @since 0.7
*/
if ( !function_exists( 'wikilovesmonuments_new_excerpt_more' ) ) {
	add_filter( 'excerpt_more', 'wikilovesmonuments_new_excerpt_more' );
	function wikilovesmonuments_new_excerpt_more( $more ) {
		global $post;
		return '…';
	}
};

/**
* Add home page option to WordPress Menu.
* @since 0.7
*/
add_filter( 'wp_page_menu_args', 'wikilovesmonuments_home_page_menu_args' );
function wikilovesmonuments_home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/**
 * Remove WordPress Generator meta tag.
 * @since 0.7
 */
// Disabled since we want to openly show WordPress backing
// remove_action( 'wp_head', 'wp_generator' );

/**
 * Remove WordPress Emoji scripts & stylesheets.
 * @since 0.7
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 10 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

?>
