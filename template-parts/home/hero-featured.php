<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            $featured_query = new WP_Query([
                'category_name' => 'featured',
                'posts_per_page' => 1
            ]);

            if ($featured_query->have_posts()):
                while ($featured_query->have_posts()): $featured_query->the_post(); ?>
                    <div class="card mb-3 border-0">
                        <div class="row g-0">
                            <div class="col-md-7 position-relative">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>"
                                        class="img-fluid rounded-start"
                                        alt="<?php echo get_the_title(); ?>"
                                        style="object-fit: cover; height: 100%;">
                                <?php endif; ?>
                                <div class="position-absolute top-0 start-0 m-2 bg-white p-1 rounded">
                                    <span class="fw-bold small">YOUR SITE</span><br />
                                    <small class="text-muted"><?php echo get_the_time('H:i'); ?> DIRECT</small>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex flex-column justify-content-center bg-light rounded-end">
                                <div class="card-body">
                                    <h2 class="card-title fw-bold mb-2" style="font-size: 1.75rem; line-height: 1.2;">
                                        <?php the_title(); ?>
                                    </h2>
                                    <p class="card-text text-muted" style="font-size: 0.9rem; line-height: 1.4;">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row g-3">
                <?php
                $recent_posts = new WP_Query([
                    'posts_per_page' => 4,
                    'post__not_in' => array($featured_query->post->ID)
                ]);

                if ($recent_posts->have_posts()):
                    while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                        <div class="col-6 col-md-3">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                <div class="card border-0 hover-card">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                                            class="card-img-top rounded"
                                            alt="<?php echo get_the_title(); ?>"
                                            style="height: 180px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="card-img-top rounded bg-light d-flex align-items-center justify-content-center"
                                            style="height: 180px;">
                                            <span class="text-muted">No Image</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body p-2">
                                        <p class="card-text small mb-0" style="font-weight: 500;">
                                            <?php the_title(); ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>

        <style>
            .small {
                font-size: 0.9rem !important;
                line-height: 1.3;
            }

            .card-text {
                max-width: 220px;
            }

            .hover-card {
                transition: opacity 0.2s ease;
            }

            .hover-card:hover {
                opacity: 0.8;
            }

            @media (max-width: 768px) {
                .card-text {
                    max-width: 100%;
                }
            }
        </style>
    </div>

</div>