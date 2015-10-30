<?php
/**
 * Plugin Name: WP Song Listing
 * Plugin URI: http://hatrackmedia.com
 * Description: This plugin allows you to add a simple song listing section to your WordPress website. Based on the plugin by Bobby Bryant at http://hatrackmedia.com.
 * Author: Bobby Bryant
 * Author URI: http://hatrackmedia.com
 * Version: 0.0.1
 * License: GPLv2
 */

// Exit if accessed directly
if(!defined('ABSPATH')) {
    exit;
}

// Create a custom post type
function song_listing_register_post_type() {
    $singular = 'Song Listing';
    $plural = $singular . 's';

    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New ' . $singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit ' . $singular,
        'new_item'              => 'New ' . $singular,
        'view'                  => 'View ' . $singular,
        'view_item'             => 'View' . $singular,
        'search_term'           => 'Search ' . $plural,
        'parent'                => 'Parent ' . $singular,
        'not_found'             => 'No ' . $plural . ' found',
        'not_found_in_trash'    => 'No ' . $plural . ' in Trash'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-playlist-audio',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => false,
        'has_archive'           => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'rewrite'               => array(
            'slug'                  => 'songs',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true
        ),
        'supports'              => array(
            'title',
            'thumbnail'
        )
    );

    register_post_type('song', $args);
}
add_action('init', 'song_listing_register_post_type');

function song_lists_add_meta_box() {

    add_meta_box(
        // HTML "id" attribute on meta box
        'songs_listings_id',
        // "Song Title" appears as text in meta box
        __('Song Title', 'song_listings_plugin'),
        // Callback function defines content inside meta box
        'song_listings_meta_box_callback',
        // Slug for these custom post types will be similar to:
        // '/song/too-legit-to-quit'
        'song'
    );

}

// Meta box form fields array
// Field Array
$prefix = 'song_listing_';
$song_listings_meta_fields = array(
    array(
        'label'=> 'Name',
        'desc'  => 'Name',
        'id'    => $prefix.'name',
        'type'  => 'text'
    ),
    array(
        'label'=> 'Artist',
        'desc'  => 'Artist',
        'id'    => $prefix.'artist',
        'type'  => 'text'
    )
);

// Callback function where custom meta boxes are build
// and the $custom_meta_fields array and $post parameters are
// passed in
//function song_listings_meta_box_callback($custom_meta_fields, $wppost) {
//
//    echo '<input type="hidden" name="custom_meta_box_nonce" value="'. wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce') . '" />';
//
//    echo '<p>';
//
//        foreach($custom_meta_fields as $field) {
//            $meta = get_post_met($wppost->ID, $field['id'], true);
//
//            echo '<lable for="' . $field['id'] . '">' . $field['label'] . '</lable><br />';
//            switch($field['type']) {
//                case 'text':
//                    echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" style="width: 100%;" />';
//                    break;
//            }
//        }
//    echo '</p>';
//
//}
//
//song_listings_meta_box_callback($song_listings_meta_fields, $post);
//
//add_action('add_meta_boxes', 'song_lists_add_meta_box');

