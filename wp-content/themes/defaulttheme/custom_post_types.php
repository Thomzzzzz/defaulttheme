<?php
//  register custom post type
function custom_post_type_name() {
    $labels = array(
        'name'               => __( 'Post Type Name' ),
        'singular_name'      => __( 'Post Type Singular Name' ),
        'menu_name'          => __( 'Post Type Menu title' ),
        'parent_item_colon'  => __( 'PostTypeName' ),
        'all_items'          => __( 'Alle items' ),
        'view_item'          => __( 'Bekijk item' ),
        'add_new_item'       => __( 'Voeg een item toe' ),
        'add_new'            => __( 'Voeg Post Type toe' ),
        'edit_item'          => __( 'Bewerk Post Type' ),
        'update_item'        => __( 'Update Post Type' ),
        'search_items'       => __( 'Zoek Post Type' ),
        'not_found'          => __( 'Niet gevonden' ),
        'not_found_in_trash' => __( 'Niet gevonden in de trash' ),
    );
    $rewrite = array(
        'slug'       => 'PostTypeName',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true
    );
    $args = array(
        'label'               => 'Post Type Name',
        'description'         => 'Post Type description',
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
    register_post_type( 'Post Type', $args );
}
add_action( 'init', 'custom_post_type_name' );