<?php
/**
 * Template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-page'); ?>>
    <header class="post-header">
        <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
    </header><!-- .post-header -->

    <div class="post-content entry">
        <?php the_content(); ?>
    </div> <!-- end .post-content -->
</article>