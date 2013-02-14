<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- this is SIDEBAR.PHP -->
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<ul><?php dynamic_sidebar( 'sidebar-1' ); ?></ul>
		</div><!-- #secondary -->
<?php endif; ?>
<!-- END SIDEBAR.PHP -->