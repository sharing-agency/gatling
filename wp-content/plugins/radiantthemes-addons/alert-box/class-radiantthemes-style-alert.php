<?php
/**
 * Button Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Alert' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Alert extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Alert Box', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add alert box', 'radiantthemes-addons' ),
					'base'        => 'rt_alert_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Alert-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_alert_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Style', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_style',
							'value'      => array(
								esc_html__( 'Style One (Default Style)', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two (3D Style)', 'radiantthemes-addons' )      => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Type', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_type',
							'value'      => array(
								esc_html__( 'Info', 'radiantthemes-addons' )     => 'info',
								esc_html__( 'Success', 'radiantthemes-addons' )  => 'success',
								esc_html__( 'Warning', 'radiantthemes-addons' )  => 'warning',
								esc_html__( 'Danger', 'radiantthemes-addons' )   => 'danger',
							),
							'std'        => 'info',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Is Dismissible?', 'radiantthemes-addons' ),
							'param_name' => 'alert_box_dismissible',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Alert Title', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Alert Text', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_text',
							'value'       => esc_html__( 'Hola, I am an alert box.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),

						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,

						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),

						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'alert_box_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Alert Font', 'radiantthemes-addons' ),
							'param_name' => 'alert_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'alert_google_font',
							'dependency' => array(
								'element' => 'alert_select_font',
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
							'param_name' => 'alert_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'alert_select_font',
								'value'   => 'cfont',
							),
							'group'      => 'Typography',
							'std'        => 'Great Vibes',
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'alert_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'alert_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'alert_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'alert_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'alert_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'alert_select_font',
								'value'   => 'cfont',
							),
						),

					),
					'js_view'     => 'VcIconElementView_Backend',
				)
			);
			add_shortcode( 'rt_alert_style', array( $this, 'radiantthemes_alert_style_func' ) );
		}

		/**
		 * [radiantthemes_alert_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_alert_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'alert_box_style'       => 'one',
					'alert_box_type'        => 'info',
					'alert_box_dismissible' => 'yes',
					'alert_box_title'       => '',
					'alert_box_text'        => 'Hola, I am an alert box.',
					'alert_box_animation'   => '',
					'alert_box_extra_class' => '',
					'alert_box_extra_id'    => '',
					'alert_select_font'     => '',
					'alert_google_font'     => '',
					'alert_custom_font'     => 'Great Vibes',
					'alert_font_container'  => '',
					'alert_font_weight'     => '400',
					'alert_font_style'      => 'normal',
				),
				$atts
			);

			if ( $shortcode['alert_font_container'] ) {
				$alert_font_container    = explode( '|', $shortcode['alert_font_container'] );
				$alert_font_container[1] = urldecode( $alert_font_container[1] );
				$alert_font_container    = implode( ';', $alert_font_container );
				$alert_font_container    = str_replace( '_', '-', $alert_font_container );
				$alert_font_container    = $alert_font_container . ';';
			} else {
				$alert_font_container = '';
			}

			if ( 'gfont' === $shortcode['alert_select_font'] ) {

				// Build the Alert font array.
				$alert_google_font = $this->get_fonts_data( $shortcode['alert_google_font'] );

				// Build the inline style.
				$alert_font_inline_style = $this->google_fonts_styles( $alert_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $alert_google_font );

				$alert_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['alert_select_font'] ) {

				// Build the inline style.
				$alert_font_inline_style = 'font-family: ' . $shortcode['alert_custom_font'] . ';';
				$alert_font_weight_style = 'font-weight: ' . $shortcode['alert_font_weight'] . ';font-style: ' . $shortcode['alert_font_style'] . ';';

			} else {

				$alert_font_inline_style = '';
				$alert_font_weight_style = '';

			}

			// ADD ANIMATION CLASS.
			$animation_classes = $this->getCSSAnimation( $shortcode['alert_box_animation'] );

			// ADD EXTRA ID.
			$alert_box_extra_id = $shortcode['alert_box_extra_id'] ? 'id="' . esc_attr( $shortcode['alert_box_extra_id'] ) . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output = '<div class="radiantthemes-alert-box element-' . $shortcode['alert_box_style'] . ' ' . $animation_classes . ' ' . esc_attr( $shortcode['alert_box_extra_class'] ) . ' alert alert-' . $shortcode['alert_box_type'] . ' fade in" style="' . esc_attr( $alert_font_inline_style ) . ' ' . esc_attr( $alert_font_container ) . esc_attr( $alert_font_weight_style ) . '"' . $alert_box_extra_id . '>';
			if ( 'yes' === $shortcode['alert_box_dismissible'] ) {
				$output .= '<a href="#" class="close" data-dismiss="alert"><i class="fa fa-times"></i></a>';
			}
			$output .= '<div class="icon">';
			if ( 'info' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-info"></i>';
			} elseif ( 'success' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-check-circle-o"></i>';
			} elseif ( 'warning' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-bell-o"></i>';
			} elseif ( 'danger' === $shortcode['alert_box_type'] ) {
				$output .= '<i class="fa fa-exclamation-triangle"></i>';
			}
			$output .= '</div>';
			$output .= '<strong>' . esc_attr( $shortcode['alert_box_title'] ) . '</strong>';
			$output .= esc_attr( $shortcode['alert_box_text'] );
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
