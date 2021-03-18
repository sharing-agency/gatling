<?php
/**
 * Pricing Table Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Pricing_Table' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Pricing_Table extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Pricing Item', 'radiantthemes-addons' ),
					'base'        => 'rt_pricing_table_style',
					'description' => esc_html__( 'Add pricing item with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/PricingTable-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blog_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Pricing Style', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_style_variation',
							'value'       => array(
								esc_html__( 'Style One (Classic)', 'radiantthemes-addons' )                => 'one',
								esc_html__( 'Style Two (Minimal)', 'radiantthemes-addons' )                => 'two',
								esc_html__( 'Style Three (Creative With Image)', 'radiantthemes-addons' )  => 'three',
								esc_html__( 'Style Four (Flat)', 'radiantthemes-addons' )                  => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_image',
							'heading'     => esc_html__( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_image',
							'dependency'  => array(
								'element' => 'pricing_table_style_variation',
								'value'   => array( 'three', 'seven' ),
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_title',
							'value'       => esc_html__( 'Basic Pack', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_subtitle',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Currency Symbol', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_currency_symbol',
							'value'       => '$',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Price (Without Currency Symbol)', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_price',
							'value'       => '199',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Period', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_period',
							'value'       => esc_html__( 'Per Month', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Tagline', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_tagline',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Button | Title', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_button',
							'value'       => esc_html__( 'Sign Up Now!', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Button | Link', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_button_link',
							'admin_label' => true,
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Highlight', 'radiantthemes-addons' ),
							'description' => esc_html__( 'If checked, item will be highlight By priority', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'spotlight',
							),
							'param_name'  => 'pricing_table_highlight',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_table_color',
							'description' => esc_html__( 'Set your Pricing Table Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
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
							'param_name' => 'pricing_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_title_google_font',
							'dependency' => array(
								'element' => 'pricing_title_select_font',
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
							'param_name' => 'pricing_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_title_select_font',
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
							'param_name' => 'pricing_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Subtitle Font', 'radiantthemes-addons' ),
							'param_name' => 'pricing_subtitle_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_subtitle_google_font',
							'dependency' => array(
								'element' => 'pricing_subtitle_select_font',
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
							'param_name' => 'pricing_subtitle_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_subtitle_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_subtitle_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_subtitle_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Subtitle color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'pricing_subtitle_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_subtitle_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_subtitle_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_subtitle_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Costing Font', 'radiantthemes-addons' ),
							'param_name' => 'pricing_cost_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_cost_google_font',
							'dependency' => array(
								'element' => 'pricing_cost_select_font',
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
							'param_name' => 'pricing_cost_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_cost_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_cost_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_cost_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Subtitle color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'pricing_cost_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_cost_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_cost_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_cost_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Tagline Font', 'radiantthemes-addons' ),
							'param_name' => 'pricing_tagline_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'dependency' => array(
								'element' => 'case_study_style_variation',
								'value'   => array(
									'one',
									'two',
									'three',
									'four',
									'five',
								),
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_tagline_google_font',
							'dependency' => array(
								'element' => 'pricing_tagline_select_font',
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
							'param_name' => 'pricing_tagline_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_tagline_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_tagline_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_tagline_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Tagline color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'pricing_tagline_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_tagline_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_tagline_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_tagline_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'pricing_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_content_google_font',
							'dependency' => array(
								'element' => 'pricing_content_select_font',
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
							'param_name' => 'pricing_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_content_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Content color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'pricing_content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_content_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Button Font', 'radiantthemes-addons' ),
							'param_name' => 'pricing_button_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'pricing_button_google_font',
							'dependency' => array(
								'element' => 'pricing_button_select_font',
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
							'param_name' => 'pricing_button_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'pricing_button_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'pricing_button_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'pricing_button_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select Subtitle color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'pricing_button_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'pricing_button_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'pricing_button_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'pricing_button_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_pricing_table_style', array( $this, 'radiantthemes_pricing_table_style_func' ) );
		}

		/**
		 * [radiantthemes_pricing_table_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_pricing_table_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'pricing_table_style_variation'   => 'one',
					'pricing_table_image'             => '',
					'pricing_table_title'             => 'This is pricing item element',
					'pricing_table_subtitle'          => '',
					'pricing_table_currency_symbol'   => '$',
					'pricing_table_price'             => '199',
					'pricing_table_period'            => 'Per Month',
					'pricing_table_tagline'           => '',
					'pricing_table_button'            => 'Buy Now!',
					'pricing_table_button_link'       => '',
					'pricing_table_highlight'         => '',
					'pricing_table_color'             => '',
					'animation'                       => '',
					'extra_class'                     => '',
					'extra_id'                        => '',
					'pricing_title_select_font'       => '',
					'pricing_title_google_font'       => '',
					'pricing_title_custom_font'       => '',
					'pricing_title_font_container'    => '',
					'pricing_title_font_weight'       => '400',
					'pricing_title_font_style'        => 'normal',
					'pricing_subtitle_select_font'    => '',
					'pricing_subtitle_google_font'    => '',
					'pricing_subtitle_custom_font'    => '',
					'pricing_subtitle_font_container' => '',
					'pricing_subtitle_font_weight'    => '400',
					'pricing_subtitle_font_style'     => 'normal',
					'pricing_cost_select_font'        => '',
					'pricing_cost_google_font'        => '',
					'pricing_cost_custom_font'        => '',
					'pricing_cost_font_container'     => '',
					'pricing_cost_font_weight'        => '400',
					'pricing_cost_font_style'         => 'normal',
					'pricing_tagline_select_font'     => '',
					'pricing_tagline_google_font'     => '',
					'pricing_tagline_custom_font'     => '',
					'pricing_tagline_font_container'  => '',
					'pricing_tagline_font_weight'     => '400',
					'pricing_tagline_font_style'      => 'normal',
					'pricing_content_select_font'     => '',
					'pricing_content_google_font'     => '',
					'pricing_content_custom_font'     => '',
					'pricing_content_font_container'  => '',
					'pricing_content_font_weight'     => '400',
					'pricing_content_font_style'      => 'normal',
					'pricing_button_select_font'      => '',
					'pricing_button_google_font'      => '',
					'pricing_button_custom_font'      => '',
					'pricing_button_font_container'   => '',
					'pricing_button_font_weight'      => '400',
					'pricing_button_font_style'       => 'normal',
				),
				$atts
			);

			if ( $shortcode['pricing_title_font_container'] ) {
				$pricing_title_font_container    = explode( '|', $shortcode['pricing_title_font_container'] );
				$pricing_title_font_container[1] = urldecode( $pricing_title_font_container[1] );
				$pricing_title_font_container    = implode( ';', $pricing_title_font_container );
				$pricing_title_font_container    = str_replace( '_', '-', $pricing_title_font_container );
				$pricing_title_font_container    = $pricing_title_font_container . ';';
			} else {
				$pricing_title_font_container = '';
			}

			if ( $shortcode['pricing_subtitle_font_container'] ) {
				$pricing_subtitle_font_container    = explode( '|', $shortcode['pricing_subtitle_font_container'] );
				$pricing_subtitle_font_container[1] = urldecode( $pricing_subtitle_font_container[1] );
				$pricing_subtitle_font_container    = implode( ';', $pricing_subtitle_font_container );
				$pricing_subtitle_font_container    = str_replace( '_', '-', $pricing_subtitle_font_container );
				$pricing_subtitle_font_container    = $pricing_subtitle_font_container . ';';
			} else {
				$pricing_subtitle_font_container = '';
			}

			if ( $shortcode['pricing_cost_font_container'] ) {
				$pricing_cost_font_container = explode( '|', $shortcode['pricing_cost_font_container'] );
				
				if ( isset( $pricing_cost_font_container[1] ) ) {
					$pricing_cost_font_container[1] = urldecode( $pricing_cost_font_container[1] );
				}
				
				if ( isset( $pricing_cost_font_container[0] ) ) {
				    $pricing_cost_font_container[0] = urldecode( $pricing_cost_font_container[0] );
				}
				
				$pricing_cost_font_container[0] = urldecode( $pricing_cost_font_container[0] );
				$pricing_cost_font_container[1] = urldecode( $pricing_cost_font_container[1] );

				$pricing_cost_font_container = implode( ';', $pricing_cost_font_container );
				$pricing_cost_font_container = str_replace( '_', '-', $pricing_cost_font_container );
				$pricing_cost_font_container = $pricing_cost_font_container . ';';
			} else {
				$pricing_cost_font_container = '';
			}

			if ( $shortcode['pricing_tagline_font_container'] ) {
				//var_dump($shortcode['pricing_tagline_font_container']);

				$pricing_tagline_font_container = explode( '|', $shortcode['pricing_tagline_font_container'] );

				if ( isset( $pricing_tagline_font_container[1] ) ) {
					$pricing_tagline_font_container[1] = urldecode( $pricing_tagline_font_container[1] );
				}

				$pricing_tagline_font_container = implode( ';', $pricing_tagline_font_container );
				$pricing_tagline_font_container = str_replace( '_', '-', $pricing_tagline_font_container );
				$pricing_tagline_font_container = $pricing_tagline_font_container . ';';
			} else {
				$pricing_tagline_font_container = '';
			}

			if ( $shortcode['pricing_content_font_container'] ) {
				$pricing_content_font_container    = explode( '|', $shortcode['pricing_content_font_container'] );
				$pricing_content_font_container[1] = urldecode( $pricing_content_font_container[1] );
				$pricing_content_font_container    = implode( ';', $pricing_content_font_container );
				$pricing_content_font_container    = str_replace( '_', '-', $pricing_content_font_container );
				$pricing_content_font_container    = $pricing_content_font_container . ';';
			} else {
				$pricing_content_font_container = '';
			}

			if ( $shortcode['pricing_button_font_container'] ) {
				$pricing_button_font_container    = explode( '|', $shortcode['pricing_button_font_container'] );
				$pricing_button_font_container[1] = urldecode( $pricing_button_font_container[1] );
				$pricing_button_font_container    = implode( ';', $pricing_button_font_container );
				$pricing_button_font_container    = str_replace( '_', '-', $pricing_button_font_container );
				$pricing_button_font_container    = $pricing_button_font_container . ';';
			} else {
				$pricing_button_font_container = '';
			}

			if ( 'gfont' === $shortcode['pricing_title_select_font'] ) {

				// Build the pricing title font array.
				$pricing_title_google_font = $this->get_fonts_data( $shortcode['pricing_title_google_font'] );

				// Build the inline style.
				$pricing_title_font_inline_style = $this->google_fonts_styles( $pricing_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_title_google_font );

				$pricing_title_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_title_select_font'] ) {

				// Build the inline style.
				$pricing_title_font_inline_style = 'font-family: ' . $shortcode['pricing_title_custom_font'] . ';';
				$pricing_title_font_weight_style = 'font-weight: ' . $shortcode['pricing_title_font_weight'] . ';font-style: ' . $shortcode['pricing_title_font_style'] . ';';

			} else {

				$pricing_title_font_inline_style = '';
				$pricing_title_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['pricing_subtitle_select_font'] ) {

				// Build the pricing subtitle font array.
				$pricing_subtitle_google_font = $this->get_fonts_data( $shortcode['pricing_subtitle_google_font'] );

				// Build the inline style.
				$pricing_subtitle_font_inline_style = $this->google_fonts_styles( $pricing_subtitle_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_subtitle_google_font );

				$pricing_subtitle_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_subtitle_select_font'] ) {

				// Build the inline style.
				$pricing_subtitle_font_inline_style = 'font-family: ' . $shortcode['pricing_subtitle_custom_font'] . ';';
				$pricing_subtitle_font_weight_style = 'font-weight: ' . $shortcode['pricing_subtitle_font_weight'] . ';font-style: ' . $shortcode['pricing_subtitle_font_style'] . ';';

			} else {

				$pricing_subtitle_font_inline_style = '';
				$pricing_subtitle_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['pricing_cost_select_font'] ) {

				// Build the pricing cost font array.
				$pricing_cost_google_font = $this->get_fonts_data( $shortcode['pricing_cost_google_font'] );

				// Build the inline style.
				$pricing_cost_font_inline_style = $this->google_fonts_styles( $pricing_cost_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_cost_google_font );

				$pricing_cost_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_cost_select_font'] ) {

				// Build the inline style.
				$pricing_cost_font_inline_style = 'font-family: ' . $shortcode['pricing_cost_custom_font'] . ';';
				$pricing_cost_font_weight_style = 'font-weight: ' . $shortcode['pricing_cost_font_weight'] . ';font-style: ' . $shortcode['pricing_cost_font_style'] . ';';

			} else {

				$pricing_cost_font_inline_style = '';
				$pricing_cost_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['pricing_tagline_select_font'] ) {

				// Build the pricing tagline font array.
				$pricing_tagline_google_font = $this->get_fonts_data( $shortcode['pricing_tagline_google_font'] );

				// Build the inline style.
				$pricing_tagline_font_inline_style = $this->google_fonts_styles( $pricing_tagline_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_tagline_google_font );

				$pricing_tagline_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_tagline_select_font'] ) {

				// Build the inline style.
				$pricing_tagline_font_inline_style = 'font-family: ' . $shortcode['pricing_tagline_custom_font'] . ';';
				$pricing_tagline_font_weight_style = 'font-weight: ' . $shortcode['pricing_tagline_font_weight'] . ';font-style: ' . $shortcode['pricing_tagline_font_style'] . ';';

			} else {

				$pricing_tagline_font_inline_style = '';
				$pricing_tagline_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['pricing_content_select_font'] ) {

				// Build the pricing table content font array.
				$pricing_content_google_font = $this->get_fonts_data( $shortcode['pricing_content_google_font'] );

				// Build the inline style.
				$pricing_content_font_inline_style = $this->google_fonts_styles( $pricing_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_content_google_font );

				$pricing_content_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_content_select_font'] ) {

				// Build the inline style.
				$pricing_content_font_inline_style = 'font-family: ' . $shortcode['pricing_content_custom_font'] . ';';
				$pricing_content_font_weight_style = 'font-weight: ' . $shortcode['pricing_content_font_weight'] . ';font-style: ' . $shortcode['pricing_content_font_style'] . ';';

			} else {

				$pricing_content_font_inline_style = '';
				$pricing_content_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['pricing_button_select_font'] ) {

				// Build the pricing table button font array.
				$pricing_button_google_font = $this->get_fonts_data( $shortcode['pricing_button_google_font'] );

				// Build the inline style.
				$pricing_button_font_inline_style = $this->google_fonts_styles( $pricing_button_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $pricing_button_google_font );

				$pricing_button_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['pricing_button_select_font'] ) {

				// Build the inline style.
				$pricing_button_font_inline_style = 'font-family: ' . $shortcode['pricing_button_custom_font'] . ';';
				$pricing_button_font_weight_style = 'font-weight: ' . $shortcode['pricing_button_font_weight'] . ';font-style: ' . $shortcode['pricing_button_font_style'] . ';';

			} else {

				$pricing_button_font_inline_style = '';
				$pricing_button_font_weight_style = '';

			}

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$random_class = 'rt' . wp_rand();
			if ( $shortcode['pricing_table_color'] ) {
				$custom_css = ".rt-pricing-table.element-one.{$random_class} > .holder > .pricing .price,
				.rt-pricing-table.element-one.{$random_class} > .holder > .more .btn,
				.rt-pricing-table.element-one.{$random_class} > .holder > .pricing .price sup,
    			.rt-pricing-table.element-two.{$random_class} > .holder > .pricing .price,
				.rt-pricing-table.element-two.{$random_class} > .holder > .more .btn,
				.rt-pricing-table.element-two.{$random_class} > .holder > .pricing .price sub,
				.rt-pricing-table.element-three.{$random_class} > .holder > .more .btn,
				.rt-pricing-table.element-three.{$random_class} > .holder > .pricing .price,
				.rt-pricing-table.element-three.{$random_class} > .holder > .pricing .price sup,
				.rt-pricing-table.element-three.{$random_class} > .holder > .pricing .price sub,
				.rt-pricing-table.element-four.{$random_class} > .holder > .pricing .price,
				.rt-pricing-table.element-four.{$random_class} > .holder > .pricing .price sup,
				.rt-pricing-table.element-four.{$random_class} > .holder > .pricing .price sub,
				.rt-pricing-table.element-four.{$random_class} > .holder > .more .btn{
	            	color: {$shortcode['pricing_table_color']} ;
	            }
                .rt-pricing-table.element-one.spotlight.{$random_class} > .holder > .pricing .pricing-tag,
                .rt-pricing-table.element-one.{$random_class} > .holder > .more .btn:hover,
                .rt-pricing-table.element-one.spotlight.{$random_class} > .holder > .more .btn,
                .rt-pricing-table.element-two.spotlight.{$random_class} > .holder > .more .btn,
                .rt-pricing-table.element-three.spotlight.{$random_class} > .holder > .hightlight-tag,
                .rt-pricing-table.element-three.spotlight.{$random_class} > .holder > .more .btn,
	            .rt-pricing-table.element-four.{$random_class} > .holder > .spotlight-tag > .spotlight-tag-text,
	            .rt-pricing-table.element-four.spotlight.{$random_class} > .holder > .more .btn{
	            	background-color: {$shortcode['pricing_table_color']} ;
	            }
                .rt-pricing-table.element-one.{$random_class} > .holder > .more .btn,
                .rt-pricing-table.element-two.{$random_class} > .holder > .more .btn,
                .rt-pricing-table.element-three.{$random_class} > .holder > .more .btn,
				.rt-pricing-table.element-four.{$random_class} > .holder > .more .btn{
	            	border-color: {$shortcode['pricing_table_color']} ;
	            }
                .rt-pricing-table.element-two.spotlight.{$random_class} > .holder{
                	border-top-color: {$shortcode['pricing_table_color']} ;
                }";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			$pricing_table_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';

			$output  = '<!-- rt-pricing-table -->';
			$output .= '<div class="rt-pricing-table element-' . $shortcode['pricing_table_style_variation'] . ' ' . $shortcode['pricing_table_highlight'] . ' ' . $animation_classes . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '"  ' . $pricing_table_id . ' >';

			require 'template/template-pricing-item-' . $shortcode['pricing_table_style_variation'] . '.php';

			$output .= '</div>' . "\r";
			$output .= '<!-- rt-pricing-table -->' . "\r";

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
