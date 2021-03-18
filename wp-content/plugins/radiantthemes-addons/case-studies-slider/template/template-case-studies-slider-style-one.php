<?php
/**
 * Template for Case Studies Slider Style One
 *
 * @package RadiantThemes
 */
if ( 'all' == $shortcode['case_studies_category'] || '' == $shortcode['case_studies_category'] ) {
	$case_studies_category = '';
} else {
	$case_studies_category = array(
		array(
			'taxonomy' => 'case-study-category',
			'field'    => 'slug',
			'terms'    => esc_attr( $shortcode['case_studies_category'] ),
		),
	);
}
$output = '<div class="radiantthemes-case-studies-slider element-one owl-carousel ' . esc_attr( $random_class ) . esc_attr( $enable_zoom ) . '" data-case-studies-loop="' . esc_attr( $shortcode['case_studies_slider_allow_loop'] ) . '" data-case-studies-autoplay="' . esc_attr( $shortcode['case_studies_slider_allow_autoplay'] ) . '" data-case-studies-autoplaytimeout="' . esc_attr( $shortcode['case_studies_slider_autoplay_timeout'] ) . '" data-case-studies-desktopitem="' . esc_attr( $shortcode['case_studies_slider_items_in_desktop'] ) . '" data-case-studies-tabitem="' . esc_attr( $shortcode['case_studies_slider_items_in_tab'] ) . '" data-case-studies-mobileitem="' . esc_attr( $shortcode['case_studies_slider_items_in_mobile'] ) . '">';

// WP_Query arguments.
global $wp_query;

$args     = array(
	'post_type'      => 'case-studies',
	'posts_per_page' => -1,
	'orderby'        => esc_attr( $shortcode['case_studies_slider_looping_order'] ),
	'order'          => esc_attr( $shortcode['case_studies_slider_looping_sort'] ),
	'tax_query'      => $case_studies_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms            = get_the_terms( get_the_ID(), 'case-study-category' );
		$output          .= '<!-- radiantthemes-case-studies-slider-item -->';
		$output          .= '<div class="radiantthemes-case-studies-slider-item">';
			$output      .= '<div class="holder">';
    			$output  .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')" href="' . get_the_permalink() . '"></div>';
				$output  .= '<div class="overlay"></div>';
				$output  .= '<div class="data">';
					$output .= '<h4 style="' . $cs_slider_title_font_inline_style . '" class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				$output  .= '</div>';
				$output  .= '<div class="action-button">';
    				if ( 'yes' === $shortcode['case_studies_slider_enable_zoom'] ) {
            			$output .= '<a class="btn btn-zoom fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><span class="ti-zoom-in"></span></a>';
            		}
            		$output .= '<a class="btn btn-link" href="' . get_the_permalink() . '"><span class="ti-link"></span></a>';
        		$output  .= '</div>';
			$output      .= '</div>';
		$output          .= '</div>';
		$output          .= '<!-- radiantthemes-case-studies-slider-item -->';
	endwhile;
}
$output .= '</div>';
