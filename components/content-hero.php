<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package Pique
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pique-panel pique-hero' ); ?> data-slide="1" data-stellar-background-ratio="0.5">
  <?php if ( has_post_thumbnail() ) :
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pique-hero' ); ?>
    <div class="pique-panel-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
  <?php endif; ?>
  <div class="pique-panel-content">

    <div class="entry-content">

      <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
          wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pique' ), array( 'span' => array( 'class' => array() ) ) ),
          the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );
      ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <?php pique_entry_footer(); ?>
    </footer><!-- .entry-footer -->
  </div><!-- .pique-panel-content -->
</article><!-- #post-## -->
