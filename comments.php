<?php
/**
 * The template used for comments
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>

<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>

<?php if ( have_comments() ) : ?>


        <h1 id="comments">

            <?php
                if(get_comments_number() > 1){
                    echo get_comments_number() .' ' . __('Kommentare','motrton_two');
                }else{
                    echo __('Ein Kommentare','motrton_two');
                }
     
            ?>
        </h1>



<?php
wp_list_comments(
    array(
    'callback' => 'motrton_two_comment')
    );
    ?>



<?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Die Kommentarfunktion ist deaktiviert', 'motrton_two' ); ?></p>
    <?php endif; ?>

<?php comment_form(); ?>
