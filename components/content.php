<?php
/**
 * Template part for displaying posts.
 *
 * @package Pique
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pique-panel' ); ?>>
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pique-hero' ); ?>
		<div class="pique-panel-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
	<?php endif; ?>
	<div class="pique-panel-content">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="'. esc_url( get_the_permalink() ) .'">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
			<div class="read-more">
			<?php
				printf(
					wp_kses( __( '<a href="%1$s">Read more %2$s</a>', 'pique' ),
						array( 'span' => array( 'class' => array() ), 'a' => array( 'href' => array(), 'class' => array() )  )
					),
					esc_url( get_the_permalink() ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				);
			?>
			</div>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pique' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php pique_edit_link( get_the_ID() ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .pique-panel-content -->
</article><!-- #post-## -->
