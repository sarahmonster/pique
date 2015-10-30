<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Pique
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function pique_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'wrapper'   => false,
		'render'    => 'pique_infinite_scroll_render',
		'footer'    => 'tertiary',
	) );
} // end function pique_jetpack_setup
add_action( 'after_setup_theme', 'pique_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function pique_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'components/content', get_post_format() );
	}
} // end function pique_infinite_scroll_render

/**
* Add theme support for Responsive Videos.
*/
add_theme_support( 'jetpack-responsive-videos' );

/**
 * Add support for the Site Logo
 *
 * @since Pique 1.0
 */
function pique_site_logo_init() {
	add_image_size( 'pique-logo', 2000, 200 );
	add_theme_support( 'site-logo', array( 'size' => 'pique-logo' ) );
}
add_action( 'after_setup_theme', 'pique_site_logo_init' );

/**
 * Return early if Site Logo is not available.
 *
 * @since Pique 1.0
 */
function pique_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
* Add theme support for Testimonial CPT.
*/
add_theme_support( 'jetpack-testimonial' );
