<?php 
/**
 * motrton-two functions and definitions
 *
 * @package WordPress
 * @subpackage motrton-two
 * @since motrton-two 0.1
 */

require_once ( get_template_directory() . '/theme-options.php' );

// require( get_template_directory() . '/inc/template-tags.php' );

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
add_action('wp_enqueue_scripts','fittext_script_with_jquery');

add_action('wp_enqueue_scripts','combobox_with_jqueryui');

// add_action('wp_enqueue_scripts','jkit_script_with_jquery');
// 
// add main JS
// 
add_action('wp_enqueue_scripts','call_main_js');
/**
 * ADD THE CSS
 */
add_action('init', 'my_styles');


// custom filter around content to get the link icon
// add_filter( 'the_content', 'mytheme_content_ad' );
// add my personal debugger
add_action('wp_footer', 'show_template');

//add placeholder text to comment forms
add_filter('comment_form_default_fields','motrton_two_comment_placeholders');
}
add_action( 'init', 'my_autocomplete' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('motrton-two', get_template_directory_uri() . '/lang');
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more($more) {
       global $post;
    return '<br><a href="'. get_permalink($post->ID) . '"><i class="icon-hand-right"></i> ' . __('Weiterlesen','motrton_two') .'&hellip;</a>';
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
    wp_register_style('my-jquery-ui-css',get_template_directory_uri() . '/css/jquery-ui-1.10.0.custom.css');
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
 * This adds the fittext script and the hoverintent to create the menu
 *
 */
function fittext_script_with_jquery(){

wp_register_script( 'fittext-script', get_template_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ) );
wp_enqueue_script( 'fittext-script' );
}


/**
 * This adds the jkit
 *
 */
function jkit_script_with_jquery(){
wp_register_script( 'jkit', get_template_directory_uri() . '/js/jquery.jkit.1.1.15.min.js', array( 'jquery' ) );
wp_enqueue_script( 'jkit' );

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
     // if ( is_page('page-carousel') ) {
        // wp_register_style( 'jkit', get_template_directory_uri() . '/css/jkit.css');
     // }
    wp_register_style( 'mediaqueries', get_template_directory_uri() . '/css/mediaqueries.css',array('overwrite','oo-naok-style'));


if( !is_admin() ){
    wp_enqueue_style( 'superfish' );
    wp_enqueue_style( 'superfish-navbar' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'overwrite' );
    wp_enqueue_style( 'oo-naok-style' );
    wp_enqueue_style( 'combobox' );
    wp_enqueue_style( 'mediaqueries' );

     // wp_enqueue_style( 'jkit' );
    }
}

// // custom menu
// add_action('init','register_custom_menu');
// function register_custom_menu(){
// register_nav_menu('primary',__('Custom Menu'));
// }


/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since motrton-two 1.0
 */
function motrton_two_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'motrton_two' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'motrton_two' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'motrton_two' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'motrton_two' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'motrton_two' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'motrton_two' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'motrton_two_widgets_init' );



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

/********************************************
 * the_author_posts_link FILTER / OVERWRITE
 ********************************************/

function override_author_posts_link($deprecated = '') {
        if ( !empty( $deprecated ) )
                _deprecated_argument( __FUNCTION__, '2.1' );
       global $authordata;
        $link = get_author_posts_url( $authordata->ID,$authordata->user_nicename );    
        // $link = sprintf(
        //         '<a href="%1$s" rel="author" title="%2$s"><i class="icon-user"></i> %3$s</a>',
        //         get_author_posts_url( $authordata->ID,$authordata->user_nicename ),
        //             esc_attr( sprintf( __( 'Posts by %s' ),get_the_author() ) ),
        //             get_the_author()
        //             );

        return apply_filters( 'override_author_posts_link', $link );
}
add_filter('the_author_posts_link', 'override_author_posts_link');


/********************************************
 * COMMETNS FILTER
 ********************************************/

/**
 * @param  array $fields
 * @return array
 */

function motrton_two_comment_placeholders( $fields ){
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
        /* Replace 'theme_text_domain' with your theme’s text domain.
         * I use _x() here to make your translators life easier. :)
         * See http://codex.wordpress.org/Function_Reference/_x
         */
            . _x(
                'Vor- und Nachname oder Pseudonym',
                'comment form placeholder',
                'motrton_two'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        /* We use a proper type attribute to make use of the browser’s
         * validation, and to get the matching keyboard on smartphones.
         */
        '<input type="email" placeholder="contact@example.com"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        // Again: a better 'type' attribute value.
        '<input placeholder="http://example.com" id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
}


/********************************************
 * COMMETNS CALLBACK
 ********************************************/
if ( ! function_exists( 'motrton_two_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since motrton-two 1.0
 */
function motrton_two_comment( $comment, $args, $depth ) {
    
    echo "<!-- THIS IS FUNTIONS.PHP COMMNENTS CALLBACK -->";
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>

    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'motrton_two' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Editieren)', 'motrton_two' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-sourround">
                <span class="comment-author vcard">
                    <?php echo get_avatar( $comment, 40 ); ?>
                    <?php printf( __( '%s <span class="says">sagt am</span> ', 'motrton_two' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </span><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Dein Kommentar wartet auf Moderation.', 'motrton_two' ); ?></em>
                    <br />
                <?php endif; ?>

                <span class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s um %2$s', 'motrton_two' ), get_comment_date(), get_comment_time() ); ?>
                    </time></a><span class="olios-extra-special-white-space">&emsp;&emsp;</span>
                    <?php edit_comment_link( '<i class="icon-edit"></i>' .__( '(Editieren)', 'motrton_two' ), ' ' );
                    ?>
                </span><!-- .comment-meta .commentmetadata -->
            </div class="comment-sourround">

            <div class="comment-content"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args,
                array( 'depth' => $depth,
                'max_depth' => $args['max_depth'],
                'reply_text' => '<i class="icon-comment"></i>'. __('antworten','motrton_two')
                // 'before' => ,
                // 'after' => '</i>'
                ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->

    <?php
        echo "<!-- END FUNTIONS.PHP COMMNENTS CALLBACK -->";
        break;
    endswitch;
}
endif; // ends check for motrton_two_comment()

 ?>