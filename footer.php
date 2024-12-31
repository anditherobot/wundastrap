<?php
defined('ABSPATH') || exit;
$container = get_theme_mod('understrap_container_type');
?>
<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>
<div class="wrapper bg-dark mt-auto" id="wrapper-footer">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
            <div class="col-md-12">
                <footer class="site-footer text-center py-4" id="colophon">
                    <div class="site-info">
                        <div class="mb-3">
                            <strong class="text-white">MOKREYòL</strong><br>
                            <span class="text-muted small">Platform nimerik an kreyòl, <?php echo date('Y'); ?></span>
                        </div>
                        <?php get_template_part('template-parts/home/social-bar'); ?>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>