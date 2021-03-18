<?php
/**
 * Timeline Template Style One
 *
 * @package Radiantthemes
 */

$tem = $this->t;
if ( $tem % 2 ) {

	// FIRST ITEM.
	$output         .= '<!-- radiantthemes-timeline-item -->';
	$output         .= '<div class="radiantthemes-timeline-item">';
		$output     .= '<div class="radiantthemes-timeline-item-line"></div>';
		$output     .= '<div class="radiantthemes-timeline-item-dot"></div>';
		$output     .= '<div class="row">';
			$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
	if ( wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'large' ) ) {
		$output     .= '<div class="radiantthemes-timeline-item-pic wow fadeInLeft">';
			$output .= wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'large' );
		$output     .= '</div>';
	}
			$output         .= '</div>';
			$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				$output     .= '<div class="radiantthemes-timeline-item-data">';
					$output .= '<h4 style="' . $this->timeline_title_font_inline_style . $this->timeline_title_font_container . $this->timeline_title_font_weight_style . '" class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
					$output .= '<div style="' . $this->timeline_date_font_inline_style . $this->timeline_date_font_container . $this->timeline_date_font_weight_style . '" class="date-stamp">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . ' ' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</div>';
					$output .= '<div style="' . $this->timeline_content_font_inline_style . $this->timeline_content_font_container . $this->timeline_content_font_weight_style . '">' . $content . '</div>';
				$output     .= '</div>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</div>';
	$output                 .= '<!-- radiantthemes-timeline-item -->';


} else {

	// SECOND ITEM.
	$output                 .= '<!-- radiantthemes-timeline-item -->';
	$output                 .= '<div class="radiantthemes-timeline-item">';
		$output             .= '<div class="radiantthemes-timeline-item-line"></div>';
		$output             .= '<div class="radiantthemes-timeline-item-dot"></div>';
		$output             .= '<div class="row">';
			$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
				$output     .= '<div class="radiantthemes-timeline-item-data">';
					$output .= '<h4 style="' . $this->timeline_title_font_inline_style . $this->timeline_title_font_container . $this->timeline_title_font_weight_style . '" class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
					$output .= '<div style="' . $this->timeline_date_font_inline_style . $this->timeline_date_font_container . $this->timeline_date_font_weight_style . '" class="date-stamp">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . ' ' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</div>';
					$output .= '<div style="' . $this->timeline_content_font_inline_style . $this->timeline_content_font_container . $this->timeline_content_font_weight_style . '">' . $content . '</div>';
				$output     .= '</div>';
			$output         .= '</div>';
			$output         .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
	if ( wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'large' ) ) {
		$output     .= '<div class="radiantthemes-timeline-item-pic wow fadeInRight">';
			$output .= wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'large' );
		$output     .= '</div>';
	}
			$output .= '</div>';
		$output     .= '</div>';
	$output         .= '</div>';
	$output         .= '<!-- radiantthemes-timeline-item -->';

}$tem++;
$this->t = $tem;
