<?php
/**
 * Template for Blog Item Seven.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output             .= '<!-- blog-item -->';
$output             .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
	$output         .= '<div class="holder">';
		$output     .= '<div class="pic">';
			$output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
			$output .= '<a class="pic-overlay" href="' . get_the_permalink() . '"><i class="fa fa-long-arrow-right"></i></a>';
		$output     .= '</div>';
		$output     .= '<div class="data">';
			$output .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output .= '<p class="excerpt" style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '">' . substr( get_the_excerpt(), 0, 150 ) . '...</p>';
		$output     .= '</div>';
	$output         .= '</div>';
$output             .= '</article>';
$output             .= '<!-- blog-item -->';
