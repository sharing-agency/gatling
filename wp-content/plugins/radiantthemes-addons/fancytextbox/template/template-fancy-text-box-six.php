<?php
/**
 * Fancy Text Box Template Style Six
 *
 * @package RadiantThemes
 */

$output     .= '<div class="holder ' . esc_attr( $fancy_css ) . '" style="background-image:url(' . wp_get_attachment_image_url( $shortcode['fancy_textbox_image'], 'large' ) . ');">';
	$output .= '<div class="main-placeholder">';
if ( $shortcode['fancy_textbox_icontype'] == 'image' && $shortcode['fancy_textbox_image'] !== '' ) {
}
if ( $shortcode['fancy_textbox_icontype'] == 'icon' && $shortcode['fancy_textbox_icon_icofont'] !== '' ) {
	$output     .= '<div class="icon">';
		$output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
	$output     .= '</div>';
}
		$output .= '<div class="data">';
if ( $shortcode['fancy_textbox_title'] !== '' ) {
	if ( esc_url( $fancy_textbox_link_url ) !== '' ) {
		$output .= '<h4 style="' . $fancy_title_font_inline_style . $fancy_title_font_container . $fancy_title_weight_style . '" class="title"><a href="' . esc_url( $fancy_textbox_link_url ) . '" ' . $fancy_textbox_link_target . '' . $fancy_textbox_link_rel . '>' . esc_attr( $shortcode['fancy_textbox_title'] ) . '</a></h4>';
	} else {
		$output .= '<h4 style="' . $fancy_title_font_inline_style . $fancy_title_font_container . $fancy_title_weight_style . '" class="title">' . esc_attr( $shortcode['fancy_textbox_title'] ) . '</h4>';
	}
}
if ( $shortcode['fancy_textbox_subtitle'] !== '' ) {
	$output .= '<p style="' . $fancy_sub_title_font_inline_style . $fancy_sub_title_font_container . $fancy_subtitle_weight_style . '" class="subtitle">' . esc_attr( $shortcode['fancy_textbox_subtitle'] ) . '</p>';
}
if ( $shortcode['fancy_textbox_content'] !== '' ) {
	$output     .= '<div style="' . $fancy_content_font_inline_style . $fancy_content_font_container . $fancy_content_weight_style . '" class="content">';
		$output .= '<p>' . wp_kses_post( $shortcode['fancy_textbox_content'] ) . '</p>';
	$output     .= '</div>';
}
if ( esc_url( $fancy_textbox_link_url ) !== '' ) {
	$output         .= '<div class="more">';
		$output     .= '<a style="' . $fancy_link_font_inline_style . $fancy_link_font_container . $fancy_link_weight_style . '" class="btn" href="' . esc_url( $fancy_textbox_link_url ) . '" ' . $fancy_textbox_link_target . '' . $fancy_textbox_link_rel . '>';
			$output .= '<span class="btn-icon-first ti-angle-right"></span>';
			$output .= '<span class="btn-icon-second ti-arrow-right"></span>';
		$output     .= '</a>';
	$output         .= '</div>';
}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
