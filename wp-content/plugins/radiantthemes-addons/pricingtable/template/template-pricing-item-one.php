<?php
/**
 * Template Style One Pricing Table
 *
 * @package RadiantThemes
 */

$output     .= '<div class="holder">';
	$output .= '<div class="heading">';
if ( ! empty( $shortcode['pricing_table_title'] ) ) {
	$output .= '<h4 style="' . $pricing_title_font_inline_style . ' ' . $pricing_title_font_container . $pricing_title_font_weight_style . '" class="title">' . $shortcode['pricing_table_title'] . '</h4>';
}
if ( ! empty( $shortcode['pricing_table_subtitle'] ) ) {
	$output .= '<p style="' . $pricing_subtitle_font_inline_style . ' ' . $pricing_subtitle_font_container . $pricing_subtitle_font_weight_style . '" class="subtitle">' . $shortcode['pricing_table_subtitle'] . '</p>';
}
	$output .= '</div>';
	$output .= '<div class="pricing">';
if ( ! empty( $shortcode['pricing_table_price'] ) ) {
	$output .= '<p style="' . $pricing_cost_font_inline_style . ' ' . $pricing_cost_font_container . $pricing_cost_font_weight_style . '" class="price"><sup style="' . $pricing_cost_font_inline_style . ' ' . $pricing_cost_font_container . $pricing_cost_font_weight_style . '">' . $shortcode['pricing_table_currency_symbol'] . '</sup>' . $shortcode['pricing_table_price'] . '</p>';
}
		$output .= '<span style="' . $pricing_cost_font_inline_style . ' ' . $pricing_cost_font_container . $pricing_cost_font_weight_style . '" class="pricing-tag">' . $shortcode['pricing_table_period'] . '</span>';
		$output .= '<div class="clearfix"></div>';
if ( ! empty( $shortcode['pricing_table_tagline'] ) ) {
	$output .= '<p style="' . $pricing_tagline_font_inline_style . ' ' . $pricing_tagline_font_container . $pricing_tagline_font_weight_style . '" class="tagline">' . $shortcode['pricing_table_tagline'] . '</p>';
}
	$output     .= '</div>';
	$output     .= '<div style="' . $pricing_content_font_inline_style . ' ' . $pricing_content_font_container . $pricing_content_font_weight_style . '" class="list">';
		$content = preg_replace( '~</?p[^>]*>~', '', $content );
		$output .= $content;
	$output     .= '</div>';
	$output     .= '<div class="more">';
		$output .= '<a style="' . $pricing_button_font_inline_style . ' ' . $pricing_button_font_container . $pricing_button_font_weight_style . '" class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '</a>';
	$output     .= '</div>';
$output         .= '</div>';
