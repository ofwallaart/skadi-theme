<?php
/**
 * Customizer Sass
 *
 * Requires the WP-SCSS plugin to be installed and activated.
 *
 * @package      Customizer Sass
 * @link         https://seothemes.com
 * @author       SEO Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */
 
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
 
    die;
 
}
 
// Check if WP-SCSS plugin is active.
function hr_is_plugin_active( $plugin ) {
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}

if ( ! hr_is_plugin_active( 'wp-scss/wp-scss.php' ) ) {
 
    return;
 
}
 
// Always recompile in the customizer.
if ( is_customize_preview() && ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {
 
    define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
 
}
 
// Update the default paths to match theme.
$wpscss_options = get_option( 'wpscss_options' );
 
if ( $wpscss_options['scss_dir'] !== '/sass/' || $wpscss_options['css_dir'] !== '/css/' ) {
 
    // Alter the options array appropriately.
    $wpscss_options['scss_dir'] = '/sass/';
    $wpscss_options['css_dir']  = '/css/';
 
    // Update entire array
    update_option( 'wpscss_options', $wpscss_options );
 
}
 
// Create array of variables default colors.
$theme_colors = array(
    'primary'    => '#1E3B71',
    'danger'  => 'red',
);
 
add_filter( 'wp_scss_variables', 'prefix_set_variables' );
/**
 * Update SCSS variables
 *
 * @since  1.0.0
 *
 * @return array
 */
function prefix_set_variables() {
 
    // Get the default colors.
    global $theme_colors;
 
    // Create an array of variables.
    $variables = array();
 
    // Loop through each variable and get theme_mod.
    foreach ( $theme_colors as $key => $value ) {
 
        $variables[ $key ] = get_theme_mod( $key, $value );
 
    }
 
    return $variables;
 
}
 
add_action( 'customize_register', 'prefix_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since  1.0.0
 *
 * @return void
 */
function prefix_customizer_register() {
 
    global $wp_customize;
    global $theme_colors;
 
    // Loop through each variable in the array.
    foreach ( $theme_colors as $key => $value ) {
 
        // Add setting for each variable.
        $wp_customize->add_setting( $key, array(
            'default'           => $value,
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
 
        // Add control for each variable.
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $key,
                array(
                    'label'    => ucwords( str_replace( 'color-', '', $key ) ) . ' Color',
                    'section'  => 'colors',
                    'settings' => $key,
                ) )
        );
    }
}