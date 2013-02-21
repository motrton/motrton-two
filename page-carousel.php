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
jQuery(document).ready(
    function($){
     $('#carousel').slidesjs({
         width: 800,
         height: 400,
        // preload: true,
        preloadImage: '../img/loading.gif',
        // play: 5000,
        // pause: 2500,
        // slideSpeed: 450,
        // hoverPause: true,
        play:{
            active:true,
            auto:false,
            interval:4000,
            swap:true
        },
          pagination: {
      active: true,
        // # [boolean] Create pagination items.
        // # You cannot use your own pagination.
      effect: "slide"
        // # [string] Can be either "slide" or "fade".
    },
         navigation: {
         },
effect: {
      slide: {
        // # Slide effect settings.
        speed: 700,
          // # [number] Speed in milliseconds of the slide animation.
        easing: ""
          // # easing plug-in required: http://gsgd.co.uk/sandbox/jquery/easing/
      }
      // ,
      // fade: {
      //   speed: 300,
      //     // # [number] Speed in milliseconds of the fade animation.
      //   easing: "",
      //     // # easing plug-in required: http://gsgd.co.uk/sandbox/jquery/easing/
      //   crossfade: true
      //     // # [boolean] Cross-fade the transition.
      // }
    }
      });

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
<section id="carousel-sec">

    <!-- This is the carousel part -->
    <div id="carousel">
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
<!-- END PAGE-CAROUSEL.PHP -->
<?php get_footer(); ?>