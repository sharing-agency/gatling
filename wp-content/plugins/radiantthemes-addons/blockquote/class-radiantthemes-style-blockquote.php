<?php
/**
 * Blockquote Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Blockquote' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Blockquote extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Blockquote', 'radiantthemes-addons' ),
					'base'        => 'rt_blockquote_style',
					'description' => esc_html__( 'Add Blockquote', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Blockquote-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blockquote_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Style', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_style',
							'value'      => array(
								esc_html__( 'Style One (Centered Bordered With Icon)', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two (Left Bordered Without Icon)', 'radiantthemes-addons' )  => 'two',
								esc_html__( 'Style Three (Left With Icon)', 'radiantthemes-addons' )            => 'three',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Author', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_author',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter your content.', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_content',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => true,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_font_color',
							'group'      => esc_html__( 'Appearance', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_icon_color',
							'group'      => esc_html__( 'Appearance', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Font', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'blockquote_google_font',
							'dependency' => array(
								'element' => 'blockquote_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => 'Typography',
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'blockquote_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'blockquote_select_font',
								'value'   => 'cfont',
							),
							'group'      => 'Typography',
							'std'        => 'Great Vibes',
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'blockquote_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'blockquote_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'blockquote_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'blockquote_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'blockquote_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_blockquote_style', array( $this, 'radiantthemes_blockquote_style_func' ) );
		}

		/**
		 * [radiantthemes_blockquote_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_blockquote_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'blockquote_style'          => 'one',
					'blockquote_author'         => '',
					'blockquote_content'        => '',
					'blockquote_animation'      => '',
					'blockquote_extra_class'    => '',
					'blockquote_extra_id'       => '',
					'blockquote_font_color'     => '',
					'blockquote_icon_color'     => '',
					'blockquote_css'            => '',
					'blockquote_select_font'    => '',
					'blockquote_google_font'    => '',
					'blockquote_custom_font'    => 'Great Vibes',
					'blockquote_font_container' => '',
					'blockquote_font_weight'    => '400',
					'blockquote_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['blockquote_font_container'] ) {
				$blockquote_font_container = explode( '|', $shortcode['blockquote_font_container'] );
				$blockquote_font_container = implode( ';', $blockquote_font_container );
				$blockquote_font_container = str_replace( '_', '-', $blockquote_font_container );
				$blockquote_font_container = $blockquote_font_container . ';';
			} else {
				$blockquote_font_container = '';
			}

			if ( 'gfont' === $shortcode['blockquote_select_font'] ) {

				// Build the blockquote font array.
				$blockquote_google_font = $this->get_fonts_data( $shortcode['blockquote_google_font'] );

				// Build the inline style.
				$blockquote_font_inline_style = $this->google_fonts_styles( $blockquote_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $blockquote_google_font );

				$blockquote_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['blockquote_select_font'] ) {

				// Build the inline style.
				$blockquote_font_inline_style = 'font-family: ' . $shortcode['blockquote_custom_font'] . ';';
				$blockquote_font_weight_style = 'font-weight: ' . $shortcode['blockquote_font_weight'] . ';font-style: ' . $shortcode['blockquote_font_style'] . ';';

			} else {

				$blockquote_font_inline_style = '';
				$blockquote_font_weight_style = '';

			}

			// GENARATE DYNAMIC CLASSES.
			$animation_classes = $this->getCSSAnimation( $shortcode['blockquote_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['blockquote_css'], ' ' ), $atts );
			$blockquote_style  = esc_attr( $shortcode['blockquote_font_color'] );
			$icon_style        = esc_attr( $shortcode['blockquote_icon_color'] );

			// ADD CUSTOM ID.
			$blockquote_id    = $shortcode['blockquote_extra_id'] ? 'id="' . esc_attr( $shortcode['blockquote_extra_id'] ) . '"' : '';
			$blockquote_style = $blockquote_style ? 'color:' . $blockquote_style . ';' : '';
			$icon_style       = $icon_style ? 'color:' . $icon_style . ';' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			// MAIN LAYOUT.
			$output  = '<div class="radiantthemes-blockquote element-' . esc_attr( $shortcode['blockquote_style'] ) . ' ' . $animation_classes . ' ' . $shortcode['blockquote_extra_id'] . ' ' . esc_attr( $css_class ) . '" ' . $blockquote_id . '>';
			$output .= '<blockquote style="' . esc_attr( $blockquote_style ) . ' ' . esc_attr( $blockquote_font_inline_style ) . ' ' . esc_attr( $blockquote_font_container ) . esc_attr( $blockquote_font_weight_style ) . '"><i style="' . esc_attr( $icon_style ) . '" class="fa fa-quote-left"></i>';
			$output .= esc_attr( $shortcode['blockquote_content'] );
			$output .= '<cite style="' . esc_attr( $blockquote_style ) . esc_attr( $blockquote_font_container ) . esc_attr( $blockquote_font_weight_style ) . '">' . esc_attr( $shortcode['blockquote_author'] ) . '</cite>';
			$output .= '</blockquote>';
			$output .= '</div>';

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
