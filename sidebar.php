<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>
<?php
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>
<aside id="sidebar" class="aside widget-box col col--aside" role="complementary" aria-label="<?php esc_attr_e( 'Blog sidebar', 'wikilovesmonuments' ); ?>">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>
