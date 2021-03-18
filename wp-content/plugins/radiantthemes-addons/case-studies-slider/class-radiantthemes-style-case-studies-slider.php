<?php
/**
 * Case Studies Slider Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Case_Studies_Slider' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Case_Studies_Slider extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Case Studies Slider', 'radiantthemes-addons' ),
					'base'        => 'rt_case_studies_slider_style',
					'description' => esc_html__( 'Add Case Studies Slider.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Case-Studies-Slider-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_case_studies_slider_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Studies Slider Style', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Overlay With Bottom Title)', 'radiantthemes-addons' )            => 'one',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_color',
							'description' => esc_html__( 'Set your Case Studies Slider Color Scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Case Studies Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter case studies category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_category',
							'value'       => 'all',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_allow_loop',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_allow_autoplay',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_autoplay_timeout',
							'value'      => 6000,
							'dependency' => array(
								'element' => 'case_studies_slider_allow_autoplay',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_desktop',
							'description' => esc_html__( 'Items on Desktop (in single row)', 'radiantthemes-addons' ),
							'value'       => '5',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_tab',
							'description' => esc_html__( 'Items on Tab (in single row)', 'radiantthemes-addons' ),
							'value'       => '3',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'case_studies_slider_items_in_mobile',
							'description' => esc_html__( 'Items on Mobile (in single row)', 'radiantthemes-addons' ),
							'value'       => '1',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
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
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_looping_order',
							'value'      => array(
								esc_html__( 'Date', 'radiantthemes-addons' )       => 'date',
								esc_html__( 'ID', 'radiantthemes-addons' )         => 'ID',
								esc_html__( 'Title', 'radiantthemes-addons' )      => 'title',
								esc_html__( 'Modified', 'radiantthemes-addons' )   => 'modified',
								esc_html__( 'Random', 'radiantthemes-addons' )     => 'random',
								esc_html__( 'Menu order', 'radiantthemes-addons' ) => 'menu_order',
							),
							'std'        => 'ID',
							'group'      => 'Looping',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_slider_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Category Font', 'radiantthemes-addons' ),
							'param_name' => 'cs_slider_cat_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'cs_slider_cat_google_font',
							'dependency' => array(
								'element' => 'cs_slider_cat_select_font',
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
							'param_name' => 'cs_slider_cat_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'cs_slider_cat_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'cs_slider_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'cs_slider_title_google_font',
							'dependency' => array(
								'element' => 'cs_slider_title_select_font',
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
							'param_name' => 'cs_slider_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'cs_slider_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_case_studies_slider_style', array( $this, 'radiantthemes_case_studies_slider_style_func' ) );
		}

		/**
		 * [radiantthemes_case_studies_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_case_studies_slider_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'case_studies_slider_style_variation'  => 'one',
					'case_studies_slider_color'            => '',
					'case_studies_category'                => 'all',
					'case_studies_slider_allow_loop'       => 'true',
					'case_studies_slider_allow_autoplay'   => 'true',
					'case_studies_slider_autoplay_timeout' => '6000',
					'case_studies_slider_items_in_desktop' => '5',
					'case_studies_slider_items_in_tab'     => '3',
					'case_studies_slider_items_in_mobile'  => '1',
					'case_studies_slider_enable_zoom'      => 'no',
					'extra_class'                          => '',
					'extra_id'                             => '',
					'case_studies_slider_looping_order'    => 'ID',
					'case_studies_slider_looping_sort'     => 'DESC',
					'cs_slider_cat_select_font'            => '',
					'cs_slider_cat_google_font'            => '',
					'cs_slider_cat_custom_font'            => '',
					'cs_slider_title_select_font'          => '',
					'cs_slider_title_google_font'          => '',
					'cs_slider_title_custom_font'          => '',
				),
				$atts
			);

			if ( 'gfont' === $shortcode['cs_slider_cat_select_font'] ) {
				// Build the case studies slider category font array.
				$cs_slider_cat_google_font = $this->get_fonts_data( $shortcode['cs_slider_cat_google_font'] );

				// Build the inline style.
				$cs_slider_cat_font_inline_style = $this->google_fonts_styles( $cs_slider_cat_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $cs_slider_cat_google_font );
			} elseif ( 'cfont' === $shortcode['cs_slider_cat_select_font'] ) {
				// Build the inline style.
				$cs_slider_cat_font_inline_style = 'font-family: ' . $shortcode['cs_slider_cat_custom_font'];
			} else {
				$cs_slider_cat_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['cs_slider_title_select_font'] ) {
				// Build the call to action font array.
				$cs_slider_title_google_font = $this->get_fonts_data( $shortcode['cs_slider_title_google_font'] );

				// Build the inline style.
				$cs_slider_title_font_inline_style = $this->google_fonts_styles( $cs_slider_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $cs_slider_title_google_font );
			} elseif ( 'cfont' === $shortcode['cs_slider_title_select_font'] ) {
				// Build the inline style.
				$cs_slider_title_font_inline_style = 'font-family: ' . $shortcode['cs_slider_title_custom_font'];
			} else {
				$cs_slider_title_font_inline_style = '';
			}

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$random_class = 'rt' . rand();
			$custom_css   = '';

			$custom_css .= $shortcode['case_studies_slider_color'] ? '.radiantthemes-case-studies-slider.element-one.' . $random_class . ' .radiantthemes-case-studies-slider-item > .holder > .action-button > .btn{
                background-color: ' . $shortcode['case_studies_slider_color'] . ';
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			$enable_zoom = ( 'yes' === $shortcode['case_studies_slider_enable_zoom'] ) ? ' has-fancybox' : '';

			require 'template/template-case-studies-slider-style-' . esc_attr( $shortcode['case_studies_slider_style_variation'] ) . '.php';

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
