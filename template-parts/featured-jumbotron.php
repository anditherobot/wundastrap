<?php
/**
 * Template Part: Featured Article Jumbotron
 *
 * Displays the latest published article in a jumbotron format:
 * - Featured image on the left
 * - Title on top right
 * - Excerpt below title on the right
 */

// Get the latest published post
$latest_post = get_posts(array(
    'numberposts' => 1,
    'post_status' => 'publish',
    'post_type' => 'post'
));

if (!empty($latest_post)) :
    $post = $latest_post[0];
    setup_postdata($post);
?>

<section class="featured-jumbotron mb-5">
    <div class="card shadow-lg border-0 overflow-hidden">
        <div class="row g-0 align-items-center">
            <!-- Featured Image Left -->
            <div class="col-md-5">
                <?php if (has_post_thumbnail($post->ID)) : ?>
                    <div class="featured-image-container">
                        <?php echo get_the_post_thumbnail($post->ID, 'large', array(
                            'class' => 'img-fluid featured-jumbotron-image',
                            'alt' => get_the_title($post->ID)
                        )); ?>
                    </div>
                <?php else : ?>
                    <div class="featured-image-placeholder d-flex align-items-center justify-content-center">
                        <i class="bi bi-image fs-1 text-muted"></i>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Content Right -->
            <div class="col-md-7">
                <div class="card-body p-4 p-lg-5">
                    <!-- Title on Top -->
                    <h2 class="card-title display-6 fw-bold mb-3">
                        <a href="<?php echo get_permalink($post->ID); ?>" class="text-decoration-none text-dark">
                            <?php echo get_the_title($post->ID); ?>
                        </a>
                    </h2>
                    
                    <!-- Meta Information -->
                    <div class="meta-info mb-3">
                        <small class="text-muted">
                            <i class="bi bi-calendar3 me-1"></i>
                            <?php echo get_the_date('', $post->ID); ?>
                            <span class="mx-2">|</span>
                            <i class="bi bi-folder me-1"></i>
                            <?php 
                            $categories = get_the_category($post->ID);
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </small>
                    </div>
                    
                    <!-- Excerpt -->
                    <div class="excerpt-content">
                        <p class="card-text text-muted fs-6 lh-base">
                            <?php 
                            $excerpt = get_the_excerpt($post->ID);
                            echo wp_trim_words($excerpt, 25, '...');
                            ?>
                        </p>
                    </div>
                    
                    <!-- Read More Button -->
                    <div class="mt-4">
                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-primary btn-lg">
                            <i class="bi bi-arrow-right me-2"></i>Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.featured-jumbotron .featured-image-container {
    height: 100%;
    min-height: 300px;
    position: relative;
    overflow: hidden;
}

.featured-jumbotron .featured-jumbotron-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-jumbotron:hover .featured-jumbotron-image {
    transform: scale(1.05);
}

.featured-jumbotron .featured-image-placeholder {
    height: 300px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 0;
}

.featured-jumbotron .card {
    min-height: 300px;
    transition: box-shadow 0.3s ease;
}

.featured-jumbotron .card:hover {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}

.featured-jumbotron .card-title a:hover {
    color: #0d6efd !important;
}

@media (max-width: 768px) {
    .featured-jumbotron .featured-image-container,
    .featured-jumbotron .featured-image-placeholder {
        height: 200px;
        min-height: 200px;
    }
    
    .featured-jumbotron .card-body {
        padding: 1.5rem !important;
    }
    
    .featured-jumbotron .display-6 {
        font-size: 1.5rem;
    }
}
</style>

<?php
    wp_reset_postdata();
endif;
?>