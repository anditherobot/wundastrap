<?php
/**
 * Template Name: Front Page with Category List and Paginated Grid
 *
 * This is a custom front page template that displays a list of categories
 * and a paginated list of recent posts.
 *
 * @package your-theme
 */

get_header();

$container = get_theme_mod('understrap_container_type', 'container');

// Fix for pagination on static front page
// This is crucial for solving the #% issue
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
if (is_front_page()) {
    $paged = get_query_var('page') ? get_query_var('page') : $paged;
}
?>

<div class="wrapper" id="front-page-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content">
        <div class="row">
            <main class="col-12" id="main">
                
                <!-- Category List Section -->
                <section class="category-list mb-4">
                    <ul class="list-inline d-flex flex-wrap justify-content-center gap-2 pb-3 border-bottom">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            echo '<li class="list-inline-item">';
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="btn btn-sm btn-outline-secondary">';
                            echo esc_html($category->name);
                            echo '</a></li>';
                        }
                        ?>
                    </ul>
                </section>
                
                <!-- Posts Grid Section -->
                <section class="posts-grid">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                    );
                    
                    $custom_query = new WP_Query($args);

                    if ($custom_query->have_posts()) :
                        while ($custom_query->have_posts()) : $custom_query->the_post();
                    ?>
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-body mb-3 d-block">
                                <div class="card shadow-sm">
                                    <div class="card-body d-flex align-items-center">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="flex-shrink-0 me-3">
                                                <?php the_post_thumbnail('thumbnail', ['class' => 'rounded', 'style' => 'width: 50px; height: 50px; object-fit: cover;']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <h5 class="card-title mb-1"><?php the_title(); ?></h5>
                                            <div class="card-text small text-muted">
                                                <span class="me-2"><?php echo get_the_date(); ?></span>
                                                <span><?php echo get_the_category_list(', '); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    <?php
                        endwhile;
                        
                        // Fixed pagination that works on static front pages
                        $big = 999999999; // need an unlikely integer
                        
                        // This is the critical part that fixes the #% issue
                        $paginate_links = paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, $paged),
                            'total' => $custom_query->max_num_pages,
                            'prev_text' => '&laquo;',
                            'next_text' => '&raquo;',
                            'type' => 'array',
                        ));
                        
                        if ($paginate_links) {
                            echo '<nav aria-label="Page navigation" class="mt-4">';
                            echo '<ul class="pagination justify-content-center">';
                            
                            foreach ($paginate_links as $link) {
                                // Convert WordPress pagination HTML to Bootstrap
                                if (strpos($link, 'current') !== false) {
                                    // Current page
                                    $link = str_replace('page-numbers current', 'page-link', $link);
                                    echo '<li class="page-item active">' . $link . '</li>';
                                } else if (strpos($link, 'dots') !== false) {
                                    // Ellipsis
                                    $link = str_replace('page-numbers dots', 'page-link', $link);
                                    echo '<li class="page-item disabled">' . $link . '</li>';
                                } else {
                                    // Regular link
                                    $link = str_replace('page-numbers', 'page-link', $link);
                                    echo '<li class="page-item">' . $link . '</li>';
                                }
                            }
                            
                            echo '</ul>';
                            echo '</nav>';
                        }
                        
                        wp_reset_postdata();
                    else :
                        echo '<div class="alert alert-info">No posts found.</div>';
                    endif;
                    ?>
                </section>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>