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
    $size = 100;
    $userid =$curauth->ID;
    echo get_avatar( $userid, $size, $default, $alt );

    ?> 
    <h2><?php _e('&Uuml;ber','motrton_two') ?> : <?php echo $curauth->nickname; ?></h2>
    <!-- Check for description -->
    <?php if ( ($curauth->user_description ) !='' ) { ?>
    <p>
        <?php echo $curauth->user_description; ?>
    </p>
    <?php } ?>
    <ul>
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

    <h3> <?php _e('Posts von','motrton_two') ?> <?php echo $curauth->nickname; ?>:</h3>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <!-- include content.php -->
   <ul>
          <?php get_template_part( 'content','author'); ?>

   </ul>

    <?php endwhile; else: ?>
    <p>
    <?php __('Leider gibt es keine Posts von diesem Autor.','motrton_two'); ?>
    </p>
    <?php endif; ?>
</section>

</div>
<!-- END AUTHOR.PHP -->
<?php get_footer(); ?>