<?php get_header(); ?>
<!-- this is SINGLE.PHP -->
<div class="container">
<section id="post">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content'); ?>
   <p>
      <?php _e('Dieser Post wurde geschrieben von','motrton_two'); ?> <?php the_author_posts_link(); ?>
   </p> 
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