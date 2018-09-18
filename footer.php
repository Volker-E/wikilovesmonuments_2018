<?php
/**
 * The template for displaying the footer including footer widgets and footer hook
 *
 * @package Wiki_Loves_Monuments_2018
 * @since 0.7.0
 * @link https://www.wikilovesmonuments.org/
 * @version 0.7.0
 */
?>
        </div>
    </main>
    <footer id="footer" class="footer" role="contentinfo">
        <div class="content-box">
            <?php dynamic_sidebar( 'footer-one' ); ?>
            <?php dynamic_sidebar( 'footer-two' ); ?>
        </div>
    </footer>
<?php wp_footer(); ?>
<?php //<script src="< ?php bloginfo( 'template_directory' ); ? >/js/functions.min.js"></script> TODO ?>
</body>
</html>