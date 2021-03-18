<?php
/**
 * Template for Blog Item Two.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output                 .= '<!-- blog-item -->';
$output                 .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
	$output             .= '<div class="holder matchHeight">';
		$output         .= '<div class="data">';
			$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output     .= '<p class="excerpt" style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '">' . substr( get_the_excerpt(), 0, 230 ) . '...</p>';
			$output     .= '<div class="author-meta">';
				$output .= '<div class="author-meta-pic" style="background-image:url(' . get_avatar_url( get_the_author_meta( 'ID' ), 32 ) . ');"></div>';
				$output .= '<div class="author-meta-data" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '">' . esc_html__( ' by ', 'radiantthemes-addon' ) . get_the_author() . '</div>';
			$output     .= '</div>';
		$output         .= '</div>';
	$output             .= '</div>';
$output                 .= '</article>';
$output                 .= '<!-- blog-item -->';
