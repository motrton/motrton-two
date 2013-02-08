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
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
<!-- END CONTENT-PAGE.PHP -->