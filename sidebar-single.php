<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-example
 */

if ( ! is_active_sidebar( 'single-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar-single">
	<?php dynamic_sidebar( 'single-sidebar' ); ?>
</aside><!-- #secondary -->
