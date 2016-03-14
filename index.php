<?php
/**
 * Template for displaying blog posts
 * This is the homepage when there is no home.php or other designated homepage
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starter_Theme
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'templates/content' ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>