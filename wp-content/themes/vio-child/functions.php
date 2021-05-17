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

/* Trim exercept texts */

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


/* Save new ACF field for speaker picture */

add_action('acf/save_post', 'master_save_acf');

function master_save_acf($post_id) {
	image_to_image_tag($post_id);
}

function image_to_image_tag($post_id) {
  // get unformatted image field value, ensures that image ID is returned
  $image_id = intval(get_field('speaker_picture', $post_id, false));
  // a variable to build the image tag
  $image_tag = '';
  // a different custom field name to store our tag
  $meta_key = 'post_grid_speaker_picture_converted';
  if ($image_id) {
    // if image id is not empty create the image tag
    // first get the image see function at WP for more information
    // change image size to desired image size
    $size = 'medium';
    $image = wp_get_attachment_image_src($image_id, $size);
    if (!empty($image)) {
      // only do this if the image exists
      // get image alt text if it exists
      $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
      $image_tag = '<img src="'.$image[0].'" width="'.$image[1].
                   '" height="'.$image[2].'" alt=" '.$image_alt.
                   ' " title="'.$image_alt. '" class="size-'.$size.
                   ' wp-image-'.$image_id.'" />';
      // bonus - make image responsive, this is why the class was added above
      if (function_exists('wp_filter_content_tags')) {
        $image_tag = wp_filter_content_tags($image_tag);
      } else {
        $image_tag = wp_make_content_images_responsive($image_tag);
      }
    }
  }
  // at this point $image_tag will contain the image tag
  // or it will be empty because there is no image
  // save the value in a new meta_key
  $meta_key = 'post_grid_speaker_picture_converted';
  update_post_meta($post_id, $meta_key, $image_tag); 
}