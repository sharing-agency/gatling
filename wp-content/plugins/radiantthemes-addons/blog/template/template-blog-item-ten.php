<?php
/**
 * Template for Blog Item Ten.
 *
 * @package RadiantThemes
 */

if ( has_post_format( 'image' ) ) {

	// POST FORMAT IMAGE.
	$output                 .= '<!-- blog-item -->';
	$output                 .= '<article class="blog-item post-format-image ' . $rt_animation . '" ' . $time . '>';
		$output             .= '<div class="holder">';
			$output         .= '<div class="pic">';
				$output     .= '<a class="holder" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $query->ID, 'medium' ) . '</a>';
			$output         .= '</div>';
			$output         .= '<div class="data">';
				$output     .= '<ul class="meta-data">';
					$output .= '<li class="date" style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '"><span class="ti-calendar"></span> ' . get_the_date() . '</li>';
				$output     .= '</ul>';
				$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</article>';
	$output                 .= '<!-- blog-item -->';

} elseif ( has_post_format( 'quote' ) ) {

	// POST FORMAT QUOTE.
	$output                 .= '<!-- blog-item -->';
	$output                 .= '<article class="blog-item post-format-quote ' . $rt_animation . '" ' . $time . '>';
		$output             .= '<div class="holder">';
			$output         .= '<div class="pic">';
				$output     .= '<a class="holder" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $query->ID, 'medium' ) . '</a>';
			$output         .= '</div>';
			$output         .= '<div class="data">';
				$output     .= '<ul class="meta-data">';
					$output .= '<li style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" class="date"><span class="ti-calendar"></span> ' . get_the_date() . '</li>';
				$output     .= '</ul>';
				$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</article>';
	$output                 .= '<!-- blog-item -->';

} elseif ( has_post_format( 'status' ) ) {

	// POST FORMAT STATUS.
	$output                 .= '<!-- blog-item -->';
	$output                 .= '<article class="blog-item post-format-status ' . $rt_animation . '" ' . $time . '>';
		$output             .= '<div class="holder">';
			$output         .= '<div class="data">';
				$output     .= '<ul class="meta-data">';
					$output .= '<li style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" class="date"><span class="ti-calendar"></span> ' . get_the_date() . '</li>';
				$output     .= '</ul>';
				$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				$output     .= '<p style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '" class="excerpt">' . get_the_excerpt() . '</p>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</article>';
	$output                 .= '<!-- blog-item -->';

} else {

	// POST FORMAT STANDARD.
	$output     .= '<!-- blog-item -->';
	$output     .= '<article class="blog-item post-format-standard ' . $rt_animation . '" ' . $time . '>';
		$output .= '<div class="holder">';
	if ( has_post_thumbnail() ) {
		$output     .= '<div class="pic">';
			$output .= '<a class="holder" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $query->ID, 'medium' ) . '</a>';
		$output     .= '</div>';
	}
			$output         .= '<div class="data">';
				$output     .= '<ul class="meta-data">';
					$output .= '<li style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" class="date"><span class="ti-calendar"></span> ' . get_the_date() . '</li>';
				$output     .= '</ul>';
				$output     .= '<h4 class="title"><a style="' . $blog_title_font_inline_style . ' ' . $blog_title_font_container . $blog_title_weight_style . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
				$output     .= '<p style="' . $blog_content_font_inline_style . ' ' . $blog_content_font_container . $blog_content_weight_style . '" class="excerpt">' . get_the_excerpt() . '</p>';
			$output         .= '</div>';
			$output         .= '<div class="more">';
				$output     .= '<a style="' . $blog_tag_font_inline_style . ' ' . $blog_tag_font_container . $blog_tag_weight_style . '" class="btn" href="' . get_the_permalink() . '">' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</a>';
			$output         .= '</div>';
		$output             .= '</div>';
	$output                 .= '</article>';
	$output                 .= '<!-- blog-item -->';

}
