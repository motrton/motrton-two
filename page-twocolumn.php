<?php
/**
 * Template Name: 2-Spalten-Seite
 * 
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
*/
?>

<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- START PAGE-TWOCOLUMN.PHP -->
<div class="container">
    <section id="two-column">
        <div id="column-img">
        <?php
            $argsThumb = array(
            'order'          => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => $post->ID,
            'post_mime_type' => 'image',
            'post_status'    => null
            );
        $attachments = get_posts($argsThumb);
        if ($attachments) {
            for ($i = count($attachments); $i >= 0;$i--) {
            //echo apply_filters('the_title', $attachment->post_title);
            echo '<img src="'.wp_get_attachment_url($attachments[$i]->ID, 'thumbnail', false, false).'" alt="" />';
            }
        }
        ?>

        </div>
       
        <!-- content -->
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="column-content" class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><span class="post-title">"<?php the_title(); ?>"</span> </h2>

  <?php
    $content = get_the_content();
    $postOutput = preg_replace(array('{<a[^>]*><img[^>]+.}','{></a>}'),'', $content);
    // echo '<p>';
    echo $postOutput;
    // echo '</p>';
  ?>

</article>
  <?php endwhile; else: ?>
    <?php _e('Sorry, this page does not exist.'); ?>
  <?php endif; ?>


</section>
</div>
<!-- END PAGE-TWOCOLUMN.PHP -->
<?php get_footer(); ?>
