<?php get_header(); ?>
<div class="container">
<section id="page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content'); ?>
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keine Seite.','motrton_two'); ?>
    </p>
    <?php endif; ?>
</section>

</div>
<?php get_footer(); ?>