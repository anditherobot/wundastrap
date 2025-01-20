<?php
/**
 * Template Part: Category List
 *
 * Displays a list of categories.
 */

$categories = get_categories();

if ( $categories ) :
    ?>
    <ul>
        <?php foreach ( $categories as $category ) : ?>
            <li>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                   title="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'your-theme' ), $category->name ) ); ?>">
                    <?php echo esc_html( $category->name ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
endif;
?>