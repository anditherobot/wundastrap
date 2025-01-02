<section class="latest-articles py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <h2>Denye piblikasyon</h2>
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
                            <div class="card border-0 hover-card h-100 shadow-sm p-3 rounded">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                                        class="card-img-top rounded"
                                        alt="<?php echo get_the_title(); ?>">
                                <?php else: ?>
                                    <div class="card-img-top rounded d-flex align-items-center justify-content-center bg-grey-gradient">
                                        <span class="text-dark fw-bold"></span>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body p-2 text-center">
                                    <h3 class="card-title mb-0 fw-bold fs-5">
                                        <?php the_title(); ?>
                                    </h3>
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
               class="btn btn-outline-primary">Rès Atik Yo</a>
        </div>
    </div>
</section>

<style>
.latest-articles {
    background-color: #f8f9fa; /* Light grey for contrast */
    padding: 50px 0;
}

.latest-articles .card-img-top {
    height: 180px;
    object-fit: cover;
}

.latest-articles .bg-grey-gradient {
    background: linear-gradient(135deg, #d3d3d3, #f0f0f0); /* Soft grey gradient */
    height: 180px;
}

.latest-articles .card-title {
    font-weight: bold;
    font-size: 1.25rem;
    margin-top: 10px;
    margin-bottom: 0;
}

.latest-articles .hover-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.latest-articles .hover-card:hover {
    transform: scale(1.02);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    opacity: 0.95;
}

.latest-articles .shadow-sm {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
}

@media (max-width: 768px) {
    .latest-articles .card-title {
        font-size: 1rem;
    }
}
</style>
