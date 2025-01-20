<?php
/**
 * Template Name: Three Recent Posts Cards
 *
 * This is a custom page template that displays the three most recent posts
 * in a card layout.
 *
 * @package your-theme
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="three-recent-posts-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-<?php the_ID(); ?> -->
					<?php endwhile; ?>

				<?php endif; ?>

				<section class="content-cards">
					<?php
					$recent_posts = new WP_Query( array(
						'posts_per_page' => 3,
					) );

					if ( $recent_posts->have_posts() ) :
						$counter = 0;
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							$counter++;
							$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
							?>

							<?php if ( 1 === $counter ) : ?>
								<div class="main-card">
									<?php if ( $featured_image_url ) : ?>
										<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
									<?php endif; ?>
									<div class="card-content">
										<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<a href="<?php the_permalink(); ?>" class="play-button">
											<?php _e( 'Read More', 'your-theme' ); ?>
										</a>
									</div>
								</div>
							<?php elseif ( $counter <= 3 ) : ?>
								<?php if ( 2 === $counter ) : ?>
									<div class="secondary-cards">
								<?php endif; ?>
									<div class="secondary-card">
										<?php if ( $featured_image_url ) : ?>
											<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
										<?php endif; ?>
										<div class="card-content">
											<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</div>
									</div>
								<?php if ( 3 === $counter ) : ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>

						<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</section>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #three-recent-posts-wrapper -->

<style>
/* Basic card styling - customize to match your theme */
.content-cards {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.main-card {
    background-color: #fca311; /* Example background color */
    border-radius: 20px;
    overflow: hidden;
    flex: 1.5;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    position: relative;
	color: white;
}

.main-card img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.9;
}

.main-card .card-content {
    padding: 20px;
    position: relative;
}

.main-card .card-title {
    font-size: 20px;
    margin-top: 0;
    margin-bottom: 15px;
    line-height: 1.2;
}

.main-card .card-title a {
	color: white;
	text-decoration: none;
}

.play-button {
    background-color: #000;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
	text-decoration: none;
}

.secondary-cards {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
}

.secondary-card {
    background-color: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
}

.secondary-card img {
    width: 100%;
    height: auto;
    aspect-ratio: 16 / 9;
    object-fit: cover;
}

.secondary-card .card-content {
    padding: 15px;
}

.secondary-card .card-title {
    font-size: 16px;
    margin: 0;
    line-height: 1.3;
}

.secondary-card .card-title a {
	color: inherit;
	text-decoration: none;
}
</style>

<?php
get_footer();