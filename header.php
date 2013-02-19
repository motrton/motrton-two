<!DOCTYPE html>
<html lang="de">
<!-- This is HEADER.PHP -->
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="author" content="XXX" />
<meta name="Title" content="<?php bloginfo('name'); ?>" />
<meta name="Subject" content="Oekonomie" />

<!-- <meta name="Description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat." /> -->
<meta name="Keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." />
<meta http-equiv="Content-Language" content="de" />
<meta name="Abstract" content="Some Text" />
<meta name="Copyright" content="© 2013" />
<meta name="Designer" content="fabiantheblind" />
<meta name="Publisher" content="XX" />

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