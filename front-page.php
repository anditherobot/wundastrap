<?php
/**
 * Front Page Template
 *
 * @package your-theme-name
 */

get_header();
?>

<div class="wrapper" id="page-wrapper">

    <div class="container" id="content">

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">
                <?php get_template_part( 'template-parts/home/social-bar' ); ?>
                    <?php get_template_part( 'template-parts/home/hero' ); ?>
                    <?php get_template_part( 'template-parts/home/latest-articles' ); ?>
                    <?php get_template_part( 'template-parts/home/categories-navigation' ); ?>
                    <?php get_template_part( 'template-parts/home/trending-articles' ); ?>
                    <?php get_template_part( 'template-parts/home/search-bar' ); ?>
                    <?php get_template_part( 'template-parts/home/featured-categories' ); ?>
                    <?php get_template_part( 'template-parts/home/newsletter-signup' ); ?>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php
get_footer();