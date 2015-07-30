<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in any of the sidebars, they will be hidden completely.
 *
 * @package Pique
 */

if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) ) {
  return;
}
?>

<div id="tertiary" class="widget-area footer-widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
  <?php endif; ?>

  <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
  <?php endif; ?>
</div><!-- #tertiary -->
