<?php
/**
 * Template for Blog Item Three.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output                 .= '<!-- blog-item -->';
$output                 .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
	$output             .= '<div class="holder">';
		$output         .= '<div class="pic">';
			$output     .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
		$output         .= '</div>';
		$output         .= '<div class="data">';
			$output     .= '<ul class="meta">';
				$output .= '<li class="date" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '">' . get_the_date() . '</li>';
			$output     .= '</ul>';
			$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
		$output         .= '</div>';
	$output             .= '</div>';
$output                 .= '</article>';
$output                 .= '<!-- blog-item -->';
