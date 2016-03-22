<?php
/**
 * All non-admin style and script enqueing
 *
 * @package    WordPress
 * @subpackage Hardcopy_Starter_Theme
 */

/**
 * Queuing up JS for the front-end. Notes:
 *
 * - Use get_template_directory_uri() to pull from the parent theme, child themes use get_stylesheet_directory_uri()
 * - Use conditionals to restrict extra JS and CSS to specific templates and pages
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 */

function hc_scripts_wp_enqueue_scripts() {
    global $wp_scripts;

    /*
     * Conditionally load HTML5 shim for browsers less than or equal to IE 8
     * Same $wp_scripts->add_data() technique can be used for conditional IE stylesheets
     */

    wp_enqueue_script(
        'hc-lte-ie8',
        get_template_directory_uri() . '/js/libraries/html5shiv.min.js',
        array(),
        '3.7.3',
        FALSE
    );

    $wp_scripts->add_data(
        'hc-lte-ie8',
        'conditional',
        'lte IE 8'
    );

    /*
     * Bower compiled JavaScript file
     * Should be the final compiled file
     */

    wp_enqueue_script(
        'hc-bower-script',
        get_template_directory_uri() . '/js/bower.js',
        array(),
        HARDCOPY_STARTER_THEME_VERSION,
        TRUE
    );

    /*
     * Main script JavaScript file
     * Custom scripts for the theme are writen here.
     * Load after bower.js, since bower.js has jQuery in it.
     */

    wp_enqueue_script(
        'hc-main-script',
        get_template_directory_uri() . '/js/script.js',
        array( 'bower.js' ),
        HARDCOPY_STARTER_THEME_VERSION,
        TRUE
    );

    /**
     * Localize JS file
     * Creates a global variable that can be used in the hc-main-script JS file
     *
     * Used for :
     * - Variables only provided in PHP
     * - Settings from the Customizer
     *
     * @see https://codex.wordpress.org/Function_Reference/wp_localize_script
     */

    wp_localize_script(
        'hc-main-script',
        'hcMainLocalVars',
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'home_url' => home_url(),
            'wpDebug' => defined( 'WP_DEBUG' ) ? WP_DEBUG : FALSE,
                'i18n' => array(
                    'unknownError' => __( 'Something went wrong. Try refreshing the page.', 'hardcopy_starter_theme' )
                )
        )
    );

}

add_action( 'wp_enqueue_scripts', 'hc_scripts_wp_enqueue_scripts' );

/**
 * Enqueue controller script for Theme Customizer mods
 */

function hc_hook_custom_css_preview() {

    wp_enqueue_script(
        'hc-theme-mods',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'customize-preview', 'jquery' )
    );
}

add_action( 'customize_preview_init', 'hc_hook_custom_css_preview' );






















