<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- this is CONTENT-SINGLE.PHP -->
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-content"><?php the_content()?><br>
         <?php get_template_part( 'content','edit'); ?>
        </div>
</article>
<!-- END CONTENT-SINGLE.PHP -->