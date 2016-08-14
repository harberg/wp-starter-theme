<?php
/**
 * Template for displaying blog posts
 * This is the homepage when there is no home.php or other designated homepage
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 */
get_header(); ?>
<div class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

            <?php if( is_home() && !is_front_page() ) : ?>
                <header class="page-header">
                    <?php single_post_title( '<h2 class="page-title">', '</h2>' ); ?>
                </header><!-- end .page-header -->
            <?php endif; ?>

            <?php
            // Loop
            while ( have_posts() ) : the_post();

                get_template_part( 'templates/content', 'post-loop' );

            // end the loop
            endwhile;

            // Previous/next page navigation
            the_posts_pagination( array(
                'prev_text' => 'Previous Page',
                'next_text' => 'Next Page',
            ) );

            // If no content found
            else :
                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
    </main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>