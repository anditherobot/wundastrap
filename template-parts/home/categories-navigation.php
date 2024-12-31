<section class="categories-navigation py-4">
    <div class="container">
        <h2>Explore Categories</h2>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
            <?php
            $categories = get_categories( array(
                'orderby'   => 'name',
                'order'     => 'ASC',
                'hide_empty' => 1, // Set to 0 to show categories with no posts
            ) );

            if ( ! empty( $categories ) ) :
                foreach ( $categories as $category ) :
                    ?>
                    <div class="col">
                        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn btn-outline-secondary btn-sm w-100">
                            <?php echo esc_html( $category->name ); ?>
                        </a>
                    </div>
                    <?php
                endforeach;
            else :
                ?>
                <p><?php esc_html_e( 'No categories found.', 'your-theme-textdomain' ); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>