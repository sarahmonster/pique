<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Pique
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pique_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'pique_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function pique_post_classes( $classes ) {
	// Adds the page template slug, if we're using one, to the array of classes
	// We're stripping the prefixed folder name and the .php suffix for prettier CSS
	if ( get_page_template_slug() && '' !== get_page_template_slug() ) :
		$simple_slug = get_page_template_slug();
		$simple_slug = explode( '.', $simple_slug )[0];
		$simple_slug = explode( '/', $simple_slug )[1];
		$classes[] = 'pique-' . $simple_slug;
	endif;

	// Add a page template slug to the main posts page
	if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) :
		$classes[] = 'pique-template-recent-posts';
	endif;

	return $classes;
}
add_filter( 'post_class', 'pique_post_classes' );

/**
 * We want to do some fancy-pants stuff with our navbar,
 * so we'll need to create a custom walker.
 *
 */
class Pique_Menu extends Walker_Nav_Menu {
	var $current_menu    = null;
	var $break_point     = null;
	var $id_to_split_on  = null;
	var $top_level_count = null;

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )  {

		global $wp_query;
		global $post;

		// Get the locations of nav menus
		$theme_locations = get_nav_menu_locations();

		// Get the menu object of the current nav menu based on the returned theme location
		$menu_obj = get_term( $theme_locations[ $args->theme_location ], 'nav_menu' );

		if ( ! isset( $this->current_menu ) ) :
			$this->current_menu = wp_get_nav_menu_object( $menu_obj->term_id );
		endif;

		// Determine a break point for our menu
		$menu_items = wp_get_nav_menu_items( $menu_obj->term_id );
		if ( ! isset ( $this->top_level_count ) ) :
			$this->top_level_count = 0;
			foreach ( $menu_items as $menu_item ) :
				if ( 0 == $menu_item->menu_item_parent ) :
					$this->top_level_count++;
				endif;
			endforeach;

			if ( ! isset( $this->break_point ) ) :
				$this->break_point = ceil( $this->top_level_count / 2 );
			endif;

			$iterator = 0;
			foreach ( $menu_items as $menu_item ) :
				if ( 0 == $menu_item->menu_item_parent ) :
					if ( $iterator == $this->break_point ) :
						$this->id_to_split_on = $menu_item->ID;
					endif;
					$iterator++;
				endif;
			endforeach;
		endif;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( $this->id_to_split_on == $item->ID ) {
			$output .= $indent . '</li></span><span class="pique-split-nav"><li' . $id . $value . $class_names .'>';
		} else {
			$output .= $indent . '<li' . $id . $value . $class_names . '>';
		}

		// Get the IDs for our target page (the page we're linking to), the parent of our target, and current page
		$target_page = $item->object_id;
		$target_parent = get_post( $target_page )->post_parent;
		if ( $post ) :
			$current_page = $post->ID;
		else :
			$current_page = null;
		endif;

		// Check to see if our target page's parent page is the front page. If so, we'll want to use a hash link.
		if ( 0 !== $target_parent && 'page-templates/template-front.php' === get_page_template_slug( $target_parent ) ) :
			if ( $current_page === $target_parent ) :
				$item->url = '#post-' . $target_page;
			else :
				$item->url = get_page_link( $target_parent ) . '#post-' . $target_page;
			endif;
		endif;

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*
 * Let's customize our excerpt a bit, so it looks better
 * First we decrease the default excerpt length, then
 * we give it a proper hellip for the more text.
 */
function pique_custom_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'pique_custom_excerpt_length', 999 );

function pique_custom_excerpt_more($more) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'pique_custom_excerpt_more' );
