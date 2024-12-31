<?php
// Get most recent post from Featured category
$featured_query = new WP_Query([
    'category_name' => 'featured',
    'posts_per_page' => 1
]);
?>
<section class="hero py-4">
    <div class="container">
        <div class="row g-4">
            <!-- Featured Post Column -->
            <div class="col-md-8">
                <?php
                $featured_query = new WP_Query([
                    'category_name' => 'featured',
                    'posts_per_page' => 1
                ]);

                if ($featured_query->have_posts()):
                    while ($featured_query->have_posts()): $featured_query->the_post(); ?>
                        <div class="card hero-featured-post h-100 border-0 shadow-sm">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" 
                                     class="card-img-top" 
                                     alt="<?php echo get_the_title(); ?>"
                                     style="height: 210px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h2 class="card-title h4"><?php the_title(); ?></h2>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="metadata small text-muted">
                                        <span class="author me-3"><?php the_author(); ?></span>
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- Sidebar Column -->
            <div class="col-md-4">
                <!-- Action Buttons -->
                <div class="mb-4">
                    <div class="d-grid gap-3">
                        <a href="#" class="btn btn-outline-primary">Subscribe to Newsletter</a>
                        <a href="#" class="btn btn-outline-primary">Submit Article</a>
                        <a href="#" class="btn btn-outline-primary">Join Community</a>
                    </div>
                </div>

                <!-- Latest Articles -->
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h3 class="h6 mb-0">Latest Articles</h3>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php
                        $recent_posts = new WP_Query([
                            'posts_per_page' => 5,
                            'post__not_in' => array(get_the_ID())
                        ]);

                        if ($recent_posts->have_posts()):
                            while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-1 text-truncate"><?php the_title(); ?></h6>
                                        <small class="text-muted"><?php echo get_the_date('M d'); ?></small>
                                    </div>
                                </a>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>

                <!-- Weather Widget -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="h6 mb-3">Local Weather</h3>
                        <div class="text-center">
                            <!-- You'll need to integrate with a weather API -->
                            <div class="display-4 mb-2">
                                <i class="bi bi-cloud-sun"></i>
                            </div>
                            <div class="h4 mb-0">72°F</div>
                            <small class="text-muted">New York, NY</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero {
    background-color: #f8f9fa;
    
    .hero-featured-post {
        transition: transform 0.2s ease;
        
        &:hover {
            transform: translateY(-3px);
        }
        
        .card-title {
            font-weight: 600;
        }
    }
    
    .list-group-item {
        h6 {
            max-width: 80%;
            font-size: 0.9rem;
        }
    }
    
    .card-header {
        border-bottom: 2px solid #f0f0f0;
    }
}
</style>