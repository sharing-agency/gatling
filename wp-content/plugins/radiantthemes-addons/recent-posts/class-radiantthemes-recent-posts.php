<?php
/**
 * RadiantThemes_Style_Post  Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Post' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Post extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			$theme_options = get_option( 'vio_theme_option' );
			$font_names    = array();

			$font_names['Select Custom Font'] = '';
			$font_names['Barlow']             = 'Barlow';
			$font_names['Great Vibes']        = 'Great Vibes';
			$font_names['Lato']               = 'Lato';
			$font_names['Montserrat']         = 'Montserrat';
			$font_names['Playfair Display']   = 'Playfair Display';
			$font_names['Poppins']            = 'Poppins';
			$font_names['Roboto']             = 'Roboto';
			$font_names['Rubik']              = 'Rubik';
			$font_names['Taviraj']            = 'Taviraj';
			$font_names['Titillium Web']      = 'Titillium Web';
			$font_names['Yesteryear']         = 'Yesteryear';

			for ( $i = 1; $i <= 50; $i++ ) {
				if ( ! empty( $theme_options[ 'webfontName' . $i ] ) ) {
					$font_names[] = $theme_options[ 'webfontName' . $i ];
				}
			}
			$final_font_array = array_combine( $font_names, $font_names );

			$post_categories = get_categories(
				array(
					'orderby' => 'name',
					'order'   => 'ASC',
				)
			);

			$post_categories_array = array();
			$post_categories_array = array( 'Show all categories' => 'all' );
			if ( ! empty( $post_categories ) ) {
				foreach ( $post_categories as $post_category ) {
					$post_categories_array[ $post_category->name ] = $post_category->slug;
				}
			}

			vc_map(
				array(
					'name'        => esc_html__( 'Recent Post', 'radiantthemes-addons' ),
					'base'        => 'rt_post_thumbnail',
					'description' => esc_html__( 'The most recent posts element.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Recent Post Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One (Simple) - Light', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two (Simple) - Dark', 'radiantthemes-addons' )   => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'No. of Posts to show:', 'radiantthemes-addons' ),
							'param_name'  => 'number',
							'description' => esc_html__( 'Enter number of posts to display.Leave blank to use default post number.(i.e 4)', 'radiantthemes-addons' ),
							'admin_label' => true,
							'value'       => 4,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => 'Select Category',
							'param_name' => 'post_category_list',
							'value'      => $post_categories_array,
							'std'        => 'all',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'rec_posts_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'rec_posts_title_google_font',
							'dependency' => array(
								'element' => 'rec_posts_title_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'rec_posts_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'rec_posts_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'rec_posts_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'rec_posts_title_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Title color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'rec_posts_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'rec_posts_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'rec_posts_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'rec_posts_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Date Font', 'radiantthemes-addons' ),
							'param_name' => 'rec_posts_date_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'rec_posts_date_google_font',
							'dependency' => array(
								'element' => 'rec_posts_date_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'rec_posts_date_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'rec_posts_date_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'rec_posts_date_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'rec_posts_date_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Date color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'rec_posts_date_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'rec_posts_date_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'rec_posts_date_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'rec_posts_date_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_post_thumbnail', array( $this, 'radiantthemes_post_thumbnail_widget_func' ) );
		}

		/**
		 * [radiantthemes_post_thumbnail_widget_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_post_thumbnail_widget_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'                => 'one',
					'number'                         => '4',
					'post_category_list'             => 'all',
					'extra_class'                    => '',
					'extra_id'                       => '',
					'rec_posts_title_select_font'    => '',
					'rec_posts_title_google_font'    => '',
					'rec_posts_title_custom_font'    => '',
					'rec_posts_title_font_container' => '',
					'rec_posts_title_font_weight'    => '400',
					'rec_posts_title_font_style'     => 'normal',
					'rec_posts_date_select_font'     => '',
					'rec_posts_date_google_font'     => '',
					'rec_posts_date_custom_font'     => '',
					'rec_posts_date_font_container'  => '',
					'rec_posts_date_font_weight'     => '400',
					'rec_posts_date_font_style'      => 'normal',
				),
				$atts
			);
			if ( 'all' === $shortcode['post_category_list'] ) {
				$testimonial_category = '';
			} else {
				$testimonial_category = $shortcode['post_category_list'];
			}

			if ( $shortcode['rec_posts_title_font_container'] ) {
				$rec_posts_title_font_container    = explode( '|', $shortcode['rec_posts_title_font_container'] );
				$rec_posts_title_font_container[1] = urldecode( $rec_posts_title_font_container[1] );
				$rec_posts_title_font_container    = implode( ';', $rec_posts_title_font_container );
				$rec_posts_title_font_container    = str_replace( '_', '-', $rec_posts_title_font_container );
				$rec_posts_title_font_container    = $rec_posts_title_font_container . ';';
			} else {
				$rec_posts_title_font_container = '';
			}

			if ( $shortcode['rec_posts_date_font_container'] ) {
				$rec_posts_date_font_container    = explode( '|', $shortcode['rec_posts_date_font_container'] );
				$rec_posts_date_font_container[1] = urldecode( $rec_posts_date_font_container[1] );
				$rec_posts_date_font_container    = implode( ';', $rec_posts_date_font_container );
				$rec_posts_date_font_container    = str_replace( '_', '-', $rec_posts_date_font_container );
				$rec_posts_date_font_container    = $rec_posts_date_font_container . ';';
			} else {
				$rec_posts_date_font_container = '';
			}

			if ( 'gfont' === $shortcode['rec_posts_title_select_font'] ) {

				// Build the recent post title font array.
				$rec_posts_title_google_font = $this->get_fonts_data( $shortcode['rec_posts_title_google_font'] );

				// Build the inline style.
				$rec_posts_title_font_inline_style = $this->google_fonts_styles( $rec_posts_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $rec_posts_title_google_font );

				$rec_posts_title_weight_style = '';

			} elseif ( 'cfont' === $shortcode['rec_posts_title_select_font'] ) {

				// Build the inline style.
				$rec_posts_title_font_inline_style = 'font-family: ' . $shortcode['rec_posts_title_custom_font'] . ';';
				$rec_posts_title_weight_style      = 'font-weight: ' . $shortcode['rec_posts_title_font_weight'] . ';font-style: ' . $shortcode['rec_posts_title_font_style'] . ';';

			} else {

				$rec_posts_title_font_inline_style = '';
				$rec_posts_title_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['rec_posts_date_select_font'] ) {

				// Build the recent post date font array.
				$rec_posts_date_google_font = $this->get_fonts_data( $shortcode['rec_posts_date_google_font'] );

				// Build the inline style.
				$rec_posts_date_font_inline_style = $this->google_fonts_styles( $rec_posts_date_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $rec_posts_date_google_font );

				$rec_posts_date_weight_style = '';

			} elseif ( 'cfont' === $shortcode['rec_posts_date_select_font'] ) {

				// Build the inline style.
				$rec_posts_date_font_inline_style = 'font-family: ' . $shortcode['rec_posts_date_custom_font'] . ';';
				$rec_posts_date_weight_style      = 'font-weight: ' . $shortcode['rec_posts_date_font_weight'] . ';font-style: ' . $shortcode['rec_posts_date_font_style'] . ';';

			} else {

				$rec_posts_date_font_inline_style = '';
				$rec_posts_date_weight_style      = '';

			}

			$output = '';

			$maxposts = $shortcode['number'];

			$instance = 'maxposts=' . $maxposts;

			$id = $shortcode['extra_id'] ? ' id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// MAIN LAYOUT.
			$output = '<div class="radiantthemes-recent-post-widget element-' . esc_attr( $shortcode['style_variation'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $id . '>';

				$output .= '<ul class="radiantthemes-recent-post-widget-holder">';

					$query = new WP_Query(
						array(
							'post_type'      => 'post',
							'posts_per_page' => $maxposts,
							'orderby'        => 'ID',
							'order'          => 'DESC',
							'category_name'  => $testimonial_category,
						)
					);
			while ( $query->have_posts() ) :
				$query->the_post();

				$output .= '<li class="radiantthemes-recent-post-widget-post">';
				$output .= '<p style="' . $rec_posts_date_font_inline_style . $rec_posts_date_font_container . $rec_posts_date_weight_style . '" class="date">' . get_the_date() . '</p>';
				$output .= '<a href="' . get_the_permalink() . '"><p style="' . $rec_posts_title_font_inline_style . $rec_posts_title_font_container . $rec_posts_title_weight_style . '" class="title">' . get_the_title() . '</p></a>';
				$output .= '</li>';

					endwhile;

				$output .= '</ul>';
			$output     .= '</div>';

			return $output;

		}
		/**
		 * Build the string of values in an Array
		 *
		 * @param  [type] $fonts_string description.
		 */
		protected function get_fonts_data( $fonts_string ) {
			// Font data Extraction.
			$google_fonts_param = new Vc_Google_Fonts();
			$field_settings     = array();
			$fonts_data         = strlen( $fonts_string ) > 0 ? $google_fonts_param->_vc_google_fonts_parse_attributes( $field_settings, $fonts_string ) : '';
			return $fonts_data;
		}

		/**
		 * Build the inline style starting from the data
		 *
		 * @param [type] $fonts_data description.
		 */
		protected function google_fonts_styles( $fonts_data ) {

			// Inline styles.
			$font_family = explode( ':', $fonts_data['values']['font_family'] );
			$styles[]    = 'font-family: ' . $font_family[0];
			if ( $fonts_data['values']['font_style'] ) {
				$font_styles = explode( ':', $fonts_data['values']['font_style'] );
				$styles[]    = 'font-weight: ' . $font_styles[1];
				$styles[]    = 'font-style : ' . $font_styles[2];
			} else {
				$styles[] = 'font-weight: 400';
				$styles[] = 'font-style : normal';
			}

			$inline_style = '';
			foreach ( $styles as $attribute ) {
				$inline_style .= $attribute . '; ';
			}

			return $inline_style;

		}

		/**
		 * Enqueue right google font from Googleapis
		 *
		 * @param [type] $fonts_data description.
		 * @return void
		 */
		protected function enqueue_google_fonts( $fonts_data ) {

			// Get extra subsets for settings (latin/cyrillic/etc).
			$settings = get_option( 'wpb_js_google_fonts_subsets' );
			if ( is_array( $settings ) && ! empty( $settings ) ) {
				$subsets = '&subset=' . implode( ',', $settings );
			} else {
				$subsets = '';
			}

			// We also need to enqueue font from googleapis.
			if ( isset( $fonts_data['values']['font_family'] ) ) {
				wp_enqueue_style(
					'vc_google_fonts_' . vc_build_safe_css_class( $fonts_data['values']['font_family'] ),
					'//fonts.googleapis.com/css?family=' . $fonts_data['values']['font_family'] . $subsets,
					array(),
					time()
				);
			}

		}
	}
}
