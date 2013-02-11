<!DOCTYPE html>
<html lang="de">
<!-- This is HEADER.PHP -->
<head>
<meta charset="utf-8">
<title> <?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--  <meta name="description" content="<?php bloginfo('description'); ?>" /> -->
<meta name="author" content="fabiantheblind" />
<!--    <meta name="description" content="">
<meta name="author" content=""> -->
<!-- Le styles -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Source+Code+Pro:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet"  href="<?php bloginfo('stylesheet_url');?>" >
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>
<body>
<header>
    <!-- START DESKTOP NAV -->
<nav class="thetopnav" id="topbar">
<ul class="sf-menu sf-navbar" id="desktop-navbar">
<!-- wp_list_pages start -->
<li class="page-item" id="en-de" ><a href="#">EN|DE</a>
</li>
        <?php
        
        $options = get_option('motrton-two_options');

$args = array(
    'depth'        => 0,
    'show_date'    => '',
    'date_format'  => get_option('date_format'),
    'child_of'     => 0,
    'exclude'      =>  $options['excludepages'],
    'include'      => '',
    'title_li'     => __(''),
    'echo'         => 1,
    'authors'      => '',
    'sort_column'  => 'menu_order, post_title',
    'link_before'  => '',
    'link_after'   => '',
    'walker'       => '',
    'post_type'    => 'page',
    'post_status'  => 'publish' 
);
 wp_list_pages( $args );
?>
<!--
Searchform
found here:
http://wordpress.org/support/topic/adding-the-searchform-to-the-navbar
-->
</ul>

<ul id="desktop-search">
<li><i id="revealsearch" class=" icon-search"></i></li>
 <li id="searchfield"> 
<?php get_search_form(); ?>
</li>
</ul>
</nav>
</header>
<!-- END HEADER.PHP -->