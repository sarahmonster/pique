  <?php
    $recent_posts = new WP_Query( array(
      'posts_per_page'   => 4,
    ) );
  ?>

  <?php if ( $recent_posts->have_posts() ) : ?>
  <div class="pique-recent-posts">
    <?php
      while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
        get_template_part( 'components/content', 'excerpt' );
      endwhile;
      wp_reset_postdata();
    ?>
  </div><!-- .recent_posts -->
  <?php endif; ?>
