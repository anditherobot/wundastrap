<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper" style="background-color: #f8f9fa; padding: 4rem 0;">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center text-center">

			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header mb-4">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/404-illustration.svg' ); ?>" alt="404 Illustration" style="max-width: 100%; height: auto;">
							<h1 class="page-title mt-4 text-danger"><?php esc_html_e( 'Paj Entwouvab.', 'understrap' ); ?></h1>
						</header>

						<div class="page-content">

							<p class="lead mb-4"><?php esc_html_e( 'Dezole. Sanble ke paj sila pa egziste. Fè yon rechèch', 'understrap' ); ?></p>

							<div class="mb-4">
								<?php get_search_form(); ?>
							</div>

							<div class="row text-start">
								<div class="col-md-6">
									<h2 class="widget-title"><?php esc_html_e( 'Piblikasyon resan', 'understrap' ); ?></h2>
									<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 5 ), array( 'before_widget' => '<div class="widget widget_recent_posts">', 'after_widget' => '</div>' ) ); ?>
								</div>
								<div class="col-md-6">
									<h2 class="widget-title"><?php esc_html_e( 'Kategori Popilè', 'understrap' ); ?></h2>
									<ul class="list-unstyled">
										<?php
										wp_list_categories(
											array(
												'orderby'  => 'count',
												'order'    => 'DESC',
												'show_count' => 1,
												'title_li' => '',
												'number'   => 5,
											)
										);
										?>
									</ul>
								</div>
							</div>

							<div class="mt-4">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary me-2">
									<i class="bi bi-house-door"></i> <?php esc_html_e( 'Retounen lakay', 'understrap' ); ?>
								</a>
							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->


<style>

/* 404 Page Enhancements */
#error-404-wrapper {
    background: #f8f9fa; /* Light background for better readability */
    padding: 4rem 0;
}

#error-404-wrapper .page-title {
    font-size: 2rem;
    color: #dc3545; /* Bootstrap Danger color */
}

#error-404-wrapper .page-content p.lead {
    font-size: 1.2rem;
}

#error-404-wrapper .widget-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

#error-404-wrapper a.btn {
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
}

#error-404-wrapper a.btn i {
    margin-right: 0.5rem;
}

</style>

<?php
get_footer();
?>
