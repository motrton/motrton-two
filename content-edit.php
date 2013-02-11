
<?php
/**
 * The template used for displaying edit links content-{SLUG}.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>

<?php
  if ( is_user_logged_in() ) {
    // edit_post_link('Seite editieren', '<p>', ' <i class="icon-edit"></i></p>');
     echo '<p><a href="' . get_edit_post_link() . '" > <i class="icon-edit"></i>'. __('Seite editieren','motrton-one') . '</a></p>';
  }
?>