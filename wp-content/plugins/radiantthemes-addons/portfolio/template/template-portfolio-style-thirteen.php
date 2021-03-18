<?php
/**
 * Template for Portfolio Style Thirteen
 *
 * @package RadiantThemes
 */
$j = 0;
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
$output .= '<div class="rt-portfolio-box element-thirteen row isotope ' . $random_class . '">';
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

		$output .= '<!-- rt-portfolio-box-item -->';
		if ( 'two' == $shortcode['portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-6 col-md-6 col-sm-6 col-xs-12 ';
		} elseif ( 'three' == $shortcode['portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-4 col-md-4 col-sm-6 col-xs-12 ';
		} elseif ( 'four' == $shortcode['portfolio_row_posts'] ) {
			$output .= '<div class="rt-portfolio-box-item col-lg-3 col-md-3 col-sm-6 col-xs-12 ';
		}
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
					$output     .= '<div class="holder" style="background-color: ' . $background_color . ';">';
						$output .= '<h4 class="title"><a style="' . $portfolio_title_font_inline_style . $portfolio_title_font_container . $portfolio_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
						$output .= '<h5 style="' . $portfolio_category_font_inline_style . $portfolio_category_font_container . $portfolio_category_weight_style . '" class="categories">';
						$cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
		foreach ( $cats as $cat ) {
			$term_id    = $cat->term_id;
			$ptype_name = $cat->name;
			$ptype_des  = $cat->description;
			$ptype_slug = $cat->slug;
			$term_link  = get_term_link( $cat );
			$output    .= '<span>';
			$output    .= $ptype_name;
			$output    .= '</span>';
		}
						$output .= '</h5>';
					$output     .= '</div>';
				$output         .= '</div>';
				$output         .= '<div class="action-buttons">';
		if ( $shortcode['add_link'] ) {
			$output .= '<a class="portfolio-link" href="' . get_the_permalink() . '"><i class="fa fa-link"></i></a>';
		}
		if ( $shortcode['add_zoom'] ) {
			$output .= '<a class="portfolio-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><i class="fa fa-search"></i></a>';
		}
				$output .= '</div>';
			$output     .= '</div>';
		$output         .= '</div>';
		$output         .= '<!-- rt-portfolio-box-item -->';

	endwhile;
}
$output .= '</div><!-- rt-portfolio-box -->';
