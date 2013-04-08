<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- this is INDEX.PHP -->
<div class="container">
<!-- <section id="indexed"> -->
    <div class="rows">
      <?php $post_counter = 0; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $post_counter++; ?>

<!-- end of first item in row -->
    <?php if($post_counter == 1): ?>

    <article class="rowitem">
        <h2><a href="<?php the_permalink(); ?> "><i class="icon-hand-right"></i> <?php the_title_attribute(); ?></a></h2>
        <h5><?php get_template_part( 'content','authorinfo'); ?></h5>
        <div id="blogroll-image-one">
         <?php 

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML(get_the_content());
        // echo get_the_content();
        // echo 'hello world';
        // $xpath = new DOMXPath($dom);
        // $nodes = $xpath->query('//img|//a[img]');
        $dom->preserveWhiteSpace = false;
        $images_first = $dom->getElementsByTagName('img');
        foreach ($images_first as $img) {
            echo '<img src="' . $img->getAttribute('src') . '" alt="" />';
        }
        

          //   if ($firstImageSrc) {
          //   // http://wordpress.org/support/topic/getting-thumbnails-of-images-attached-to-a-post  
          //     echo "<img class=\"first-blogroll-image\" src=\"{$firstImageSrc[0]}\" alt=\"\" />"; 
          //   }else{
          //   // $logourl = get_template_directory_uri() . "/img/logo.png";
          // // echo  "<img class=\"blogroll-thumbnail\" src=\"". $logourl ."\" alt=\"\">";

          // }
          ?>
        </div>
              <div class="post-excerpt">
         <?php the_excerpt()?>
         <br>
        </div>
    </article>
  <?php else: ?>
<!-- all other items just get a tiny thumbnail-->
    <article class="rowitem">
        <h2><a href="<?php the_permalink(); ?> "><i class="icon-hand-right"></i> <?php the_title_attribute(); ?></a></h2>
        <h5><?php get_template_part( 'content','authorinfo'); ?></h5>
        <div class="thumb">
        <?php 
        echo get_the_post_thumbnail($post->ID, array(100,100) );
          //       /**
          //    * Get the images thumbnails
          //    */
          //    $argsThumb = array(
          //         'order'          => 'ASC',
          //         'post_type'      => 'attachment',
          //         'post_parent'    => $post->ID,
          //         'post_mime_type' => 'image',
          //         'post_status'    => null
          //         );
          //   $attachments = get_posts($argsThumb);
          //   if ($attachments) {
          //   // http://wordpress.org/support/topic/getting-thumbnails-of-images-attached-to-a-post  
          //   $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
          //     $firstImageSrc = wp_get_attachment_image_src(
          //                       array_shift(
          //                         array_keys($images)
          //                         )
          //                       );
          //   // http://wordpress.org/support/topic/getting-thumbnails-of-images-attached-to-a-post  
          //     echo "<img class=\"blogroll-thumbnail\" src=\"{$firstImageSrc[0]}\" alt=\"\" />"; 
          //   }else{
          //   $logourl = get_template_directory_uri() . "/img/logo.png";
          // echo  "<img class=\"blogroll-thumbnail\" src=\"". $logourl ."\" alt=\"\">";

          // }
      ?>

        </div> <!-- close div thumb -->
        <div class="post-excerpt">
         <?php the_excerpt()?>
         <br>
        </div>
    </article>
    <!-- end of all other items -->
    <?php endif; ?>

    <?php if( $post_counter != count( $posts ) ): ?>
    <?php get_template_part( 'snippets','letterpresslinefluid'); ?>
        <?php endif; ?>
    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keinen Post.'); ?>
    </p>
    <?php endif; ?>
    </div>
<!-- </section> -->

<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<!-- END INDEX.PHP -->
<?php get_footer(); ?>
