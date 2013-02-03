<?php 

require_once ( get_template_directory() . '/theme-options.php' );


/**
 * ADD THE SCRIPTS
 *
 *
 */

//Making jQuery new
// makes problems with superfish plugin
// add_action('init', 'modify_jquery');
if( !is_admin() ){
// bootstrap js
// add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
//superfish scripts js
add_action('wp_enqueue_scripts','superfish_script_with_jquery');

add_action('wp_enqueue_scripts','combobox_with_jqueryui');
// 
// add main JS
// 
add_action('wp_enqueue_scripts','call_main_js');
/**
 * ADD THE CSS
 */
add_action('init', 'my_styles');

// register sidebar
// add_action( 'widgets_init', 'my_register_sidebars' );
// add_action( 'widgets_init', 'motrton_two_widgets_init' );


// custom filter around content to get the link icon
add_filter( 'the_content', 'mytheme_content_ad' );
// add my personal debugger
add_action('wp_footer', 'show_template');
}
add_action( 'init', 'my_autocomplete' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('motrton-two', get_template_directory_uri() . '/lang');
}

//Making jQuery
// unused
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery',  get_template_directory_uri() . '/js/jquery-1.9.0.js', false, '1.9.0');
        wp_enqueue_script('jquery');
    }
}




function my_autocomplete() {

    wp_deregister_script('suggest');
    // Register our jQuery UI style and our custom javascript file  
    wp_register_style('my-jquery-ui-css',get_template_directory_uri() . '/css/jquery-ui-1.10.0.custom.css',array('jquery-ui-datepicker-style'));
    wp_enqueue_style( 'my-jquery-ui-css' );  

    wp_register_script( 'my-jquery-ui-js', get_template_directory_uri() . '/js/jquery-ui-1.10.0.custom.js', array('jquery'),'0.1',true);

    wp_register_script( 'my_acsearch', get_template_directory_uri() . '/js/myacsearch.js', array('jquery','my-jquery-ui-js'),'0.1',true);  
  wp_localize_script( 'my_acsearch', 'MyAcSearch', array('url' => admin_url( 'admin-ajax.php' )));
    // Function to fire whenever search form is displayed  
    add_action( 'get_search_form', 'my_autocomplete_search_form' );  
  
    // Functions to deal with the AJAX request - two for logged in users, the other for non-logged in users.  
    add_action( 'wp_ajax_my_autocomplete', 'my_autocomplete_suggestions' );  
    add_action( 'wp_ajax_nopriv_my_autocomplete', 'my_autocomplete_suggestions' );  
}


function my_autocomplete_search_form(){
    wp_enqueue_script( 'my_acsearch' );
}

function my_autocomplete_suggestions(){  
    // Query for suggestions  
    $posts = get_posts( array(  
        's' =>$_REQUEST['term'],  
    ) );  
  
    // Initialise suggestions array  
    $suggestions=array();  
  
    global $post;  
    foreach ($posts as $post): setup_postdata($post);  
        // Initialise suggestion array  
        $suggestion = array();  
        $suggestion['label'] = esc_html($post->post_title);  
        $suggestion['link'] = get_permalink();  
  
        // Add suggestion to suggestions array  
        $suggestions[]= $suggestion;  
    endforeach;  
  
  $options = get_option('motrton-two_options');
  $termsstring = $options['searchterms'];
   $terms = explode(",", $termsstring);
   foreach($terms as $value) {
    $suggestion = array();
    $suggestion['label'] = "" . esc_html(  trim($value));
    $suggestion['link'] = site_url('/') .'?s=' . esc_html(  trim($value)) . "&submit=Search";
    $suggestions[]= $suggestion;  

    }


    // JSON encode and echo  
    $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";
    echo $response;  
  
    // Don't forget to exit!  
    exit;  
}  



/**
 * This adds the superfish script and the hoverintent to create the menu
 *
 */
function superfish_script_with_jquery(){
wp_register_script( 'hoverintent-script', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ) );
wp_enqueue_script( 'hoverintent-script' );
wp_register_script( 'superfish-script', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );
wp_enqueue_script( 'superfish-script' );

}
/**
 * This calls my personal JS
 * 
 */
function call_main_js(){
wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
wp_enqueue_script( 'main-script' );
}

function combobox_with_jqueryui(){
wp_register_script( 'combobox-script', get_template_directory_uri() . '/js/combobox.js', array( 'jquery','my-jquery-ui-js') );
wp_enqueue_script( 'combobox-script' );
}

/**
 * all the css files
 * 
 */
function my_styles() {

    wp_register_style( 'superfish', get_template_directory_uri() . '/css/custom-superfish.css' );
    wp_register_style( 'superfish-navbar', get_template_directory_uri() . '/css/custom-superfish-navbar.css',array('superfish') );
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_register_style( 'overwrite', get_template_directory_uri() . '/css/overwrite.css');
    wp_register_style( 'oo-naok-style', get_template_directory_uri() . '/css/oo-naok.css',array('overwrite'));


    wp_register_style( 'combobox', get_template_directory_uri() . '/css/combobox.css');

if( !is_admin() ){
    wp_enqueue_style( 'superfish' );
    wp_enqueue_style( 'superfish-navbar' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'overwrite' );
    wp_enqueue_style( 'oo-naok-style' );
    wp_enqueue_style( 'combobox' );
    // wp_enqueue_style( 'bs-responsive' );
    }
}

// // custom menu
// add_action('init','register_custom_menu');
// function register_custom_menu(){
// register_nav_menu('primary',__('Custom Menu'));
// }


/**
 * [my_register_sidebars description]
 * [type] [description]
 */
// function my_register_sidebars() {

// if ( function_exists('register_sidebar') ) {
// register_sidebar(array(
// 'name' => 'primary',
// 'before_widget' => '<li id="%1$s" class="widget %2$s">',
// 'after_widget' => '</li>',
// 'before_title' => '<h2 class="widgettitle">',
// 'after_title' => '</h2>',
// ));
// }
// }

// function motrton_two_widgets_init() {
// 	register_sidebar( array(
// 		'name' => 'basic sidebar',
// 		'id' => 'sidebar1',
// 		'before_widget' => '',
// 		'after_widget' => '',
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// }

// http://sivel.net/2009/03/adding-additional-links-to-the-output-from-wp_list_pages/
// add_filter('wp_list_pages', 'add_blog_link');
// function add_blog_link($output) {
//         $homeurl = get_bloginfo('url');
//         $output .= '<li><a href="'. $homeurl .'">Blog</a></li>';
//         return $output;
// }

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );
//Filter content to add specific div around it
// needed to filter only contents posts
/**
 * [mytheme_content_ad description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function mytheme_content_ad( $content ) {
    $prefix = '<div class="linked">';
    $suffix = '</div>';
    $filteredcontent = $prefix . $content .$suffix;
    return $filteredcontent;
}


// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
// function add_menuclass($ulclass) {
// return preg_replace('/<ul>/', '<ul class="sf-menu sf-navbar">', $ulclass, 1);
// }
// add_filter('wp_page_menu','add_menuclass');


// DEVELOPMENT TOOL
// For debugging - show template file
function show_template() {

    $options = get_option('motrton-two_options');
    global $template;
   if($options['debugger'] == true){
    $file = substr( strrchr( $template , "/" ), 1) ;
    $heading = "<div style='padding-left:10%;' id='debuginfo'><h5> DEBUGINFO  </h5> deactivate from theme options<p>";
    $str1 = "Used template file --> <strong>" . $file . "</strong><br>";
    $str2 = "Current ID -->  <strong>" . get_the_ID() . "</strong><br>";
    $str3 = "Pages to Exclude --> <strong>" . $options['excludepages'] . "</strong><br>";
    $str4 = admin_url('admin-ajax.php') . "<br>";
    $str5 = admin_url('') . "<br>";
    $end = "</p></div>";

    print_r($heading . $str1 .$str2. $str3 . $str4 . $str5. $end);
}
}


 ?>