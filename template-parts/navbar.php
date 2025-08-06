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
<nav class="mokreyol-navbar">
    <div class="container-fluid">
        <div class="navbar-content d-flex align-items-center justify-content-center flex-column flex-lg-row">
            <!-- Brand -->
            <div class="navbar-brand-section text-center py-3">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mokreyol-brand">
                    MOKREYOL
                </a>
            </div>
            
            <!-- Main Navigation -->
            <div class="navbar-menu-section">
                <div class="mokreyol-nav-menu d-flex justify-content-center flex-wrap">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="mokreyol-nav-link <?php echo is_front_page() ? 'active' : ''; ?>">
                        ACCUEIL
                    </a>
                    <?php
                    // Get main categories for navigation
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => true,
                        'exclude' => array(1) // Exclude "Uncategorized"
                    ));
                    
                    if ($categories) :
                        $category_count = 0;
                        foreach ($categories as $category) :
                            if ($category->name !== 'Uncategorized' && $category_count < 6) :
                                $is_current = is_category($category->term_id);
                                $active_class = $is_current ? ' active' : '';
                                $category_count++;
                    ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="mokreyol-nav-link<?php echo $active_class; ?>">
                            <?php echo strtoupper(esc_html($category->name)); ?>
                        </a>
                    <?php 
                            endif;
                        endforeach;
                    endif; 
                    ?>
                    <a href="<?php echo esc_url(home_url('/categories/')); ?>" class="mokreyol-nav-link">
                        PLUS
                        <i class="nav-dropdown-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* MOKREYOL Navigation Bar */
    .mokreyol-navbar {
        background-color: #2c2c2c;
        position: sticky;
        top: 0;
        z-index: 1030;
        border-bottom: 2px solid #444;
    }

    .navbar-content {
        gap: 1rem;
        padding: 0.5rem 0;
        max-width: 1200px;
        margin: 0 auto;
    }

    .mokreyol-brand {
        font-size: 2.5rem;
        font-weight: 900;
        color: #e63946;
        text-decoration: none;
        letter-spacing: -1px;
        font-family: 'Arial', sans-serif;
        text-transform: uppercase;
    }

    .mokreyol-brand:hover {
        color: #ff4757;
        text-decoration: none;
    }

    .mokreyol-nav-menu {
        gap: 0;
        align-items: center;
        padding: 0.5rem 0;
    }

    .mokreyol-nav-link {
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
        position: relative;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid transparent;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .mokreyol-nav-link:hover {
        color: #ffffff;
        text-decoration: none;
        border-bottom-color: #e63946;
        background-color: rgba(255, 255, 255, 0.05);
    }

    .mokreyol-nav-link.active {
        border-bottom-color: #e63946;
        color: #ffffff;
    }

    .nav-dropdown-icon {
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 6px solid currentColor;
        display: inline-block;
        margin-left: 0.25rem;
    }

    /* Mobile responsiveness */
    @media (max-width: 991.98px) {
        .navbar-content {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .mokreyol-brand {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .mokreyol-nav-menu {
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.25rem;
        }
        
        .mokreyol-nav-link {
            font-size: 0.8rem;
            padding: 0.5rem 0.75rem;
            margin: 0.25rem;
        }
    }

    @media (max-width: 767.98px) {
        .mokreyol-navbar .container-fluid {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .mokreyol-brand {
            font-size: 1.8rem;
        }
        
        .mokreyol-nav-link {
            font-size: 0.75rem;
            padding: 0.4rem 0.6rem;
            border-radius: 4px;
        }
        
        .mokreyol-nav-link:hover {
            border-bottom-color: transparent;
            background-color: #e63946;
        }
    }

    @media (max-width: 575.98px) {
        .mokreyol-brand {
            font-size: 1.6rem;
        }
        
        .mokreyol-nav-menu {
            gap: 0.125rem;
        }
        
        .mokreyol-nav-link {
            font-size: 0.7rem;
            padding: 0.3rem 0.5rem;
            margin: 0.125rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Highlight current page in navigation
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.mokreyol-nav-link');
        
        navLinks.forEach(link => {
            const linkPath = new URL(link.getAttribute('href')).pathname;
            if (linkPath === currentPath || (currentPath !== '/' && linkPath !== '/' && currentPath.includes(linkPath))) {
                link.classList.add('active');
            }
        });
        
        // Add smooth scroll behavior for anchor links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });
</script>