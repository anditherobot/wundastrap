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
<style>
    .list-group-item {
        h6 {
            max-width: 80%;
            font-size: 0.9rem;
        }
    }

    .card-header {
        border-bottom: 2px solid #f0f0f0;
    }

    /* To complete this implementation:

Add Bootstrap Icons to your theme (for the weather icon)
Integrate with a weather API of your choice
Update the action button links to point to your actual pages
Adjust the color scheme to match your brand

Would you like me to modify anything in this implementation?*/
</style>