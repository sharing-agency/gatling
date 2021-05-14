<?php
/**
 * Child functions.php
 *
 * @package Vio Child
 */

/**
 * Enqueue child theme css.
 */
function vio_child_enqueue_styles() {
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'vio_child_enqueue_styles' );


function wp_trim_all_excerpt($text) {
	// Creates an excerpt if needed; and shortens the manual excerpt as well
	global $post;
  	$raw_excerpt = $text;
  	if ( '' == $text ) {
	    $text = get_the_content('');
	    $text = strip_shortcodes( $text );
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]>', $text);
  	}
	$text = strip_tags($text);
	$excerpt_length = apply_filters('excerpt_length', 20);
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); //since wp3.3
	/*$words = explode(' ', $text, $excerpt_length + 1);
	  if (count($words)> $excerpt_length) {
	    array_pop($words);
	    $text = implode(' ', $words);
	    $text = $text . $excerpt_more;
	  } else {
	    $text = implode(' ', $words);
	  }
	return $text;*/
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt); //since wp3.3
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');