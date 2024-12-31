<?php
/**
 * Header Navbar (bootstrap5)
 */
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>
<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">
    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
    </h2>
    <div class="<?php echo esc_attr( $container ); ?>">
        <!-- Logo and Brand (unchanged) -->
        <a class="navbar-brand fw-bold d-flex align-items-center" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            }
            ?>
            <span class="brand-text"><?php bloginfo( 'name' ); ?></span>
        </a>

        <!-- Toggle button (unchanged) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Modified Navigation Container -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'menu_class'      => 'navbar-nav me-auto fw-bold', // Changed from ms-auto to me-auto
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    'container'       => false,
                )
            );
            ?>
            
            <?php get_template_part( 'template-parts/home/social-bar' ); ?>
        </div>
    </div>
</nav>
<style>
/* Logo Styling with enforced size */
.navbar-brand img.custom-logo,
.custom-logo-link img {
    max-height: 50px !important;
    width: auto !important;
    height: auto !important;
    margin-right: 10px;
    object-fit: contain !important;
}
/* SVG Logo Support */
.navbar-brand svg {
    max-height: 50px !important;
    width: auto !important;
    margin-right: 10px;
}
/* Brand Text */
.navbar-brand {
    font-size: 2rem;
    display: flex !important;
    align-items: center;
}
.brand-text {
    font-size: 1.75rem;
    font-weight: 800;  /* Increased from 700 for extra boldness */
    color: #fff;
    display: flex;
    align-items: center;
    height: 50px;
    text-transform: uppercase;  /* Make text uppercase for more impact */
    letter-spacing: 1px;  /* Add letter spacing for clarity */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);  /* Subtle shadow for depth */
    font-family: 'Helvetica Neue', Arial, sans-serif;  /* Clean, modern font */
}
/* Main Menu Styling */
#main-nav .navbar-nav .nav-item .nav-link {
    font-size: 1.5rem;
    font-weight: 700;
}
#main-nav .navbar-nav .nav-item .dropdown-menu .dropdown-item {
    font-size: 1.25rem;
}
/* Mobile adjustments */
@media (max-width: 767.98px) {
    .navbar-brand {
        font-size: 1.5rem;
    }
	.brand-text {
        font-size: 1.5rem;
        height: auto;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);  /* Smaller shadow for mobile */
    }
    .navbar-toggler {
        height: 50px; /* Match the logo height */
        display: flex;
        align-items: center;
    }

	.navbar-brand:hover .brand-text {
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}
}
</style>