<?php
/**
 * Template Name: 2-Spalten-Seite
 * 
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
*/
?>

<?php get_header(); ?>
<?php get_template_part( 'header','blogtitle'); ?>
<!-- START PAGE-TWOCOLUMN.PHP -->
<div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section id="two-column">
        <div id="column-img">
        <?php
        $dom = new DOMDocument;
        $dom->loadHTML(get_the_content());
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
        <!-- content -->
    
    <article id="column-content" class="entry-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title">
            <span class="post-title">"
                <?php the_title(); ?>
                "</span>
            </h2>

  <?php
    function innerHTML($node){
    $doc = new DOMDocument();
    foreach ($node->childNodes as $child)
        $doc->appendChild($doc->importNode($child, true));

    return $doc->saveHTML();
    }

    $dom = new DOMDocument();
    $dom->loadHTML(get_the_content());
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
  <?php endwhile; else: ?>
    <?php _e('Sorry, this page does not exist.'); ?>
  <?php endif; ?>


</section>
</div>
<!-- END PAGE-TWOCOLUMN.PHP -->
<?php get_footer(); ?>
