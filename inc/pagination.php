<?php
/**
 * Pagination layout for front page
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_pagination' ) ) {
	function understrap_pagination() {
		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

        // Determine the current page.
        $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

		$args = array(
			'prev_text'   => '«',
			'next_text'   => '»',
			'type'        => 'array', // Ensure paginate_links returns an array.
			'current'     => $paged,
			'total'       => $wp_query->max_num_pages,
		);

		$links = paginate_links( $args );

		if ( $links ) :
			?>
			<nav class="pagination-container" aria-label="Posts navigation">
				<ul class="pagination">
					<?php
					foreach ( $links as $link ) {
						$classes = 'page-item';
						if ( strpos( $link, 'current' ) !== false ) {
							$classes .= ' active';
						} elseif ( strpos( $link, 'dots' ) !== false ) {
							$classes .= ' disabled';
						}
						$link = str_replace( 'page-numbers', 'page-link', $link );
						printf( '<li class="%1$s">%2$s</li>', esc_attr( $classes ), wp_kses_post( $link ) );
					}
					?>
				</ul>
			</nav>
			<?php
		endif;
	}
}
?>
