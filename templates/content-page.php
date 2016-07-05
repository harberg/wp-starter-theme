<?php
/**
 * The template used for generic or default page content
 *
 * @package WordPress
 * @subpackage Hardcopy_Starter_Theme
 *
 */
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('inner-page'); ?>>

    <header class="page-header">
        <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
    </header> <!-- end .page-header -->

    <div class="page-content">
        <?php the_content(); ?>
    </div> <!-- end .page-content -->

</article>