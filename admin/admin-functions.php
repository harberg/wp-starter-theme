<?php

/**
 * Main functions file for wp-admin.
 *
 * - This file is similar to functions.php, but for admin specific files
 *
 * @package Hardcopy_Starter_Theme
 */

/*
 * Do not allow this file to be loaded directly
 */

if( !function_exists( 'add_action' ) ) {
    die( 'Nothing to see here...' );
}

/*
 * Required files
 */

require_once( 'admin-enqueue.php' );





