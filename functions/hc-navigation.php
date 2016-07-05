<?php
/**
 * Theme Navigation options and settings
 *
 * @package    WordPress
 * @subpackage Hardcopy_Starter_Theme
 */

function hc_nav_menus() {
    $locations = array(
        'primary' => 'Primary Navigation',
        'footer' => 'Footer Navigation',
        'sidebar' => 'Sidebar Navigation',
    );

    register_nav_menus( $locations );
}

add_action( 'init', 'hc_nav_menus' );