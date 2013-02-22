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
    

// echo '<h1>TEST START</h1>';
// echo '<p><h2>User ID:</h2><br>' . $userid . '</p>';
// echo '<p><h2>User AIM:</h2><br>' . $aim . '</p>';
// echo '<p><h2>USER Desc:</h2><br>' . $descr . '</p>';
// echo '<p><h2>USER Display Name:</h2><br>' . $disname . '</p>';
// echo '<p><h2>User First Name:</h2><br>' . $fn . '</p>';
// echo '<p><h2>User Jabber:</h2><br>' . $jabber . '</p>';
// echo '<p><h2>USER Last Name:</h2><br>' . $uln . '</p>';
// echo '<p><h2>User Nice Name:</h2><br>' . $unn . '</p>';
// echo '<p><h2>User email:</h2><br>' . $uem . '</p>';
// echo '<p><h2>User Login:</h2><br>' . $ulog . '</p>';
// echo '<p><h2>User nice name:</h2><br>' . $unn . '</p>';
// echo '<p><h2>User Registered???:</h2><br>' . $ureg . '</p>';
// echo '<p><h2>User Url:</h2><br>' . $uurl . '</p>';
// echo '<p><h2>User Yim???:</h2><br>' . $uyim . '</p>';

//    echo '<h1>TEST END</h1>';

// $opts = array('user_login','user_pass','user_nicename','user_email','user_url','user_registered','user_activation_key','user_status','display_name','nickname','first_name','last_name','description','jabber','aim','yim','user_level','user_firstname','user_lastname','user_description','rich_editing','comment_shortcuts','admin_color','plugins_per_page','plugins_last_view','ID');

// for ($i=0; $i < count($opts) ; $i++) { 
//     echo "<p><h2>". $opts[$i] . "</h2> " . the_author_meta($opts[$i], $userid) . "</p>";
// }

    ?> 
        <h2> <?php echo $display_name ?></h2>


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
query_posts(array('post_type' => 'page'));?>

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
    

    <?php if(have_posts())
         echo '<h3 id="posts-by">'.  __('Beiträge von','motrton_two') . ' '. $display_name . '</h3>';
     ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   

   <!-- include content.php -->
   <ul>
          <?php get_template_part( 'content','author'); ?>

   </ul>

    <?php endwhile; ?>
    <!-- <p> -->
    <?php 
    // __('Leider gibt es keine Posts von diesem Autor.','motrton_two');
    ?>
    <!-- </p> -->
    <?php endif; ?>
</article>
</section>

</div>
<!-- END AUTHOR.PHP -->
<?php get_footer(); ?>