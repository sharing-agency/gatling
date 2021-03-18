<?php
/**
 * Dropcaps Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Dropcap' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Dropcap extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Dropcap', 'radiantthemes-addons' ),
					'base'        => 'rt_dropcap_style',
					'description' => esc_html__( 'Add Dropcap with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Dropcap-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_dropcap_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Dropcap Style', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_style',
							'value'       => array(
								esc_html__( 'Style One (Basic)', 'radiantthemes-addons' )                   => 'one',
								esc_html__( 'Style Two (Bordered)', 'radiantthemes-addons' )                => 'two',
								esc_html__( 'Style Three (Solid)', 'radiantthemes-addons' )                 => 'three',
								esc_html__( 'Style Four (Top-Left Bordered)', 'radiantthemes-addons' )      => 'four',
								esc_html__( 'Style Five (Bottom-Right Bordered)', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six (Bordered Rounded)', 'radiantthemes-addons' )        => 'six',
								esc_html__( 'Style Seven (Solid Rounded)', 'radiantthemes-addons' )         => 'seven',
								esc_html__( 'Style Eight (Solid Circle)', 'radiantthemes-addons' )          => 'eight',
								esc_html__( 'Style Nine (Solid Circle - Dark)', 'radiantthemes-addons' )    => 'nine',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Dropcap Letter', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_letter',
							'value'       => esc_html__( 'R', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_content',
							'value'       => esc_html__( 'Hola! I am content of dropcap element.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_color',
							'description' => esc_html__( 'Choose color scheme. (Will take theme color if not selected)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_content_color',
							'description' => esc_html__( 'Choose content color', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Font', 'radiantthemes-addons' ),
							'param_name' => 'dropcap_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'dropcap_google_font',
							'dependency' => array(
								'element' => 'dropcap_select_font',
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
							'param_name' => 'dropcap_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'dropcap_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'dropcap_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'dropcap_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size' => '',
									'line_height',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'dropcap_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'dropcap_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'dropcap_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'dropcap_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_dropcap_style', array( $this, 'radiantthemes_dropcap_style_func' ) );
		}

		/**
		 * [radiantthemes_dropcap_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_dropcap_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'dropcap_style'          => 'one',
					'dropcap_letter'         => 'R',
					'dropcap_content'        => 'Hola! I am content of dropcap element.',
					'dropcap_color'          => '#000000',
					'dropcap_content_color'  => '#000000',
					'dropcap_extra_class'    => '',
					'dropcap_extra_id'       => '',
					'dropcap_select_font'    => '',
					'dropcap_google_font'    => '',
					'dropcap_custom_font'    => '',
					'dropcap_font_container' => '',
					'dropcap_font_weight'    => '400',
					'dropcap_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['dropcap_font_container'] ) {
				$dropcap_font_container    = explode( '|', $shortcode['dropcap_font_container'] );
				$dropcap_font_container[1] = urldecode( $dropcap_font_container[1] );
				$dropcap_font_container    = implode( ';', $dropcap_font_container );
				$dropcap_font_container    = str_replace( '_', '-', $dropcap_font_container );
				$dropcap_font_container    = $dropcap_font_container . ';';
			} else {
				$dropcap_font_container = '';
			}

			if ( 'gfont' === $shortcode['dropcap_select_font'] ) {

				// Build the dropcap font array.
				$dropcap_google_font = $this->get_fonts_data( $shortcode['dropcap_google_font'] );

				// Build the inline style.
				$dropcap_font_inline_style = $this->google_fonts_styles( $dropcap_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $dropcap_google_font );

				$dropcap_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['dropcap_select_font'] ) {

				// Build the inline style.
				$dropcap_font_inline_style = 'font-family: ' . $shortcode['dropcap_custom_font'] . ';';
				$dropcap_font_weight_style = 'font-weight: ' . $shortcode['dropcap_font_weight'] . ';font-style: ' . $shortcode['dropcap_font_style'] . ';';

			} else {

				$dropcap_font_inline_style = '';
				$dropcap_font_weight_style = '';

			}

			// ADD ID.
			$dropcaps_id = $shortcode['dropcap_extra_id'] ? 'id="' . $shortcode['dropcap_extra_id'] . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			// MAIN LAYOUT.
			$output  = '<div class="radiantthemes-dropcaps element-' . $shortcode['dropcap_style'] . ' ' . $shortcode['dropcap_extra_class'] . '"  ' . $dropcaps_id . '>';
			$output .= '<div class="holder" style="' . $dropcap_font_container . $dropcap_font_weight_style . 'color:' . $shortcode['dropcap_content_color'] . ';' . $dropcap_font_inline_style . ';">';
			if ( 'one' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter">';
			} elseif ( 'two' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter" style="border-color:' . $shortcode['dropcap_color'] . ';">';
			} elseif ( 'three' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
			} elseif ( 'four' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter">';
			} elseif ( 'five' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter">';
			} elseif ( 'six' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter">';
			} elseif ( 'seven' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
			} elseif ( 'eight' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter" style="background-color:' . $shortcode['dropcap_color'] . ';">';
			} elseif ( 'nine' === $shortcode['dropcap_style'] ) {
				$output .= '<div class="radiantthemes-dropcap-letter">';
			}
			$output .= esc_html( $shortcode['dropcap_letter'] );
			$output .= '</div>';
			$output .= esc_html( $shortcode['dropcap_content'] );
			$output .= '</div>';
			$output .= '</div>' . "\r";
			$output .= '<!-- dropcap -->' . "\r";
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
