<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Pique
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

    <?php get_sidebar( 'footer' ); ?>

    <?php if ( has_nav_menu ( 'secondary' ) ) : ?>
      <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'depth' => 1, 'container_class' => 'secondary-links', ) ); ?>
    <?php endif; ?>

  	<div class="site-info">
  	 <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'pique' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'pique' ), 'WordPress' ); ?></a>
  	 <span class="sep"> | </span>
  	 <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'pique' ), 'Pique', '<a href="http://wordpress.com/themes" rel="designer">Automattic</a>' ); ?>
    </div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
