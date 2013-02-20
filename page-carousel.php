<?php
/**
 * Template Name: Karussell
 * 
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
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
        // echo intval($arr_str_page_ids[$i]) . "\n";

    }
// echo count($page_ids) .  "\n";
?>
<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- this is PAGE-CAROUSEL.PHP -->
<script type="text/javascript">
jQuery(document).ready(function($){
                $('#slider').tinycarousel({pager:true});
//     var divs = $('div[id^="carousel-item-"]').hide(),
//     i = 0;
// (function cycle() { 
//     divs.eq(i).fadeIn(400)
//               .delay(5000)
//               .fadeOut(400, cycle);

//     i = ++i % divs.length; // increment i, 
//                            //   and reset to 0 when it equals divs.length
// })();
});
</script>

<div class="container">
<section id="carousel">

    <!-- This is the carousel part -->
<!-- <div class="carousel" data-jkit="[carousel]"> -->
<!-- http://stackoverflow.com/questions/8965651/cycle-through-divs -->
    <div class="carousel">
        <div id="slider">
        <a class="buttons prev" href="#">left</a>
        <div class="viewport">
            <ul class="overview">
    <?php
    
    for($j = 0; $j < count($page_ids); $j++){
    $post = get_page($page_ids[$j]);
    $title = apply_filters('post_title', $post->post_title);
    $content = apply_filters('the_content', $post->post_content);

    echo "<!-- This is ID ".$page_ids[$j] ." -->";
    echo "<li class=\"carousel-item\" id=\"carousel-item-" . $j ."\">";
    // echo "<h2>" .$title . "</h2>";
    echo $content;
    echo "</li>";
    }
    echo "</ul> <!-- close ul overview -->";
    echo "</div> <!-- close div viewport -->";
    echo "<ul class=\"pager\">";
      for($k = 0; $k < count($page_ids); $k++){
        echo "<li><a rel=\"". $k ."\" class=\"pagenum\" href=\"#\">". $k."</a></li>";
      }
    echo "</ul> <!-- close ul pager -->";
    ?>


</div> <!-- end slider -->
</div> <!-- end carousel -->
</section>
</div> <!-- end container -->

<div class="container">
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