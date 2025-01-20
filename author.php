<?php
/**
 * The template for displaying the author pages with a grid layout
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="author-grid-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main" id="main">

                <header class="page-header author-header">
                    <?php
                    $author = get_queried_object();
                    $author_name = $author->display_name;
                    $author_description = $author->user_description;
                    $author_website = $author->user_url;
                    $author_avatar = get_avatar( $author->ID, 96 );
                    ?>

                    <h1 class="page-title"><?php echo esc_html( sprintf( __( 'All posts by %s', 'your-theme' ), $author_name ) ); ?></h1>

                    <div class="author-info">
                        <div class="author-avatar">
                            <?php echo $author_avatar; ?>
                        </div>
                        <div class="author-details">
                            <?php if ( $author_website ) : ?>
                                <p><a href="<?php echo esc_url( $author_website ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $author_website ); ?></a></p>
                            <?php endif; ?>
                            <?php if ( $author_description ) : ?>
                                <p><?php echo esc_html( $author_description ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                </header><!-- .page-header -->

                <?php if ( have_posts() ) : ?>
                    <section class="posts-grid">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="grid-item post-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="card-content">
                                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'your-theme' ); ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </section>

                    <?php understrap_pagination(); ?>

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

</div><!-- #author-grid-wrapper -->

<style>
/* Author info styling */
.author-header {
    text-align: center;
    margin-bottom: 30px;
}

.author-info {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.author-avatar img {
    border-radius: 50%;
}

.author-details {
    text-align: left;
}

/* Basic grid and card styling */
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
</style>

<?php
get_footer();