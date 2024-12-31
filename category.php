<?php
defined('ABSPATH') || exit;
get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="category-wrapper">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row justify-content-center">
            <main class="site-main" id="main">
            <header class="page-header bg-dark text-white py-4 mb-4 text-center rounded">
    <h1 class="page-title" style="font-size: 2rem; font-weight: 700;">
        <?php echo single_cat_title('', false); ?>
    </h1>
    <?php if (category_description()): ?>
        <div class="category-description mt-2 text-white-50" style="font-size: 1.1rem;">
            <?php echo category_description(); ?>
        </div>
    <?php endif; ?>
</header>


                <?php if (have_posts()): ?>
                    <div class="row justify-content-center g-4">
                        <?php while (have_posts()): the_post(); ?>
                            <div class="col-md-6 col-lg-4">
                                <article <?php post_class('card h-100 shadow-sm border-0 rounded overflow-hidden position-relative'); ?>>
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="card-img-top position-relative" style="height: 200px;">
                                            <a href="<?php the_permalink(); ?>" class="stretched-link">
                                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100 object-fit-cover']); ?>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="card-img-top position-relative gradient-placeholder" 
                                             style="--gradient-start: <?php echo sprintf('#%06x', mt_rand(0, 0xFFFFFF)); ?>; 
                                                    --gradient-end: <?php echo sprintf('#%06x', mt_rand(0, 0xFFFFFF)); ?>;">
                                            <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-body p-4 text-center">
                                        <h2 class="card-title h4 mb-0">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
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
                            'prev_text' => __('←', 'understrap'),
                            'next_text' => __('→', 'understrap'),
                        ]);
                        ?>
                    </div>

                <?php else: ?>
                    <p class="text-center text-muted">
                        <?php esc_html_e('No posts found in this category.', 'understrap'); ?>
                    </p>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

<style>
.gradient-placeholder {
    height: 200px;
    background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
    transition: transform 0.3s ease;
}

.card:hover .gradient-placeholder {
    transform: scale(1.05);
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
}

.page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    margin: 0 4px;
    padding: 8px;
    border-radius: 4px;
    background: #f8f9fa;
    color: #212529;
    text-decoration: none;
    transition: all 0.2s;
}

.page-numbers.current {
    background: #0d6efd;
    color: white;
}

.page-numbers:hover:not(.current) {
    background: #e9ecef;
}
</style>

<?php get_footer(); ?>