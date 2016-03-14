<?php
/**
 * Template for displaying all the single posts and attachments
 *
 * @package WordPress
 * @subpackage Starter_Theme
 *
 */
get_header(); ?>

<?php
    // start the loop
    while( have_posts() ) : the_post();

        get_template_part( 'templates/content', 'single' );

    //  end the loop
    endwhile;
?>

<?php get_footer(); ?>
