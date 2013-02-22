<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- This is AUTHOR.PHP -->

<?php
// this is all taken from here!
// http://codex.wordpress.org/Author_Templates
// 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div class="container">
<section id="author-page">

    
    <?php
    // get the gravatar
    $default = get_template_directory_uri() . "/img/logo.png";
    $alt = $curauth->nickname;
    $size = 400;
    $userid = $curauth->ID;

    echo '<div id="column-img">' .get_avatar( $userid, $size, $default, $alt ) . '</div>';
    
        
        get_template_part( 'snippets','columnpusher');
        
    echo '<article id="column-content">';

    $aim = $curauth->aim;
    $descr = $curauth->description;
    $disname = $curauth->display_name;
    $fn = $curauth->first_name;
    
    $jabber = $curauth->jabber;
    $uln = $curauth->last_name;
    $unn = $curauth->nickname;
    $uem = $curauth->user_email;
    $ulog = $curauth->user_login;
    $unn = $curauth->user_nicename;
    $ureg = $curauth->user_registered;
    $uurl = $curauth->user_url;
    $uyim = $curauth->yim;

    $display_name = $unn;

    if($fn != ''){
        $display_name = $fn;
    }
    if($uln != ''){
        $display_name = $display_name . " " . $uln;
    }
    ?> 
    <h2> <?php echo $display_name ?></h2>
<?php

 $userrole = get_the_author_meta( 'userrole', $userid );
    if($userrole != ''){
        echo '<p id="author-role">' . $userrole .'</p>';
    }
 ?>
    <ul id="user-links">
        <!-- check for user_url -->
    <?php if ( ($curauth->user_email ) !='' ) { ?>
        <li>
        <a href="<?php echo "mailto:" . $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a>
        </li>
    <?php } ?>
    <!-- check for user_url -->
    <?php if ( ($curauth->user_url ) !='' ) { ?>
        <li>
        <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
        </li>
    <?php } ?>
    </ul>
        <!-- Check for description -->
    <?php if ( ($curauth->description ) !='' ) { ?>
    <h3 id="user-description-title">
        zur Person
    </h3>
    <p>
        <?php echo $curauth->description; ?>
    </p>
    <?php } ?>

<?php

 $specialpages = get_the_author_meta( 'specialpages', $userid );
    if($specialpages != ''){
    echo '<h3 id="special-pages">' .__('Beiträge in der Jahrbuch Reihe','motrton_two'). '</h3>';
    $arr_str_page_ids = explode(',',$specialpages);
    $page_ids =  array();
    for ($i = 0; $i < count($arr_str_page_ids); $i++) {
        array_push($page_ids, intval($arr_str_page_ids[$i] ));
         // echo intval($arr_str_page_ids[$i]);

    }
    $pages = get_pages( array(
    'include' => $page_ids
        )
    );
    foreach($pages as $pid){
     $page = get_post($pid);
    echo '<h4 class="special-pages-title"><a href="'.get_permalink($pid).'">' . $page->post_title . '</a></h4>';
    }
    // echo $pages[0]->ID;

    // echo '<p id="author-role">' . count($page_ids) .'</p>';

    }
 ?>

<!-- loop posts -->
  <?php
     if(have_posts())
         echo '<h3 id="posts-by">'.  __('Beiträge von','motrton_two') . ' '. $display_name . '</h3>';
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();

   
   echo '<ul>';
          get_template_part( 'content','author');
   echo '</ul>';
     endwhile; 
     endif;
    ?>


<?php 
$comment_author = $userid;
$comments = get_comments(array('user_id'=>$comment_author));
if(count($comments) > 0){
echo  '<h3 id="user-comments">' . __('Kommentare von','motrton_two') . " " . $display_name . '</h3>';

for ($i=0; $i < count($comments); $i++) { 
    $comment = $comments[$i];
    $c_url = '<a href="' . get_permalink($comment->comment_post_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>';
echo '<p class="user-comments-link">' .__('Kommentar zu','motrton_two') .' ' . $c_url . __(' am ','motrton_two')  . get_comment_date() . '</p>';
if($i == 4){break;}
}
// foreach($comments as $comment) :
// // $c_url = '<a href="' . get_permalink($comment->comment_post_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>';

// // echo ('"' . $comment->comment_content . '" <br> –( posted on ' . get_comment_date('M j, Y') . ', commenting on the post ' . $c_url . ' )<br /> <br>');
// endforeach;
}
 ?>

</article>
</section>

</div>
<!-- END AUTHOR.PHP -->
<?php get_footer(); ?>