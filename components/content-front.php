<?php
/**
 * Template part for displaying pages on front page.
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
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
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
			// Show recent blog posts for blog panel (Note that get_option returns a string, so we're casting the result as an int)
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<div class="pique-recent-posts pique-grid-two">

					<?php // Show four most recent posts
					$pique_recent_posts = wp_get_recent_posts( array(
						'numberposts' => 4,
						'post_status' => 'publish',
			 		), OBJECT );

			 		get_posts( $pique_recent_posts );

			 		foreach ( $pique_recent_posts as $post ) :
			 			setup_postdata( $post );
			 			get_template_part( 'components/content', 'excerpt' );
						wp_reset_postdata();
					endforeach; ?>
				</div><!-- .pique-recent-posts -->
			<?php endif; ?>

			<?php // Show sub-pages of grid template page
			if ( 'page-templates/template-grid.php' === get_page_template_slug() ) :
				get_template_part( 'components/content', 'grid' );
			endif;

			// Show testimonials
			if ( 'page-templates/template-testimonials.php' === get_page_template_slug() ) :
				// Show two random testimonials
				$testimonials = new WP_Query( array(
					'post_type'      => 'jetpack-testimonial',
					'order'          => 'ASC',
					'orderby'        => 'rand',
					'posts_per_page' => 2,
					'no_found_rows'  => true,
				) );
				?>

				<?php if ( $testimonials->have_posts() ) : ?>
					<div class="pique-testimonials pique-grid-two">
						<?php
						while ( $testimonials->have_posts() ) : $testimonials->the_post();
							get_template_part( 'components/content', 'testimonial' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .pique-testimonials -->
				<?php endif; ?>
			<?php endif; ?>

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
