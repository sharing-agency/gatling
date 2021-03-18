<?php
/**
 * Template for Contact Box Element One.
 *
 * @package RadiantThemes
 */

$output .= '<ul style="' . $contact_box_font_inline_style . $contact_box_font_container . $contact_box_weight_style . '" class="contact">';
if ( $shortcode['contact_box_address'] ) {
	$output .= '<li class="address"><span class="ti-location-pin"></span><strong>' . esc_html__( 'Address', 'radiantthemes-addons' ) . '</strong> ' . $shortcode['contact_box_address'] . '</li>';
}
if ( $shortcode['contact_box_email'] ) {
	$output .= '<li class="email"><span class="ti-email"></span><strong>' . esc_html__( 'Email', 'radiantthemes-addons' ) . '</strong> ' . $shortcode['contact_box_email'] . '</li>';
}
if ( $shortcode['contact_box_phone'] ) {
	$output .= '<li class="phone"><span class="ti-mobile"></span><strong>' . esc_html__( 'Phone', 'radiantthemes-addons' ) . '</strong> ' . $shortcode['contact_box_phone'] . '</li>';
}
if ( $shortcode['contact_box_fax'] ) {
	$output .= '<li class="fax"><span class="ti-printer"></span><strong>' . esc_html__( 'Fax', 'radiantthemes-addons' ) . '</strong> ' . $shortcode['contact_box_fax'] . '</li>';
}
if ( $shortcode['contact_box_whatsapp'] ) {
	$output .= '<li class="whatsapp"><i class="fa fa-whatsapp"></i><strong>' . esc_html__( 'WhatsApp', 'radiantthemes-addons' ) . '</strong> ' . $shortcode['contact_box_whatsapp'] . '</li>';
}
$output .= '</ul>';
