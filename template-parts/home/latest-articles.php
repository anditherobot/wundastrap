<section class="latest-articles py-5">
    <div class="container">
        <h2>Latest Articles</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6, // Adjust the number of articles to display
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $latest_articles = new WP_Query( $args );

            if ( $latest_articles->have_posts() ) :
                while ( $latest_articles->have_posts() ) : $latest_articles->the_post();
                    ?>
                    <div class="col">
                        <div class="card h-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Published on <?php the_date(); ?></small>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e( 'No latest articles found.', 'your-theme-textdomain' ); ?></p>
                <?php
            endif;
            ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="btn btn-outline-secondary">View All Articles</a>
        </div>
    </div>
</section>

<style>
    /* template-parts/home/latest-articles.css */

.latest-articles .card-img-top {
    object-fit: cover; /* Ensure images fill the space without distortion */
    height: 200px; /* Adjust as needed */
}

.latest-articles .card-title {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.latest-articles .card-text {
    font-size: 1rem;
    color: #6c757d; /* Example muted text color */
}

/* Optional: Style the "View All Articles" button further */
</style>