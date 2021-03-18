<?php
/**
 * Template for Blog Item Eight.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output             .= '<!-- blog-item -->';
$output             .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
	$output         .= '<div class="holder">';
		$output     .= '<div class="pic">';
			$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
		$output     .= '</div>';
		$output     .= '<div class="data">';
			$output .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output .= '<p class="excerpt" style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '">' . get_the_excerpt() . '</p>';
		$output     .= '</div>';
		$output     .= '<div class="more">';
			$output .= '<a style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" class="btn" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</span></a>';
		$output     .= '</div>';
	$output         .= '</div>';
$output             .= '</article>';
$output             .= '<!-- blog-item -->';
