<?php
/*
 *functions go here
 */

/*
 *  remove admin bar in livesite when logged in
 */
add_filter('show_admin_bar', '__return_false');


/*
 *  add theme support for extra options
 */
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


/*
 *  Add javascripts and stylesheets
 */
function addScripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('Modernizr', 'http://modernizr.com/downloads/modernizr-latest.js', '', '', true); // Modernizr via CDN

    //  add other javascripts here

    if ( file_exists( TEMPLATEPATH.'/js/script.min.js' ) ) {
        wp_enqueue_script('script', get_template_directory_uri()."/js/script.min.js", array(), '1.0', true);
    } else {
        wp_enqueue_script('script', get_template_directory_uri()."/js/script.js", array(), '1.0', true);
    }
    wp_enqueue_style('stylesheet', get_stylesheet_uri(), "", "1.0", "screen");
}
add_action( 'wp_enqueue_scripts', 'addScripts' );

