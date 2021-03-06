<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>

<!-- this is SEARCH.PHP -->
<div class="container">
<section id="post">
  <!-- START LOOP -->
	<?php if ( have_posts() ) :?>
    <h1 class="page-title">
      <?php printf( __( 'Search Results for: %s', 'motrton_two' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>
  <?php while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
    <?php get_template_part( 'content','search'); ?>

    <?php 
    // get_template_part( 'nav','single');
     ?>

    <?php get_template_part( 'snippets','letterpresslinefluid'); ?>

   <!-- COMMENTS TEMPLATE LOAD -->
          <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template( '', true );
        ?>
    <!-- END COMMENTS TEMPLATE -->
    <!-- END LOOP -->
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keinen Ergebnisse f&uuml;r diese Suche.','motrton_two'); ?>
    </p>
    <?php endif; ?>
</section>
<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<!-- END SINGLE.PHP -->
<?php get_footer(); ?>