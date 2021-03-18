<?php
/**
 * Template for Blog Item Three.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output             .= '<!-- blog-item -->';
$output             .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
	$output         .= '<div class="holder matchHeight">';
		$output     .= '<div class="pic">';
			$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
		$output     .= '</div>';
		$output     .= '<div class="title">';
			$output .= '<h4 class="title" style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
		$output     .= '</div>';
		$output .= '<div class="meta">';
			$output .= '<ul>';
				$output .= '<li class="date" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '">' . get_the_date() . '</li>';
			$output .= '</ul>';
		$output .= '</div>';
		$output     .= '<div class="data">';
			$output .= '<p class="excerpt" style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '">' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '...</p>';
		$output     .= '</div>';
		$output     .= '<div class="more">';
			$output .= '<a class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Continue Reading', 'radiantthemes-addons' ) . '</span><span class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>';
		$output     .= '</div>';
	$output         .= '</div>';
$output             .= '</article>';
$output             .= '<!-- blog-item -->';
