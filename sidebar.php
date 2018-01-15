<?php
/**
 * The sidebar containing the main widget area.
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>

<aside class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside>
