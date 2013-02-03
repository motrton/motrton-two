<?php get_header(); ?>
<div class="container">
<section>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content'); ?>
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
<?php get_footer(); ?>