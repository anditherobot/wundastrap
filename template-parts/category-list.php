<?php
/**
 * Template Part: Category List
 *
 * Displays a list of categories as a compact subnav using Bootstrap 5.
 */

$categories = get_categories();

if ( $categories ) :
    ?>
    <ul class="nav nav-pills justify-content-center custom-category-list mb-4">
        <?php foreach ( $categories as $category ) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                   title="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'your-theme' ), $category->name ) ); ?>">
                    <?php echo esc_html( $category->name ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
endif;
?>

<style>
    .custom-category-list {
        display: flex; 
        gap: 4px; 
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px; 
    }

    .custom-category-list .nav-link {
        font-size: 13px; 
        padding: 4px 6px; 
        background-color: transparent; 
        color: #333; 
        border: 1px solid #ddd; 
        border-radius: 8px;
    }

    .custom-category-list .nav-link:hover {
        color: #007bff;
        background-color: lightgrey; 
    }
</style>