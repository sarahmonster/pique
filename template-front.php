<?php
/**
 * Template Name: Front Page
 * This template drives our scrolling one-page site.
 *
 * @package Pique
 */
get_header();

/**
 *
 * We start by generating a new WP Query that will hold all of our top-level pages.
 * All child pages of our current page will be included.
 *
 */
$args = array (
  'post_type'     => 'page',
  'post_parent'   => get_the_ID(), // For child pages of homepage
  //'post_parent' => 0, // For all top-level pages
  'orderby'       => 'menu_order',
  'order'         => 'ASC',
);

$query = new WP_Query( $args );
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php if ( $query->have_posts() ) : ?>

        <?php // Spin up a Loop!
          $count = 1;
          while ( $query->have_posts() ) : $query->the_post();
          $slug = $post->post_name;
        ?>

          <div id="<?php echo $slug; ?>" class="pique-panel" data-slide="<?php echo $count; ?>" data-stellar-background-ratio="0.5">

            <h2><?php the_title(); ?></h2>

            <?php the_content(); ?>

          </div>

        <?php
          $count++;
          endwhile;
        ?>

        <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <p><?php _e( 'Welcome to Pique! To start setting up your site, add a page as a child of your homepage.', 'pique' ); ?></p>
      <?php endif; ?>


			<?php get_template_part( 'components/content', 'hero' ); ?>
			<?php get_template_part( 'components/testimonials' ); ?>
		</main>
	</div>

<?php get_footer(); ?>
