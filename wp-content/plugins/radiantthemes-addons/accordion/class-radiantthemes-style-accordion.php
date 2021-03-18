<?php
/**
 * Radiantthemes Accordion Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Accordion' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Accordion {
		/**
		 * [$radiant_accordionstyle] description
		 *
		 * @var string
		 */
		private $radiant_accordionstyle;

		/**
		 * [$radiant_accordion_title_font_inline_style] description
		 *
		 * @var string
		 */
		private $radiant_accordion_title_font_inline_style;

		/**
		 * [$radiant_accordion_content_font_inline_style] description
		 *
		 * @var string
		 */
		private $radiant_accordion_content_font_inline_style;

		/**
		 * [$title_font_container] description
		 *
		 * @var string
		 */
		private $title_font_container;

		/**
		 * [$content_font_container] description
		 *
		 * @var string
		 */
		private $content_font_container;

		/**
		 * [$title_font_weight_style] description
		 *
		 * @var string
		 */
		private $title_font_weight_style;

		/**
		 * [$content_font_weight_style] description
		 *
		 * @var string
		 */
		private $content_font_weight_style;

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
					'name'        => esc_html__( 'Accordion', 'radiantthemes-addons' ),
					'base'        => 'rt_accordion_style',
					'class'       => 'wpb_rt_vc_extension_accordion_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Accordion-Element-Icon.png' ),
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'rt_accordion_style_item',
					),
					'js_view'     => 'VcColumnView',
					'description' => esc_html__( 'Add Accordion.', 'radiantthemes-addons' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Accordion Style', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_style',
							'value'       => array(
								esc_html__( 'Style One (Outlined Plus-Minus Style)', 'radiantthemes-addons' )         => 'one',
								esc_html__( 'Style Two (Solid Plus-Minus Style) - Dark', 'radiantthemes-addons' )     => 'two',
								esc_html__( 'Style Three (Solid Plus-Minus Style) - Light', 'radiantthemes-addons' )  => 'three',
								esc_html__( 'Style Four (Solid Caret Style) - Light', 'radiantthemes-addons' )        => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_color',
							'description' => esc_html__( 'Set your Accordion Color Scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'accordion_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Accordion Title Font', 'radiantthemes-addons' ),
							'param_name' => 'accordion_title_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'title_google_font',
							'dependency' => array(
								'element' => 'accordion_title_font',
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
							'param_name' => 'title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'accordion_title_font',
								'value'   => 'cfont',
							),
							'group'      => 'Typography',
							'std'        => 'Great Vibes',
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'accordion_title_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select title color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'accordion_title_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'accordion_title_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Accordion Content Font', 'radiantthemes-addons' ),
							'param_name' => 'accordion_content_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'content_google_font',
							'dependency' => array(
								'element' => 'accordion_content_font',
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
							'param_name' => 'content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'accordion_content_font',
								'value'   => 'cfont',
							),
							'group'      => 'Typography',
							'std'        => 'Great Vibes',
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'accordion_content_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select title color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'accordion_content_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'accordion_content_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Accordion Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_accordion_style_item',
					'description'             => esc_html__( 'Add the title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_accordion_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(

						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Accordion Title', 'radiantthemes-addons' ),
							'param_name'  => 'accordion_item_title',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
					),
				)
			);
			add_shortcode( 'rt_accordion_style', array( $this, 'radiantthemes_accordion_style_func' ) );
			add_shortcode( 'rt_accordion_style_item', array( $this, 'radiantthemes_accordion_style_item_func' ) );
		}

		/**
		 * [radiantthemes_accordion_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'accordion_style'        => 'one',
					'accordion_color'        => '',
					'accordion_extra_class'  => '',
					'accordion_extra_id'     => '',
					'accordion_css'          => '',
					'accordion_title_font'   => '',
					'title_google_font'      => '',
					'title_custom_font'      => 'Great Vibes',
					'title_font_container'   => '',
					'title_font_weight'      => '400',
					'title_font_style'       => 'normal',
					'accordion_content_font' => '',
					'content_google_font'    => '',
					'content_custom_font'    => 'Great Vibes',
					'content_font_container' => '',
					'content_font_weight'    => '400',
					'content_font_style'     => 'normal',
				),
				$atts
			);

			$this->radiant_accordionstyle = $shortcode['accordion_style'];

			if ( $shortcode['title_font_container'] ) {
				$title_font_container    = explode( '|', $shortcode['title_font_container'] );
				$title_font_container[1] = urldecode( $title_font_container[1] );
				$title_font_container    = implode( ';', $title_font_container );
				$title_font_container    = str_replace( '_', '-', $title_font_container );
				$title_font_container    = $title_font_container . ';';
			} else {
				$title_font_container = '';
			}
			$this->title_font_container = $title_font_container;

			if ( $shortcode['content_font_container'] ) {
				$content_font_container    = explode( '|', $shortcode['content_font_container'] );
				$content_font_container[1] = urldecode( $content_font_container[1] );
				$content_font_container    = implode( ';', $content_font_container );
				$content_font_container    = str_replace( '_', '-', $content_font_container );
				$content_font_container    = $content_font_container . ';';
			} else {
				$content_font_container = '';
			}
			$this->content_font_container = $content_font_container;

			if ( 'gfont' === $shortcode['accordion_title_font'] ) {

				// Build the Accordion font array.
				$title_google_font = $this->get_fonts_data( $shortcode['title_google_font'] );

				// Build the inline style.
				$this->radiant_accordion_title_font_inline_style = $this->google_fonts_styles( $title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $title_google_font );

				$this->title_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['accordion_title_font'] ) {

				// Build the inline style.
				$this->radiant_accordion_title_font_inline_style = 'font-family: ' . $shortcode['title_custom_font'] . ';';
				$this->title_font_weight_style                   = 'font-weight: ' . $shortcode['title_font_weight'] . ';font-style: ' . $shortcode['title_font_style'] . ';';

			} else {
				$this->radiant_accordion_title_font_inline_style = '';
				$this->title_font_weight_style                   = '';
			}

			if ( 'gfont' === $shortcode['accordion_content_font'] ) {

				// Build the Accordion font array.
				$content_google_font = $this->get_fonts_data( $shortcode['content_google_font'] );

				// Build the inline style.
				$this->radiant_accordion_content_font_inline_style = $this->google_fonts_styles( $content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $content_google_font );

				$this->content_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['accordion_content_font'] ) {

				// Build the inline style.
				$this->radiant_accordion_content_font_inline_style = 'font-family: ' . $shortcode['content_custom_font'] . ';';
				$this->content_font_weight_style                   = 'font-weight: ' . $shortcode['content_font_weight'] . ';font-style: ' . $shortcode['content_font_style'] . ';';

			} else {

				$this->radiant_accordion_content_font_inline_style = '';
				$this->content_font_weight_style                   = '';

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

			// ADD CUSTOM CSS.
			$custom_css = $shortcode['accordion_color'] ? '.radiantthemes-accordion.element-one.' . $random_class . ' .radiantthemes-accordion-item.radiantthemes-active > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon,
			.radiantthemes-accordion.element-two.' . $random_class . ' .radiantthemes-accordion-item.radiantthemes-active,
			.radiantthemes-accordion.element-two.' . $random_class . ' .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:before,
		    .radiantthemes-accordion.element-two.' . $random_class . ' .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon > .line:after{
                background-color: ' . $shortcode['accordion_color'] . ' ;
            }
            .radiantthemes-accordion.element-one.' . $random_class . ' .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon{
                border-color: ' . $shortcode['accordion_color'] . ' ;
            }
            .radiantthemes-accordion.element-one .radiantthemes-accordion-item > .radiantthemes-accordion-item-title > .radiantthemes-accordion-item-title-icon i.main-icon:before,
            .radiantthemes-accordion.element-four.' . $random_class . ' .radiantthemes-accordion-item.radiantthemes-active > .radiantthemes-accordion-item-title > .panel-title{
                color: ' . $shortcode['accordion_color'] . ' !important;
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			// ADDITIONAL ID.
			$accordion_id = $shortcode['accordion_extra_id'] ? 'id="' . esc_attr( $shortcode['accordion_extra_id'] ) . '"' : '';

			// ADDITIONAL CSS.
			$accordion_content_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['accordion_css'], ' ' ), $atts );

			$output  = '<div class="radiantthemes-accordion element-' . esc_attr( $shortcode['accordion_style'] ) . ' ' . esc_attr( $shortcode['accordion_extra_class'] ) . ' ' . esc_attr( $accordion_content_css ) . ' ' . $random_class . '" ' . $accordion_id . ' >';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			return $output;
		}

		/**
		 * [radiantthemes_accordion_style_item_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_item_func( $atts, $content = null, $tag ) {
			$accordionicon = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_accordionstyle' => '',
					'accordion_item_title'   => '',
				),
				$atts
			);

			$output = '';

			if ( ! isset( $shortcode['accordion_item_title'] ) || '' === $shortcode['accordion_item_title'] ) {
				$shortcode['accordion_item_title'] = 'Accordion';
			}
			require 'template/template-accordion-element-' . $this->radiant_accordionstyle . '.php';
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style extends WPBakeryShortCodesContainer {

	}
}

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style_Item extends WPBakeryShortCode {

	}
}
