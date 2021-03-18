<?php
/**
 * Template for Blog Item One.
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
				$output .= '<li class="date" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '">' . get_the_date() . esc_html__( ' by ', 'radiantthemes-addon' ) . get_the_author() . '</li>';
			$output     .= '</ul>';
			$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output     .= '<p class="excerpt" style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '">' . substr( get_the_excerpt(), 0, 150 ) . '...</p>';
			$output     .= '<a class="btn" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" href="' . get_the_permalink() . '"><span>' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</span><span class="btn-arrow"><i class="fa fa-angle-right"></i></span></a>';
		$output         .= '</div>';
	$output             .= '</div>';
$output                 .= '</article>';
$output                 .= '<!-- blog-item -->';
