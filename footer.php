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
</main>
<footer>

</footer>

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