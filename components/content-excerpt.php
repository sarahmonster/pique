<?php
/**
 * Template part for displaying abbreviated posts as excerpts.
 *
 * @package Pique
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			if ( has_post_thumbnail() ) :
				printf( '<a href="%1$s" rel="bookmark" title="%2$s">',
						esc_url( get_permalink() ),
						esc_attr( get_the_title() )
					);

				the_post_thumbnail(  );
				echo '</a>';
			endif;
		?>
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php pique_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
			sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pique' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pique_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
