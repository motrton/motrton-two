<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- this is INDEX.PHP -->
<div class="container">
<section id="indexed">
    <div class="rows">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="rowitem">
        <h2><?php the_title(); ?></h2>
        <div class="thumb">
        <?php 
            /**
             * Get the images thumbnails
             */
            
             $argsThumb = array(
                  'order'          => 'ASC',
                  'post_type'      => 'attachment',
                  'post_parent'    => $post->ID,
                  'post_mime_type' => 'image',
                  'post_status'    => null
                  );
            $attachments = get_posts($argsThumb);
            if ($attachments) {
            // http://wordpress.org/support/topic/getting-thumbnails-of-images-attached-to-a-post  
            $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
              $firstImageSrc = wp_get_attachment_image_src(
                                array_shift(
                                  array_keys($images)
                                  )
                                );

              echo "<img class=\"thumbnail\" src=\"{$firstImageSrc[0]}\" alt=\"\" />"; 
              // echo "</div>"; // close span2 image-container-inner-home
              //}
            }else{
            $logourl = get_template_directory_uri() . "/img/logo_swblr.png";
          echo  "<img class=\"thumbnail\" src=\"". $logourl ."\" alt=\"\">";
;
          }
      ?>

        </div>
        <div class="post-excerpt">
         <?php the_excerpt()?>
        <!-- <p><a href= "<?php the_permalink(); ?>" ><?php _e('Mehr?','motrton-two')?></a></p> -->

         <br>
        </div>
    </article>
    <br>
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keinen Post.'); ?>
    </p>
    <?php endif; ?>
    </div>
</section>

<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<!-- END INDEX.PHP -->
<?php get_footer(); ?>
