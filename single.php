<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type', 'container');
?>

<div class="wrapper" id="single-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content">
        <?php
        while (have_posts()) {
            the_post();
        ?>
		 <section class="category-list">
                    <?php get_template_part( 'template-parts/category-list' ); ?>
                </section>
            <article <?php post_class('article-content'); ?> id="post-<?php the_ID(); ?>">
                <!-- Category Pills -->
                <div class="text-center mt-4 mb-2">
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" 
                                class="badge bg-light text-primary text-decoration-none me-2 mb-2">' . 
                                esc_html($category->name) . '</a>';
                        }
                    }
                    ?>
                </div>

                <!-- Article Title -->
                <h1 class="display-4 fw-bold text-center mb-4"><?php the_title(); ?></h1>

                <!-- Subtitle/Description -->
                <?php if (has_excerpt()) : ?>
                    <div class="lead text-center text-muted mb-4 col-lg-10 mx-auto">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>

                <!-- Author and Date -->
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <div class="author-meta">
                        <div class="d-flex align-items-center">
                            <?php
                            // Author avatar
                            $author_id = get_the_author_meta('ID');
                            if ($author_id) {
                                echo '<div class="me-2">';
                                echo get_avatar($author_id, 40, '', '', array('class' => 'rounded-circle'));
                                echo '</div>';
                            }
                            ?>
                            <div>
                                <div class="fw-bold">By <?php the_author(); ?></div>
                                <div class="text-muted small">
                                    <?php echo get_the_date('M j, Y'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image-wrapper mb-5">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                    </div>
                <?php endif; ?>

                <!-- Article Content -->
                <div class="entry-content col-lg-10 mx-auto">
                    <?php
                    the_content();
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'understrap'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>

                <!-- Post Navigation -->
                <div class="post-navigation mt-5 py-4 border-top border-bottom">
                    <?php understrap_post_nav(); ?>
                </div>
            </article>

            <!-- Related Posts Section -->
            <section class="related-posts mt-5 mb-5">
                <?php
                $categories = get_the_category();
                if ($categories) {
                    $first_category = $categories[0];
                    $related_posts_args = array(
                        'posts_per_page' => 3,
                        'category__in'   => array($first_category->term_id),
                        'post__not_in'   => array(get_the_ID()),
                        'orderby'        => 'rand',
                    );
                    $related_posts_query = new WP_Query($related_posts_args);

                    if ($related_posts_query->have_posts()) {
                        echo '<h2 class="h3 mb-4">Piblikasyon ki fè pati de menm kategory a: <span class="fw-bold">' . 
                            esc_html($first_category->name) . '</span></h2>';
                        echo '<div class="row">';
                        while ($related_posts_query->have_posts()) {
                            $related_posts_query->the_post();
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h3 class="h5 card-title">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                        wp_reset_postdata();
                    }
                }
                ?>
            </section>

            <!-- Comments Section -->
            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        <?php
        }
        ?>
    </div><!-- #content -->
</div><!-- #single-wrapper -->

<style>
/* Custom styles to match the design in the image */
.article-content {
    font-family: var(--bs-font-sans-serif);
    line-height: 1.7;
}

.badge {
    font-weight: 400;
    padding: 0.4rem 0.8rem;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
}

.featured-image-wrapper {
    max-height: 500px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.featured-image-wrapper img {
    width: 100%;
    object-fit: cover;
}

.entry-content {
    font-size: 1.1rem;
    line-height: 1.8;
}

.entry-content p {
    margin-bottom: 1.5rem;
}

.entry-content h2 {
    margin-top: 2rem;
    margin-bottom: 1rem;
}

/* First letter styling like in the image */
.entry-content > p:first-of-type:first-letter {
    float: left;
    font-size: 3.5rem;
    line-height: 1;
    font-weight: bold;
    margin-right: 0.5rem;
    color: #333;
}

/* Post navigation styling */
.post-navigation .nav-links {
    display: flex;
    justify-content: space-between;
}

/* Related posts card styling */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.card-img-top {
    height: 180px;
    object-fit: cover;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .entry-content {
        font-size: 1rem;
    }
}
</style>

<?php
get_footer();