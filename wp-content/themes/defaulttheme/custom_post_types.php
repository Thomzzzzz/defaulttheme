<?php
//  register custom post type
function custom_post_type_name() {
    $labels = array(
        'name'               => __('Items Plural Name'),
        'singular_name'      => __('Item Singular Name'),
        'menu_name'          => __('Item Menu title'),
        'parent_item_colon'  => __('Item'),
        'all_items'          => __('Alle items'),
        'view_item'          => __('Bekijk item'),
        'add_new_item'       => __('Voeg een item toe'),
        'add_new'            => __('Voeg items toe'),
        'edit_item'          => __('Bewerk item'),
        'update_item'        => __('Update item'),
        'search_items'       => __('Zoek items'),
        'not_found'          => __('Niet gevonden'),
        'not_found_in_trash' => __('Niet gevonden in de trash'),
    );
    $rewrite = array(
        'slug'       => 'PostTypeName',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true
    );
    $args = array(
        'label'               => 'Items',
        'description'         => 'Items',
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
    register_post_type('Post Type', $args);
}

add_action('init', 'custom_post_type_name');