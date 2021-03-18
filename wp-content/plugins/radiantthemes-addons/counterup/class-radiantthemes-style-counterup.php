<?php
/**
 * Counterup Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Counterup' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Counterup extends WPBakeryShortCode {
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
					'name'                    => esc_html__( 'CounterUp', 'radiantthemes-addons' ),
					'base'                    => 'rt_counterup_style',
					'show_settings_on_create' => true,
					'description'             => esc_html__( 'Add Counterup', 'radiantthemes-addons' ),
					'icon'                    => plugins_url( 'radiantthemes-addons/assets/icons/CounterUp-Element-Icon.png' ),
					'class'                   => 'wpb_rt_vc_extension_counterup_style',
					'category'                => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'                => 'full',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Counterup Style', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Value', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_value',
							'admin_label' => true,
							'value'       => 1248,
							'description' => esc_html__( 'Enter the numeric value for counting', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Time', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_time',
							'value'       => 1000,
							'admin_label' => true,
							'description' => esc_html__( 'How long counting will run (in millisecond)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Delay', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_delay',
							'value'       => 100,
							'admin_label' => true,
							'description' => esc_html__( 'Counting will start after delay (in millisecond)', 'radiantthemes-addons' ),
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
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Counterup Align', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_align',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'std'         => 'left',
							'admin_label' => true,
							'description' => esc_html__( 'Select Counterup alignment.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_font_size',
							'description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_line_height',
							'description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Counterup Color', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_color',
							'value'       => '',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select Counterup color.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Font', 'radiantthemes-addons' ),
							'param_name' => 'counterup_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'counterup_google_font',
							'dependency' => array(
								'element' => 'counterup_select_font',
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
							'param_name' => 'counterup_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'counterup_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'counterup_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'counterup_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'counterup_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_counterup_style', array( $this, 'radiantthemes_counterup_style_func' ) );
		}

		/**
		 * [radiantthemes_counterup_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_counterup_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'counterup_style'       => 'one',
					'counterup_value'       => '1248',
					'counterup_time'        => '1000',
					'counterup_delay'       => '100',
					'extra_class'           => '',
					'extra_id'              => '',
					'counterup_align'       => 'left',
					'counterup_font_size'   => '',
					'counterup_line_height' => '',
					'counterup_color'       => '',
					'counterup_select_font' => '',
					'counterup_google_font' => '',
					'counterup_custom_font' => '',
					'counterup_font_weight' => '400',
					'counterup_font_style'  => 'normal',
				),
				$atts
			);

			if ( 'gfont' === $shortcode['counterup_select_font'] ) {

				// Build the case studies filter font array.
				$counterup_google_font = $this->get_fonts_data( $shortcode['counterup_google_font'] );

				// Build the inline style.
				$counterup_font_inline_style = $this->google_fonts_styles( $counterup_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $counterup_google_font );

				$counterup_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['counterup_select_font'] ) {
				// Build the inline style.
				$counterup_font_inline_style = 'font-family: ' . $shortcode['counterup_custom_font'] . ';';
				$counterup_font_weight_style = 'font-weight: ' . $shortcode['counterup_font_weight'] . ';font-style: ' . $shortcode['counterup_font_style'] . ';';
			} else {
				$counterup_font_inline_style = '';
				$counterup_font_weight_style = '';
			}

			if ( ! empty( $shortcode['counterup_align'] ) ) {
				$counterup_align = "text-align:{$shortcode['counterup_align']};";
			} else {
				$counterup_align = '';
			}

			if ( ! empty( $shortcode['counterup_font_size'] ) ) {
				$counterup_font_size = 'font-size:' . intval( $shortcode['counterup_font_size'] ) . 'px;';
			} else {
				$counterup_font_size = '';
			}

			if ( ! empty( $shortcode['counterup_line_height'] ) ) {
				$counterup_line_height = 'line-height:' . intval( $shortcode['counterup_line_height'] ) . 'px;';
			} else {
				$counterup_line_height = '';
			}

			if ( ! empty( $shortcode['counterup_color'] ) ) {
				$counterup_color = "color:{$shortcode['counterup_color']};";
			} else {
				$counterup_color = '';
			}

			$counterup_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<!-- rt-counterup -->';
				$output .= '<div class="rt-counterup element-' . esc_attr( $shortcode['counterup_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . ' disable-comma" style="' . $counterup_align . $counterup_font_size . $counterup_line_height . $counterup_color . $counterup_font_inline_style . $counterup_font_weight_style . '" ' . $counterup_id . '>';
					$output .= '<span class="rt-counterup-value" data-counterup-value="' . esc_html( $shortcode['counterup_value'] ) . '" data-counterup-delay="' . esc_html( $shortcode['counterup_delay'] ) . '" data-counterup-time="' . esc_html( $shortcode['counterup_time'] ) . '">' . esc_html( $shortcode['counterup_value'] ) . '</span>';
				$output .= '</div>';
			$output .= '<!-- rt-counterup -->';

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
		 * @param  [type] $fonts_data description.
		 */
		protected function google_fonts_styles( $fonts_data ) {
			// Inline styles.
			$font_family = explode( ':', $fonts_data['values']['font_family'] );
			$styles[]    = 'font-family:' . $font_family[0];
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
		 * @param  [type] $fonts_data description.
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
