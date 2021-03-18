<?php
/**
 * Accordion Template Style Three
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-accordion-item">';
$output .= '<div class="radiantthemes-accordion-item-title">';
$output .= '<div class="radiantthemes-accordion-item-title-icon"><div class="line"></div></div>';
$output .= '<h4 style="' . esc_attr( $this->radiant_accordion_title_font_inline_style ) . ' ' . esc_attr( $this->title_font_container ) . esc_attr( $this->title_font_weight_style ) . '" class="panel-title">' . esc_attr( $shortcode['accordion_item_title'] ) . '</h4>';
$output .= '</div>';
$output .= '<div style="' . esc_attr( $this->radiant_accordion_content_font_inline_style ) . ' ' . esc_attr( $this->content_font_container ) . esc_attr( $this->content_font_weight_style ) . '" class="radiantthemes-accordion-item-body">';
$output .= $content;
$output .= '</div>';
$output .= '</div>';
