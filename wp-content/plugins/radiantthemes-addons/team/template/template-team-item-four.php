<?php
/**
 * Template Style Four for Team
 *
 * @package RadiantThemes
 */

$output         .= '<!-- team-item -->' . "\r";
$output         .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
	$output     .= '<div class="holder">';
		$output .= '<div class="pic">';
			$output .= '<div class="placeholder">';
				if ( 'yes' === $shortcode['team_enable_link'] ) {
					$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
				} else {
					$output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
				}
			$output     .= '</div>';
		$output     .= '</div>';
		$output     .= '<div class="data">';
			if ( 'yes' === $shortcode['team_enable_link'] ) {
				$output .= '<h4 class="title" style="' . $team_title_font_inline_style . $team_title_font_container . $team_title_weight_style . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			} else {
				$output .= '<h4 class="title">' . get_the_title() . '</h4>';
			}
			$terms   = get_the_terms( get_the_ID(), 'profession' );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p style="' . $team_designation_font_inline_style . $team_designation_font_container . $team_designation_weight_style . '" class="designation">' . $term->name . '</p>';
				}
			}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
$output         .= '<!-- team-item -->' . "\r";
