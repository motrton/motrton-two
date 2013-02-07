<nav class="nav-single">

<!-- PREVIOUS LINK -->
  <?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>

    <!-- <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3> -->
    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Vorheriger Post', 'twentytwelve' ) . '</span> %title' ); ?></span>

<?php endif; ?>

<!-- NEXT LINK -->
     <?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>

    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Nächster Post', 'twentytwelve' ) . '</span>' ); ?></span>

<?php endif; ?>
</nav><!-- .nav-single -->