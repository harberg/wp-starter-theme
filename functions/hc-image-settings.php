<?php
/**
 * Theme Image options and settings
 *
 * @package    WordPress
 * @subpackage Hardcopy_Starter_Theme
 */


/**
 * Turn on Featured Image for specific post types
 *
 * @see https://codex.wordpress.org/Post_Thumbnails
 */

add_theme_support( 'post-thumbnails' );

/**
 * Add new image sizes here
 *
 * @see https://developer.wordpress.org/reference/functions/add_image_size/
 */

add_image_size( 'hc_square', 750, 750, true );

/**
 * Creates a 'size' attribute for images.
 *
 * - Allows for correct image crop to be selected based on max-width and vw
 * - Helpful for loading smaller images for smaller screens
 *
 * @see https://developer.wordpress.org/reference/functions/wp_calculate_image_sizes/
 */

function hc_adjust_image_sizes_attr( $sizes, $size ) {
    $sizes = '(max-width: 700px) 85vw, (max-width: 900px) 65vw, (max-width: 1350px) 60vw, 1920px';
    return $sizes;
}

add_filter( 'wp_calculate_image_sizes', 'hc_adjust_image_sizes_attr', 10, 2 );

/**
 * Add SVG to the media library
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */

function hc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter( 'upload_mimes', 'hc_mime_types' );

/*
 * Remove Defualt Gallery Styles
 */

add_filter( 'use_default_gallery_style', '__return_false' );






