<?php
/**
 * The template used for creating the nav
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */
?>
<!-- START HEADER-NAV.PHP -->
<div class="thetopnav" id="topbar">
<ul class="sf-menu sf-navbar" id="desktop-navbar">
<!-- wp_list_pages start -->
<?php
                $dashboardlink = admin_url();
                $loginlink = wp_login_url( get_permalink() );
                $logoutlink =  wp_logout_url( get_permalink() );

 if ( is_user_logged_in() ) {
                echo '<li class="page-item" id="dashboard" ><a href="' . $dashboardlink . '"><i class="icon-wrench"></i></a></li>' ;

                echo '<li class="page-item" id="logout" ><a href="' . $logoutlink . '"><i class="icon-signout"></i></a></li>';
                 }else{
                echo '<li class="page-item" id="logout" ><a href="' . $loginlink . '"><i class="icon-signin"></i></a></li>';
                 }
 ?>


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
</div>
<!-- END HEADER-NAV.PHP -->