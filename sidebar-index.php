<?php
/**
 * The sidebar containing the index page widget areas.
 * Stolen from Twenty Twelve
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 1.0
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) )
    return;

// If we get this far, we have widgets. Let do this.
?>
<div class="container">
    <section>
<div id="secondary" class="widget-area" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <div class="first front-widgets">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div><!-- .first -->
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
    <div class="second front-widgets">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div><!-- .second -->
    <?php endif; ?>
</div><!-- #secondary -->
</section>
</div>