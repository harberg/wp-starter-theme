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