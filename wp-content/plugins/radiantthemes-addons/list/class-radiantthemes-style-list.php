<?php
/**
 * List Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_List' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_List extends WPBakeryShortCode {
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

			vc_map(
				array(
					'name'        => esc_html__( 'List', 'radiantthemes-addons' ),
					'base'        => 'rt_list_style',
					'description' => esc_html__( 'Add List with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'List Style', 'radiantthemes-addons' ),
							'param_name'  => 'list_style',
							'value'       => array(
								'Style One (Right Single Angle)' => 'one',
								'Style Two (Right Double Angle)' => 'two',
								'Style Three (Right Arrow Circle Solid)' => 'three',
								'Style Four (Right Carret)' => 'four',
								'Style Five (Check Circle)' => 'five',
								'Style Six (Check Circle Solid)' => 'six',
								'Style Seven (Dot)'       => 'seven',
								'Style Eight (Square)'    => 'eight',
								'Style Nine (Star)'       => 'nine',
								'Style Ten (Right Arrow)' => 'ten',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => wp_kses_post(
								'<ul>
                                    <li>List Item Text One</li>
                                    <li>List Item Text Two</li>
                                    <li>List Item Text Three</li>
                                </ul>',
								'radiantthemes-addons'
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'List Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'list_color',
							'description' => esc_html__( 'Set your List Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'list_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'list_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'list_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'list_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'list_content_google_font',
							'dependency' => array(
								'element' => 'list_content_select_font',
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
							'param_name' => 'list_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'list_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'list_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'list_content_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Content color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'list_content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'list_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'list_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'list_content_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'list_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_list_style', array( $this, 'radiantthemes_list_style_func' ) );
		}

		/**
		 * [radiantthemes_list_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_list_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'list_style'                  => 'one',
					'list_color'                  => '',
					'list_animation'              => '',
					'list_extra_class'            => '',
					'list_extra_id'               => '',
					'list_css'                    => '',
					'list_content_select_font'    => '',
					'list_content_google_font'    => '',
					'list_content_custom_font'    => '',
					'list_content_font_container' => '',
					'list_content_font_weight'    => '400',
					'list_content_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['list_content_font_container'] ) {
				$list_content_font_container    = explode( '|', $shortcode['list_content_font_container'] );
				$list_content_font_container[1] = urldecode( $list_content_font_container[1] );
				$list_content_font_container    = implode( ';', $list_content_font_container );
				$list_content_font_container    = str_replace( '_', '-', $list_content_font_container );
				$list_content_font_container    = $list_content_font_container . ';';
			} else {
				$list_content_font_container = '';
			}

			if ( 'gfont' === $shortcode['list_content_select_font'] ) {

				// Build the case studies filter font array.
				$list_content_google_font = $this->get_fonts_data( $shortcode['list_content_google_font'] );

				// Build the inline style.
				$list_content_font_inline_style = $this->google_fonts_styles( $list_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $list_content_google_font );

				$list_content_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['list_content_select_font'] ) {

				// Build the inline style.
				$list_content_font_inline_style = 'font-family: ' . $shortcode['list_content_custom_font'] . ';';
				$list_content_font_weight_style = 'font-weight: ' . $shortcode['list_content_font_weight'] . ';font-style: ' . $shortcode['list_content_font_style'] . ';';

			} else {

				$list_content_font_inline_style = '';
				$list_content_font_weight_style = '';

			}

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['list_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['list_animation'], ' ' ), $atts );

			// ADD DESIGN CSS.
			$list_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['list_css'], ' ' ), $atts );

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			// GENERATE RANDOM CLASS.
			$random_class = 'rt' . wp_rand();

			if ( ! empty( $shortcode['list_color'] ) ) {
				// ADD CUSTOM CSS.
				$custom_css = ".radiantthemes-list.{$random_class} ul li:before{
					color: {$shortcode['list_color']};
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			// GET ID.
			$list_id = $shortcode['list_extra_id'] ? 'id="' . esc_attr( $shortcode['list_extra_id'] ) . '"' : '';

			// MAIL LAYOUT.
			$output  = "\r" . '<!-- list -->' . "\r";
			$output .= '<div style="' . $list_content_font_inline_style . $list_content_font_container . $list_content_font_weight_style . '" class="radiantthemes-list ' . esc_attr( $random_class ) . ' element-' . esc_attr( $shortcode['list_style'] );
			$output .= ' ' . $animation_classes . ' ' . $list_css . ' ' . $shortcode['list_extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $list_id . '>';
			$content = preg_replace( '~</?p[^>]*>~', '', $content );
			$output .= $content;
			$output .= '</div>' . "\r";
			$output .= '<!-- list -->' . "\r";
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
