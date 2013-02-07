<?php get_header(); ?>
<!-- this is SINGLE.PHP -->
<div class="container">
<section id="post">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content'); ?>
    <nav class="nav-single">
    <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
      </nav><!-- .nav-single -->
   <p>
      <?php _e('Dieser Post wurde geschrieben von','motrton_two'); ?> <?php the_author_posts_link(); ?>
   </p>
          <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template( '', true );
        ?>
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keinen Post.','motrton_two'); ?>
    </p>
    <?php endif; ?>
</section>
<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<!-- END SINGLE.PHP -->
<?php get_footer(); ?>