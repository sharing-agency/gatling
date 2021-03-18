<?php
/**
 * Countdown Timer Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Countdown' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Countdown extends WPBakeryShortCode {
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

			add_action( 'admin_enqueue_scripts', 'admin_scripts' );
			/**
			 * [admin_scripts description]
			 *
			 * @param  [type] $hook description.
			 */
			function admin_scripts( $hook ) {
				if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
					wp_register_style(
						'radiantthemes_datetimepicker',
						plugins_url( 'radiantthemes-addons/admin/css/bootstrap-datetimepicker-admin.css' ),
						array(),
						time()
					);
					wp_enqueue_style( 'radiantthemes_datetimepicker' );
				}
			}

			vc_map(
				array(
					'name'        => esc_html__( 'Countdown', 'radiantthemes-addons' ),
					'base'        => 'rt_countdown_style',
					'description' => esc_html__( 'Add Countdown', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/CountdownTimer-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_countdown_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Countdown Timer Style', 'radiantthemes-addons' ),
							'param_name'  => 'countdown_style',
							'value'       => array(
								esc_html__( 'Style One (Classic With Top/Bottom Border', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'datetimepicker',
							'heading'     => esc_html__( 'Target Time For Countdown', 'radiantthemes-addons' ),
							'param_name'  => 'countdown_datetime',
							'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm:ss).', 'radiantthemes-addons' ),
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
							'heading'    => esc_html__( 'Select Font', 'radiantthemes-addons' ),
							'param_name' => 'countdown_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'countdown_google_font',
							'dependency' => array(
								'element' => 'countdown_select_font',
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
							'param_name' => 'countdown_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'countdown_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'countdown_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'countdown_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select heading color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'countdown_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'countdown_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'countdown_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'countdown_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_countdown_style', array( $this, 'radiantthemes_countdown_style_func' ) );
		}

		/**
		 * [radiantthemes_countdown_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_countdown_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'countdown_style'          => 'one',
					'countdown_datetime'       => '',
					'extra_class'              => '',
					'extra_id'                 => '',
					'countdown_select_font'    => '',
					'countdown_google_font'    => '',
					'countdown_custom_font'    => '',
					'countdown_font_container' => '',
					'countdown_font_weight'    => '400',
					'countdown_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['countdown_font_container'] ) {
				$countdown_font_container    = explode( '|', $shortcode['countdown_font_container'] );
				$countdown_font_container[1] = urldecode( $countdown_font_container[1] );
				$countdown_font_container    = implode( ';', $countdown_font_container );
				$countdown_font_container    = str_replace( '_', '-', $countdown_font_container );
				$countdown_font_container    = $countdown_font_container . ';';
			} else {
				$countdown_font_container = '';
			}

			if ( 'gfont' === $shortcode['countdown_select_font'] ) {

				// Build the case studies filter font array.
				$countdown_google_font = $this->get_fonts_data( $shortcode['countdown_google_font'] );

				// Build the inline style.
				$countdown_font_inline_style = $this->google_fonts_styles( $countdown_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $countdown_google_font );

				$countdown_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['countdown_select_font'] ) {

				// Build the inline style.
				$countdown_font_inline_style = 'font-family: ' . $shortcode['countdown_custom_font'] . ';';
				$countdown_font_weight_style = 'font-weight: ' . $shortcode['countdown_font_weight'] . ';font-style: ' . $shortcode['countdown_font_style'] . ';';

			} else {

				$countdown_font_inline_style = '';
				$countdown_font_weight_style = '';

			}

			$id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<div style="' . $countdown_font_inline_style . $countdown_font_container . $countdown_font_weight_style . '" class="rt-countdown element-' . esc_attr( $shortcode['countdown_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $id . ' data-countdown="' . esc_attr( $shortcode['countdown_datetime'] ) . '"></div>';
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
