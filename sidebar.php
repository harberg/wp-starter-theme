<?php
/**
 * Template for the sidebar container the main widget area
 *
 * @package WordPress
 * @subpackage Starter_Theme
 *
 */
?>

<?php if ( is_active_sidebar( 'widget_sidebar' )  ) : ?>
    <aside id="secondary" class="sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'widget_sidebar' ); ?>
    </aside><!-- .sidebar .widget-area -->
<?php endif; ?>