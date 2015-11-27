<?php
//  Need cookies? Here!
//setcookie('testCookie', 'jawel hoor, ik sta hier', time() + ( 60 * 60 * 24 * 365), '/' );

//  Require files
require_once('custom_post_types.php');

//  remove admin bar in livesite when logged in
add_filter('show_admin_bar', '__return_false');

//  add theme support for extra options
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

//  Add javascripts and stylesheets
function addScripts() {
    //  Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('Modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', '2.8.3', '', true); // Modernizr via CDN

    wp_enqueue_script('cookieConsent', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js', array(), '', true);

    //  add other javascripts here
    if ( file_exists( TEMPLATEPATH.'/js/min/script-min.js' ) ) {
        wp_enqueue_script('script', get_template_directory_uri()."/js/min/script-min.js", array(), '1.0', true);
    } else {
        wp_enqueue_script('script', get_template_directory_uri()."/js/script.js", array(), '1.0', true);
    }
    //  Styles
    wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), "1.0", "screen");
}
add_action( 'wp_enqueue_scripts', 'addScripts' );

//  Images are not default links to the fullscreen image
update_option('image_default_link_type', 'none');
update_option('image_default_size', 'full');

//  no hardcoded width and height to post thumbnails
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

//  Remove menu's from admin - Uncomment pages to remove
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

//  remove version numbers from css + js -  Will only work in development environment
if( strstr($_SERVER['HTTP_HOST'], '.dev.lan') || strstr($_SERVER['HTTP_HOST'], '172.17.') || strstr($_SERVER['HTTP_HOST'], '192.168.') || strstr($_SERVER['HTTP_HOST'], '.tst') ) {
    function remove_cssjs_ver($src) {
        if (strpos($src, '?ver='))
            $src = remove_query_arg('ver', $src);
        return $src;
    }
    add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
    add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);
}

//  function for social media
if( function_exists('acf_add_options_page') && function_exists('acf_add_options_sub_page') ) {

    acf_add_options_page( array(
        'page_title' => 'True - extra',
        'menu_title' => 'True - extra',
        'menu_slug'  => 'true-extra',
        'icon_url'   => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIHRSTlMAAQ8TFjtASEpiY2VsbnOIjo+Rl7a/4eTn7u/3+fv8/j8biWwAAAB4SURBVHgBZc45EsIwEETRMcZmR4BBLGKZ+5+SQqOuH/Cjrhe1qW6aOm3MHcVQ7E8P3kpYkqGYtFleb++P/e4aGuaD2TiaDR5arVirhNYzrz5s/q7H2sXz7Gf9RWdD88JseZNJfbP6YNJnwVAMxVDM0JP7EVMpmfoCzfsUa12FpVYAAAAASUVORK5CYII=',
        'redirect'   => false,
    ) );

    acf_add_options_sub_page( array(
        'title'      => 'Extra instellingen',
        'menu'       => 'Extra instellingen',
        'slug'       => 'extra-instellingen',
        'parent'     => 'true-extra',
    ) );

    acf_add_options_sub_page(array(
        'page_title' => 'Social media',
        'menu_title' => 'Social media',
        'slug'       => 'social-media-settings',
        'parent'     => 'true-extra'
    ));
}

//  add ACF social media to admin
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_554c674391910',
        'title' => 'Social media accounts',
        'fields' => array (
            array (
                'key' => 'field_554c674869720',
                'label' => 'Social media accounts',
                'name' => 'socialLinks',
                'type' => 'repeater',
                'instructions' => 'Voeg de gewenste / beschikbare social media accounts toe',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min' => 1,
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Nieuwe toevoegen',
                'sub_fields' => array (
                    array (
                        'key' => 'field_554c67ccfd0cc',
                        'label' => 'Accountnaam',
                        'name' => 'accountnaam',
                        'type' => 'select',
                        'instructions' => 'Selecteer een social account',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array (
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'linkedin' => 'LinkedIn',
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'instagram' => 'Instagram',
                            'pinterest' => 'Pinterest',
                            'google-plus' => 'Google+',
                            'tumblr' => 'Tumblr',
                        ),
                        'default_value' => array (
                            'Maak je keuze' => 'Maak je keuze',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0,
                    ),
                    array (
                        'key' => 'field_554c67ebfd0cd',
                        'label' => 'Account URL',
                        'name' => 'accounturl',
                        'type' => 'url',
                        'instructions' => 'Voer de volledige URL in van het Social Media account, bijv. https://www.facebook.com/trueapeldoorn of https://www.twitter.com/we_are_true',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'Social Media URL',
                    ),
                    array (
                        'key' => 'field_554c7fea8a4cc',
                        'label' => 'Account actief',
                        'name' => 'actief',
                        'type' => 'checkbox',
                        'instructions' => 'Zet het vinkje uit om dit account niet weer te geven',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array (
                            'ja' => 'Actief',
                        ),
                        'default_value' => array (
                            'ja' => 'ja',
                        ),
                        'layout' => 'vertical',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'social-media-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

endif;

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_557fff689812a',
        'title' => 'Aanvullende instellingen',
        'fields' => array (
            array (
                'key' => 'field_55800b559de9b',
                'label' => 'Uitleg',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Op deze pagina\'s worden extra onderdelen van de website ingevuld.

Hierbij valt te denken aan Google Analytics, Social Media accounts en algemene adresgegevens.',
                'esc_html' => 0,
            ),
            array (
                'key' => 'field_557fffb13fcaa',
                'label' => 'Google Analytics',
                'name' => 'google_analytics',
                'type' => 'text',
                'instructions' => 'Voer de Google Analytics code in. Deze wordt vervolgens automatisch ingeladen op iedere pagina.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'UA-12345678-90',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_55800cec97788',
                'label' => 'Contactgegevens',
                'name' => 'contactgegevens',
                'type' => 'wysiwyg',
                'instructions' => 'Voer hier de algemene contactgegevens in. Denk hierbij aan het post- en/of bezoekafdres, een algemeen telefoonnummer. Deze gegevens worden op iedere pagina in de footer (onderkant van de pagina) weergegeven.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '<strong>Naam Bedrijf
</strong>Voorbeeldadres 123
1234 AB Amsterdam

+31 (0)12 - 345 67 89

<a href="mailto:info@bedrijfsnaam.nl">info@bedrijfsnaam.nl</a>',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'true-extra',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;

//  Full div with all social media links
function socialMediaLinks(){
    $sSocial = "";
    if( function_exists('acf_add_local_field_group') ) {
        if(have_rows('socialLinks', 'option')){
            $sSocial = "<div class=\"socialMediaLinks\">";
            while(have_rows('socialLinks', 'options')){
                the_row();
                $account = get_sub_field('accountnaam');
                $url = get_sub_field('accounturl');
                if(!empty($account) && !empty($url)){
                    //  skip social media als niet actief
                    if( !get_sub_field('actief')) continue;
                    if($account === 'vimeo'){
                        $account = "vimeo-square";
                    }
                    $sSocial .= "<a href=\"".$url."\" rel=\"external\" class=\"icon ".$account."\"><i class=\"fa fa-".$account."\"></i></a>";
                }
            }
            $sSocial .= "</div>";
        }
    }
    return $sSocial;
}

//  Google Analytics from options page
function googleAnalytics(){
    $sAnalytics = "";
    if ( function_exists('get_field') ) {
        $googleAnalytics = get_field('google_analytics', 'option' );
        //  check if the code is formatted correctly
        if( !empty($googleAnalytics) && stristr( $googleAnalytics, 'UA-') ) {
            $sAnalytics = "
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', '".$googleAnalytics."', 'auto');
                ga('set', 'forceSSL', true);
                ga('set', 'anonymizeIp', true);
                ga('send', 'pageview');
            </script>";
        }
    }
    return $sAnalytics;
}

//  remove formatting from paste
function forcePasteAsPlainText( $init ) {
    global $tinymce_version;
    if ( $tinymce_version[0] < 4 ) {
        $init[ 'paste_text_sticky' ] = true;
        $init[ 'paste_text_sticky_default' ] = true;
    } else {
        $init[ 'paste_as_text' ] = true;
    }
    $init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;';
    return $init;
}
add_filter( 'tiny_mce_before_init', 'forcePasteAsPlainText' );
add_filter( 'teeny_mce_before_init', 'forcePasteAsPlainText' );

//  remove paste as plain text button
function removePasteAsPlainTextButton( $buttons ) {
    if( ( $key = array_search( 'pastetext', $buttons ) ) !== false ) {
        unset( $buttons[ $key ] );
    }
    return $buttons;
}
add_filter( 'mce_buttons_2', 'removePasteAsPlainTextButton' );