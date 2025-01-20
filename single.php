<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<style>
    /* styles.css - Embedded for single.php */

    .entry-header {
        margin-bottom: 20px;
        text-align: center; /* Adjust if needed */
    }

    .entry-sub-navigation {
        margin-bottom: 10px;
        text-align: center; /* Adjust alignment as needed */
    }

    .category-pill {
        display: inline-block;
        background-color: #f0f0f0; /* Adjust background color */
        color: #333; /* Adjust text color */
        padding: 5px 10px;
        margin: 0 5px 5px 0;
        border-radius: 5px;
        font-size: 0.9em; /* Adjust font size */
        text-decoration: none;
    }

    .category-pill:hover {
        background-color: #e0e0e0; /* Adjust hover color */
    }

    .entry-title {
        font-size: 2.5rem;
        line-height: 1.2;
        margin-bottom: 0.5em;
        color: #333;
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .related-post-card {
        background-color: #f9f9f9;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .related-post-card img {
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    .related-post-card h3 {
        font-size: 1.2rem;
        margin: 10px;
    }

    .related-post-card h3 a {
        text-decoration: none;
        color: #333;
    }
</style>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main col-md-12" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					?>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
                            <div class="entry-sub-navigation">
                                <?php
                                $categories = get_the_category();
                                if ( $categories ) {
                                    foreach ( $categories as $category ) {
                                        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="category-pill">' . esc_html( $category->name ) . '</a>';
                                    }
                                }
                                ?>
                            </div>
							<?php
							the_title( '<h1 class="entry-title">', '</h1>' );
							?>
						</header><!-- .entry-header -->

						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

						<div class="entry-content">
							<?php
							the_content();
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php // understrap_entry_footer(); ?>
						</footer><!-- .entry-footer -->

					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
					understrap_post_nav();
                    ?>
					<section class="more-from-category">
						<?php
						$categories = get_the_category();
						if ( $categories ) {
							$first_category = $categories[0];
							$related_posts_args = array(
								'posts_per_page' => 3, // You can adjust the number of related posts
								'category__in'   => array( $first_category->term_id ),
								'post__not_in'   => array( get_the_ID() ),
								'orderby'          => 'rand',
							);
							$related_posts_query = new WP_Query( $related_posts_args );

							if ( $related_posts_query->have_posts() ) {
								echo '<h2>Piblikasyon ki fè pati de menm kategory a: <strong>' . esc_html( $first_category->name )  . '</strong> </h2>';
								echo '<div class="related-posts-grid">';
								while ( $related_posts_query->have_posts() ) {
									$related_posts_query->the_post();
									?>
									<div class="related-post-card">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail( 'medium' ); ?>
											</a>
										<?php endif; ?>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									</div>
									<?php
								}
								echo '</div>';
								wp_reset_postdata();
							}
						}
						?>
					</section>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
					<?php
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();