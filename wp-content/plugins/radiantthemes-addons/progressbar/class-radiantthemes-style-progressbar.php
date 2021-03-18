<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Progressbar' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Progressbar extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
					'base'        => 'rt_progressbar_style',
					'description' => esc_html__( 'Radiant Theme Progress Bar', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/ProgressBar-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_progressbar_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Title', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_title',
							'value'       => 'This is progress bar element',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_background_color',
							'description' => esc_html__( 'Set your Progressbar Background Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_color',
							'description' => esc_html__( 'Set your Progressbar Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_font_color',
							'description' => esc_html__( 'Set your Progressbar Font Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Height', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter measurement units (Example: px)', 'radiantthemes-addons' ),
							'admin_label' => true,
							'param_name'  => 'progressbar_height',
							'value'       => '15px',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progress Percentage', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter measurement units. Should be under 0% to 100%. (Example: 80%)', 'radiantthemes-addons' ),
							'param_name'  => 'progress_width',
							'value'       => '80%',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Animation', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_animated',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'active',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Striped', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_striped',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'progress-bar-striped',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
							'admin_label' => true,
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
							'param_name' => 'progressbar_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'progressbar_title_google_font',
							'dependency' => array(
								'element' => 'progressbar_title_select_font',
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
							'param_name' => 'progressbar_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'progressbar_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'progressbar_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'progressbar_title_select_font',
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
							'param_name' => 'progressbar_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'progressbar_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'progressbar_title_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_progressbar_style', array( $this, 'radiantthemes_progressbar_style_func' ) );
		}

		/**
		 * [radiantthemes_progressbar_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_progressbar_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'progressbar_height'               => '15px',
					'progress_width'                   => '80%',
					'progressbar_title'                => 'This is progress bar element',
					'progressbar_background_color'     => '',
					'progressbar_color'                => '',
					'progressbar_font_color'           => '',
					'progressbar_striped'              => 'progress-bar-striped',
					'progressbar_animated'             => 'active',
					'extra_class'                      => '',
					'extra_id'                         => '',
					'progressbar_title_select_font'    => '',
					'progressbar_title_google_font'    => '',
					'progressbar_title_custom_font'    => '',
					'progressbar_title_font_container' => '',
					'progressbar_title_font_weight'    => '400',
					'progressbar_title_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['progressbar_title_font_container'] ) {
				$progressbar_title_font_container = explode( '|', $shortcode['progressbar_title_font_container'] );
				$progressbar_title_font_container = implode( ';', $progressbar_title_font_container );
				$progressbar_title_font_container = str_replace( '_', '-', $progressbar_title_font_container );
				$progressbar_title_font_container = $progressbar_title_font_container . ';';
			} else {
				$progressbar_title_font_container = '';
			}

			if ( 'gfont' === $shortcode['progressbar_title_select_font'] ) {

				// Build the case studies filter font array.
				$progressbar_title_google_font = $this->get_fonts_data( $shortcode['progressbar_title_google_font'] );

				// Build the inline style.
				$progressbar_title_font_inline_style = $this->google_fonts_styles( $progressbar_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $progressbar_title_google_font );

				$progressbar_title_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['progressbar_title_select_font'] ) {

				// Build the inline style.
				$progressbar_title_font_inline_style = 'font-family: ' . $shortcode['progressbar_title_custom_font'] . ';';
				$progressbar_title_font_weight_style = 'font-weight: ' . $shortcode['progressbar_title_font_weight'] . ';font-style: ' . $shortcode['progressbar_title_font_style'] . ';';

			} else {
				$progressbar_title_font_inline_style = '';
				$progressbar_title_font_weight_style = '';
			}

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
			$custom_css   = '';
			if ( $shortcode['progressbar_color'] ) {
				// CUSTOM CSS.
				$custom_css = ".rt-progress-bar.element-one.{$random_class} > .progress > .progress-bar{
					background-color: {$shortcode['progressbar_color']} ;
				}";
				if ( $shortcode['progressbar_font_color'] ) {
					$custom_css .= ".rt-progress-bar.element-one.{$random_class} > .title{
    					color: {$shortcode['progressbar_font_color']} ;
    				}";
				}
				if ( $shortcode['progressbar_background_color'] ) {
					$custom_css .= ".rt-progress-bar.element-one.{$random_class} > .progress{
    					background-color: {$shortcode['progressbar_background_color']} ;
    				}";
				}
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}

			$progress_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			// MAIN LAYOUT.
			$output  = '<!-- rt-progress-bar -->';
			$output .= '<div ' . esc_attr( $progress_id ) . ' class="rt-progress-bar element-one ' . $random_class . ' ' . $shortcode['extra_class'] . '" data-progress-bar-width="' . esc_attr( $shortcode['progress_width'] ) . '" data-progress-bar-height="' . esc_attr( $shortcode['progressbar_height'] ) . '">';
			$output .= '<div style="' . $progressbar_title_font_inline_style . $progressbar_title_font_container . $progressbar_title_font_weight_style . '" class="title">' . esc_attr( $shortcode['progressbar_title'] );
			$output .= '<span class="progress-width"></span>';
			$output .= '</div>';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar ' . esc_attr( $shortcode['progressbar_striped'] ) . ' ' . esc_attr( $shortcode['progressbar_animated'] ) . ' " ></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<!-- rt-progress-bar -->';

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
