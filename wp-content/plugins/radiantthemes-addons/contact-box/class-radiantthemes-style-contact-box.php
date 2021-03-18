<?php
/**
 * Contact Box Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Contact_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Contact_Box extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Contact Box', 'radiantthemes-addons' ),
					'base'        => 'rt_contact_box_style',
					'description' => esc_html__( 'Add Contact Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Contact-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_contact_box__style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Contact Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_style',
							'value'       => array(
								'Style One (With Title)' => 'one',
								'Style Two (Without Title)' => 'two',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Contact Box Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_color',
							'description' => esc_html__( 'Set your Contact Box Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Contact Box Font Color', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_font_color',
							'description' => esc_html__( 'Set your Contact Box Font Color. (If not selected, it will take theme default font color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Address', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put address to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_address',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Email', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put email to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_email',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Phone', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put phone to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_phone',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Fax', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put fax to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_fax',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter WhatsApp', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Put whatsapp to be displayed on contact box.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_whatsapp',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'contact_box_css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Font', 'radiantthemes-addons' ),
							'param_name' => 'contact_box_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'contact_box_google_font',
							'dependency' => array(
								'element' => 'contact_box_select_font',
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
							'param_name' => 'contact_box_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'contact_box_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'contact_box_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'contact_box_select_font',
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
							'param_name' => 'contact_box_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'contact_box_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'contact_box_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'contact_box_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_contact_box_style', array( $this, 'radiantthemes_contact_box_style_func' ) );
		}

		/**
		 * [radiantthemes_contact_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_contact_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'contact_box_style'          => 'one',
					'contact_box_color'          => '',
					'contact_box_font_color'     => '',
					'contact_box_address'        => '',
					'contact_box_email'          => '',
					'contact_box_phone'          => '',
					'contact_box_fax'            => '',
					'contact_box_whatsapp'       => '',
					'contact_box_animation'      => '',
					'contact_box_extra_id'       => '',
					'contact_box_extra_class'    => '',
					'contact_box_css'            => '',
					'contact_box_select_font'    => '',
					'contact_box_google_font'    => '',
					'contact_box_custom_font'    => '',
					'contact_box_font_container' => '',
					'contact_box_font_weight'    => '400',
					'contact_box_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['contact_box_font_container'] ) {
				$contact_box_font_container = explode( '|', $shortcode['contact_box_font_container'] );
				$contact_box_font_container = implode( ';', $contact_box_font_container );
				$contact_box_font_container = str_replace( '_', '-', $contact_box_font_container );
				$contact_box_font_container = $contact_box_font_container . ';';
			} else {
				$contact_box_font_container = '';
			}

			if ( 'gfont' === $shortcode['contact_box_select_font'] ) {

				// Build the case studies filter font array.
				$contact_box_google_font = $this->get_fonts_data( $shortcode['contact_box_google_font'] );

				// Build the inline style.
				$contact_box_font_inline_style = $this->google_fonts_styles( $contact_box_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $contact_box_google_font );

				$contact_box_weight_style = '';

			} elseif ( 'cfont' === $shortcode['contact_box_select_font'] ) {

				// Build the inline style.
				$contact_box_font_inline_style = 'font-family: ' . $shortcode['contact_box_custom_font'] . ';';
				$contact_box_weight_style      = 'font-weight: ' . $shortcode['contact_box_font_weight'] . ';font-style: ' . $shortcode['contact_box_font_style'] . ';';

			} else {

				$contact_box_font_inline_style = '';
				$contact_box_weight_style      = '';

			}

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['contact_box_animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['contact_box_animation'], ' ' ), $atts );

			// ADD DESIGN CSS.
			$contact_box_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['contact_box_css'], ' ' ), $atts );

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
			$custom_css  = $shortcode['contact_box_color'] ? '.radiantthemes-contact-box.element-one.' . $random_class . ' ul li i,
			.radiantthemes-contact-box.element-one.' . $random_class . ' ul li span[class*="ti-"],
			.radiantthemes-contact-box.element-two.' . $random_class . ' ul li i,
			.radiantthemes-contact-box.element-two.' . $random_class . ' ul li span[class*="ti-"]{
			    color: ' . $shortcode['contact_box_color'] . ' ;
			}' : '';
			$custom_css .= $shortcode['contact_box_font_color'] ? '.radiantthemes-contact-box.element-one.' . $random_class . ' ul li,
			.radiantthemes-contact-box.element-two.' . $random_class . ' ul li{
			    color: ' . $shortcode['contact_box_font_color'] . ' ;
			}' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			// GET ID.
			$contact_box_id = $shortcode['contact_box_extra_id'] ? 'id="' . esc_attr( $shortcode['contact_box_extra_id'] ) . '"' : '';

			// MAIL LAYOUT.
			$output  = "\r" . '<!-- radiantthemes-contact-box -->' . "\r";
			$output .= '<div class="radiantthemes-contact-box ' . esc_attr( $random_class ) . ' element-' . esc_attr( $shortcode['contact_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $contact_box_css . ' ' . $shortcode['contact_box_extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $contact_box_id . '>';
				require 'template/template-contact-box-item-' . $shortcode['contact_box_style'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-contact-box -->' . "\r";
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
