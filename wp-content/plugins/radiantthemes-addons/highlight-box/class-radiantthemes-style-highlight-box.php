<?php
/**
 * Highlight Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Highlight_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Highlight_Box extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Highlight Box', 'radiantthemes-addons' ),
					'base'        => 'rt_highlight_box_style',
					'description' => esc_html__( 'Add Highlight Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Highlight-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_highlight_box_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Highlight Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_image',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Highlight Box Title', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_title',
							'value'       => esc_html__( 'I am a Title', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Highlight Box Content', 'radiantthemes-addons' ),
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_content',
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Highlight Box Link', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_button',
							'admin_label' => false,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
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
							'param_name' => 'highlight_box_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'highlight_box_title_google_font',
							'dependency' => array(
								'element' => 'highlight_box_title_select_font',
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
							'param_name' => 'highlight_box_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'highlight_box_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'highlight_box_content_google_font',
							'dependency' => array(
								'element' => 'highlight_box_content_select_font',
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
							'param_name' => 'highlight_box_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'highlight_box_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Link Font', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_link_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'highlight_box_link_google_font',
							'dependency' => array(
								'element' => 'highlight_box_link_select_font',
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
							'param_name' => 'highlight_box_link_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'highlight_box_link_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),

						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_highlight_box_style', array( $this, 'radiantthemes_highlight_box_style_func' ) );
		}

		/**
		 * [radiantthemes_highlight_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_highlight_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'highlight_box_style'               => 'one',
					'highlight_box_image'               => '',
					'highlight_box_title'               => esc_html__( 'I am a Title', 'radiantthemes-addons' ),
					'highlight_box_content'             => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'highlight_box_button'              => '',
					'animation'                         => '',
					'extra_class'                       => '',
					'extra_id'                          => '',
					'css'                               => '',
					'highlight_box_title_select_font'   => '',
					'highlight_box_title_google_font'   => '',
					'highlight_box_title_custom_font'   => '',
					'highlight_box_content_select_font' => '',
					'highlight_box_content_google_font' => '',
					'highlight_box_content_custom_font' => '',
					'highlight_box_link_select_font'    => '',
					'highlight_box_link_google_font'    => '',
					'highlight_box_link_custom_font'    => '',
				),
				$atts
			);

			if ( 'gfont' === $shortcode['highlight_box_title_select_font'] ) {
				// Build the case studies filter font array.
				$highlight_box_title_google_font = $this->get_fonts_data( $shortcode['highlight_box_title_google_font'] );

				// Build the inline style.
				$highlight_box_title_font_inline_style = $this->google_fonts_styles( $highlight_box_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $highlight_box_title_google_font );
			} elseif ( 'cfont' === $shortcode['highlight_box_title_select_font'] ) {
				// Build the inline style.
				$highlight_box_title_font_inline_style = 'font-family: ' . $shortcode['highlight_box_title_custom_font'];
			} else {
				$highlight_box_title_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['highlight_box_content_select_font'] ) {
				// Build the call to action font array.
				$highlight_box_content_google_font = $this->get_fonts_data( $shortcode['highlight_box_content_google_font'] );

				// Build the inline style.
				$highlight_box_content_font_inline_style = $this->google_fonts_styles( $highlight_box_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $highlight_box_content_google_font );
			} elseif ( 'cfont' === $shortcode['highlight_box_content_select_font'] ) {
				// Build the inline style.
				$highlight_box_content_font_inline_style = 'font-family: ' . $shortcode['highlight_box_content_custom_font'];
			} else {
				$highlight_box_content_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['highlight_box_link_select_font'] ) {
				// Build the call to action font array.
				$highlight_box_link_google_font = $this->get_fonts_data( $shortcode['highlight_box_link_google_font'] );

				// Build the inline style.
				$highlight_box_link_font_inline_style = $this->google_fonts_styles( $highlight_box_link_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $highlight_box_link_google_font );
			} elseif ( 'cfont' === $shortcode['highlight_box_link_select_font'] ) {
				// Build the inline style.
				$highlight_box_link_font_inline_style = 'font-family: ' . $shortcode['highlight_box_link_custom_font'];
			} else {
				$highlight_box_link_font_inline_style = '';
			}

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );

			$highlight_box_button = vc_build_link( $shortcode['highlight_box_button'] );
			$highlight_box_url    = ( ! empty( $highlight_box_button['url'] ) ) ? $highlight_box_button['url'] : '#';
			$highlight_box_title  = ( ! empty( $highlight_box_button['title'] ) ) ? $highlight_box_button['title'] : '';
			$highlight_box_target = ( ! empty( $highlight_box_button['target'] ) ) ? $highlight_box_button['target'] : '';
			$highlight_box_rel    = ( ! empty( $highlight_box_button['rel'] ) ) ? $highlight_box_button['rel'] : '';

			$highlight_box_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output  = '<div class="rt-highlight-box element-' . esc_attr( $shortcode['highlight_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $highlight_box_id . '>';
			require 'template/template-highlight-box-style-' . esc_attr( $shortcode['highlight_box_style'] ) . '.php';
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
