<?php
/**
 * Template Name: Front Page with Category List and Paginated Grid
 *
 * This is a custom front page template that displays a list of categories
 * and a paginated grid of recent posts.
 *
 * @package your-theme
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="front-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main" id="main">

                <section class="category-list">
                    <h2>Explore Categories</h2>
                    <?php get_template_part( 'template-parts/category-list' ); ?>
                </section>

                <section class="posts-grid">
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 9,
                        'paged' => $paged,
                    );
                    $wp_query = new WP_Query( $args );

                    if ( $wp_query->have_posts() ) :
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                            $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                            ?>
                            <div class="grid-item post-card">
                                <?php if ( $featured_image_url ) : ?>
                                    <img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-content">
                                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </section>

               

                    <?php else : ?>
                        <p><?php esc_html_e( 'No posts found.', 'your-theme' ); ?></p>
                    <?php endif; ?>

            </main><!-- #main -->

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #front-page-wrapper -->

<style>
/* Basic styling for the category list */
.category-list {
    margin-bottom: 30px;
    text-align: center;
}

.category-list h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.category-list ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}

.category-list li a {
    display: block;
    background-color: #f0f0f0; /* Example background color */
    color: #333;
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
}

.category-list li a:hover {
    background-color: #e0e0e0;
}

/* Basic grid and card styling */
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Creates a responsive 3-column grid */
    gap: 20px;
    margin-top: 20px;
}

.post-card {
    background-color: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
}

.post-card img {
    width: 100%;
    height: auto;
    aspect-ratio: 16 / 9;
    object-fit: cover;
}

.post-card .card-content {
    padding: 15px;
}

.post-card .card-title {
    font-size: 16px;
    margin: 0;
    line-height: 1.3;
}

.post-card .card-title a {
    color: inherit;
    text-decoration: none;
}
</style>

<?php
get_footer();