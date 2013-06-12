<?php
/*
Plugin Name: Es custom post
Plugin URI: http://sven-steinker.de/
Description: this is a simple plugin wich allows you to create an use some custom posts
Author: Sven Steinker
Author URI: http://sven-steinker.de/
License: GPLv2

right here is the dev center. cats = 43

*/

add_action( 'init', 'create_pluginname' );

function create_pluginname() {
    register_post_type( 'pluginname',
        array(
            'labels' => array(
                'name' => 'pluginname',
                'singular_name' => 'pluginname',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New pluginname',
                'edit' => 'Edit',
                'edit_item' => 'Edit pluginname',
                'new_item' => 'New pluginname',
                'view' => 'View',
                'view_item' => 'View pluginname',
                'search_items' => 'Search pluginname',
                'not_found' => 'No pluginname found',
                'not_found_in_trash' => 'No pluginname found in Trash',
                'parent' => 'Parent pluginname'
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
    if ( get_post_type() == 'pluginname' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-pluginname.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-pluginname.php';
            }
        }
    }
    return $template_path;
}


?>