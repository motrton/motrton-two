<nav class="nav-single">

<!-- PREVIOUS LINK -->
  <?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>

    <span class="nav-previous"> <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<i class="icon-hand-left"></i>', 'Vorheriger Post', 'motrton_two' ) . '</span> %title' ); ?></span>

<?php endif; ?>

<!-- NEXT LINK -->
     <?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>

    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '<i class="icon-hand-right"></i>', 'Nächster Post', 'motrton_two' ) . '</span>' ); ?> </span>
<?php endif; ?>
</nav><!-- .nav-single -->