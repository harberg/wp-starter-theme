<?php
/**
 * Starter Theme function calls
 *
 * Specific functions and definitions are found in /function/**.php
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 *
 */

/*
 * Don't allow this file
 */

/*
 * Define contants here
 */

/*
 * Theme version
 * - changed, make sure to also change
 * - _meta.scss
 * - package.json
 * - bower.json
 */
define( 'HARDCOPY_STARTER_THEME_VERSION', '0.0.1' );
define( 'HARDCOPY_STARTER_THEME_VERSION_OPT_NAME', 'hardcopy_starter_theme_version' );

/*
 * Domain Check - used for
 * - different favicons
 * - conditional scripts (grunt-watch)
 * - analytics
 */

define( 'HARDCOPY_STARTER_THEME_DOMAIN', !empty( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : '' );

/*
 * Required Files
 */

require_once( 'admin/admin-functions.php' );

require_once( 'functions/hc-load-scripts.php' );
require_once( 'functions/hc-load-styles.php' );
require_once( 'functions/hc-image-settings.php');
require_once( 'functions/hc-navigation.php');

/**
 * Activation Process
 *
 * @see: https://developer.wordpress.org/reference/functions/register_activation_hook/
 */

function hc_plugin_activation() {
    add_option( 'hc_plugin_activated', 1, '', 'no' );
}

register_activation_hook( __FILE__, 'hc_plugin_activation' );

/**
 * Theme specific functionality
 *
 * "This is the first action hook available to themes, triggered immediately after the active theme's
 * functions.php file is loaded."
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference
 *
 * "This hook is called during each page load, after the theme is initialized.
 * It is generally used to perform basic setup and registration actions for a theme."
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 *
 * @see https://codex.wordpress.org/Function_Reference/add_theme_support#Addable_Features
 */

function hc_hook_after_setup() {
    /**
     * All WordPress to manage the <title> tag output.
     * Leave out the <title> tag in header.php and double check that wp_head() is called
     *
     * @see : https://codex.wordpress.org/Title_Tag
     */

    add_theme_support( 'title-tag' );

    /**
     * Enable support for the logo/header upload in the Theme Customizer
     *
     * @see : https://codex.wordpress.org/Custom_Headers
     */

    add_theme_support(
        'custom-header',
        array(
            'header-text' => FALSE,
            'default-image' => FALSE, //get_stylesheet_directory_uri() . 'images/placeholders/default-img-logo.png'
        )
    );

    /**
     * Enable support for background color and background image upload in the Theme Customizer
     *
     * -outputs color and/or background image on the <body> tag automatically.
     *
     * @see : https://codex.wordpress.org/Custom_Backgrounds
     */

    add_theme_support(
        'custom-background',
        array(
            'default-color' => 'ffffff',
            'default-image' => FALSE,
        )
    );

    /**
     * Enable specific post formats
     *
     * @see : https://codex.wordpress.org/Post_Formats
     */

    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
        )
    );

    /**
     * Output RSS feed links in the header for posts and comments
     *
     * @since 3.0
     */

    add_theme_support( 'automatic-feed-links' );

    /**
     * HTML5 output in specific generated HTML.
     *
     * @since 3.6
     */

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    /**
     * Enable custom menus
     */

    add_theme_support( 'menus' );


    /**
     * Remove the meta tag indication the generator of the page.
     * Done for security in case WordPress site is behind in updates
     */

    remove_action( 'wp_head', 'wp_generator' );

    /**
     * Determine if a repair is needed.
     * Checks theme version vs structures in the database
     */

    $version = floatval( get_option( HARDCOPY_STARTER_THEME_VERSION_OPT_NAME, '') );

    /**
     * If stored version is less than the version of the current theme, continue
     *
     * @see : http://php.net/manual/en/function.version-compare.php
     */

    if( empty( $version ) || version_compare( $version, HARDCOPY_STARTER_THEME_VERSION ) < 0 ) {
        /*
         * Include a repair file ex. (/admin/upgrade-repairs.php) that checks for problems and makes changes
         */
    }

    /**
     * Add translation capability for theme
     * Translations should be put into /languages/ directory.
     *
     * @see https://codex.wordpress.org/Function_Reference/load_theme_textdomain
     */

    load_theme_textdomain( 'hardcopy_starter_theme', get_template_directory() . '/languages' );

    /*
     * Update the stroed version if different from the current one
     */

    if( $version != HARDCOPY_STARTER_THEME_VERSION ) {
        update_option( HARDCOPY_STARTER_THEME_VERSION_OPT_NAME, HARDCOPY_STARTER_THEME_VERSION );
    }

}// end hc_hook_after_setup()

add_action( 'after_setup_theme', 'hc_hook_after_setup' );

/**
 * Init hook actions for the theme
 *
 * - Actions/filters that override plugins
 * - Actions/filters that need to run after plugin init actions
 */

function hc_hook_init() {
    /**
     * Adds the excerpt field UI to pages
     * Good for parent pages that need a description
     *
     * @see : https://codex.wordpress.org/Function_Reference/add_post_type_support
     *
     * @since 3.0
     */

    add_post_type_support( 'page', array( 'excerpt', 'thumbnail' ) );

    /**
     * Remove custom field UI on pages and posts
     *
     * @see https://codex.wordpress.org/Function_Reference/remove_post_type_support
     *
     * @since 3.0
     */

    remove_post_type_support( 'post', 'custom-fields' );
    remove_post_type_support( 'page', 'custom-fields' );
}// end hc_hook_init()

add_action( 'init', 'hc_hook_init', 100 );

/**
 * Register sidebars and widgetized areas
 *
 */

function hc_widget_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'Widget Sidebar' ),
        'id' => 'widget_sidebar',
        'description' => __( 'Add widgets to appear in your main sidebar' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'widgets_init', 'hc_widget_sidebar_init' );

/*-----------------------------------------------------------------------------------*/
/*  HC Load Scripts
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-load-scripts.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Load Styles
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-load-styles.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Post Type
/*-----------------------------------------------------------------------------------*/
// include("functions/hc-post-type.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Taxonomy
/*-----------------------------------------------------------------------------------*/
// include("functions/hc-taxonomy.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Excerpts
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-excerpts.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Columns
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-columns.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Pagination
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-pagination.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Navigation
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-navigation.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Sidebars
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-sidebars.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Admin
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-admin.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Breadcrumbs
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-breadcrumbs.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Visual Editor
/*-----------------------------------------------------------------------------------*/
//include("functions/hc-visual-editor.php");

/*-----------------------------------------------------------------------------------*/
/*  HC Unique
/*-----------------------------------------------------------------------------------*/

// Popular Posts

function hc_set_post_views($postID) {
    $count_key = 'hc_post_view_count';
    $count = get_post_meta( $postID, $count_key, true);
    if( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}
// To keep the count accurate, get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function hc_track_post_views($post_id) {
    if( !is_single() ) return;
    if( empty ( $post_id ) ) {
        global $post;
        $post_id = $post->ID;
    }
    hc_set_post_views( $post_id );
}
add_action( 'wp_head', 'hc_track_post_views');






















?>