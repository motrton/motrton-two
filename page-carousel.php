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


<div class="container">
<section id="carousel-sec">

    <!-- This is the carousel part -->
    <div id="carousel">
  <a class="slidesjs-previous slidesjs-navigation" href="#"><i class="icon-hand-left"></i> Prev</a>
  <a class="slidesjs-next slidesjs-navigation" href="#">Next <i class="icon-hand-right"></i></a>
    <?php
    
    for($j = 0; $j < count($page_ids); $j++){
    $post = get_page($page_ids[$j]);
    $title = apply_filters('post_title', $post->post_title);
    $content = apply_filters('get_the_content', $post->post_content);

    echo "<!-- This is Page ID ".$page_ids[$j] ." -->";
    echo "<div class=\"carousel-item\" id=\"carousel-item-" . $j ."\">";
    ?>
    <div id="carousel-img">
        <?php
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML($content);
        // echo get_the_content();
        // echo 'hello world';
        // $xpath = new DOMXPath($dom);
        // $nodes = $xpath->query('//img|//a[img]');
        $dom->preserveWhiteSpace = false;
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            echo '<img src="' . $image->getAttribute('src') . '" alt="" />';
        }
        ?>
 </div>
  <article id="carousel-content" class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php

    $dom = new DOMDocument('1.0', 'UTF-8');
    $string = $content;
    $string = mb_convert_encoding($string, 'HTML-ENTITIES', "UTF-8");

    $dom->loadHTML($string);
    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//img|//a[img]');
    foreach($nodes as $node) {
        $node->parentNode->removeChild($node);
    }
    $no_image_content = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));

    // $no_image_content = $dom->saveHTML();
    $no_image_content = apply_filters('the_content', $no_image_content);
    $no_image_content = str_replace(']]>', ']]&gt;', $no_image_content);
    echo $no_image_content;

  ?>

</article>

    <!-- echo $content; -->

    <?php

    echo "</div>";
    }
    ?>
</div> <!-- end carousel -->

</section>
</div> <!-- end container -->

<div class="container">
    <section id="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!-- include content.php -->
   <?php get_template_part( 'content','belowcarousel'); ?>
    <?php  endwhile; else:  ?>
    <p><?php    __('Leider gibt es keine Seite.','motrton_two'); ?> </p>
    <?php  endif; ?>
</section>
</div>
<script type="text/javascript">

jQuery(document).ready(function($){

  runslider($);
    $(window).resize(function() {
        runslider($);

    });
  function runslider ($) {

           if($(window).width() > 767){
     $('#carousel').slidesjs({
        width: 960,
        height: 500,
        responsive: true, // [Boolean] slideshow will scale to its container
        preload: true,
        preloadImage: '../img/loading.gif',
        play:{
            active:true,
            auto:true,
            interval:10000,
            swap:true
        },
        pagination: {
          active: true,
          effect: "slide"
        },
        navigation: {
          active: false,
        // # [boolean] Create next and previous buttons.
        // # You can set to false and use your own next/prev buttons.
        // # User defined next/prev buttons must have the following:
        // # previous: class="slidesjs-previous slidesjs-navigation"
        // # next: class="slidesjs-next slidesjs-navigation"
          effect: "slide"
        // # [string] Can be either "slide" or "fade".
         },
effect: {
      slide: {
        // # Slide effect settings.
        speed: 700,
      }
    }
      });

}
  }

}
);
</script>
<!-- END PAGE-CAROUSEL.PHP -->
<?php get_footer(); ?>