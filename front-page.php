<?php
/**
 * Template Name: News Homepage Layout
 *
 * A custom front page template that mimics a modern news website layout
 * with hero section, trending sidebar, weather widget, and news grid.
 *
 * @package your-theme
 */

get_header();

$container = get_theme_mod('understrap_container_type', 'container-fluid');

// Get recent posts for different sections
$hero_post = get_posts(array('numberposts' => 1, 'post_status' => 'publish'));
$trending_posts = get_posts(array('numberposts' => 8, 'offset' => 1, 'post_status' => 'publish'));
$news_posts = get_posts(array('numberposts' => 6, 'offset' => 9, 'post_status' => 'publish'));
$government_posts = get_posts(array('numberposts' => 1, 'category_name' => 'politics', 'post_status' => 'publish'));
?>

<div class="wrapper news-homepage" id="front-page-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content">
        
        <!-- Main Content Area -->
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8" id="main-content">
                
                <!-- Hero Section -->
                <section class="hero-section mb-4">
                    <?php if ($hero_post) : $post = $hero_post[0]; setup_postdata($post); ?>
                    <div class="hero-card position-relative">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="hero-image">
                                        <?php the_post_thumbnail('large', ['class' => 'img-fluid h-100 w-100', 'style' => 'object-fit: cover;']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-content p-4 h-100 d-flex flex-column justify-content-center">
                                    <h1 class="hero-title mb-3"><?php the_title(); ?></h1>
                                    <div class="hero-excerpt mb-3">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="hero-meta text-muted small">
                                        <span><?php echo get_the_date(); ?></span>
                                        <span class="mx-2">•</span>
                                        <span><?php echo get_the_category_list(', '); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                    </div>
                    <?php wp_reset_postdata(); endif; ?>
                </section>
                
                <!-- News Grid Section -->
                <section class="news-grid">
                    <div class="row g-3">
                        <?php if ($news_posts) : foreach ($news_posts as $post) : setup_postdata($post); ?>
                        <div class="col-md-4">
                            <div class="news-card h-100">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <div class="news-image mb-2">
                                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded', 'style' => 'height: 150px; width: 100%; object-fit: cover;']); ?>
                                    </div>
                                    <?php endif; ?>
                                    <h5 class="news-title text-dark"><?php the_title(); ?></h5>
                                    <p class="news-excerpt text-muted small"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    <div class="news-meta text-muted small">
                                        <span><?php echo get_the_date('j M'); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; wp_reset_postdata(); endif; ?>
                    </div>
                </section>
                
                <!-- Government Section -->
                <section class="government-section mt-5">
                    <?php if ($government_posts) : $post = $government_posts[0]; setup_postdata($post); ?>
                    <div class="government-card bg-primary text-white p-4 rounded">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-2">Gouvernement Bayrou:</h3>
                                <h4 class="mb-3"><?php the_title(); ?></h4>
                                <p class="mb-3"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-light btn-sm">Autres sujets »</a>
                            </div>
                            <div class="col-md-4 text-end">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); endif; ?>
                </section>
                
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4" id="sidebar">
                
                <!-- Trending Section -->
                <section class="trending-section mb-4">
                    <h4 class="section-title mb-3">Tendances du jour</h4>
                    <div class="trending-list">
                        <?php if ($trending_posts) : $counter = 1; foreach ($trending_posts as $post) : setup_postdata($post); ?>
                        <div class="trending-item d-flex align-items-center mb-3">
                            <span class="trending-number me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 12px;"><?php echo $counter; ?></span>
                            <div class="flex-grow-1">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <h6 class="mb-1"><?php the_title(); ?></h6>
                                </a>
                                <small class="text-muted"><?php echo get_the_category_list(', '); ?></small>
                            </div>
                        </div>
                        <?php $counter++; endforeach; wp_reset_postdata(); endif; ?>
                    </div>
                </section>
                
                <!-- Weather Widget -->
                <section class="weather-section mb-4">
                    <div class="weather-card bg-light p-3 rounded">
                        <h5 class="mb-3">Météo <small class="text-muted">Brusje</small></h5>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="weather-day">
                                    <small>Aujourd'hui</small>
                                    <div class="weather-icon my-2">☀️</div>
                                    <strong>27°</strong>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="weather-day">
                                    <small>Demain</small>
                                    <div class="weather-icon my-2">⛅</div>
                                    <strong>25°</strong>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="weather-day">
                                    <small>Mercredi</small>
                                    <div class="weather-icon my-2">🌧️</div>
                                    <strong>22°</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Horoscope Section -->
                <section class="horoscope-section mb-4">
                    <div class="horoscope-card bg-light p-3 rounded">
                        <h5 class="mb-3">Horoscope - Lion</h5>
                        <p class="small text-muted mb-2">Bélier - Amour - Vous êtes très apprécié pour votre sincérité et votre générosité. Profitez de ce statut pour échanger et vous connecter...</p>
                        <a href="#" class="text-primary small">Lire plus »</a>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</div>

<style>
.news-homepage {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.hero-section {
    margin-bottom: 2rem;
}

.hero-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    min-height: 300px;
}

.hero-image {
    height: 300px;
    overflow: hidden;
}

.hero-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    line-height: 1.3;
}

.hero-excerpt {
    color: #666;
    line-height: 1.5;
}

.news-grid .news-card {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    transition: transform 0.2s;
}

.news-grid .news-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.news-title {
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 0.5rem;
}

.news-excerpt {
    font-size: 0.85rem;
    line-height: 1.4;
}

.section-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
}

.trending-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.trending-item:last-child {
    border-bottom: none;
}

.trending-item h6 {
    font-size: 0.9rem;
    font-weight: 500;
    line-height: 1.3;
    margin-bottom: 0.25rem;
}

.government-card {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
}

.weather-card, .horoscope-card {
    border: 1px solid #e0e0e0;
}

.weather-day {
    padding: 0.5rem;
}

.weather-icon {
    font-size: 1.5rem;
}

@media (max-width: 768px) {
    .hero-card .row {
        flex-direction: column;
    }
    
    .hero-image {
        height: 200px;
    }
    
    .container-fluid {
        padding: 0 15px;
    }
}
</style>

<?php get_footer(); ?>