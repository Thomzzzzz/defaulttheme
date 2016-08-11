<?php
/*
 * Plugin name: Basisfunctionaliteiten toevoegen
 * Plugin URI:  http://thomastijdink.com
 * Description: Laat functions.php leeg en voegt de benodigde basisfunctionaliteiten toe via deze plugin
 * Version: 0.1
 * Author: Thom
 * Author URI: http://thomastijdink.com
 */

//  Need cookies? Here!
//setcookie('testCookie', 'jawel hoor, ik sta hier', time() + ( 60 * 60 * 24 * 365), '/' );
setlocale(LC_ALL, 'nl_NL');
date_default_timezone_set('Europe/Amsterdam');

/**
 * Execute all filter etc. on WordPress initialize
 */
add_action('init', 'executeOnInit');
function executeOnInit() {
    //  remove admin bar in livesite when logged in
    add_filter('show_admin_bar', '__return_false');
    //  Images are not default links to the fullscreen image
    update_option('image_default_link_type', 'none');
    update_option('image_default_size', 'large');
}

/**
 * Change default admin menu
 */
add_action('admin_menu', 'removeAdminMenuitems');
function removeAdminMenuitems() {
//  To remove menuitems from admin menu
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

/**
 * Change default theme support
 */
add_action('init', 'addThemeSupport');
function addThemeSupport() {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('title-tag');
}

/**
 * Enqueue all scripts and styles needed
 */
add_action('wp_enqueue_scripts', 'addScriptsStyles');
function addScriptsStyles() {
    //  Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . "/js/script.js", array(), '1.0', true);
    //  Styles
    wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), "1.1", "screen");
}

/**
 * Remove hardcoded width and height from post thumbnails
 */
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);
function remove_thumbnail_dimensions($html, $post_id, $post_image_id) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/**
 * Limit upload size via php (not FTP)
 */
add_filter('upload_size_limit', 'limit_upload_size');
function limit_upload_size() {
    //  max file size; 2MB
    return 2000 * 1024;
}


/**
 * Disable paste with markup from pasted text
 */
add_action('init', 'disableMarkupPaste');
function disableMarkupPaste() {
    //  remove formatting from paste
    add_filter('tiny_mce_before_init', 'forcePasteAsPlainText');
    add_filter('teeny_mce_before_init', 'forcePasteAsPlainText');
    function forcePasteAsPlainText($init) {
        global $tinymce_version;
        if ($tinymce_version[0] < 4) {
            $init['paste_text_sticky'] = true;
            $init['paste_text_sticky_default'] = true;
        } else {
            $init['paste_as_text'] = true;
        }
        $init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;';
        return $init;
    }

    //  remove paste as plain text button
    add_filter('mce_buttons_2', 'removePasteAsPlainTextButton');
    function removePasteAsPlainTextButton($buttons) {
        if (($key = array_search('pastetext', $buttons)) !== false) {
            unset($buttons[$key]);
        }
        return $buttons;
    }
}