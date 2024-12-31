<section class="latest-articles py-5">
    <div class="container">
        <h2>Latest Articles</h2>
        <div class="row g-3">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
            );
            $latest_articles = new WP_Query($args);
            
            if ($latest_articles->have_posts()):
                while ($latest_articles->have_posts()): $latest_articles->the_post(); ?>
                    <div class="col-6 col-md-3">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                            <div class="card border-0 hover-card h-100">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                                        class="card-img-top rounded"
                                        alt="<?php echo get_the_title(); ?>">
                                <?php else: ?>
                                    <div class="card-img-top rounded bg-light d-flex align-items-center justify-content-center">
                                        <span class="text-muted">No Image</span>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body p-2">
                                    <h3 class="card-title small mb-1"><?php the_title(); ?></h3>
                                    <div class="card-text text-muted smaller">
                                        <?php echo wp_trim_words(get_the_excerpt(), 10); ?>
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        <?php echo get_the_date(); ?>
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p><?php esc_html_e('No articles found.', 'your-theme-textdomain'); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" 
               class="btn btn-outline-primary">View All Articles</a>
        </div>
    </div>
</section>

<style>
.latest-articles .card-img-top {
    height: 180px;
    object-fit: cover;
}

.latest-articles .card-title {
    font-weight: 500;
    line-height: 1.3;
}

.latest-articles .small {
    font-size: 0.9rem;
}

.latest-articles .smaller {
    font-size: 0.85rem;
}

.latest-articles .hover-card {
    transition: opacity 0.2s ease;
}

.latest-articles .hover-card:hover {
    opacity: 0.8;
}

@media (max-width: 768px) {
    .latest-articles .card-text {
        max-width: 100%;
    }
}
</style>