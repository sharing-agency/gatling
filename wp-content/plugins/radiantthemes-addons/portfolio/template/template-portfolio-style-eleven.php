<?php
/**
 * Template for Portfolio Style Eleven
 *
 * @package RadiantThemes
 */
$k = 1;
if ( 'all' == $shortcode['portfolio_category'] || '' == $shortcode['portfolio_category'] ) {
	$portfolio_category = '';
} else {
	$portfolio_category = array(
		array(
			'taxonomy' => 'portfolio-category',
			'field'    => 'slug',
			'terms'    => esc_attr( $shortcode['portfolio_category'] ),
		),
	);
	$hidden_filter      = 'hidden';
}
$output  = '<!-- rt-portfolio-box -->';
$output .= '<div class="rt-portfolio-box element-eleven row isotope ' . $random_class . '">';
// WP_Query arguments.
global $wp_query;
$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $shortcode['portfolio_max_posts'] ),
	'orderby'        => esc_attr( $shortcode['portfolio_looping_order'] ),
	'order'          => esc_attr( $shortcode['portfolio_looping_sort'] ),
	'offset'         => esc_attr( $shortcode['portfolio_looping_offset'] ),
	'tax_query'      => $portfolio_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		// include file with color sanitization functions.
		if ( ! function_exists( 'sanitize_hex_color' ) ) {
			include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
		}

		// fetch and sanitize the colors.
		$background_color = sanitize_hex_color( get_post_meta( get_the_id(), 'radiant_pc_primary_color', true ) );

		// include file with color sanitization functions.
		if ( ! function_exists( 'sanitize_hex_color' ) ) {
			include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
		}

		// fetch and sanitize the colors.
		$background_color = sanitize_hex_color( get_post_meta( get_the_id(), 'radiant_pc_primary_color', true ) );

		$output .= '<!-- rt-portfolio-box-item -->';
		$output .= '<div class="rt-portfolio-box-item small-box col-lg-4 col-md-4 col-sm-6 col-xs-12 ';
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$output .= $term->slug . ' ';
			}
		}
		$output                 .= '">';
			$output             .= '<div class="holder">';
				$output         .= '<div class="pic">';
					$output     .= get_the_post_thumbnail( get_the_ID(), 'large' );
				$output         .= '</div>';
				$output         .= '<div class="data">';
					$output     .= '<h4 style="' . $portfolio_title_font_inline_style . $portfolio_title_font_container . $portfolio_title_weight_style . '" class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
					$output     .= '<div class="excerpt">';
						$output .= get_the_excerpt();
					$output     .= '</div>';
		if ( $shortcode['add_link'] ) {
			$output .= '<a class="btn btn-link" href="' . get_the_permalink() . '"><span class="ti-plus"></span></a>';
		}
		if ( $shortcode['add_zoom'] ) {
			$output .= '<a class="btn btn-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><span class="ti-zoom-in"></span></a>';
		}
				$output .= '</div>';
			$output     .= '</div>';
		$output         .= '</div>';
		$output         .= '<!-- rt-portfolio-box-item -->';

	endwhile;
}
$output .= '</div><!-- rt-portfolio-box -->';
