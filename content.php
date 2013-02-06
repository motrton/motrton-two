<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package motrton-two
 * @since motrton-two 1.0
 */
?>
<!-- this is CONTENT.PHP -->
 <article class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-content"><?php the_content()?><br>
          <?php 
  if ( is_user_logged_in() ) {

    // edit_post_link('Seite editieren', '<p>', ' <i class="icon-edit"></i></p>');
     echo '<p><a href="' . get_edit_post_link() . '" > '. __('Seite editieren','motrton-one') . ' <i class="icon-edit"></i></a></p>';
  }
     ?>
        </div>
</article>
<!-- END CONTENT.PHP -->