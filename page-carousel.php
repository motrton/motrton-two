<?php
/**
 * Template Name: Karussell
 * 
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
*/
?>

<!-- this is PAGE-CAROUSEL.PHP -->
<?php

// get options strings into aray of integer.
$options = get_option('motrton-two_options');
  //  echo $options['carouselpages'];
$string_page_ids = $options['carouselpages'];
$arr_str_page_ids = explode(',',$string_page_ids);
$page_ids =  array();
    for ($i = 0; $i < count($arr_str_page_ids); $i++) {
        array_push($page_ids, intval($arr_str_page_ids[$i] ));
        // echo intval($arr_str_page_ids[$i]) . "\n";

    }
// echo count($page_ids) .  "\n";
?>

<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>

<script type="text/javascript">
jQuery(document).ready(function($){

    var divs = $('div[id^="carousel-item-"]').hide(),
    i = 0;

(function cycle() { 
    divs.eq(i).fadeIn(400)
              .delay(5000)
              .fadeOut(400, cycle);

    i = ++i % divs.length; // increment i, 
                           //   and reset to 0 when it equals divs.length
})();
});
 </script>
<section id="carousel">
<div class="container">

    <!-- This is the carousel part -->
<!-- <div class="carousel" data-jkit="[carousel]"> -->
<!-- http://stackoverflow.com/questions/8965651/cycle-through-divs -->
    <div class="carousel">
    <?php
    
    for($j = 0; $j < count($page_ids); $j++){
    $post = get_page($page_ids[$j]);
    $title = apply_filters('post_title', $post->post_title);
    $content = apply_filters('the_content', $post->post_content);
    // $excerpt = apply_filters('post_excerpt', $post->post_excerpt);


    
    echo "<!-- This is ID ".$page_ids[$j] ." -->";
    echo "<div id=\"carousel-item-" . $j ."\">";
    // echo "<h2>" .$title . "</h2>";
    echo $content;
    echo "</div>";

    }
    ?>
</div>
</section>
<section id="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content','carousel'); ?>
    <?php  endwhile; else:  ?>
    <p><?php    __('Leider gibt es keine Seite.','motrton_two'); ?> </p>
    <?php  endif; ?>
</section>

</div>
<!-- END PAGE-CAROUSEL.PHP -->
<?php get_footer(); ?>