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

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,
	'skadi-front-left-button-control', array(
		'label'=>'Left Button',
		'section'=>'skadi-front-callout-section',
		'settings'=> 'skadi-front-callout-button-right'
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
		'settings'=> 'skadi-front-callout-button-left'
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
		'title'=> 'Footer',
		'priority' => 10,
		'description' => __("The Footer can be adjusted to preferences", 'skadi'),
	));

	$wp_customize->add_setting('skadi-footer-image-left', array(
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
      )
	)));


	/*
	* Make control that lets you display the logo at the bottom end of the page
	*/

	$wp_customize->add_setting('skadi-front-callout-image', array(
		'default' => ''
	));

	// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
	$txtcolors[] = array(
		'slug'=>'color_scheme_1', 
		'default' => '#1e3b70',
		'label' => 'Main Color'
	);
	
	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
	$txtcolors[] = array(
		'slug'=>'color_scheme_2', 
		'default' => '#3363BD',
		'label' => 'Secondary Color'
	);
	
	// link color
	$txtcolors[] = array(
		'slug'=>'link_color', 
		'default' => '#008AB7',
		'label' => 'Link Color'
	);
	
	// link color ( hover, active )
	$txtcolors[] = array(
		'slug'=>'hover_link_color', 
		'default' => '#9e4059',
		'label' => 'Link Color (on hover)'
	);

	// add the settings and controls for each color
	foreach( $txtcolors as $txtcolor ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' => $txtcolor['default'],
				'type' => 'option', 
				'capability' =>  'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$txtcolor['slug'], 
				array('label' => $txtcolor['label'], 
				'section' => 'colors',
				'settings' => $txtcolor['slug'])
			)
		);
	}

}
add_action( 'customize_register', 'skadi_front_callout');

function skadi_customize_colors() {
	/**********************
	text colors
	**********************/
	// main color
	$color_scheme_1 = get_option( 'color_scheme_1' );
	
	// secondary color
	$color_scheme_2 = get_option( 'color_scheme_2' );
	
	// link color
	$link_color = get_option( 'link_color' );
	
	// hover or active link color
	$hover_link_color = get_option( 'hover_link_color' );
	/****************************************
	styling
	****************************************/
	?>
	<style>
	
	
	/* color scheme */
	
	/* main color */
	.mat-button, h2.sub-title, .btn.btn-outline-primary, .btn-outline-primary.custom-file-control::before, a { 
		color:  <?php echo $color_scheme_1; ?>; 
	}

	.mat-button, .btn.btn-outline-primary, .btn-outline-primary.custom-file-control::before, .btn.bmd-btn-fab.btn-primary, .bmd-btn-fab.btn-primary.custom-file-control::before, .btn.btn-raised.btn-primary, .btn-raised.btn-primary.custom-file-control::before, .btn-group-raised .btn.btn-primary, .btn-group-raised .btn-primary.custom-file-control::before { 
		border-color:  <?php echo $color_scheme_1; ?>; 
	}

	.footer, #divider, .btn.bmd-btn-fab.btn-primary, .bmd-btn-fab.btn-primary.custom-file-control::before, .btn.btn-raised.btn-primary, .btn-raised.btn-primary.custom-file-control::before, .btn-group-raised .btn.btn-primary, .btn-group-raised .btn-primary.custom-file-control::before {
		background-color: <?php echo $color_scheme_1; ?> !important; 
	}
	
	/* secondary color */
	#site-description, .menu.main a:active, .menu.main a:hover {
		color:  <?php echo $color_scheme_2; ?>; 
	}
	.footer__btn {
		background-color: <?php echo $color_scheme_2; ?> !important; 
	}
	.menu.main,
	.fatfooter {
		border-top: 1px solid <?php echo $color_scheme_2; ?>;
	}
	.menu.main {
		border-bottom: 1px solid <?php echo $color_scheme_2; ?>;  
	}
	.fatfooter {
		border-bottom: 1px solid <?php echo $color_scheme_2; ?>;
	}

	
	</style>
		
	<?php
}
add_action( 'wp_head', 'skadi_customize_colors' );
