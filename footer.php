<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing tags for Slidebars, #main, and #wrapper
 *
 * @package WordPress
 * @subpackage Starter_Theme
 *
 */
?>
        <footer>

        </footer>
    </div> <!-- end #wrapper -->
</div> <!-- end #sb-site -->
<nav id="mobile-mainNav" class="sb-slidebar sb-right sb-style-overlay">
    <?php wp_nav_menu( array(
        'menu'      => 'Main Nav',
        'container' => false,
    )); ?>
</nav>
<?php wp_footer(); ?>
<!-- comment out when not using Grunt Watch -->
        <script>
            if (document.location.hostname == "localhost") {
                js_script = document.createElement('script');
                js_script.type = "text/javascript";
                js_script.src = "//localhost:35729/livereload.js";
                document.getElementsByTagName('footer')[0].appendChild(js_script);
            }
        </script>
        <!-- <script src="//localhost:35729/livereload.js"></script> -->
    </body>
</html>