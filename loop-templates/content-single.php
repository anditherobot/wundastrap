<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="post-banner-wrapper">
        <div class="post-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>');">
            <div class="post-banner-content">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta"><?php understrap_posted_on(); ?></div>
            </div>
        </div>
    </div>

    <div class="entry-content">
        <?php
        the_content();
        understrap_link_pages();
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<style>
/* General Styles */
body {
    font-size: 1.1rem; /* Slightly increased default font size */
    line-height: 1.7;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.post-banner-wrapper {
    position: relative;
    height: 400px;
    overflow: hidden;
}

.post-banner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.post-banner-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
    padding: 20px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
    color: #fff;
}

.entry-title {
    font-size: 2.5rem;
    margin: 0;
}

.entry-meta {
    font-size: 1rem;
    margin-top: 10px;
    background: #f9f9f9; /* Light background */
    color: #333; /* Dark text */
    padding: 5px 10px;
    border-radius: 5px;
    display: inline-block;
}

/* Limit text width and center on larger screens */
.entry-content {
    max-width: 800px; /* Limit horizontal spread */
    margin: 0 auto; /* Center content */
    padding: 20px; /* Add some padding */
}

@media (max-width: 768px) {
    .entry-content {
        max-width: 90%; /* Make more fluid on smaller screens */
    }
}
</style>
