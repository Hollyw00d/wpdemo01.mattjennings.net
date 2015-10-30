<?php
/**
 * Plugin Name: WP Job Listing
 * Plugin URI: http://hatrackmedia.com
 * Description: This plugin allows you to add a simple job listing section to your WordPress website.
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
function dwwp_register_post_type() {
    $singular = 'Job Listing';
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
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessman',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => false,
        'has_archive'           => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'                  => 'jobs',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true
        ),
        'supports'              => array(
            'title',
            'thumbnail'
        )
    );

    register_post_type('job', $args);
}
add_action('init', 'dwwp_register_post_type');


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function job_listings_add_meta_box() {

        add_meta_box(
            'jobs_listings_id',
            __( 'Job', 'job_listings_plugin' ),
            'jobs_listings_meta_box_callback',
            // Slug that matches the custom post type above
            'jobs'
        );

}

function jobs_listings_meta_box_callback($post) {


    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'myplugin_save_meta_box_data', 'myplugin_meta_box_nonce' );

    $job_title_value = get_post_meta($post->ID, '_job_title', true);
    $job_salary_value = get_post_meta($post->ID, '_job_salary', true);


    echo '<p><lable for="job_title">Title</lable>
        <input type="text" name="job_title" id="' . $post->ID . '" value="' . $job_title_value . '" style="width: 100%;" /></p>';

    echo '<p><lable for="job_salary">Salary</lable>
        <input type="text" name="job_salary" id="' . $post->ID . '" value="' . $job_salary_value . '" style="width: 100%;" /></p>';


}

add_action( 'add_meta_boxes', 'job_listings_add_meta_box' );

function jobs_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_save_meta_box_data' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }


    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( !isset( $_POST['job_title']) || !isset( $_POST['job_salary'])) {
        return;
    }

    // Sanitize user input.
    $my_data_job_title = sanitize_text_field( $_POST['job_title'] );
    $my_data_job_salary = sanitize_text_field( $_POST['job_salary'] );


    // Update the meta field in the database.
    update_post_meta( $post_id, '_job_title', $my_data_job_title );
    update_post_meta( $post_id, '_job_salary', $my_data_job_salary );

}
add_action( 'save_post', 'jobs_save_meta_box_data' );



