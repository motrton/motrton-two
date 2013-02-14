<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>

<div class="container">
    <!-- lets try this gaine -->
    <section id="blog-head">
      <div id="blog-logo">
    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" id="logo"></a>
    </div>
    <div id="blog-title">
     <a href="<?php bloginfo('url'); ?>"><h1 id="blogname" class="depth animated fadeIn" title="<?php bloginfo('name') ?>"><?php bloginfo('name') ?></h1></a>
    </div>
    </section>
</div>
<?php get_template_part( 'snippets','letterpressline'); ?>
