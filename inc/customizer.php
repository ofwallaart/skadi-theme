<?php
/**
 * Skadi Theme Customizer
 *
 * @package Skadi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skadi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'skadi_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'skadi_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'skadi_customize_register' );

function skadi_front_callout($wp_customize){

	/*
	* Create Button Section with a left and right button with their corresponding links
	*/
	$wp_customize->add_section('skadi-front-callout-section', array(
		'title'=> 'Buttons',
		'priority' => 3,
		'description' => __("The buttons are only displayed on the Front page", 'skadi'),
	));

	$wp_customize->add_setting('skadi-front-callout-button-left', array(
		'default'=> 'Example Text'
	));

	$wp_customize->add_setting('skadi-front-callout-button-right', array(
		'default'=> 'Example Text'
	));

	$wp_customize->add_setting('skadi-footer-email-setting', array(
		'default'=> 'example@gmail.com'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-email-button-control', array(
		'label'=>'Email address',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-footer-email-setting'
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-front-left-button-control', array(
		'label'=>'Left Button',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-front-callout-button-left'
	)));

	$wp_customize->add_setting('skadi-front-callout-link-left');

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-front-left-link-button-control', array(
		'label'=>'Link Left Button',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-front-callout-link-left',
		'type' => 'dropdown-pages'
	)));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-front-right-button-control', array(
		'label'=>'Right Button',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-front-callout-button-right'
	)));

	$wp_customize->add_setting('skadi-front-callout-link-right');

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-front-right-link-button-control', array(
		'label'=>'Link Right Button',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-front-callout-link-right',
		'type' => 'dropdown-pages'
	)));

	/**
	* Control for footer image
	*
	*/
	$wp_customize->add_section('skadi-footer-image', array(
		'title'=> 'Logo\'s',
		'priority' => 10,
		'description' => __("The Footer can be adjusted to preferences", 'skadi'),
	));

	$wp_customize->add_setting('skadi-footer-image-left', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_setting('skadi-front-image-setting', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
	'skadi-footer-image-left-button', array(
		'label'=>'Footer Image',
		'section'=>'skadi-footer-image',
		'settings'=> 'skadi-footer-image-left',
		'button_labels' => array( // Optional.
         'select' => __( 'Select Image' ),
         'change' => __( 'Change Image' ),
         'remove' => __( 'Remove' ),
         'default' => __( 'Default' ),
         'placeholder' => __( 'No image selected' ),
         'frame_title' => __( 'Select Image' ),
         'frame_button' => __( 'Choose Image' ),
  ))));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
	'skadi-front-image', array(
		'label'=>'Lander Logo',
		'section'=>'skadi-footer-image',
		'settings'=> 'skadi-front-image-setting',
		'button_labels' => array( // Optional.
         'select' => __( 'Select Image' ),
         'change' => __( 'Change Image' ),
         'remove' => __( 'Remove' ),
         'default' => __( 'Default' ),
         'placeholder' => __( 'No image selected' ),
         'frame_title' => __( 'Select Image' ),
         'frame_button' => __( 'Choose Image' ),
      )


	)));


	/*
	* Make control that lets you display the logo at the bottom end of the page
	*/

	$wp_customize->add_setting('skadi-front-callout-image', array(
		'default' => ''
	));

}
add_action( 'customize_register', 'skadi_front_callout');
