<?php
/**
 * Pique functions and definitions
 *
 * @package Pique
 */

if ( ! function_exists( 'pique_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pique_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pique, use a find and replace
	 * to change 'pique' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pique', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'pique-hero', 1280, 1000, true );
	add_image_size( 'pique-square', 280, 280, true );
	add_image_size( 'pique-strip', 440, 160, true );
	add_image_size( 'pique-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'pique' ),
		'secondary' => esc_html__( 'Secondary Menu', 'pique' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pique_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // pique_setup
add_action( 'after_setup_theme', 'pique_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pique_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pique_content_width', 640 );
}
add_action( 'after_setup_theme', 'pique_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pique_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pique' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget Area', 'pique' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget Area', 'pique' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget Area', 'pique' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pique_widgets_init' );

/**
 * Register Google Fonts
 */
function pique_fonts_url() {
  $fonts_url = '';

   /* Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lora = esc_html_x( 'on', 'Lora font: on or off', 'pique' );

	 /* Translators: If there are characters in your language that are not
	 * supported by Karla, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$karla = esc_html_x( 'on', 'Karla font: on or off', 'pique' );

	if ( 'off' !== $lora || 'off' !== $karla ) :
		$font_families = array();

		if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:400,700,400italic,700italic';
		}

		if ( 'off' !== $karla ) {
			$font_families[] = 'Karla:400,700,400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	endif;

return $fonts_url;
}

/**
 * Enqueue Google Fonts for Editor Styles
 */
function pique_editor_styles() {
    add_editor_style( array( 'editor-style.css', pique_fonts_url() ) );
}
add_action( 'after_setup_theme', 'pique_editor_styles' );

/**
 * Enqueue Google Fonts for custom headers
 */
function pique_admin_scripts() {
	wp_enqueue_style( 'pique-fonts', pique_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'pique_admin_scripts' );


/**
 * Enqueue scripts and styles.
 */
function pique_scripts() {
	wp_enqueue_style( 'pique-style', get_stylesheet_uri() );
	wp_enqueue_style( 'pique-fonts', pique_fonts_url(), array(), null );

	// Header and navigation
	wp_enqueue_script( 'pique-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'pique-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'pique-header', get_template_directory_uri() . '/assets/js/header.js', array( 'jquery' ), '20150930', true );

	// Scroll effects (only loaded on front page)
	if ( 'page-templates/template-front.php' === get_page_template_slug() ) :
		wp_enqueue_script( 'pique-skrollr', get_template_directory_uri() . '/assets/js/skrollr.min.js', array(), '20150805', true );
		wp_enqueue_script( 'pique-skrollr-menu', get_template_directory_uri() . '/assets/js/skrollr.menu.min.js', array(), '20150805', true );
		wp_enqueue_script( 'pique-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array( 'jquery' ), '20150813', true );
		wp_enqueue_script( 'pique-front-page', get_template_directory_uri() . '/assets/js/front-page.js', array( 'pique-skrollr', 'pique-waypoints' ), '20150805', true );
	endif;

	if ( wp_style_is( 'genericons', 'registered' ) ) {
		wp_enqueue_style( 'genericons' );
	} else {
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), null );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pique_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
