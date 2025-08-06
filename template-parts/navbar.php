<?php
/**
 * Navbar template partial
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Top Navigation Bar -->
<nav class="news-nav bg-white border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center py-2">
            <!-- Brand -->
            <div class="col-12 col-md-3 text-center text-md-start mb-2 mb-md-0">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo fw-bold text-primary fs-4">
                    MOKREYOL
                </a>
            </div>
            
            <!-- Main Navigation Categories -->
            <div class="col-12 col-md-7 mb-2 mb-md-0">
                <div class="news-categories d-flex justify-content-center flex-wrap">
                    <?php
                    // Get main categories for navigation
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 6, // Reduced from 8 to fit better on mobile
                        'hide_empty' => true,
                    ));
                    
                    if ($categories) :
                        foreach ($categories as $category) :
                            if ($category->name !== 'Uncategorized') :
                    ?>
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="nav-category-link px-2 px-md-3 py-1 text-decoration-none text-dark fw-semibold">
                            <?php echo $category->name; ?>
                        </a>
                    <?php 
                            endif;
                        endforeach;
                    else :
                        // Fallback menu items if no categories
                        $menu_items = array(
                            'Actualités' => home_url('/category/actualites/'),
                            'Sport' => home_url('/category/sport/'),
                            'Finance' => home_url('/category/finance/'),
                            'People' => home_url('/category/people/'),
                            'Life' => home_url('/category/life/'),
                            'Plus...' => home_url('/categories/')
                        );
                        
                        foreach ($menu_items as $label => $url) :
                    ?>
                        <a href="<?php echo $url; ?>" class="nav-category-link px-2 px-md-3 py-1 text-decoration-none text-dark fw-semibold">
                            <?php echo $label; ?>
                        </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            
            <!-- Search/User Area -->
            <div class="col-12 col-md-2 text-center text-md-end">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end gap-2">
                    <button class="btn btn-link text-muted p-2" title="Search" aria-label="Search">
                        <i class="bi bi-search fs-5"></i>
                    </button>
                    <button class="btn btn-link text-muted p-2" title="Menu" aria-label="Menu">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* News Navigation Bar */
    .news-nav {
        position: sticky;
        top: 0;
        z-index: 1030;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        background-color: #ffffff !important;
        border-bottom: 1px solid #e9ecef !important;
    }

    .brand-logo {
        text-decoration: none;
        font-size: 1.75rem !important;
        color: #0066cc !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .brand-logo:hover {
        text-decoration: none;
        color: #004499 !important;
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }

    .news-categories {
        gap: 0.25rem;
        max-height: 4rem; /* Limit to 2 rows */
        overflow: hidden;
    }

    .nav-category-link {
        font-size: 1rem;
        color: #333 !important;
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
        transition: all 0.2s ease;
        white-space: nowrap;
        font-weight: 600;
        line-height: 1.3;
    }

    .nav-category-link:hover {
        background-color: #f1f5f9;
        color: #0066cc !important;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .nav-category-link.active {
        background-color: #0066cc;
        color: white !important;
    }

    /* Mobile responsiveness - max 2 rows */
    @media (max-width: 768px) {
        .news-nav .py-2 {
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }
        
        .news-categories {
            justify-content: center;
            gap: 0.25rem;
            max-height: 4rem;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
        }
        
        .nav-category-link {
            font-size: 0.9rem;
            padding: 0.4rem 0.6rem;
            font-weight: 700; /* Bolder for better readability */
            min-height: 1.8rem;
        }
        
        .brand-logo {
            font-size: 1.5rem !important;
            font-weight: 800;
        }
        
        /* Ensure buttons are properly sized */
        .btn-link {
            min-width: 2.5rem;
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .nav-category-link {
            font-size: 0.85rem;
            padding: 0.35rem 0.5rem;
        }
        
        .brand-logo {
            font-size: 1.3rem !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Highlight current page in navigation
        const currentPath = window.location.pathname;
        const categoryLinks = document.querySelectorAll('.nav-category-link');
        
        categoryLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
        
        // Search functionality placeholder
        const searchBtn = document.querySelector('[title="Search"]');
        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                // Add search modal or redirect logic here
                console.log('Search clicked');
            });
        }
        
        // Menu functionality placeholder
        const menuBtn = document.querySelector('[title="Menu"]');
        if (menuBtn) {
            menuBtn.addEventListener('click', function() {
                // Add mobile menu toggle logic here
                console.log('Menu clicked');
            });
        }
    });
</script>