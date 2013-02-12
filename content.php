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

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><span class="post-title">"<?php the_title(); ?>"</span> </h2>
        <h5><?php
        $dt = get_the_date();
         $t = get_the_time();
         echo __('gepostet am','motrton_two')." <span id=\"date\">". $dt . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>" . __('um','motrton_two') ." <span id=\"time\">" .$t . "</span><span class=\"olios-extra-special-white-space\">&emsp;&emsp;</span>";
           ?>
           <span class="post-author-link"><?php _e('von','motrton_two'); ?>
           <?php
           $afn = get_the_author_meta( 'first_name');
           $aln = get_the_author_meta( 'last_name');
           $anick = get_the_author_meta( 'nickname');
           $ann = get_the_author_meta( 'user_nicename');
           $id = get_the_author_meta( 'ID');

            $apurl = get_author_posts_url($id);

           if($afn != ''){
            $resstr = sprintf('<a href="%1$s" rel="author" title="%2$s"><i class="icon-user"></i> %3$s %4$s</a>',
              $apurl,
              $ann,
              $afn,
              $aln 
              );
            echo $resstr;
           }else{
            $resstr = sprintf('<a href="%1$s" rel="author" title="%2$s"><i class="icon-user"></i> %3$s</a>',
              $apurl,
              $ann,
              $ann
              );
            echo $resstr;
           }



            ?></span>
       </h5>
      <!--  <p><?php the_author_meta( 'first_name'); ?> </p>
       <p><?php the_author_meta( 'last_name'); ?> </p> -->

        <div class="entry-content"><?php the_content()?><br>
        <?php get_template_part( 'content','edit'); ?>
        </div>
</article>
<!-- END CONTENT.PHP -->