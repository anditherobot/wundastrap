<!-- Combined Navigation & Social Container -->
<div class="sidebar-widgets">
    <!-- Main Navigation Buttons -->
    <div class="nav-buttons mb-4">
        <a href="https://diksyone.mokreyol.com/" class="nav-button" aria-label="Dictionary Page">
            <i class="bi bi-book"></i>
            <span class="button-text">Dictionary</span>
            <i class="bi bi-chevron-right arrow-icon"></i>
        </a>
        <a href="https://diksyone.mokreyol.com/" class="nav-button" aria-label="Technology Page">
            <i class="bi bi-laptop"></i>
            <span class="button-text">Technology</span>
            <i class="bi bi-chevron-right arrow-icon"></i>
        </a>
    </div>
</div>

<style>
/* Sidebar Widgets Container */
.sidebar-widgets {
    --primary-color: #7951F1;
    --hover-color: #6840d9;
    --text-color: #2d3748;
    --transition-time: 0.3s;
}

/* Main Navigation Buttons */
.nav-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.nav-button {
    display: flex;
    align-items: center;
    padding: 16px 20px;
    background-color: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    color: var(--text-color);
    text-decoration: none;
    font-weight: 600;
    transition: all var(--transition-time) ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.nav-button:hover {
    border-color: var(--primary-color);
    background-color: #f8f9ff;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.08);
}

.nav-button i {
    font-size: 1.2em;
    margin-right: 12px;
    color: var(--primary-color);
}

.nav-button .button-text {
    flex: 1;
}

.nav-button .arrow-icon {
    margin-left: auto;
    margin-right: 0;
    font-size: 0.9em;
    opacity: 0.5;
    transition: transform var(--transition-time);
}

.nav-button:hover .arrow-icon {
    transform: translateX(4px);
    opacity: 1;
}
</style>
<!-- Latest Articles -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-primary text-white text-center py-3">
        <h3 class="h5 mb-0">📚 Piblikasyon Resant</h3>
    </div>
    <div class="p-3">
        <?php
        $recent_posts = new WP_Query([
            'posts_per_page' => 5,
            'post__not_in' => array(get_the_ID())
        ]);
        ?>

        <?php if ($recent_posts->have_posts()): ?>
            <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                <article class="mb-2">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none link-primary d-block py-2">
                        <h6 class="mb-0 text-truncate"><?php the_title(); ?></h6>
                    </a>
                    <hr class="my-2">
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
            <p class="text-center text-muted mb-0">Pa gen piblikasyon pou kounye a.</p>
        <?php endif; ?>
    </div>
</div>

<?php
// Condition to hide or show the template part
$show_weather = false; // Change this condition as needed

if ($show_weather) {
    get_template_part('template-parts/home/hero-sidebar-weather');
}
?>