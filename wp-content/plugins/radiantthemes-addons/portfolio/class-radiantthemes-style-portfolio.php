<?php
/**
 * Portfolio Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Portfolio' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Portfolio extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Portfolio', 'radiantthemes-addons' ),
					'base'        => 'rt_portfolio_style',
					'description' => esc_html__( 'Add Portfolio with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Portfolio-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_portfolio_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Masonry)', 'radiantthemes-addons' )                              => 'one',
								esc_html__( 'Style Two (Masonry)', 'radiantthemes-addons' )                              => 'two',
								esc_html__( 'Style Three (Box)', 'radiantthemes-addons' )                                => 'three',
								esc_html__( 'Style Four (Masonry)', 'radiantthemes-addons' )                             => 'four',
								esc_html__( 'Style Five (Masonry)', 'radiantthemes-addons' )                             => 'five',
								esc_html__( 'Style Six (Masonry) - 4 Items In a Row', 'radiantthemes-addons' )           => 'six',
								esc_html__( 'Style Seven (Masonry) - 4 Items In a Row', 'radiantthemes-addons' )         => 'seven',
								esc_html__( 'Style Eight (Box)', 'radiantthemes-addons' )                                => 'eight',
								esc_html__( 'Style Nine (Box)', 'radiantthemes-addons' )                                 => 'nine',
								esc_html__( 'Style Ten (Small Data Box)', 'radiantthemes-addons' )                       => 'ten',
								esc_html__( 'Style Eleven (Classic - On Hover Overlay Data)', 'radiantthemes-addons' )   => 'eleven',
								esc_html__( 'Style Twelve (Masonry)', 'radiantthemes-addons' )                           => 'twelve',
								esc_html__( 'Style Thirteen (Masonry)', 'radiantthemes-addons' )                         => 'thirteen',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_color',
							'description' => esc_html__( 'Set your Portfolio Color Scheme. (If not selected, it will take default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Portfolio Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter portfolio category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_category',
							'value'       => 'all',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_max_posts',
							'description' => esc_html__( 'Use -1 to dislay all posts. ', 'radiantthemes-addons' ),
							'value'       => '8',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'How many items in a row?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_row_posts',
							'description' => esc_html__( 'Set number of posts to display in a row. ', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Four', 'radiantthemes-addons' )  => 'four',
							),
							'std'         => 'three',
							'dependency'  => array(
								'element' => 'portfolio_style_variation',
								'value'   => array(
									'five',
									'eight',
									'nine',
									'twelve',
									'thirteen',
								),
							),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Enable portfolio link?', 'radiantthemes-addons' ),
							'param_name' => 'add_link',
							// 'value'       => 'true',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Enable portfolio zoom?', 'radiantthemes-addons' ),
							'param_name' => 'add_zoom',
							// 'value'       => 'true',
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
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'portfolio_title_google_font',
							'dependency' => array(
								'element' => 'portfolio_title_select_font',
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
							'param_name' => 'portfolio_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'portfolio_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'portfolio_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'portfolio_title_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Title color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'portfolio_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'portfolio_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Category Font', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_category_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'portfolio_category_google_font',
							'dependency' => array(
								'element' => 'portfolio_category_select_font',
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
							'param_name' => 'portfolio_category_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'portfolio_category_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'portfolio_category_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'portfolio_category_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Title color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_category_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'portfolio_category_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_category_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'portfolio_category_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_looping_order',
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
							'param_name' => 'portfolio_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'ASC',
							'group'      => 'Looping',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Offset Posts', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_looping_offset',
							'description' => esc_html__( 'Use this field to ignore few posts (Eg.: 2 ).', 'radiantthemes-addons' ),
							'group'       => 'Looping',
						),
					),
				)
			);
			add_shortcode( 'rt_portfolio_style', array( $this, 'radiantthemes_portfolio_style_func' ) );
		}

		/**
		 * [radiantthemes_portfolio_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_portfolio_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'portfolio_style_variation'         => 'one',
					'portfolio_color'                   => '',
					'portfolio_category'                => 'all',
					'portfolio_max_posts'               => '8',
					'portfolio_row_posts'               => 'three',
					'add_zoom'                          => '',
					'add_link'                          => '',
					'portfolio_box_number'              => '3',
					'extra_class'                       => '',
					'extra_id'                          => '',
					'portfolio_looping_order'           => 'ID',
					'portfolio_looping_sort'            => 'ASC',
					'portfolio_looping_offset'          => '0',
					'portfolio_title_select_font'       => '',
					'portfolio_title_google_font'       => '',
					'portfolio_title_custom_font'       => '',
					'portfolio_title_font_container'    => '',
					'portfolio_title_font_weight'       => '400',
					'portfolio_title_font_style'        => 'normal',
					'portfolio_category_select_font'    => '',
					'portfolio_category_google_font'    => '',
					'portfolio_category_custom_font'    => '',
					'portfolio_category_font_container' => '',
					'portfolio_category_font_weight'    => '400',
					'portfolio_category_font_style'     => 'normal',
				),
				$atts
			);

			$tem = 1;

			if ( $shortcode['portfolio_title_font_container'] ) {
				$portfolio_title_font_container    = explode( '|', $shortcode['portfolio_title_font_container'] );
				$portfolio_title_font_container[1] = urldecode( $portfolio_title_font_container[1] );
				$portfolio_title_font_container    = implode( ';', $portfolio_title_font_container );
				$portfolio_title_font_container    = str_replace( '_', '-', $portfolio_title_font_container );
				$portfolio_title_font_container    = $portfolio_title_font_container . ';';
			} else {
				$portfolio_title_font_container = '';
			}

			if ( $shortcode['portfolio_category_font_container'] ) {
				$portfolio_category_font_container    = explode( '|', $shortcode['portfolio_category_font_container'] );
				$portfolio_category_font_container[1] = urldecode( $portfolio_category_font_container[1] );
				$portfolio_category_font_container    = implode( ';', $portfolio_category_font_container );
				$portfolio_category_font_container    = str_replace( '_', '-', $portfolio_category_font_container );
				$portfolio_category_font_container    = $portfolio_category_font_container . ';';
			} else {
				$portfolio_category_font_container = '';
			}

			if ( 'gfont' === $shortcode['portfolio_title_select_font'] ) {

				// Build the case studies filter font array.
				$portfolio_title_google_font = $this->get_fonts_data( $shortcode['portfolio_title_google_font'] );

				// Build the inline style.
				$portfolio_title_font_inline_style = $this->google_fonts_styles( $portfolio_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $portfolio_title_google_font );

				$portfolio_title_weight_style = '';

			} elseif ( 'cfont' === $shortcode['portfolio_title_select_font'] ) {

				// Build the inline style.
				$portfolio_title_font_inline_style = 'font-family: ' . $shortcode['portfolio_title_custom_font'] . ';';
				$portfolio_title_weight_style      = 'font-weight: ' . $shortcode['portfolio_title_font_weight'] . ';font-style: ' . $shortcode['portfolio_title_font_style'] . ';';

			} else {

				$portfolio_title_font_inline_style = '';
				$portfolio_title_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['portfolio_category_select_font'] ) {

				// Build the call to action font array.
				$portfolio_category_google_font = $this->get_fonts_data( $shortcode['portfolio_category_google_font'] );

				// Build the inline style.
				$portfolio_category_font_inline_style = $this->google_fonts_styles( $portfolio_category_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $portfolio_category_google_font );

				$portfolio_category_weight_style = '';

			} elseif ( 'cfont' === $shortcode['portfolio_category_select_font'] ) {

				// Build the inline style.
				$portfolio_category_font_inline_style = 'font-family: ' . $shortcode['portfolio_category_custom_font'] . ';';
				$portfolio_category_weight_style      = 'font-weight: ' . $shortcode['portfolio_category_font_weight'] . ';font-style: ' . $shortcode['portfolio_category_font_style'] . ';';

			} else {

				$portfolio_category_font_inline_style = '';
				$portfolio_category_weight_style      = '';

			}

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			// RANDOM CLASS GENERATE.
			$random_class = 'rt' . rand();

			// CUSTOM CLASS GENERATE.
			$custom_css  = '';
			$custom_css .= $shortcode['portfolio_color'] ? '.rt-portfolio-box.element-eleven.' . $random_class . ' .rt-portfolio-box-item > .holder > .data .btn{
            	background-color: ' . $shortcode['portfolio_color'] . ';
            }' : '';
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			require 'template/template-portfolio-style-' . esc_attr( $shortcode['portfolio_style_variation'] ) . '.php';

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
