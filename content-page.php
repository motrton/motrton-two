<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- This is CONTENT-PAGE.PHP -->
 <article class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><span class="post-title">"<?php the_title(); ?>"</span></h2>
        <div class="entry-content"><?php the_content()?><br>
        <?php get_template_part( 'content','edit'); ?>

        </div>
</article>
<!-- END CONTENT-PAGE.PHP -->