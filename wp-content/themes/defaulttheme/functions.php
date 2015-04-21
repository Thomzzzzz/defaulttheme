<?php


/**
 *  Require files
 */
require_once('custom_post_types.php');


/**
 *  remove admin bar in livesite when logged in
 */
add_filter('show_admin_bar', '__return_false');


/**
 *  add theme support for extra options
 */
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


/**
 *  Add javascripts and stylesheets
 */
function addScripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('Modernizr', 'http://modernizr.com/downloads/modernizr-latest.js', '', '', true); // Modernizr via CDN
    //  add other javascripts here

    if ( file_exists( TEMPLATEPATH.'/js/min/script-min.js' ) ) {
        wp_enqueue_script('script', get_template_directory_uri()."/js/min/script-min.js", array(), '1.0', true);
    } else {
        wp_enqueue_script('script', get_template_directory_uri()."/js/script.js", array(), '1.0', true);
    }
    wp_enqueue_style('stylesheet', get_stylesheet_uri(), "", "1.0", "screen");
}
add_action( 'wp_enqueue_scripts', 'addScripts' );





/**
 *  Remove menu's from admin - Uncomment pages to remove
 */
function remove_menus(){
//    remove_menu_page( 'index.php' );                  //Dashboard
//    remove_menu_page( 'edit.php' );                   //Posts
//    remove_menu_page( 'upload.php' );                 //Media
//    remove_menu_page( 'edit.php?post_type=page' );    //Pages
//    remove_menu_page( 'edit-comments.php' );          //Comments
//    remove_menu_page( 'themes.php' );                 //Appearance
//    remove_menu_page( 'plugins.php' );                //Plugins
//    remove_menu_page( 'users.php' );                  //Users
//    remove_menu_page( 'tools.php' );                  //Tools
//    remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'remove_menus' );


/**
 * @param $src - Original script + stylesheet source path
 * @return string - New source path without version number
 * Will only work in development environment
 */
if( strstr($_SERVER['HTTP_HOST'], '.dev.lan') || strstr($_SERVER['HTTP_HOST'], '172.17.') || strstr($_SERVER['HTTP_HOST'], '192.168.') || strstr($_SERVER['HTTP_HOST'], '.tst') ) {
    function remove_cssjs_ver($src) {
        if (strpos($src, '?ver='))
            $src = remove_query_arg('ver', $src);
        return $src;
    }
    add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
    add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);
}
