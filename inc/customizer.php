<?php
/**
 * Pique Theme Customizer
 *
 * @package Pique
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pique_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Add the Theme Options section
	 */
	$wp_customize->add_section( 'pique_theme_options', array(
		'title' => esc_html__( 'Theme Options', 'pique' ),
	) );

	$wp_customize->add_setting( 'pique_menu', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'pique_menu', array(
		'label'   => esc_html__( 'Use a dynamically-generated menu on the front page.', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'pique_panel1', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel1', array(
		'label'   => esc_html__( 'Panel 1', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel2', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel2', array(
		'label'   => esc_html__( 'Panel 2', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel3', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel3', array(
		'label'   => esc_html__( 'Panel 3', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel4', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel4', array(
		'label'   => esc_html__( 'Panel 4', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel5', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel5', array(
		'label'   => esc_html__( 'Panel 5', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel6', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel6', array(
		'label'   => esc_html__( 'Panel 6', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel7', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel7', array(
		'label'   => esc_html__( 'Panel 5', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'pique_panel8', array(
		'default'           => false,
		'sanitize_callback' => 'pique_sanitize_numeric_value',
	) );

	$wp_customize->add_control( 'pique_panel8', array(
		'label'   => esc_html__( 'Panel 6', 'pique' ),
		'section' => 'pique_theme_options',
		'type'    => 'dropdown-pages',
	) );
}
add_action( 'customize_register', 'pique_customize_register' );

/**
 * Sanitize a numeric value
 */
function pique_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	} else {
		return 0;
	}
}

/**
 * Sanitize a checkbox
 */
function pique_sanitize_checkbox( $input ) {
	if ( ! in_array( $input, array( true, false ) ) ) {
		$input = false;
	}
	return $input;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pique_customize_preview_js() {
	wp_enqueue_script( 'pique_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'pique_customize_preview_js' );
