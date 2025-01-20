<?php
/**
 * The template for displaying the footer with a simple layout and sticky behavior
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Understrap
 */

defined('ABSPATH') || exit;
?>

<div class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr(get_theme_mod('understrap_container_type')); ?>" id="content-footer">

        <div class="row">

            <div class="col-md-12">

                <footer class="site-footer" id="colophon">

                    <div class="site-info">
                        <div class="mb-3 text-center">
                            <strong class="text-white">MOKREYòL</strong><br>
                            <span class="text-muted small">Platform nimerik an kreyòl, <?php echo date('Y'); ?></span>
                        </div>
                        <?php get_template_part('template-parts/home/social-bar'); ?>
                    </div>

                </footer><!-- #colophon -->

            </div><!-- .col-md-12 -->

        </div><!-- .row -->

    </div><!-- #content-footer -->

</div><!-- #wrapper-footer -->

<style>
/* Styling for the simple footer with sticky behavior */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensure the body takes up at least the full viewport height */
}

.wrapper {
    flex: 1; /* Allow the content wrapper to grow and push the footer down */
}

#wrapper-footer {
    background-color: #343a40; /* Match the bg-dark class */
    color: white; /* Adjust text color as needed */
    
    margin-top: auto; /* Push the footer to the bottom */
}

.site-footer .site-info {

    text-align: center; /* Center the content */
}

.site-footer .site-info strong,
.site-footer .site-info span {
    color: white; /* Ensure text color is correct */
}
</style>

<?php wp_footer(); ?>

</body>

</html>