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
                <?php get_template_part('template-parts/home/hero-featured'); ?>
            </div>

            <!-- Sidebar Column -->
            <div class="col-md-4">
                <?php get_template_part('template-parts/home/hero-sidebar'); ?>
            </div>
        </div>
    </div>

    <style>
        .hero {
            background-color: #f8f9fa;
        }
    </style>
</section>

