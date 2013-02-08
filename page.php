<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>

<!-- this is PAGE.PHP -->
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
<!-- END PAGE.PHP -->
<?php get_footer(); ?>