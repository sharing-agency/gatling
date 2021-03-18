<?php
/**
 * Template for Tour One
 *
 * @package Radiantthemes
 */

$output = '<div class="style-' . esc_attr( $shortcode['tour_style_variation'] ) . '">';

$taxonomies = get_terms(
	array(
		'taxonomy'   => 'country',
		'hide_empty' => false,
		'order'      => 'DESC',
	)
);

if ( ! empty( $taxonomies ) ) :
	foreach ( $taxonomies as $category ) {
		$tour_subtitle  = get_term_meta( $category->term_id, 'tag-subtitle', true );
		$tour_duration  = get_term_meta( $category->term_id, 'tag-duration', true );
		$price          = get_term_meta( $category->term_id, 'tag-price', true );
		$featured_image = get_term_meta( $category->term_id, 'tag-image', true );

		$output .= '<h4>';
		$output .= 'Name - ' . esc_html( $category->name ) . '<br />';
		if ( $tour_subtitle ) {
			$output .= 'Subtitle - ' . esc_html( $tour_subtitle ) . '<br />';
		}if ( $category->description ) {
			$output .= 'Description - ' . esc_html( $category->description ) . '<br />';
		}
		$output .= 'Tour Duration - ' . esc_html( $tour_duration ) . '<br />';
		$output .= 'Price - ' . esc_html( $price ) . '<br />';
		if ( $featured_image ) {
		    $output .= '<a href="' . get_term_link( $category ) . '">';
			$output .= '<img src="' . esc_url( $featured_image ) . '" />';
			$output .= '</a>';
		}
		$output .= '</h4>';
		$output .= '<br />';
	}
endif;
$output .= '</div>';
