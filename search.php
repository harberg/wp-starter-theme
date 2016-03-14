<?php
/**
 * Template for displaying search results
 *
 * @package WordPress
 * @subpackage Starter_Theme
 *
 */
get_header();

if( have_posts() ) :

    while( have_posts() ) : the_post();

        get_template_part( 'templates/content', 'search' );

    endwhile;

else :
        get_template_part( 'templates/content', 'none' );
endif;

get_footer(); ?>