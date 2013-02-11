<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- this is CONTENT.PHP -->

 <article class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><span class="post-title">"<?php the_title(); ?>"</span> </h2>
        <h5> <?php
        $dt = get_the_date();
         $t = get_the_time();
         echo __('gepostet am','motrton_two')." <span id=\"date\">". $dt . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>" . __('um','motrton_two') ." <span id=\"time\">" .$t . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>";
           ?>
           <span class="post-author-link"><?php _e('von','motrton_two'); ?> <?php the_author_posts_link(); ?></span>
       </h5>
        <div class="entry-content"><?php the_content()?><br>
        <?php get_template_part( 'content','edit'); ?>
        </div>
</article>
<!-- END CONTENT.PHP -->