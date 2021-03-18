<?php
/**
 * Template Style One for Team
 *
 * @package RadiantThemes
 */

$output         .= '<!-- team-item -->' . "\r";
$output         .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
	$output     .= '<div class="holder">';
		$output .= '<div class="pic">';
			if ( 'yes' === $shortcode['team_enable_link'] ) {
				$output .= '<a class="placeholder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
			} else {
				$output .= '<div class="placeholder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></div>';
			}
		$output     .= '</div>';
		$output     .= '<div class="data">';
			$terms   = get_the_terms( get_the_ID(), 'profession' );
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$output .= '<p style="' . $team_designation_font_inline_style . $team_designation_font_container . $team_designation_weight_style . '" class="designation">' . $term->name . '</p>';
				}
			}
			if ( 'yes' === $shortcode['team_enable_link'] ) {
				$output .= '<h4 class="title" style="' . $team_title_font_inline_style . $team_title_font_container . $team_title_weight_style . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			} else {
				$output .= '<h4 class="title" style="' . $team_title_font_inline_style . $team_title_font_container . $team_title_weight_style . '">' . get_the_title() . '</h4>';
			}
		$output .= '</div>';
	$output     .= '</div>';
$output         .= '</div>';
$output         .= '<!-- team-item -->' . "\r";
