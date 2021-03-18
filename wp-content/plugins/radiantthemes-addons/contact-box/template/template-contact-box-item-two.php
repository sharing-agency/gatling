<?php
/**
 * Template for Contact Box Element Two.
 *
 * @package RadiantThemes
 */

$output .= '<ul style="' . $contact_box_font_inline_style . $contact_box_font_container . $contact_box_weight_style . '" class="contact">';
if ( $shortcode['contact_box_address'] ) {
	$output .= '<li class="address"><span class="ti-location-pin"></span>' . $shortcode['contact_box_address'] . '</li>';
}
if ( $shortcode['contact_box_email'] ) {
	$output .= '<li class="email"><span class="ti-email"></span>' . $shortcode['contact_box_email'] . '</li>';
}
if ( $shortcode['contact_box_phone'] ) {
	$output .= '<li class="phone"><span class="ti-mobile"></span>' . $shortcode['contact_box_phone'] . '</li>';
}
if ( $shortcode['contact_box_fax'] ) {
	$output .= '<li class="fax"><span class="ti-printer"></span>' . $shortcode['contact_box_fax'] . '</li>';
}
if ( $shortcode['contact_box_whatsapp'] ) {
	$output .= '<li class="whatsapp"><i class="fa fa-whatsapp"></i>' . $shortcode['contact_box_whatsapp'] . '</li>';
}
$output .= '</ul>';
