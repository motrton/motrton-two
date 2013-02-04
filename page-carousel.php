<?php
/*
Template Name: Karussell
*/
?>

<?php

// get options strings into aray of integer.
$options = get_option('motrton-two_options');
  //  echo $options['carouselpages'];
$string_page_ids = $options['carouselpages'];
$arr_str_page_ids = explode(',',$string_page_ids);
$page_ids =  array();
    for ($i = 0; $i < count($arr_str_page_ids); $i++) {
        array_push($page_ids, intval($arr_str_page_ids[$i] ));
        echo intval($arr_str_page_ids[$i]) . "\n";

    }
// echo count($page_ids) .  "\n";
?>

<?php get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
    // $('body').jKit();
 //    $('body').on('mycarousel.shownext', function(){
 //        alert('test');
 //    });
    // $('#mycarousel').jKit('carousel', { 'autoplay': 'yes' }).shownext(function(){
    //     alert('next!');
    // });
    // $('#mycarousel').jKit('carousel').shownext(function(){
        // alert('next!');
    // });
});
</script>
<div class="container">
<section id="page">
    <!-- This is the carousel part -->
<!-- <div class="carousel" data-jkit="[carousel]"> -->
    <div class="carousel" id="mycarousel" rel="jKit[carousel:autoplay=yes;limit=3;interval=3000;speed=500]">
    <?php
    
    for($j = 0; $j < count($page_ids); $j++){
    $post = get_page($page_ids[$j]);
    $content = apply_filters('the_content', $post->post_content);
    
    // echo "<!-- This is ID ".$page_ids[$j] ." -->";
    echo "<div class=\"carousel-item\">" . $content . "</div>";

    }
    ?>
<div class="carousel-item">DIV sometihng!</div>
</div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content'); ?>
    <?php  endwhile; else:  ?>
    <p><?php    __('Leider gibt es keine Seite.','motrton_two'); ?> </p>
    <?php  endif; ?>
</section>

</div>
<?php get_footer(); ?>