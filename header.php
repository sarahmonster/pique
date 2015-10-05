<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pique
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php
	if ( 'page-templates/template-front.php' === get_page_template_slug() ) :
		while ( have_posts() ) : the_post();
			get_template_part( 'components/content', 'hero' );
		endwhile;
	endif;
	?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pique' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php // Let's show a header image if we aren't on the front page and a header has been set
		if ( 'page-templates/template-front.php' !== get_page_template_slug() AND get_header_image() ) : ?>
			<a class="pique-header" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php // If the post uses a Featured Image, let's show that
			if ( is_singular() && has_post_thumbnail() ) :
				the_post_thumbnail( 'pique-header', array( 'id' => 'pique-header-image' ) );

			// Otherwise, let's just show the header image
			else :
			?>
				<img id="pique-header-image" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php endif; // End featured image check. ?>
			</a>
		<?php endif; // End header image check. ?>

		<div class="site-branding">
			<?php pique_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'menu_id'         => 'primary-menu',
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s"><span class="pique-split-nav">%3$s</span></ul>',
					'walker'          => new Pique_Menu(),
				) );
			?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
