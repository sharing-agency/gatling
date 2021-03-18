<?php
/**
 * Custom Menu
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Menu' ) ) {

	/**
	 * Get All created menu list.
	 *
	 * @return array
	 */
	function rt_get_menu() {
		$custom_menus = array();
		if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			if ( is_array( $menus ) && ! empty( $menus ) ) {
				foreach ( $menus as $single_menu ) {
					if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
						$custom_menus[ $single_menu->name ] = $single_menu->term_id;
					}
				}
			}
		}
		return $custom_menus;
	}
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Menu extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Custom Menu', 'radiantthemes-addons' ),
					'base'        => 'rt_menu_style',
					'description' => esc_html__( 'Add Custom Menu with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Menu-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_menu_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Menu Style', 'radiantthemes-addons' ),
							'param_name' => 'custom_menu_style',
							'value'      => array(
								esc_html__( 'Style One (Vertical - Dot Style)', 'radiantthemes-addons' )                                  => 'one',
								esc_html__( 'Style Two (Vertical - Solid Background No Bullet Style) - Light', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three (Vertical - Right Arrow Style)', 'radiantthemes-addons' )                        => 'three',
								esc_html__( 'Style Four (Horizontal - Simple Style)', 'radiantthemes-addons' )                            => 'four',
								esc_html__( 'Style Five (Vertical - Solid Background No Bullet Style) -  Dark', 'radiantthemes-addons' )  => 'five',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Menu', 'radiantthemes-addons' ),
							'param_name'  => 'nav_menu',
							'value'       => array_flip( rt_get_menu() ),
							'description' => empty( rt_get_menu() ) ? esc_html__( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'radiantthemes-addons' ) : esc_html__( 'Select menu to display.', 'radiantthemes-addons' ),
							'save_always' => true,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'nav_menu_content_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'nav_menu_google_content_font',
							'dependency' => array(
								'element' => 'nav_menu_content_font',
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
							'param_name' => 'nav_menu_custom_content_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'nav_menu_content_font',
								'value'   => 'cfont',
							),
							'group'      => 'Typography',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'param_name' => 'nav_menu_font_size',
							'value'      => '15px',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'nav_menu_content_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'param_name' => 'nav_menu_line_height',
							'value'      => '28px',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'nav_menu_content_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'nav_menu_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'nav_menu_content_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'nav_menu_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'nav_menu_content_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Custom Menu Font Color', 'radiantthemes-addons' ),
							'param_name'  => 'custom_menu_font_color',
							'description' => esc_html__( 'Set your Custom Menu Font Color. (If not selected, it will take theme default font color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
					),
				)
			);
			add_shortcode( 'rt_menu_style', array( $this, 'radiantthemes_menu_style_func' ) );
		}

		/**
		 * [radiantthemes_menu_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_menu_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'custom_menu_style'            => 'one',
					'nav_menu'                     => '',
					'nav_menu_content_font'        => '',
					'nav_menu_custom_content_font' => '',
					'nav_menu_google_content_font' => '',
					'nav_menu_font_size'           => '15px',
					'nav_menu_line_height'         => '28px',
					'nav_menu_font_weight'         => '400',
					'nav_menu_font_style'          => 'normal',
					'custom_menu_font_color'       => '',
					'extra_class'                  => '',
					'extra_id'                     => '',
				),
				$atts
			);

			if ( 'gfont' === $shortcode['nav_menu_content_font'] ) {

				// Build the blockquote font array.
				$nav_menu_google_font = $this->get_fonts_data( $shortcode['nav_menu_google_content_font'] );

				// Build the inline style.
				$nav_menu_font = $this->google_fonts_styles( $nav_menu_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $nav_menu_google_font );

			} elseif ( 'cfont' === $shortcode['nav_menu_content_font'] ) {

				// Build the inline style.
				$nav_menu_font = 'font-family: ' . $shortcode['nav_menu_custom_content_font'] . ';';

			} else {

				$nav_menu_font = '';

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

			if ( ! empty( $shortcode['custom_menu_font_color'] ) ) {
				// CUSTOM CSS.
				$custom_css = ".radiantthemes-custom-menu.element-five.{$random_class} ul.menu li a:before{
					background-color: {$shortcode['custom_menu_font_color']} ;
				}
				.radiantthemes-custom-menu.element-one.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-two.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-three.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-four.{$random_class} ul.menu li,
				.radiantthemes-custom-menu.element-five.{$random_class} ul.menu li:hover a,
				.radiantthemes-custom-menu.element-five.{$random_class} ul.menu li.current-menu-item a{
					color: {$shortcode['custom_menu_font_color']} ;
				}
				.radiantthemes-custom-menu.element-two.{$random_class} ul.menu li:hover a,
				.radiantthemes-custom-menu.element-two.{$random_class} ul.menu li.current-menu-item a{
					border-left-color: {$shortcode['custom_menu_font_color']} ;
				}";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}

			$custom_weight_style_css = ".radiantthemes-custom-menu.element-one.{$random_class} ul.menu li,
			.radiantthemes-custom-menu.element-two.{$random_class} ul.menu li,
			.radiantthemes-custom-menu.element-three.{$random_class} ul.menu li,
			.radiantthemes-custom-menu.element-four.{$random_class} ul.menu li,
			.radiantthemes-custom-menu.element-five.{$random_class} ul.menu li:hover a,
			.radiantthemes-custom-menu.element-five.{$random_class} ul.menu li.current-menu-item a{
				font-size: {$shortcode['nav_menu_font_size']};
				line-height: {$shortcode['nav_menu_line_height']};
				font-weight: {$shortcode['nav_menu_font_weight']};
				font-style: {$shortcode['nav_menu_font_style']};
			}";
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_weight_style_css );

			// MAIN LAYOUT.
			$ex_id   = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			$output  = '<!-- radiantthemes-custom-menu -->';
			$output .= '<div class="radiantthemes-custom-menu element-' . $shortcode['custom_menu_style'] . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '"  ' . $ex_id . '  >';
				require 'template/template-menu-item-' . $shortcode['custom_menu_style'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-custom-menu -->' . "\r";
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
