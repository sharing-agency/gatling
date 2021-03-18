<?php
/**
 * Case Study Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Case_Study' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Case_Study extends WPBakeryShortCode {
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
					'name'        => esc_html__( 'Case Study', 'radiantthemes-addons' ),
					'base'        => 'rt_case_study_style',
					'description' => esc_html__( 'Add Case Study with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Case-Study-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_case_study_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Style', 'radiantthemes-addons' ),
							'param_name' => 'case_study_style_variation',
							'value'      => array(
								esc_html__( 'Style One (ZoomIn On Hover)', 'radiantthemes-addons' )                        => 'one',
								esc_html__( 'Style Two (Overlay SlideUp On Hover)', 'radiantthemes-addons' )               => 'two',
								esc_html__( 'Style Three (ZoomIn - Button TranslateY On Hover)', 'radiantthemes-addons' )  => 'three',
								esc_html__( 'Style Four (ZoomIn - Button Effect On Hover)', 'radiantthemes-addons' )       => 'four',
								esc_html__( 'Style Five (With Right Arrow Button)', 'radiantthemes-addons' )               => 'five',
								esc_html__( 'Style Six (No Image)', 'radiantthemes-addons' )                               => 'six',
								esc_html__( 'Style Seven (Title Below)', 'radiantthemes-addons' )                          => 'seven',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Display Filter', 'radiantthemes-addons' ),
							'param_name' => 'case_study_display_filter',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Filter Style', 'radiantthemes-addons' ),
							'param_name' => 'case_study_filter_style',
							'dependency' => array(
								'element' => 'case_study_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Filter Align', 'radiantthemes-addons' ),
							'param_name' => 'case_study_filter_alignment',
							'dependency' => array(
								'element' => 'case_study_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Case Studies', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter number of Case Studies to display. Leave blank to show all posts.', 'radiantthemes-addons' ),
							'param_name'  => 'no_of_case_studies',
							'dependency'  => array(
								'element' => 'case_study_display_filter',
								'value'   => 'no',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Box Align', 'radiantthemes-addons' ),
							'param_name' => 'case_study_box_alignment',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Case Study Box Number', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_box_number',
							'description' => esc_html__( 'Number of Case Study Box to display in a grid.', 'radiantthemes-addons' ),
							'value'       => array(
								'3',
								'4',
							),
							'std'         => '3',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Enable Title?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_title',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Enable excerpt?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_excerpt',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Enable Link Button?', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Button style can be controled from Theme Option > Button.', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_enable_link_button',
							'value'       => esc_html__( 'Yes', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'case_study_enable_zoom',
								'value'   => 'no',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Link Button Text', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter text for link button. E.g. Details', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_link_button_text',
							'value'       => 'Details',
							'dependency'  => array(
								'element' => 'case_study_enable_link_button',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Spacing between Case Study Items', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_spacing',
							'description' => esc_html__( 'Enter only the spacing value without unit. E.g. 30', 'radiantthemes-addons' ),
							'value'       => '0',
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
							'param_name' => 'case_study_looping_order',
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
							'param_name' => 'case_study_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Filter Font', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_filter_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'case_studies_filter_google_font',
							'dependency' => array(
								'element' => 'case_studies_filter_select_font',
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
							'param_name' => 'case_studies_filter_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'case_studies_filter_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'case_studies_title_google_font',
							'dependency' => array(
								'element' => 'case_studies_title_select_font',
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
							'param_name' => 'case_studies_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'case_studies_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Excerpt Font', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_excerpt_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'case_studies_excerpt_google_font',
							'dependency' => array(
								'element' => 'case_studies_excerpt_select_font',
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
							'param_name' => 'case_studies_excerpt_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'case_studies_excerpt_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Category Font', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_category_select_font',
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
							'param_name' => 'case_studies_category_google_font',
							'dependency' => array(
								'element' => 'case_studies_category_select_font',
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
							'param_name' => 'case_studies_category_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'case_studies_category_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Button Font', 'radiantthemes-addons' ),
							'param_name' => 'case_studies_button_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'dependency' => array(
								'element' => 'case_study_style_variation',
								'value'   => array(
									'three',
									'four',
									'six',
								),
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'case_studies_button_google_font',
							'dependency' => array(
								'element' => 'case_studies_button_select_font',
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
							'param_name' => 'case_studies_button_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'case_studies_button_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_case_study_style', array( $this, 'radiantthemes_case_study_style_func' ) );
		}

		/**
		 * [radiantthemes_case_study_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_case_study_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'case_study_style_variation'        => 'one',
					'case_study_display_filter'         => 'yes',
					'case_study_filter_style'           => 'one',
					'case_study_filter_alignment'       => 'center',
					'no_of_case_studies'                => '',
					'case_study_box_alignment'          => 'center',
					'case_study_box_number'             => '3',
					'case_study_enable_zoom'            => 'no',
					'case_study_enable_link_button'     => 'true',
					'case_study_link_button_text'       => 'Details',
					'case_study_spacing'                => '0',
					'case_study_enable_title'           => '',
					'case_study_enable_excerpt'         => '',
					'extra_class'                       => '',
					'extra_id'                          => '',
					'case_study_looping_order'          => 'ID',
					'case_study_looping_sort'           => 'DESC',
					'case_studies_filter_select_font'   => '',
					'case_studies_filter_google_font'   => '',
					'case_studies_filter_custom_font'   => '',
					'case_studies_title_select_font'    => '',
					'case_studies_title_google_font'    => '',
					'case_studies_title_custom_font'    => '',
					'case_studies_excerpt_select_font'  => '',
					'case_studies_excerpt_google_font'  => '',
					'case_studies_excerpt_custom_font'  => '',
					'case_studies_category_select_font' => '',
					'case_studies_category_google_font' => '',
					'case_studies_category_custom_font' => '',
					'case_studies_button_select_font'   => '',
					'case_studies_button_google_font'   => '',
					'case_studies_button_custom_font'   => '',
				),
				$atts
			);

			if ( 'gfont' === $shortcode['case_studies_filter_select_font'] ) {
				// Build the case studies filter font array.
				$case_studies_filter_google_font = $this->get_fonts_data( $shortcode['case_studies_filter_google_font'] );

				// Build the inline style.
				$case_studies_filter_font_inline_style = $this->google_fonts_styles( $case_studies_filter_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $case_studies_filter_google_font );
			} elseif ( 'cfont' === $shortcode['case_studies_filter_select_font'] ) {
				// Build the inline style.
				$case_studies_filter_font_inline_style = 'font-family: ' . $shortcode['case_studies_filter_custom_font'];
			} else {
				$case_studies_filter_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['case_studies_title_select_font'] ) {
				// Build the call to action font array.
				$case_studies_title_google_font = $this->get_fonts_data( $shortcode['case_studies_title_google_font'] );

				// Build the inline style.
				$case_studies_title_font_inline_style = $this->google_fonts_styles( $case_studies_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $case_studies_title_google_font );
			} elseif ( 'cfont' === $shortcode['case_studies_title_select_font'] ) {
				// Build the inline style.
				$case_studies_title_font_inline_style = 'font-family: ' . $shortcode['case_studies_title_custom_font'];
			} else {
				$case_studies_title_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['case_studies_excerpt_select_font'] ) {
				// Build the call to action font array.
				$case_studies_excerpt_google_font = $this->get_fonts_data( $shortcode['case_studies_excerpt_google_font'] );

				// Build the inline style.
				$case_studies_excerpt_font_inline_style = $this->google_fonts_styles( $case_studies_excerpt_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $case_studies_excerpt_google_font );
			} elseif ( 'cfont' === $shortcode['case_studies_excerpt_select_font'] ) {
				// Build the inline style.
				$case_studies_excerpt_font_inline_style = 'font-family: ' . $shortcode['case_studies_excerpt_custom_font'];
			} else {
				$case_studies_excerpt_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['case_studies_category_select_font'] ) {
				// Build the call to action font array.
				$case_studies_category_google_font = $this->get_fonts_data( $shortcode['case_studies_category_google_font'] );

				// Build the inline style.
				$case_studies_category_font_inline_style = $this->google_fonts_styles( $case_studies_category_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $case_studies_category_google_font );
			} elseif ( 'cfont' === $shortcode['case_studies_category_select_font'] ) {
				// Build the inline style.
				$case_studies_category_font_inline_style = 'font-family: ' . $shortcode['case_studies_category_custom_font'];
			} else {
				$case_studies_category_font_inline_style = '';
			}

			if ( 'gfont' === $shortcode['case_studies_button_select_font'] ) {
				// Build the case studies button font array.
				$case_studies_button_google_font = $this->get_fonts_data( $shortcode['case_studies_button_google_font'] );

				// Build the inline style.
				$case_studies_button_font_inline_style = $this->google_fonts_styles( $case_studies_button_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $case_studies_button_google_font );
			} elseif ( 'cfont' === $shortcode['case_studies_button_select_font'] ) {
				// Build the inline style.
				$case_studies_button_font_inline_style = 'font-family: ' . $shortcode['case_studies_button_custom_font'];
			} else {
				$case_studies_button_font_inline_style = '';
			}

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$hidden_filter = ( 'no' === $shortcode['case_study_display_filter'] ) ? 'hidden' : '';

			$enable_zoom = ( 'yes' === $shortcode['case_study_enable_zoom'] ) ? 'has-fancybox' : '';

			$spacing_value = ( $shortcode['case_study_spacing'] / 2 );

			if ( '3' == $shortcode['case_study_box_number'] ) {
				$case_study_item_class = 'col-lg-4 col-md-4 col-sm-2 col-xs-12';
			} elseif ( '4' == $shortcode['case_study_box_number'] ) {
				$case_study_item_class = 'col-lg-3 col-md-3 col-sm-2 col-xs-12';
			} else {
				$case_study_item_class = '';
			}

			require 'template/template-case-study-style-' . esc_attr( $shortcode['case_study_style_variation'] ) . '.php';

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
