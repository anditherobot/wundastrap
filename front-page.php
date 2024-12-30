<?php
/**
 * Front Page Template
 *
 * @package your-theme-name (replace with your actual theme name)
 */

get_header();
?>

<div class="wrapper" id="page-wrapper">

    <div class="container" id="content">

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">

                    <section class="hero">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="placeholder-box">
                                    <div class="placeholder-image ratio ratio-16x9">
                                        <!-- Featured Article Image -->
                                    </div>
                                    <h2><!-- Featured Article Title --></h2>
                                    <p><!-- Featured Article Excerpt --></p>
                                    <a href="#" class="btn btn-primary"><!-- Read More Link --></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="placeholder-box small-feature">
                                    <!-- Small Feature/Call to Action 1 -->
                                </div>
                                <div class="placeholder-box small-feature">
                                    <!-- Small Feature/Call to Action 2 -->
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="latest-articles">
                        <h2>Latest Articles</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="placeholder-box article-preview">
                                    <div class="placeholder-image ratio ratio-4x3">
                                        <!-- Article Thumbnail -->
                                    </div>
                                    <h3><!-- Article Title --></h3>
                                    <p><!-- Article Excerpt --></p>
                                    <a href="#"><!-- Read More Link --></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="placeholder-box article-preview">
                                    <div class="placeholder-image ratio ratio-4x3">
                                        <!-- Article Thumbnail -->
                                    </div>
                                    <h3><!-- Article Title --></h3>
                                    <p><!-- Article Excerpt --></p>
                                    <a href="#"><!-- Read More Link --></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="placeholder-box article-preview">
                                    <div class="placeholder-image ratio ratio-4x3">
                                        <!-- Article Thumbnail -->
                                    </div>
                                    <h3><!-- Article Title --></h3>
                                    <p><!-- Article Excerpt --></p>
                                    <a href="#"><!-- Read More Link --></a>
                                </div>
                            </div>
                            <!-- Add more article previews here -->
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-outline-secondary">View All Articles</a>
                        </div>
                    </section>

                    <section class="categories-navigation">
                        <h2>Explore Categories</h2>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="placeholder-box category-link">
                                    <!-- Category Link -->
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="placeholder-box category-link">
                                    <!-- Category Link -->
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="placeholder-box category-link">
                                    <!-- Category Link -->
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="placeholder-box category-link">
                                    <!-- Category Link -->
                                </div>
                            </div>
                            <!-- Add more category links here -->
                        </div>
                    </section>

                    <section class="trending-articles">
                        <h2>Trending Now</h2>
                        <div class="placeholder-box">
                            <ul>
                                <li><!-- Trending Article Link --></li>
                                <li><!-- Trending Article Link --></li>
                                <li><!-- Trending Article Link --></li>
                            </ul>
                        </div>
                    </section>

                    <section class="search-bar">
                        <h2>Search</h2>
                        <div class="placeholder-box">
                            <!-- Search Form -->
                        </div>
                    </section>

                    <section class="featured-categories">
                        <h2>Featured Categories</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="placeholder-box featured-category">
                                    <div class="placeholder-image ratio ratio-16x9">
                                        <!-- Category Image -->
                                    </div>
                                    <h3><!-- Category Title --></h3>
                                    <p><!-- Category Description --></p>
                                    <a href="#"><!-- View Category Link --></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="placeholder-box featured-category">
                                    <div class="placeholder-image ratio ratio-16x9">
                                        <!-- Category Image -->
                                    </div>
                                    <h3><!-- Category Title --></h3>
                                    <p><!-- Category Description --></p>
                                    <a href="#"><!-- View Category Link --></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="newsletter-signup">
                        <h2>Subscribe to Our Newsletter</h2>
                        <div class="placeholder-box">
                            <!-- Newsletter Form -->
                        </div>
                    </section>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<style>
    /* Basic Placeholder Styling */
    .placeholder-box {
        background-color: #f0f0f0;
        border: 1px dashed #ccc;
        padding: 15px;
        margin-bottom: 20px;
        text-align: center;
    }

    .placeholder-image {
        background-color: #ddd;
        margin-bottom: 10px;
    }

    .small-feature {
        height: 100px; /* Example height */
    }

    .article-preview .placeholder-image {
        height: 150px; /* Example height */
    }

    .category-link {
        height: 50px; /* Example height */
        line-height: 50px;
    }

    .featured-category .placeholder-image {
        height: 200px; /* Example height */
    }
</style>

<?php
get_footer();