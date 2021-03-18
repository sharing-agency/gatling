<?php
/**
 * Flip Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Flip_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Flip_Box extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Flip Box', 'radiantthemes-addons' ),
					'base'        => 'rt_flip_box_style',
					'description' => esc_html__( 'Add Flip Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Flip-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_flip_box_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Flip Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'flip_box_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Flip Box Axis', 'radiantthemes-addons' ),
							'param_name'  => 'flip_box_axis',
							'value'       => array(
								esc_html__( 'Vertical (Y)', 'radiantthemes-addons' )   => 'true',
								esc_html__( 'Horizontal (X)', 'radiantthemes-addons' ) => 'false',
							),
							'std'         => 'horizontal',
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
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_image',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_title',
							'value'      => __( 'First Card Title', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_content',
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'flipbox_first_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'flipbox_first_title_google_font',
							'dependency' => array(
								'element' => 'flipbox_first_title_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'flipbox_first_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'flipbox_first_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'flipbox_first_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_first_title_select_font',
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
							'param_name' => 'flipbox_first_title_font_weight',
							'value'      => '400',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_first_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'flipbox_first_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'flipbox_first_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'flipbox_first_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'flipbox_first_content_google_font',
							'dependency' => array(
								'element' => 'flipbox_first_content_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'flipbox_first_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'flipbox_first_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'flipbox_first_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_first_content_select_font',
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
							'param_name' => 'flipbox_first_content_font_weight',
							'value'      => '400',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_first_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'flipbox_first_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => esc_html__( 'First Card', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'flipbox_first_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_css',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),

						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_title',
							'value'      => __( 'Second Card Title', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_content',
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'vc_link',
							'heading'    => esc_html__( 'Button', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_button',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'flipbox_second_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'flipbox_second_title_google_font',
							'dependency' => array(
								'element' => 'flipbox_second_title_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'flipbox_second_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'flipbox_second_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'flipbox_second_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_title_select_font',
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
							'param_name' => 'flipbox_second_title_font_weight',
							'value'      => '400',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'flipbox_second_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'flipbox_second_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'flipbox_second_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'flipbox_second_content_google_font',
							'dependency' => array(
								'element' => 'flipbox_second_content_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'flipbox_second_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'flipbox_second_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'flipbox_second_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_content_select_font',
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
							'param_name' => 'flipbox_second_content_font_weight',
							'value'      => '400',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'flipbox_second_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'flipbox_second_content_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Link Font', 'radiantthemes-addons' ),
							'param_name' => 'flipbox_second_link_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'flipbox_second_link_google_font',
							'dependency' => array(
								'element' => 'flipbox_second_link_select_font',
								'value'   => 'gfont',
							),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select Font Family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select Font Style.', 'radiantthemes-addons' ),
								),
							),
							'weight'     => 0,
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'flipbox_second_link_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'flipbox_second_link_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'flipbox_second_link_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_link_select_font',
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
							'param_name' => 'flipbox_second_link_font_weight',
							'value'      => '400',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'flipbox_second_link_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'flipbox_second_link_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => esc_html__( 'Second Card', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'flipbox_second_link_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_css',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_flip_box_style', array( $this, 'radiantthemes_flip_box_style_func' ) );
		}

		/**
		 * [radiantthemes_flip_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_flip_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'flip_box_style'                       => 'one',
					'flip_box_axis'                        => 'true',
					'animation'                            => '',
					'extra_class'                          => '',
					'extra_id'                             => '',
					'flip_box_first_card_image'            => '',
					'flip_box_first_card_title'            => esc_html__( 'First Card Title', 'radiantthemes-addons' ),
					'flip_box_first_card_content'          => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'flip_box_first_card_css'              => '',
					'flip_box_second_card_title'           => esc_html__( 'Second Card Title', 'radiantthemes-addons' ),
					'flip_box_second_card_content'         => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'flip_box_second_card_button'          => '',
					'flip_box_second_card_css'             => '',
					'flipbox_first_title_select_font'      => '',
					'flipbox_first_title_google_font'      => '',
					'flipbox_first_title_custom_font'      => '',
					'flipbox_first_content_select_font'    => '',
					'flipbox_first_content_google_font'    => '',
					'flipbox_first_content_custom_font'    => '',
					'flipbox_first_title_font_container'   => '',
					'flipbox_first_title_font_weight'      => '400',
					'flipbox_first_title_font_style'       => 'normal',
					'flipbox_first_content_font_container' => '',
					'flipbox_first_content_font_weight'    => '400',
					'flipbox_first_content_font_style'     => 'normal',
					'flipbox_second_title_select_font'     => '',
					'flipbox_second_title_google_font'     => '',
					'flipbox_second_title_custom_font'     => '',
					'flipbox_second_content_select_font'   => '',
					'flipbox_second_content_google_font'   => '',
					'flipbox_second_content_custom_font'   => '',
					'flipbox_second_link_select_font'      => '',
					'flipbox_second_link_google_font'      => '',
					'flipbox_second_link_custom_font'      => '',
					'flipbox_second_title_font_container'  => '',
					'flipbox_second_title_font_weight'     => '400',
					'flipbox_second_title_font_style'      => 'normal',
					'flipbox_second_content_font_container' => '',
					'flipbox_second_content_font_weight'   => '400',
					'flipbox_second_content_font_style'    => 'normal',
					'flipbox_second_link_font_container'   => '',
					'flipbox_second_link_font_weight'      => '400',
					'flipbox_second_link_font_style'       => 'normal',
				),
				$atts
			);

			if ( $shortcode['flipbox_first_title_font_container'] ) {
				$flipbox_first_title_font_container    = explode( '|', $shortcode['flipbox_first_title_font_container'] );
				$flipbox_first_title_font_container[1] = urldecode( $flipbox_first_title_font_container[1] );
				$flipbox_first_title_font_container    = implode( ';', $flipbox_first_title_font_container );
				$flipbox_first_title_font_container    = str_replace( '_', '-', $flipbox_first_title_font_container );
				$flipbox_first_title_font_container    = $flipbox_first_title_font_container . ';';
			} else {
				$flipbox_first_title_font_container = '';
			}

			if ( $shortcode['flipbox_first_content_font_container'] ) {
				$flipbox_first_content_font_container    = explode( '|', $shortcode['flipbox_first_content_font_container'] );
				$flipbox_first_content_font_container[1] = urldecode( $flipbox_first_content_font_container[1] );
				$flipbox_first_content_font_container    = implode( ';', $flipbox_first_content_font_container );
				$flipbox_first_content_font_container    = str_replace( '_', '-', $flipbox_first_content_font_container );
				$flipbox_first_content_font_container    = $flipbox_first_content_font_container . ';';
			} else {
				$flipbox_first_content_font_container = '';
			}

			if ( $shortcode['flipbox_second_title_font_container'] ) {
				$flipbox_second_title_font_container    = explode( '|', $shortcode['flipbox_second_title_font_container'] );
				$flipbox_second_title_font_container[1] = urldecode( $flipbox_second_title_font_container[1] );
				$flipbox_second_title_font_container    = implode( ';', $flipbox_second_title_font_container );
				$flipbox_second_title_font_container    = str_replace( '_', '-', $flipbox_second_title_font_container );
				$flipbox_second_title_font_container    = $flipbox_second_title_font_container . ';';
			} else {
				$flipbox_second_title_font_container = '';
			}

			if ( $shortcode['flipbox_second_content_font_container'] ) {
				$flipbox_second_content_font_container    = explode( '|', $shortcode['flipbox_second_content_font_container'] );
				$flipbox_second_content_font_container[1] = urldecode( $flipbox_second_content_font_container[1] );
				$flipbox_second_content_font_container    = implode( ';', $flipbox_second_content_font_container );
				$flipbox_second_content_font_container    = str_replace( '_', '-', $flipbox_second_content_font_container );
				$flipbox_second_content_font_container    = $flipbox_second_content_font_container . ';';
			} else {
				$flipbox_second_content_font_container = '';
			}

			if ( $shortcode['flipbox_second_link_font_container'] ) {
				$flipbox_second_link_font_container    = explode( '|', $shortcode['flipbox_second_link_font_container'] );
				$flipbox_second_link_font_container[1] = urldecode( $flipbox_second_link_font_container[1] );
				$flipbox_second_link_font_container    = implode( ';', $flipbox_second_link_font_container );
				$flipbox_second_link_font_container    = str_replace( '_', '-', $flipbox_second_link_font_container );
				$flipbox_second_link_font_container    = $flipbox_second_link_font_container . ';';
			} else {
				$flipbox_second_link_font_container = '';
			}

			if ( 'gfont' === $shortcode['flipbox_first_title_select_font'] ) {

				// Build the flip box title first card font array.
				$flipbox_first_title_google_font = $this->get_fonts_data( $shortcode['flipbox_first_title_google_font'] );

				// Build the inline style.
				$flipbox_first_title_font_inline_style = $this->google_fonts_styles( $flipbox_first_title_google_font ) . ';';

				// Enqueue the right font.
				$this->enqueue_google_fonts( $flipbox_first_title_google_font );

				$flipbox_first_title_weight_style = '';

			} elseif ( 'cfont' === $shortcode['flipbox_first_title_select_font'] ) {

				// Build the inline style.
				$flipbox_first_title_font_inline_style = 'font-family: ' . $shortcode['flipbox_first_title_custom_font'] . ';';
				$flipbox_first_title_weight_style      = 'font-weight: ' . $shortcode['flipbox_first_title_font_weight'] . ';font-style: ' . $shortcode['flipbox_first_title_font_style'] . ';';

			} else {

				$flipbox_first_title_font_inline_style = '';
				$flipbox_first_title_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['flipbox_first_content_select_font'] ) {

				// Build the flip box content first card font array.
				$flipbox_first_content_google_font = $this->get_fonts_data( $shortcode['flipbox_first_content_google_font'] );

				// Build the inline style.
				$flipbox_first_content_font_inline_style = $this->google_fonts_styles( $flipbox_first_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $flipbox_first_content_google_font );

				$flipbox_first_content_weight_style = '';

			} elseif ( 'cfont' === $shortcode['flipbox_first_content_select_font'] ) {

				// Build the inline style.
				$flipbox_first_content_font_inline_style = 'font-family: ' . $shortcode['flipbox_first_content_custom_font'] . ';';
				$flipbox_first_content_weight_style      = 'font-weight: ' . $shortcode['flipbox_first_content_font_weight'] . ';font-style: ' . $shortcode['flipbox_first_content_font_style'] . ';';

			} else {

				$flipbox_first_content_font_inline_style = '';
				$flipbox_first_content_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['flipbox_second_title_select_font'] ) {

				// Build the flip box title second card font array.
				$flipbox_second_title_google_font = $this->get_fonts_data( $shortcode['flipbox_second_title_google_font'] );

				// Build the inline style.
				$flipbox_second_title_font_inline_style = $this->google_fonts_styles( $flipbox_second_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $flipbox_second_title_google_font );

				$flipbox_second_title_weight_style = '';

			} elseif ( 'cfont' === $shortcode['flipbox_second_title_select_font'] ) {

				// Build the inline style.
				$flipbox_second_title_font_inline_style = 'font-family: ' . $shortcode['flipbox_second_title_custom_font'] . ';';
				$flipbox_second_title_weight_style      = 'font-weight: ' . $shortcode['flipbox_second_title_font_weight'] . ';font-style: ' . $shortcode['flipbox_second_title_font_style'] . ';';

			} else {

				$flipbox_second_title_font_inline_style = '';
				$flipbox_second_title_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['flipbox_second_content_select_font'] ) {

				// Build the flip box content second card font array.
				$flipbox_second_content_google_font = $this->get_fonts_data( $shortcode['flipbox_second_content_google_font'] );

				// Build the inline style.
				$flipbox_second_content_font_inline_style = $this->google_fonts_styles( $flipbox_second_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $flipbox_second_content_google_font );

				$flipbox_second_content_weight_style = '';

			} elseif ( 'cfont' === $shortcode['flipbox_second_content_select_font'] ) {

				// Build the inline style.
				$flipbox_second_content_font_inline_style = 'font-family: ' . $shortcode['flipbox_second_content_custom_font'] . ';';
				$flipbox_second_content_weight_style      = 'font-weight: ' . $shortcode['flipbox_second_content_font_weight'] . ';font-style: ' . $shortcode['flipbox_second_content_font_style'] . ';';

			} else {

				$flipbox_second_content_font_inline_style = '';
				$flipbox_second_content_weight_style      = '';

			}

			if ( 'gfont' === $shortcode['flipbox_second_link_select_font'] ) {

				// Build the flip box link second card font array.
				$flipbox_second_link_google_font = $this->get_fonts_data( $shortcode['flipbox_second_link_google_font'] );

				// Build the inline style.
				$flipbox_second_link_font_inline_style = $this->google_fonts_styles( $flipbox_second_link_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $flipbox_second_link_google_font );

				$flipbox_second_link_weight_style = '';

			} elseif ( 'cfont' === $shortcode['flipbox_second_link_select_font'] ) {

				// Build the inline style.
				$flipbox_second_link_font_inline_style = 'font-family: ' . $shortcode['flipbox_second_link_custom_font'] . ';';
				$flipbox_second_link_weight_style      = 'font-weight: ' . $shortcode['flipbox_second_link_font_weight'] . ';font-style: ' . $shortcode['flipbox_second_link_font_style'] . ';';

			} else {

				$flipbox_second_link_font_inline_style = '';
				$flipbox_second_link_weight_style      = '';

			}

			// Build the animation classes.
			$animation_classes              = $this->getCSSAnimation( $shortcode['animation'] );
			$flip_box_first_card_css_class  = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['flip_box_first_card_css'], ' ' ), $atts );
			$flip_box_second_card_css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['flip_box_second_card_css'], ' ' ), $atts );

			$flip_box_second_card_button        = vc_build_link( $shortcode['flip_box_second_card_button'] );
			$flip_box_second_card_button_url    = ( ! empty( $flip_box_second_card_button['url'] ) ) ? $flip_box_second_card_button['url'] : '#';
			$flip_box_second_card_button_title  = ( ! empty( $flip_box_second_card_button['title'] ) ) ? $flip_box_second_card_button['title'] : '';
			$flip_box_second_card_button_target = ( ! empty( $flip_box_second_card_button['target'] ) ) ? $flip_box_second_card_button['target'] : '1';
			$flip_box_second_card_button_rel    = ( ! empty( $flip_box_second_card_button['rel'] ) ) ? $flip_box_second_card_button['rel'] : '';

			$flip_box_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$output  = '<div class="rt-flip-box element-' . esc_attr( $shortcode['flip_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . '" data-flip-box-x="' . $shortcode['flip_box_axis'] . '" ' . $flip_box_id . '>';

			require 'template/template-flip-box-style-' . esc_attr( $shortcode['flip_box_style'] ) . '.php';
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
