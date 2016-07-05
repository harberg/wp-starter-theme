<?php
/**
 * Template part for displaying content on the index loop
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-page'); ?>>
    <header class="post-header">
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </header><!-- .post-header -->

    <div class="post-content entry">
        <?php the_excerpt(); ?>
    </div> <!-- end .post-content -->
</article>