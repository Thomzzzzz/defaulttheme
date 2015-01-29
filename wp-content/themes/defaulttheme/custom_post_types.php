<?php

//  register custom post type
function custom_post_name() {
    $labels = array(
        'name'               => '',
        'singular_name'      => '',
        'menu_name'          => '',
        'parent_item_colon'  => '',
        'all_items'          => 'Alle items',
        'view_item'          => 'Bekijk item',
        'add_new_item'       => 'Voeg een item toe',
        'add_new'            => 'Voeg \'\' toe',
        'edit_item'          => 'Bewerk \'\'item',
        'update_item'        => 'Update \'\'item',
        'search_items'       => 'Zoek \'\'item',
        'not_found'          => 'Niet gevonden',
        'not_found_in_trash' => 'Niet gevonden in de trash',
    );
    $rewrite = array(
        'slug'       => '',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true
    );
    $args = array(
        'label'               => '\'\'',
        'description'         => ' \'\'item',
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'taxonomies'          => array(' '),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-id',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'page'
    );
    register_post_type( ' \'\'  ', $args );
}
add_action( 'init', 'custom_post_name' );