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
        <!-- Single navbar brand -->
        <a class="navbar-brand fw-bold" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
            <?php bloginfo( 'name' ); ?>
        </a>

        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Main Menu -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'navbarNavDropdown',
                'menu_class'      => 'navbar-nav ms-auto fw-bold',
                'fallback_cb'     => '',
                'menu_id'         => 'main-menu',
                'depth'           => 2,
                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
        );
        ?>
    </div>
</nav>

<style>
/* Brand text styling */
.navbar-brand {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin: 0;
    padding: 1rem 0;
    white-space: normal; /* Allows text to wrap */
    line-height: 1.2;
    max-width: 200px; /* Adjust based on your needs */
}

/* Navigation items */
.navbar-nav .nav-link {
    font-weight: 700;
    padding-left: 1rem;
    padding-right: 1rem;
}

/* Navbar adjustment */
.navbar {
    padding: 0.5rem 0;
}

/* Mobile adjustments */
@media (max-width: 767.98px) {
    .navbar-brand {
        font-size: 1.5rem;
        max-width: 150px;
    }
}
</style>