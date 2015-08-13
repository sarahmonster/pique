	<?php
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => 2,
			'no_found_rows'  => true,
		) );
	?>

	<?php if ( $testimonials->have_posts() ) : ?>
	<div class="pique-testimonials">
		<?php
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				get_template_part( 'components/content', 'testimonial' );
			endwhile;
			wp_reset_postdata();
		?>
	</div><!-- .testimonials -->
	<?php endif; ?>
