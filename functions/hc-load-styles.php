<?php
/**
 * All non-admin style and script enqueing
 *
 * @package    WordPress
 * @subpackage Hardcopy_Starter_Theme
 */

/**
 * Queuing up CSS for the front-end. Notes:
 *
 * - Use get_template_directory_uri() to pull from the parent theme, child themes use get_stylesheet_directory_uri()
 * - Use conditionals to restrict extra JS and CSS to specific templates and pages
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 *
 */

function hc_styles_wp_enqueue_scripts() {
    global $wp_scripts;

    /*
     * Main stylesheet file for all pages.
     */

    wp_enqueue_style(
        'hc-main-style',
        get_template_directory_uri() . '/style.css',
        FALSE,
        HARDCOPY_STARTER_THEME_VERSION
    );

    wp_enqueue_style(
        'hc-bower-style',
        get_template_directory_uri() . '/css/bower.css',
        FALSE,
        HARDCOPY_STARTER_THEME_VERSION
    );

    $theme_mods = get_option( 'theme_mods_hardcopy-starter-theme', array() );

    if( !empty( $theme_mods['user_styles'] ) ) {
        wp_enqueue_style(
            'hc-main-style',
            get_template_directory_uri() . '/user-styles-' . $theme_mods['user_styles'] . '.css',
            FALSE,
            HARDCOPY_STARTER_THEME_VERSION
        );
    }
}

add_action( 'wp_enqueue_scripts', 'hc_styles_wp_enqueue_scripts' );



