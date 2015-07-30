<?php
/**
 * Template part for displaying pages on frontpage.
 *
 * @package Pique
 */

if ( isset( $count ) ):
	$count++;
else:
	$count = 1;
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pique-panel' ); ?> data-slide="<?php echo $count; ?>" data-stellar-background-ratio="0.5">
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pique-hero' ); ?>
		<div class="pique-panel-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
	<?php endif; ?>
	<div class="pique-panel-content">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php pique_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pique' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				if ( 'page-templates/template-grid.php' == get_page_template_slug() ) :
					get_template_part( 'components/content', 'grid' );
				endif;

				if ( 'page-templates/template-testimonials.php' == get_page_template_slug() ) :
					get_template_part( 'components/testimonials' );
				endif;
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pique' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php pique_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .pique-panel-content -->
</article><!-- #post-## -->