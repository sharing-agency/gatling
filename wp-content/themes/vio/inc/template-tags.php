<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package vio
 */

if ( ! function_exists( 'vio_global_var' ) ) {
	/**
	 * [vio_global_var description]
	 *
	 * @param  [type] $vio_opt_one   description.
	 * @param  [type] $vio_opt_two   description.
	 * @param  [type] $vio_opt_check description.
	 * @return [type]                          description
	 */
	function vio_global_var(
		$vio_opt_one,
		$vio_opt_two,
		$vio_opt_check
	) {
		global $vio_theme_option;
		if ( $vio_opt_check ) {
			if ( isset( $vio_theme_option[ $vio_opt_one ][ $vio_opt_two ] ) ) {
				return $vio_theme_option[ $vio_opt_one ][ $vio_opt_two ];
			}
		} else {
			if ( isset( $vio_theme_option[ $vio_opt_one ] ) ) {
				return $vio_theme_option[ $vio_opt_one ];
			}
		}
	}
}



if ( ! function_exists( 'vio_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function vio_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string  = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$author_image = sprintf(
			get_avatar( get_the_author_meta( 'email' ), '150' )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'vio' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><span data-hover="' . esc_attr( get_the_author() ) . '">' . esc_html( get_the_author() ) . '</span></a>'
		);

		$published_on = sprintf(
			/*
			 translators: %s: post date. */
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span data-hover="' . esc_html( get_the_date() ) . '">' . esc_html( get_the_date() ) . '</span></a>'
		);

				printf(
					wp_kses_post(
						'<div class="holder">
                            <div class="author-image hidden">' . $author_image . '</div>
                                <div class="data">
                                    <div class="meta">'
					)
				);

					printf(
						wp_kses_post(
							'<span class="published-on"><span class="ti-calendar"></span> ' . esc_html__( 'Posted on', 'vio' ) . ' ' . $published_on . '</span>
    						<span class="byline"><span class="ti-user"></span> ' . esc_html__( 'By', 'vio' ) . ' ' . $byline . '</span>'
						)
					);

					// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {
				if ( is_single() ) {
					/* translators: used between list items, there is a space after the comma */
					if ( true == vio_global_var( 'display_categries', '', false ) ) :
						$categories_list = get_the_category_list( __( ', ', 'vio' ) );
						if ( $categories_list && vio_categorized_blog() ) {
									printf(
										wp_kses_post( '<span class="category"><span class="ti-direction-alt"></span> ' . esc_html__( 'In', 'vio' ) . '' ) .
										/* translators: used between list items, there is a space after the comma */
										esc_html( ' %1$s' ) .
										wp_kses_post( '</span>' ),
										wp_kses_post( $categories_list )
									);
						}
								endif;
				}
			}

				echo ' </div>
			</div>
		</div>';

	}
endif;
function vio_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'vio_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'vio_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so vio_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so vio_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in vio_categorized_blog.
 */
function vio_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'vio_categories' );
}
add_action( 'edit_category', 'vio_category_transient_flusher' );
add_action( 'save_post', 'vio_category_transient_flusher' );
