<!-- Combined Navigation & Social Container -->
<div class="sidebar-widgets">
    <!-- Main Navigation Buttons -->
    <div class="nav-buttons mb-4">
        <a href="https://diksyone.mokreyol.com/" class="nav-button" aria-label="Dictionary Page">
            <i class="bi bi-book"></i>
            <span class="button-text">Diksyonè</span>
            <i class="bi bi-chevron-right arrow-icon"></i>
        </a>
        <a href="https://diksyone.mokreyol.com/" class="nav-button" aria-label="Technology Page">
            <i class="bi bi-laptop"></i>
            <span class="button-text">Teknoloji an Kreyòl</span>
            <i class="bi bi-chevron-right arrow-icon"></i>
        </a>
    </div>
    
    <!-- Latest Articles -->
    <div class="content-card mb-4">
        <div class="card-header">
            <h3 class="h5 mb-0">📚 Piblikasyon Resant</h3>
        </div>
        <div class="card-content">
            <?php
            $recent_posts = new WP_Query([
                'posts_per_page' => 5,
                'post__not_in' => array(get_the_ID())
            ]);
            ?>
            <?php if ($recent_posts->have_posts()): ?>
                <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                    <article class="article-item">
                        <a href="<?php the_permalink(); ?>" class="article-link">
                            <h6 class="article-title"><?php the_title(); ?></h6>
                        </a>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>
                <p class="empty-message">Pa gen piblikasyon pou kounye a.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Variables for consistent styling */
:root {
    --primary-gradient: linear-gradient(45deg, #6a11cb 25%, #2575fc 75%);
    --hover-gradient: linear-gradient(45deg, #5a0fb3 25%, #2167e8 75%);
    --bg-light: #ffffff;
    --bg-secondary: #f8f9fa;
    --border-light: #e9ecef;
    --text-dark: #2c2c2c;
    --text-muted: #6c757d;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 4px 12px rgba(0, 0, 0, 0.12);
    --transition: all 0.3s ease;
}

/* Sidebar Container */
.sidebar-widgets {
    padding: 1rem;
    background: var(--bg-light);
    border-radius: 1rem;
    border: 1px solid var(--border-light);
}

/* Navigation Buttons */
.nav-button {
    display: flex;
    align-items: center;
    padding: 1rem 1.25rem;
    background: var(--bg-secondary);
    border: 1px solid var(--border-light);
    border-radius: 0.75rem;
    color: var(--text-dark);
    text-decoration: none;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
}

.nav-button:hover {
    background: var(--primary-gradient);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.nav-button i {
    font-size: 1.5rem;
    margin-right: 1rem;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.nav-button:hover i {
    -webkit-text-fill-color: #fff;
}

.nav-button .button-text {
    flex: 1;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 1.1rem;
}

/* Content Card Styling */
.content-card {
    background: var(--bg-light);
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
}

.content-card .card-header {
    background: var(--primary-gradient);
    padding: 1rem;
    text-align: center;
}

.content-card .card-content {
    padding: 1rem;
    background: var(--bg-secondary);
}

/* Article Items */
.article-item {
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border-light);
}

.article-link {
    text-decoration: none;
    color: var(--text-dark);
    transition: var(--transition);
    display: block;
}

.article-link:hover {
    color: #6a11cb;
    transform: translateX(6px);
}

.article-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.4;
}

.empty-message {
    text-align: center;
    color: var(--text-muted);
    margin: 1rem 0;
    font-style: italic;
}

/* Add subtle hover effects */
.nav-button .arrow-icon {
    margin-left: auto;
    transition: transform 0.3s ease;
    color: var(--text-muted);
}

.nav-button:hover .arrow-icon {
    transform: translateX(6px);
    color: #fff;
}
/* Content Card Styling */
.content-card {
    background: var(--bg-dark);
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-dark);
}

.content-card .card-header {
    background: var(--primary-gradient);
    padding: 1rem;
    text-align: center;
}

.content-card .card-header h3 {
    color: #fff;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

.content-card .card-content {
    padding: 1rem;
}

/* Article Items */
.article-item {
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.article-item:last-child {
    border-bottom: none;
}

.article-link {
    text-decoration: none;
    color: var(--text-light);
    transition: var(--transition);
    display: block;
}

.article-link:hover {
    color: #fff;
    transform: translateX(6px);
}

.article-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.4;
}

.empty-message {
    text-align: center;
    color: rgba(255, 255, 255, 0.6);
    margin: 1rem 0;
    font-style: italic;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .nav-button .button-text {
        font-size: 1rem;
    }
    
    .nav-button {
        padding: 0.875rem 1rem;
    }
    
    .nav-button i {
        font-size: 1.25rem;
    }
}
</style>

<?php
// Condition to hide or show the template part
$show_weather = false; // Change this condition as needed
if ($show_weather) {
    get_template_part('template-parts/home/hero-sidebar-weather');
}
?>