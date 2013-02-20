<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>

<!-- this is SINGLE.PHP -->
<div class="container">
<section id="post">
  <!-- START LOOP -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
    <?php get_template_part( 'content'); ?>
    <?php get_template_part( 'nav','single'); ?>
    <?php get_template_part( 'snippets','letterpresslinefluid'); ?>

    <!-- END LOOP -->
    <?php endwhile; ?>

   <!-- COMMENTS TEMPLATE LOAD -->
          <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() ||  get_comments_number() != 0){
            comments_template( '', false );

          }
        ?>
    <!-- END COMMENTS TEMPLATE -->
    <?php else: ?>
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