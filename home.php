<?php
defined('ABSPATH') || exit;
get_header();
?>

<div class="container py-5">
    <header class="page-header text-center mb-4">
        <h1 class="page-title"><?php esc_html_e('Tous les Articles', 'your-theme-textdomain'); ?></h1>
    </header>

    <?php if (have_posts()): ?>
        <div class="row g-4">
            <?php while (have_posts()): the_post(); ?>
                <div class="col-md-6 col-lg-4">
                    <article class="card h-100 shadow-sm border-0 rounded">
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" class="stretched-link">
                                <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>" 
                                     alt="<?php the_title(); ?>" 
                                     class="card-img-top">
                            </a>
                        <?php else: ?>
                            <div class="card-img-top gradient-placeholder"></div>
                        <?php endif; ?>
                        <div class="card-body text-center">
                            <h2 class="card-title h5">
                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination-wrapper mt-4">
    <?php
    the_posts_pagination([
        'mid_size'  => 2,
        'prev_text' => '<span aria-hidden="true">←</span> <span class="sr-only">' . __('Previous', 'your-theme-textdomain') . '</span>',
        'next_text' => '<span aria-hidden="true">→</span> <span class="sr-only">' . __('Next', 'your-theme-textdomain') . '</span>',
        'screen_reader_text' => __('Posts navigation', 'your-theme-textdomain'),
    ]);
    ?>
</div>

<style>
.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 48px; /* Larger tap target */
    height: 48px; /* Larger tap target */
    margin: 0 8px; /* Better spacing */
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 50%; /* Circular buttons */
    background-color: #f8f9fa;
    color: #212529;
    text-decoration: none;
    transition: all 0.2s ease;
}

.page-numbers:hover {
    background-color: #e2e6ea;
    color: #0d6efd;
    border-color: #0d6efd;
}

.page-numbers.current {
    background-color: #0d6efd;
    color: #ffffff;
    font-weight: bold;
    border-color: #0d6efd;
}

.page-numbers.prev,
.page-numbers.next {
    border-radius: 8px; /* Rounded rectangle for "Previous" and "Next" */
    padding: 10px 16px;
}

.page-numbers.prev span,
.page-numbers.next span {
    font-size: 18px;
    font-weight: bold;
}
</style>
    <?php else: ?>
        <p class="text-center text-muted"><?php esc_html_e('No posts found.', 'your-theme-textdomain'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
