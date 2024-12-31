<?php
defined('ABSPATH') || exit;
$navbar_type = get_theme_mod('understrap_navbar_type', 'collapse');
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Brand -->
        <div class="navbar-brand d-flex align-items-center">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-text-link">
                MOKREYOL
            </a>
        </div>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
                aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'navbar-nav ms-auto',
                'fallback_cb'    => '',
                'menu_id'        => 'main-menu',
                'depth'          => 2,
                'walker'         => new Understrap_WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>
</nav>

<style>
/* Sticky Navbar */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1030;
    padding: 0.75rem 1rem;
    background: linear-gradient(to right, #1a1a1a, #2c2c2c) !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

/* Brand Section */
.navbar-brand {
    height: 55px;
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.navbar-brand img {
    height: 50px;
    width: auto;
}

.brand-text-link {
    font-size: 2.2rem;
    color: #fff;
    font-weight: 900;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    background: linear-gradient(45deg, #6a11cb 25%, #2575fc 75%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease;
}

.brand-text-link:hover,
.brand-text-link:focus {
    transform: translateY(-2px);
    background-position: right center;
    text-decoration: none;
}

/* Links */
.navbar-nav .nav-link {
    font-size: 1.1rem;
    font-weight: 600;
    padding: 0.8rem 1.2rem !important;
    color: rgba(255, 255, 255, 0.9) !important;
    transition: all 0.3s ease;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    color: #fff !important;
    transform: translateY(-1px);
}

/* Mobile Menu */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
}

.navbar-collapse.show {
    display: block !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    // Auto-collapse on scroll
    document.addEventListener('scroll', () => {
        if (navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
        }
    });

    // Auto-collapse on link click
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768 && navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
            }
        });
    });
});
</script>
