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

<!-- loop pages -->
<?php
query_posts(array(
'post_type' => 'page',
'author' => $userid ));?>

    <?php 
    if(have_posts())
    echo '<h3 id="pages-by">' .  __('Seiten von','motrton_two') . " ".  $display_name . '</h3>';
     ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h4 class="pages-by-title">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>
    </h4>
    <?php the_excerpt() ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query();  // Restore global post data ?>
    <!-- loop posts -->
    <?php if(have_posts())
         echo '<h3 id="posts-by">'.  __('Beiträge von','motrton_two') . ' '. $display_name . '</h3>';
     ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   
   <!-- include content.php -->
   <ul>
          <?php get_template_part( 'content','author'); ?>
   </ul>
    <?php endwhile; ?>
    <?php endif; ?>

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


</article>
</section>

</div>
<!-- END AUTHOR.PHP -->
<?php get_footer(); ?>