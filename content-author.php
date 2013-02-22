<?php
/**
 * The template used for displaying page content in author.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- this is CONTENT.PHP -->
 <article class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>,
            <?php the_time(get_option('date_format')); ?> in <?php the_category(', ');?>
        </li>
        <?php //the_excerpt(); ?>
        <?php //get_template_part( 'content','edit'); ?>
</article>
<!-- END CONTENT.PHP -->