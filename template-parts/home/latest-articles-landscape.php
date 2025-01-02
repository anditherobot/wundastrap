<section class="latest-articles py-5">
    <div class="container">
        <h2 class="text-center mb-4">Dènye piblikasyon</h2>
        
        <!-- 2 columns on md and up, 1 column on smaller screens -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 12, // Adjust as needed
            );
            $latest_articles_query = new WP_Query($args);

            if ($latest_articles_query->have_posts()):
                while ($latest_articles_query->have_posts()):
                    $latest_articles_query->the_post();
                    ?>
                    
                    <div class="col">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm hover-card rounded">

                                <?php if (has_post_thumbnail()): ?>
                                    <img 
                                        src="<?php the_post_thumbnail_url('large'); ?>" 
                                        class="card-img-top" 
                                        alt="<?php the_title_attribute(); ?>"
                                    >
                                <?php else: ?>
                                    <!-- Fallback if no featured image -->
                                    <div class="card-img-top bg-grey-gradient d-flex align-items-center justify-content-center">
                                        <span class="text-dark fw-bold">No Image</span>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body p-3">
                                    <h3 class="card-title  fw-bold "><?php the_title(); ?></h3>
                                  
                                </div>
                            </div>
                        </a>
                    </div><!-- /.col -->
                    
                <?php
                endwhile;
                wp_reset_postdata();
            else:
                ?>
                <p class="text-center">
                    <?php esc_html_e('No articles found.', 'your-theme-textdomain'); ?>
                </p>
            <?php endif; ?>
        </div><!-- /.row -->

        <div class="text-center mt-4">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"
               class="btn btn-outline-primary">
                View All Articles
            </a>
        </div>
    </div><!-- /.container -->
</section>

<style>
.latest-articles {
  background-color: #f8f9fa !important;
  padding: 50px 0 !important;
}

.latest-articles h2 {
  margin-bottom: 30px !important;
  text-align: center !important;
}

.latest-articles .card {
  border: 1px solid #dee2e6 !important;
}

/* 
  Default <img> styles. 
  We’ll override them for specific orientation classes below.
*/
.latest-articles .card-img-top {
  display: block;
  margin: 0 auto;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

/* If there's no thumbnail, we show a gradient box */
.latest-articles .bg-grey-gradient {
  background: linear-gradient(135deg, #d3d3d3, #f0f0f0) !important;
  width: 100%;
  height: 250px; 
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

/* Title styling */
.latest-articles .card-title {
  font-size: 1.4rem !important; 
  margin-top: 0 !important;
  margin-bottom: 0.5rem;
}

/* 
  Hover effect (if you still want it).
*/
.hover-card {
  transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease !important;
  background-color: #fff !important;
}
.hover-card:hover {
  transform: scale(1.02) !important;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08) !important;
  opacity: 0.98 !important;
}

/* 
  -- Orientation Classes --

  .landscape:
    Force a specific height and let the width fill the card 
    with an object-fit. This is nice if you prefer uniform 
    card heights for landscape images.
*/
.latest-articles .landscape {
  width: 100%;
  height: 250px;     /* or whatever consistent height you prefer */
  object-fit: cover; /* fill the box, cropping edges if necessary */
}

/* 
  .portrait:
    Let portrait images be displayed at full width,
    with an auto height so there's no distortion. 
    If they’re narrower, they’ll just center in the card. 
*/
.latest-articles .portrait {
  width: 100%;
  height: auto;
  object-fit: contain; /* or 'scale-down' if you want them to shrink instead of crop */
}

/* 
  Responsive adjustments
*/
@media (max-width: 768px) {
  .latest-articles .card-title {
    font-size: 1rem !important;
  }
}
</style>

</style>
