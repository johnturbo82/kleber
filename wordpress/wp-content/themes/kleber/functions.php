<?php

/**
 * Load theme's javascript
 */
function enqueue_scripts() {
    wp_enqueue_script('standard-js', get_template_directory_uri() . '/js/standard.js', array(), '2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

/**
 * Add navigation menus.
 */
register_nav_menus(
    array(
        'main-menu' => __('Hauptmenü'),
        'top-menu' => __('Topmenü')
    )
);

/**
 * Add theme support for jobs in backend.
 */
function register_jobs_post_type() {
    $labels = array(
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'menu_name'          => 'Jobs',
        'name_admin_bar'     => 'Job',
        'add_new'            => 'Neuen Job hinzufügen',
        'add_new_item'       => 'Neuen Job hinzufügen',
        'new_item'           => 'Neuer Job',
        'edit_item'          => 'Job bearbeiten',
        'view_item'          => 'Job ansehen',
        'all_items'          => 'Alle Jobs',
        'search_items'       => 'Jobs durchsuchen',
        'not_found'          => 'Keine Jobs gefunden.',
        'not_found_in_trash' => 'Keine Jobs im Papierkorb gefunden.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'jobs'),
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'          => 'dashicons-businessman', // Icon für das Backend-Menü
    );

    register_post_type('jobs', $args);
}
add_action('init', 'register_jobs_post_type');