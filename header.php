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
<!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'> -->

<link type="text/css" href='http://fonts.googleapis.com/css?family=Source+Code+Pro:300' rel='stylesheet'>
<link rel="stylesheet"  href="<?php bloginfo('stylesheet_url');?>" >
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<?php
$templateurl = get_template_directory_uri();
echo "<link rel=\"stylesheet\" href=\"" . $templateurl ."/css/biographia.css\" type=\"text/css\" />";
 ?>
</head>
<body>
<header>
<?php get_template_part( 'header','nav'); ?>

</header>
<div id="wrapper">
<!-- END HEADER.PHP -->