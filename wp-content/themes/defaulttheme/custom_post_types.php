<?php

//  register custom post type
function custom_post_type_name() {
    $labels = array(
        'name'               => 'PostTypeName',
        'singular_name'      => 'PostTypSingulareName',
        'menu_name'          => 'PostTypeName',
        'parent_item_colon'  => 'PostTypeName',
        'all_items'          => 'Alle items',
        'view_item'          => 'Bekijk item',
        'add_new_item'       => 'Voeg een item toe',
        'add_new'            => 'Voeg PostTypeName toe',
        'edit_item'          => 'Bewerk PostTypeName item',
        'update_item'        => 'Update PostTypeName item',
        'search_items'       => 'Zoek PostTypeName item',
        'not_found'          => 'Niet gevonden',
        'not_found_in_trash' => 'Niet gevonden in de trash',
    );
    $rewrite = array(
        'slug'       => 'PostTypeName',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true
    );
    $args = array(
        'label'               => 'PostTypeName',
        'description'         => 'PostTypeName item',
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
    register_post_type( 'PostTypeName', $args );
}
add_action( 'init', 'custom_post_type_name' );