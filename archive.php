<?php
/**
 * The template for displaying archive pages in a grid layout
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-grid-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <?php
            // Do the left sidebar check and open div#primary.
            get_template_part( 'global-templates/left-sidebar-check' );
            ?>

            <main class="site-main" id="main">

                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->

                    <section class="posts-grid">
                        <?php
                        // Start the loop.
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <div class="grid-item post-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-content">
                                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'your-theme' ); ?></a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </section>

                    <nav class="pagination">
                        <?php
                        $args = array(
                            'prev_text' => '&laquo;',
                            'next_text' => '&raquo;',
                        );
                        echo paginate_links( $args );
                        ?>
                    </nav>

                <?php else : ?>

                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->

            <?php
            // Do the right sidebar check and close div#primary.
            get_template_part( 'global-templates/right-sidebar-check' );
            ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #archive-grid-wrapper -->

<style>
/* Basic grid and card styling for archive pages */
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Creates a responsive grid */
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
    justify-content: space-between; /* Push content to the bottom */
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
    font-size: 18px;
    margin: 0 0 10px;
    line-height: 1.2;
}

.post-card .card-title a {
    color: inherit;
    text-decoration: none;
}

.read-more-link {
    display: inline-block;
    background-color: #007bff; /* Example button color */
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    margin: 0 5px;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    color: #007bff;
}

.pagination a:hover {
    background-color: #007bff;
    color: white;
}
</style>

<?php
get_footer();
?>
