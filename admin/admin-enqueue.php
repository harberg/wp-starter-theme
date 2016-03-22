<?php

/**
 * All admin scripts and style enqueing
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 */

/**
 * Queuing JS and CSS for wp-admin
 *
 * - Use get_template_directory_uri() for parent themes
 * - Use get_stylesheet_directory_uri() for child themes
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 */

function hc_admin_enqueue_scripts() {
    wp_enqueue_style(
        'hc-admin',
        get_template_directory_uri() . '/css/admin.css',
        FALSE,
        HARDCOPY_STARTER_THEME_VERSION
    );
}

add_action( 'admin_enqueue_scripts', 'hc_admin_enqueue_scripts' );

