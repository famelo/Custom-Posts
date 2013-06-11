<?php
/*
Plugin Name: Es custom posts
Plugin URI: http://sven-steinker.de/
Description: this is a simple plugin wich allows you to create an use some custom posts
Author: Sven Steinker
Author URI: http://sven-steinker.de/
License: GPLv2
*/

add_action( 'init', 'create_custom_posts' );

function create_custom_posts() {
    register_post_type( 'custom_posts',
        array(
            'labels' => array(
                'name' => 'Custom Posts',
                'singular_name' => 'Custom Posts',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Custom Posts',
                'edit' => 'Edit',
                'edit_item' => 'Edit Custom Posts',
                'new_item' => 'New Custom Posts',
                'view' => 'View',
                'view_item' => 'View Custom Posts',
                'search_items' => 'Search Custom Posts',
                'not_found' => 'No Custom Posts found',
                'not_found_in_trash' => 'No Custom Posts found in Trash',
                'parent' => 'Parent Custom Posts'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
    if ( get_post_type() == 'custom-posts' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-custom-posts.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-custom-posts.php';
            }
        }
    }
    return $template_path;
}


?>