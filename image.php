<?php
/**
 * The template for image media files
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */

get_header(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>
</div>
<div id="img-attach-page">
    <a href="<?php echo wp_get_attachment_url($post->ID, 'full-size'); ?>"><?php $portimg = wp_get_attachment_image( $post->ID, 'full' ); echo preg_replace( '#(width|height)="\d+"#','', $portimg );?></a>
    <div id="img-attach-page-content">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>
