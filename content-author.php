<?php
/**
 * The template used for displaying page content in author.php
 *
 * @package motrton-two
 * @since motrton-two 1.0
 */
?>
<!-- this is CONTENT.PHP -->
 <article class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>,
            <?php the_time(get_option('date_format')); ?> in <?php the_category(', ');?>
        </li>

          <?php 
  if ( is_user_logged_in() ) {

    // edit_post_link('Seite editieren', '<p>', ' <i class="icon-edit"></i></p>');
     echo '<p><a href="' . get_edit_post_link() . '" > '. __('Seite editieren','motrton-one') . ' <i class="icon-edit"></i></a></p>';
  }
     ?>
        
</article>
<!-- END CONTENT.PHP -->