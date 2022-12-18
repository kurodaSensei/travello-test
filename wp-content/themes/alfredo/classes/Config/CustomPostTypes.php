<?php

namespace Alfredo\Config;

class CustomPostTypes
{
    public function __construct()
    {
        add_action('init', array($this, 'hotelCPT'));
    }

    public function hotelCPT()
    {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name' => _x('Hotels', 'Post Type General Name', 'alfredo_base_theme'),
            'singular_name' => _x('Hotel', 'Post Type Singular Name', 'alfredo_base_theme'),
            'menu_name' => __('Hotels', 'alfredo_base_theme'),
            'parent_item_colon' => __('Parent Hotel', 'alfredo_base_theme'),
            'all_items' => __('All Hotels', 'alfredo_base_theme'),
            'view_item' => __('View Hotels', 'alfredo_base_theme'),
            'add_new_item' => __('Add New Hotel', 'alfredo_base_theme'),
            'add_new' => __('Add New', 'alfredo_base_theme'),
            'edit_item' => __('Edit Hotel', 'alfredo_base_theme'),
            'update_item' => __('Update Hotel', 'alfredo_base_theme'),
            'search_items' => __('Search Hotel', 'alfredo_base_theme'),
            'not_found' => __('Not Found', 'alfredo_base_theme'),
            'not_found_in_trash' => __('Not found in Trash', 'alfredo_base_theme'),
        );

        // Set other options for Custom Post Type
        $args = array(
            'label' => __('hotels', 'alfredo_base_theme'),
            'description' => __('Hotels informations', 'alfredo_base_theme'),
            'labels' => $labels,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-building',
        );

// Registering your Custom Post Type
        register_post_type('hotel', $args);

    }
}
