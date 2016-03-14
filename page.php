<?php
/**
 * Template for displaying pages and default content
 *
 * This is a WP default
 *
 * @package WordPress
 * @subpackage Starter_Theme
 *
 */
get_header(); ?>

<?php
    while( have_posts() ) : the_post() ;

        get_template_part( 'templates/content', 'page' );

    endwhile;
?>

<?php get_footer(); ?>