<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to motrton_two_comment() which is
 * located in the functions.php file.
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
    <!-- THIS IS COMMENTS.PHP -->
    <div id="comments" class="comments-area">
    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                printf( _nx( 'Eine Antwort auf &ldquo;%2$s&rdquo;', '%1$s Antworten auf &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'motrton_two' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Kommentar Navigation', 'motrton_two' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; &Auml;ltere Kommentare', 'motrton_two' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Neuere Kommentare &rarr;', 'motrton_two' ) ); ?></div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>

        <ol class="commentlist">
            <?php
                /* Loop through and list the comments. Tell wp_list_comments()
                 * to use motrton_two_comment() to format the comments.
                 * If you want to overload this in a child theme then you can
                 * define motrton_two_comment() and that will be used instead.
                 * See motrton_two_comment() in inc/template-tags.php for more.
                 */
                wp_list_comments( array( 'callback' => 'motrton_two_comment' ) );
            ?>
        </ol><!-- .commentlist -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Kommentar Navigation', 'motrton_two' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'motrton_two' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Neuere Kommentare &rarr;', 'motrton_two' ) ); ?></div>
        </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Kommentieren ist deaktiviert.', 'motrton_two' ); ?></p>
    <?php endif; ?>

    <h3> <i class="icon-comment"></i>
        <?php
        // comment_form_title(__('Hinterlasse eine Antworten','motrton_two'), __('Antwort an %s','motrton_two'));
        comment_form_title();
        ?>
    </h3>

    <?php
    // Looky here
    // http://ottopress.com/2010/wordpress-3-0-theme-tip-the-comment-form/
    // 
    
    $comment_args = array(
        'title_reply'       => '',
        'title_reply_to'   => '',
    'cancel_reply_link'    => __( 'Antwort verwerfen','motrton_two' ),
    'label_submit'         => __( 'Kommentar abschicken','motrton_two' ),
    // 'comment_notes_after'  => __('','motrton_two'),
    // 'comment_field' => '<div><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"  placeholder="your comment"></textarea></div>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Du bist eingeloggt als <a href="%1$s">%2$s</a>. Willst du dich <a href="%3$s" title="Log out of this account"> ausloggen?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
    'comment_notes_before' => "<span id=\"comment-notes-before\">" . __('Deine E-Mail-Adresse wird nicht ver&ouml;ffentlicht. Erforderliche Felder sind mit',motrton_two).' <i class="icon-asterisk"></i> ' .__( 'markiert','motrton_two') ."</span>");


    comment_form($comment_args);
    ?>

</div><!-- #comments .comments-area -->
    <!-- END COMMENTS.PHP  -->
