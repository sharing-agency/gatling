<?php
/**
 * Fancy Text Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Fancy_Text_Box' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Fancy_Text_Box extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Fancy Text Box', 'radiantthemes-addons' ),
					'base'        => 'rt_fancy_text_box_style',
					'description' => esc_html__( 'Add Fancy Text Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/FancyTextBox-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_team_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Fancy Text Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'style_variation',
							'value'       => array(
								esc_html__( 'Style One (On Hover Shadow)', 'radiantthemes-addons' )                    => 'one',
								esc_html__( 'Style Two (On Hover Dark Shade)', 'radiantthemes-addons' )                => 'two',
								esc_html__( 'Style Three (On Hover 3D Shadow)', 'radiantthemes-addons' )               => 'three',
								esc_html__( 'Style Four (Left Icon On Hover Shadow)', 'radiantthemes-addons' )         => 'four',
								esc_html__( 'Style Five (Image With On Hover Slide Button)', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six (Image With Overlay Data)', 'radiantthemes-addons' )            => 'six',
								esc_html__( 'Style Seven (On Hover Colored Box)', 'radiantthemes-addons' )             => 'seven',
								esc_html__( 'Style Eight (On Hover Image Box)', 'radiantthemes-addons' )             => 'eight',

							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_color',
							'description' => esc_html__( 'Set your Fancy Textbox Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'value'       => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'value'       => esc_html__( 'Subtitle', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_subtitle',
							'admin_label' => true,
							/*'dependency' => array(
								'element' => 'rt_fancy_text_box_style',
								'value'   => 'image',
							),*/

						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Fancy Text Box Content', 'radiantthemes-addons' ),
							'value'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do.', 'radiantthemes-addons' ),
							'param_name' => 'fancy_textbox_content',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Type', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Choose if you want image or icon.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Image', 'radiantthemes-addons' ) => 'image',
								esc_html__( 'Icon', 'radiantthemes-addons' )  => 'icon',
							),
							'param_name'  => 'fancy_textbox_icontype',
							'std'         => 'image',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Add Icon (Eg. 80x80)', 'radiantthemes-addons' ),
							'param_name' => 'fancy_textbox_image',
							'dependency' => array(
								'element' => 'fancy_textbox_icontype',
								'value'   => 'image',
							),
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Add Hover Image', 'radiantthemes-addons' ),
							'param_name' => 'fancy_textbox_hover_image',
							'dependency' => array(
								'element' => 'style_variation',
								'value'   => 'eight',
							),						
							),

						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Library', 'radiantthemes-addons' ),
							'description' => esc_html__( 'From custom icon library.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Icofont', 'radiantthemes-addons' )    => 'icofont-font',
							),
							'param_name'  => 'fancy_textbox_icon',
							'std'         => 'icofont-font',
							'admin_label' => true,
							'dependency'  => array(
								'element' => 'fancy_textbox_icontype',
								'value'   => 'icon',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon (Icofont)', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_icon_icofont',
							'value'       => 'icofont icofont-angry-monster',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'icofont',
								'iconsPerPage' => 48,
							),
							'dependency'  => array(
								'element' => 'fancy_textbox_icon',
								'value'   => 'icofont-font',
							),
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Link', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_textbox_link',
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
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
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
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'fancy_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'fancy_title_google_font',
							'dependency' => array(
								'element' => 'fancy_title_select_font',
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
							'param_name' => 'fancy_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'fancy_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'fancy_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'fancy_title_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select heading color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'fancy_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'fancy_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'fancy_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Sub-Title Font', 'radiantthemes-addons' ),
							'param_name' => 'fancy_sub_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'fancy_sub_title_google_font',
							'dependency' => array(
								'element' => 'fancy_sub_title_select_font',
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
							'param_name' => 'fancy_sub_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'fancy_sub_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'fancy_sub_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'fancy_sub_title_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select heading color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'fancy_sub_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'fancy_sub_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_sub_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'fancy_sub_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'fancy_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'fancy_content_google_font',
							'dependency' => array(
								'element' => 'fancy_content_select_font',
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
							'param_name' => 'fancy_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'fancy_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'fancy_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'fancy_content_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select heading color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'fancy_content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'fancy_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'fancy_content_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Link Font', 'radiantthemes-addons' ),
							'param_name' => 'fancy_link_select_font',
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
							'param_name' => 'fancy_link_google_font',
							'dependency' => array(
								'element' => 'fancy_link_select_font',
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
							'param_name' => 'fancy_link_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'fancy_link_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'fancy_link_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'fancy_link_select_font',
								'value'   => array( 'gfont', 'cfont' ),
							),
							'settings'   => array(
								'fields' => array(
									'font_size'         => '',
									'line_height',
									'color',
									'font_size_description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
									'line_height_description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
									'color_description' => esc_html__( 'Select heading color.', 'radiantthemes-addons' ),
								),
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
							'param_name' => 'fancy_link_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'fancy_link_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'fancy_link_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'fancy_link_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'fancytextbox_css',
							'group'      => esc_html__( 'Fancy Text Box Design', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_fancy_text_box_style', array( $this, 'radiantthemes_fancy_text_box_style_func' ) );
		}

		/**
		 * [radiantthemes_fancy_text_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_fancy_text_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'                => 'one',
					'fancy_textbox_color'            => '',
					'fancy_textbox_title'            => esc_html__( 'Title', 'radiantthemes-addons' ),
					'fancy_textbox_subtitle'         => esc_html__( 'Subtitle.', 'radiantthemes-addons' ),
					'fancy_textbox_hover_image'		 => '',
					'fancy_textbox_content'          => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'radiantthemes-addons' ),
					'fancy_textbox_icontype'         => 'image',
					'fancy_textbox_image'            => '',
					'fancy_textbox_icon'             => 'icofont-font',
					'fancy_textbox_icon_icofont'     => 'icofont icofont-angry-monster',
					'fancy_textbox_link'             => '',
					'animation'                      => '',
					'extra_class'                    => '',
					'extra_id'                       => '',
					'fancy_title_select_font'        => '',
					'fancy_title_google_font'        => '',
					'fancy_title_custom_font'        => '',
					'fancy_title_font_container'     => '',
					'fancy_title_font_weight'        => '400',
					'fancy_title_font_style'         => 'normal',
					'fancy_sub_title_select_font'    => '',
					'fancy_sub_title_google_font'    => '',
					'fancy_sub_title_custom_font'    => '',
					'fancy_sub_title_font_container' => '',
					'fancy_sub_title_font_weight'    => '400',
					'fancy_sub_title_font_style'     => 'normal',
					'fancy_content_select_font'      => '',
					'fancy_content_google_font'      => '',
					'fancy_content_custom_font'      => '',
					'fancy_content_font_container'   => '',
					'fancy_content_font_weight'      => '400',
					'fancy_content_font_style'       => 'normal',
					'fancy_link_select_font'         => '',
					'fancy_link_google_font'         => '',
					'fancy_link_custom_font'         => '',
					'fancy_link_font_container'      => '',
					'fancy_link_font_weight'         => '400',
					'fancy_link_font_style'          => 'normal',
					'fancytextbox_css'               => '',
				),
				$atts
			);

			$styles = array();

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

			if ( 'gfont' === $shortcode['fancy_title_select_font'] ) {
				// Build the fancy text box title font array.
				$fancy_title_google_font = $this->get_fonts_data( $shortcode['fancy_title_google_font'] );

				// Build the inline style.
				$fancy_title_font_inline_style = $this->google_fonts_styles( $fancy_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $fancy_title_google_font );
				$fancy_title_weight_style = '';
			} elseif ( 'cfont' === $shortcode['fancy_title_select_font'] ) {
				// Build the inline style.
				$fancy_title_font_inline_style = 'font-family: ' . $shortcode['fancy_title_custom_font'] . ';';

				$fancy_title_weight_style = 'font-weight: ' . $shortcode['fancy_title_font_weight'] . ';font-style: ' . $shortcode['fancy_title_font_style'] . ';';
			} else {
				$fancy_title_font_inline_style = '';
				$fancy_title_weight_style      = '';
			}

			if ( 'gfont' === $shortcode['fancy_sub_title_select_font'] ) {
				// Build the fancy text box subtitle font array.
				$fancy_sub_title_google_font = $this->get_fonts_data( $shortcode['fancy_sub_title_google_font'] );

				// Build the inline style.
				$fancy_sub_title_font_inline_style = $this->google_fonts_styles( $fancy_sub_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $fancy_sub_title_google_font );
				$fancy_subtitle_weight_style = '';
			} elseif ( 'cfont' === $shortcode['fancy_sub_title_select_font'] ) {
				// Build the inline style.
				$fancy_sub_title_font_inline_style = 'font-family: ' . $shortcode['fancy_sub_title_custom_font'] . ';';

				$fancy_subtitle_weight_style = 'font-weight: ' . $shortcode['fancy_sub_title_font_weight'] . ';font-style: ' . $shortcode['fancy_sub_title_font_style'] . ';';
			} else {
				$fancy_sub_title_font_inline_style = '';
				$fancy_subtitle_weight_style       = '';
			}

			if ( 'gfont' === $shortcode['fancy_content_select_font'] ) {
				// Build the fancy text box content font array.
				$fancy_content_google_font = $this->get_fonts_data( $shortcode['fancy_content_google_font'] );

				// Build the inline style.
				$fancy_content_font_inline_style = $this->google_fonts_styles( $fancy_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $fancy_content_google_font );
				$fancy_content_weight_style = '';
			} elseif ( 'cfont' === $shortcode['fancy_content_select_font'] ) {
				// Build the inline style.
				$fancy_content_font_inline_style = 'font-family: ' . $shortcode['fancy_content_custom_font'] . ';';

				$fancy_content_weight_style = 'font-weight: ' . $shortcode['fancy_content_font_weight'] . ';font-style: ' . $shortcode['fancy_content_font_style'] . ';';
			} else {
				$fancy_content_font_inline_style = '';
				$fancy_content_weight_style      = '';
			}

			if ( 'gfont' === $shortcode['fancy_link_select_font'] ) {
				// Build the fancy text box link font array.
				$fancy_link_google_font = $this->get_fonts_data( $shortcode['fancy_link_google_font'] );

				// Build the inline style.
				$fancy_link_font_inline_style = $this->google_fonts_styles( $fancy_link_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $fancy_link_google_font );
				$fancy_link_weight_style = '';
			} elseif ( 'cfont' === $shortcode['fancy_link_select_font'] ) {
				// Build the inline style.
				$fancy_link_font_inline_style = 'font-family: ' . $shortcode['fancy_link_custom_font'] . ';';

				$fancy_link_weight_style = 'font-weight: ' . $shortcode['fancy_link_font_weight'] . ';font-style: ' . $shortcode['fancy_link_font_style'] . ';';
			} else {
				$fancy_link_font_inline_style = '';
				$fancy_link_weight_style      = '';
			}

			// CUSTOM ID.
			$ourstory_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// LINK TAG.
			$fancy_textbox_link        = vc_build_link( $shortcode['fancy_textbox_link'] );
			$fancy_textbox_link_url    = ( ! empty( $fancy_textbox_link['url'] ) ) ? $fancy_textbox_link['url'] : '';
			$fancy_textbox_link_title  = ( ! empty( $fancy_textbox_link['title'] ) ) ? $fancy_textbox_link['title'] : '';
			$fancy_textbox_link_target = ( ! empty( $fancy_textbox_link['target'] ) ) ? 'target="' . $fancy_textbox_link['target'] . '"' : '';
			$fancy_textbox_link_rel    = ( ! empty( $fancy_textbox_link['rel'] ) ) ? ' rel="' . $fancy_textbox_link['rel'] . '"' : '';

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
			$custom_css = "";

			if ( ! empty( $shortcode['fancy_textbox_color'] ) ) {
				// CUSTOM CSS.
				$custom_css = ".rt-fancy-text-box.element-one.{$random_class} > .holder > .main-placeholder .icon i,
				.rt-fancy-text-box.element-one.{$random_class} > .holder > .main-placeholder .data .title,
				.rt-fancy-text-box.element-two.{$random_class} > .holder > .main-placeholder .icon i,
				.rt-fancy-text-box.element-three.{$random_class} > .holder > .main-placeholder .icon i,
				.rt-fancy-text-box.element-four.{$random_class} > .holder > .main-placeholder .icon i,
				.rt-fancy-text-box.element-five.{$random_class} > .holder .more > .btn.btn-first{
					color: {$shortcode['fancy_textbox_color']} ;
				}
				.rt-fancy-text-box.element-five.{$random_class} > .holder .more > .btn.btn-second,
				.rt-fancy-text-box.element-seven.{$random_class} > .holder:hover{
					background-color: {$shortcode['fancy_textbox_color']} ;
				}";
			} 
			if ( ! empty( $shortcode['fancy_textbox_hover_image'] ) ) {
				$img = wp_get_attachment_url( $shortcode['fancy_textbox_hover_image'], 'large' ) ;
				
				
	   			 $custom_css .= ".rt-fancy-text-box.element-eight.{$random_class} .holder:before{
								   position: absolute;
								   top: 0;
								   left: 0;
								   right: 0;
								   bottom: 0;
								   content: '';
								   background-image: url({$img});
								   background-size: cover;
								   background-repeat: no-repeat;
								   visibility: hidden;
								   opacity: 0;
								   z-index: -1;
								   border-radius: 5px;
								   -webkit-transition: all 0.3s ease-in-out;
								   -moz-transition: all 0.3s ease-in-out;
								   -o-transition: all 0.3s ease-in-out;
								   transition: all 0.3s ease-in-out;
								}
								.rt-fancy-text-box.element-eight.{$random_class} .holder:hover:before{
								 visibility: visible;
								 opacity: 1;
								}
								.rt-fancy-text-box.element-eight.{$random_class} .holder{
									position: relative;
									z-index: 1;
					}";
			}
			if((! empty( $shortcode['fancy_textbox_color'] )) || (! empty( $shortcode['fancy_textbox_hover_image'] )) ) {
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			// ADD DESIGN CSS.
			$fancy_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['fancytextbox_css'], ' ' ), $atts );
			// RENDERED HTML.
			$selected_font_type  = str_replace( '-font', '', $shortcode['fancy_textbox_icon'] );
			$selected_font_style = $shortcode[ 'fancy_textbox_icon_' . $selected_font_type ];

			if ( $shortcode['fancy_title_font_container'] ) {
				$fancy_title_font_container    = explode( '|', $shortcode['fancy_title_font_container'] );
				$fancy_title_font_container[1] = urldecode( $fancy_title_font_container[1] );
				$fancy_title_font_container    = implode( ';', $fancy_title_font_container );
				$fancy_title_font_container    = str_replace( '_', '-', $fancy_title_font_container );
				$fancy_title_font_container    = $fancy_title_font_container . ';';
			} else {
				$fancy_title_font_container = '';
			}

			if ( $shortcode['fancy_sub_title_font_container'] ) {
				$fancy_sub_title_font_container    = explode( '|', $shortcode['fancy_sub_title_font_container'] );
				$fancy_sub_title_font_container[1] = urldecode( $fancy_sub_title_font_container[1] );
				$fancy_sub_title_font_container    = implode( ';', $fancy_sub_title_font_container );
				$fancy_sub_title_font_container    = str_replace( '_', '-', $fancy_sub_title_font_container );
				$fancy_sub_title_font_container    = $fancy_sub_title_font_container . ';';
			} else {
				$fancy_sub_title_font_container = '';
			}

			if ( $shortcode['fancy_content_font_container'] ) {
				$fancy_content_font_container    = explode( '|', $shortcode['fancy_content_font_container'] );
				$fancy_content_font_container[1] = urldecode( $fancy_content_font_container[1] );
				$fancy_content_font_container    = implode( ';', $fancy_content_font_container );
				$fancy_content_font_container    = str_replace( '_', '-', $fancy_content_font_container );
				$fancy_content_font_container    = $fancy_content_font_container . ';';
			} else {
				$fancy_content_font_container = '';
			}

			if ( $shortcode['fancy_link_font_container'] ) {
				$fancy_link_font_container    = explode( '|', $shortcode['fancy_link_font_container'] );
				$fancy_link_font_container[1] = urldecode( $fancy_link_font_container[1] );
				$fancy_link_font_container    = implode( ';', $fancy_link_font_container );
				$fancy_link_font_container    = str_replace( '_', '-', $fancy_link_font_container );
				$fancy_link_font_container    = $fancy_link_font_container . ';';
			} else {
				$fancy_link_font_container = '';
			}

			// MAIN LAYOUT.
			$output  = "\r" . '<!-- fancy-text-box -->' . "\r";
			$output .= '<div class="rt-fancy-text-box element-' . $shortcode['style_variation'] . ' ' . $animation_classes . ' ' . $random_class . ' ' . $shortcode['extra_class'] . '" ' . $ourstory_id . '>';
				require 'template/template-fancy-text-box-' . $shortcode['style_variation'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- fancy-text-box -->' . "\r";
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
