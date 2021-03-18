<?php
/**
 * Template Highlight Box Style One.
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= wp_get_attachment_image( $shortcode['highlight_box_image'], 'full' );
$output .= '</div>';
$output .= '<div class="data matchHeight">';
$output .= '<h4 style="' . $highlight_box_title_font_inline_style . '">' . esc_attr( $shortcode['highlight_box_title'] ) . '</h4>';
$output .= '<p style="' . $highlight_box_content_font_inline_style . '">' . esc_attr( $shortcode['highlight_box_content'] ) . '</p>';
$output .= '<a style="' . $highlight_box_link_font_inline_style . '" class="btn" href="' . esc_url( $highlight_box_url ) . '" target="' . esc_html( $highlight_box_target ) . '" rel="' . esc_html( $highlight_box_rel ) . '">' . esc_attr( $highlight_box_title ) . '</a>';
$output .= '</div>';
$output .= '</div>';
