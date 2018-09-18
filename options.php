<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option( 'optionsframework' );
    $optionsframework_settings['id'] = 'options_wikilovesmonuments_themes';
    update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __( 'General', 'options_framework_theme' ),
		'type' => 'heading' );

	/*
	$options['custom_logo'] = array(
		'name' => __( 'Custom Logo', 'options_framework_theme' ),
		'desc' => __( 'Upload your custom logo.', 'options_framework_theme' ),
		'std' => '',
		'id' => 'custom_logo',
		'type' => 'upload' );
	*/

	$options['custom_favicon'] = array(
		'name' => __( 'Custom Favicon', 'options_framework_theme' ),
		'desc' => __( 'Upload your custom site favicon.', 'options_framework_theme' ),
		'id' => 'custom_favicon',
		'type' => 'upload' );

	return $options;
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>
<?php } ?>
