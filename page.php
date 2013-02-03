<?php get_header(); ?>
<div class="container">
<section>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include page-content.php -->
   <?php get_template_part( 'content', 'page' ); ?>
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keine Seite.','motrton_two'); ?>
    </p>
    <?php endif; ?>
</section>
<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<?php get_footer(); ?>