<?php
/**
 * Template for displaying all the single posts and attachments
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 *
 */
get_header(); ?>
<div class="content-area">
    <main class="site-main">

        <?php
            // start the loop
            while( have_posts() ) : the_post();

                get_template_part( 'templates/content', 'single' );

                // If comments are open load the comments template
                if( comments_open() || get_comments_number() ) {
                    comments_template();
                }

                the_post_navigation( array(
                    'next_text' => 'Next Post',
                    'prev_text' => 'Previous Post',
                ) );
            //  end the loop
            endwhile;
        ?>

    </main> <!-- end main -->
</div> <!-- end .content-area -->

<?php get_footer(); ?>
