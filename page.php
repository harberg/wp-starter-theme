<?php
/**
 * Template for displaying pages and default content
 *
 * This is a WP default
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 *
 */
get_header(); ?>
<div class="content-area">
    <main id="main" class="site-main">
        <?php
            while( have_posts() ) : the_post() ;

                get_template_part( 'templates/content', 'page' );

            endwhile;
        ?>
    </main> <!-- end .site-main -->
</div> <!-- end .content-area -->

<?php get_footer(); ?>