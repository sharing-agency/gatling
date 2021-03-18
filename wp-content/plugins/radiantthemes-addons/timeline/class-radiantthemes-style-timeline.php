<?php
/**
 * Radiantthemes Timeline Addon
 *
 * @package RadiantThemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Timeline' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Timeline {
		/**
		 * [$timelinestyle description]
		 *
		 * @var string
		 */
		private $timelinestyle;

		/**
		 * $t variable
		 *
		 * @var integer
		 */
		private $t = 1;

		/**
		 * [$timeline_title_font_inline_style description]
		 *
		 * @var string
		 */
		private $timeline_title_font_inline_style;

		/**
		 * [$timeline_title_font_container description]
		 *
		 * @var string
		 */
		private $timeline_title_font_container;

		/**
		 * [$timeline_title_font_weight_style description]
		 *
		 * @var string
		 */
		private $timeline_title_font_weight_style;

		/**
		 * [$timeline_content_font_inline_style description]
		 *
		 * @var string
		 */
		private $timeline_content_font_inline_style;

		/**
		 * [$timeline_content_font_container description]
		 *
		 * @var string
		 */
		private $timeline_content_font_container;

		/**
		 * [$timeline_content_font_weight_style description]
		 *
		 * @var string
		 */
		private $timeline_content_font_weight_style;

		/**
		 * [$timeline_date_font_inline_style description]
		 *
		 * @var string
		 */
		private $timeline_date_font_inline_style;

		/**
		 * [$timeline_date_font_container description]
		 *
		 * @var string
		 */
		private $timeline_date_font_container;

		/**
		 * [$timeline_date_font_weight_style description]
		 *
		 * @var string
		 */
		private $timeline_date_font_weight_style;

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
					'name'        => esc_html__( 'Timeline', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add timeline', 'radiantthemes-addons' ),
					'base'        => 'rt_timeline_style',
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Timeline-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_timeline_style',
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'rt_timeline_style_item',
					),
					'js_view'     => 'VcColumnView',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Timeline Style', 'radiantthemes-addons' ),
							'param_name' => 'radiant_timeline_style',
							'value'      => array(
								esc_html__( 'Style One (Simple ZigZag Style) - With Animation', 'radiantthemes-addons' )     => 'one',
								esc_html__( 'Style Two (Simple ZigZag Style) - Without Animation', 'radiantthemes-addons' )  => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color Scheme', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_color',
							'description' => esc_html__( 'Set your color scheme. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Title Font', 'radiantthemes-addons' ),
							'param_name' => 'timeline_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'timeline_title_google_font',
							'dependency' => array(
								'element' => 'timeline_title_select_font',
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
							'param_name' => 'timeline_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'timeline_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'timeline_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'timeline_title_select_font',
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
							'param_name' => 'timeline_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'timeline_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'timeline_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'timeline_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'timeline_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'timeline_content_google_font',
							'dependency' => array(
								'element' => 'timeline_content_select_font',
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
							'param_name' => 'timeline_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'timeline_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'timeline_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'timeline_content_select_font',
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
							'param_name' => 'timeline_content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'timeline_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'timeline_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'timeline_content_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Date Font', 'radiantthemes-addons' ),
							'param_name' => 'timeline_date_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'timeline_date_google_font',
							'dependency' => array(
								'element' => 'timeline_date_select_font',
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
							'param_name' => 'timeline_date_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'timeline_date_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'timeline_date_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'timeline_date_select_font',
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
							'param_name' => 'timeline_date_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'timeline_date_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'timeline_date_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'timeline_date_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'timeline_design_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Timeline Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_timeline_style_item',
					'description'             => esc_html__( 'Add image, title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_timeline_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(
						array(
							'type'        => 'attach_image',
							'heading'     => esc_html__( 'Timeline Image', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_image',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Title', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Date (Month)', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_date_month',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Date (Year)', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_date_year',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Timeline Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
					),
				)
			);
			add_shortcode( 'rt_timeline_style', array( $this, 'radiantthemes_timeline_style_func' ) );
			add_shortcode( 'rt_timeline_style_item', array( $this, 'radiantthemes_timeline_style_item_func' ) );
		}

		/**
		 * [radiantthemes_timeline_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_timeline_style_func( $atts, $content = null, $tag ) {
			$timelinestyle = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_timeline_style'          => 'one',
					'radiant_timeline_color'          => '',
					'radiant_extra_class'             => '',
					'radiant_extra_id'                => '',
					'timeline_design_css'             => '',
					'timeline_title_select_font'      => '',
					'timeline_title_google_font'      => '',
					'timeline_title_custom_font'      => '',
					'timeline_title_font_container'   => '',
					'timeline_title_font_weight'      => '400',
					'timeline_title_font_style'       => 'normal',
					'timeline_content_select_font'    => '',
					'timeline_content_google_font'    => '',
					'timeline_content_custom_font'    => '',
					'timeline_content_font_container' => '',
					'timeline_content_font_weight'    => '400',
					'timeline_content_font_style'     => 'normal',
					'timeline_date_select_font'       => '',
					'timeline_date_google_font'       => '',
					'timeline_date_custom_font'       => '',
					'timeline_date_font_container'    => '',
					'timeline_date_font_weight'       => '400',
					'timeline_date_font_style'        => 'normal',
				),
				$atts
			);

			if ( $shortcode['timeline_title_font_container'] ) {
				$timeline_title_font_container    = explode( '|', $shortcode['timeline_title_font_container'] );
				$timeline_title_font_container[1] = urldecode( $timeline_title_font_container[1] );
				$timeline_title_font_container    = implode( ';', $timeline_title_font_container );
				$timeline_title_font_container    = str_replace( '_', '-', $timeline_title_font_container );
				$timeline_title_font_container    = $timeline_title_font_container . ';';
			} else {
				$timeline_title_font_container = '';
			}

			if ( $shortcode['timeline_content_font_container'] ) {
				$timeline_content_font_container    = explode( '|', $shortcode['timeline_content_font_container'] );
				$timeline_content_font_container[1] = urldecode( $timeline_content_font_container[1] );
				$timeline_content_font_container    = implode( ';', $timeline_content_font_container );
				$timeline_content_font_container    = str_replace( '_', '-', $timeline_content_font_container );
				$timeline_content_font_container    = $timeline_content_font_container . ';';
			} else {
				$timeline_content_font_container = '';
			}

			if ( $shortcode['timeline_date_font_container'] ) {
				$timeline_date_font_container    = explode( '|', $shortcode['timeline_date_font_container'] );
				$timeline_date_font_container[1] = urldecode( $timeline_date_font_container[1] );
				$timeline_date_font_container    = implode( ';', $timeline_date_font_container );
				$timeline_date_font_container    = str_replace( '_', '-', $timeline_date_font_container );
				$timeline_date_font_container    = $timeline_date_font_container . ';';
			} else {
				$timeline_date_font_container = '';
			}

			if ( 'gfont' === $shortcode['timeline_title_select_font'] ) {

				// Build the timeline title font array.
				$timeline_title_google_font = $this->get_fonts_data( $shortcode['timeline_title_google_font'] );

				// Build the inline style.
				$timeline_title_font_inline_style = $this->google_fonts_styles( $timeline_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $timeline_title_google_font );

				$timeline_title_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['timeline_title_select_font'] ) {

				// Build the inline style.
				$timeline_title_font_inline_style = 'font-family: ' . $shortcode['timeline_title_custom_font'] . ';';
				$timeline_title_font_weight_style = 'font-weight: ' . $shortcode['timeline_title_font_weight'] . ';font-style: ' . $shortcode['timeline_title_font_style'] . ';';

			} else {

				$timeline_title_font_inline_style = '';
				$timeline_title_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['timeline_content_select_font'] ) {

				// Build the timeline content font array.
				$timeline_content_google_font = $this->get_fonts_data( $shortcode['timeline_content_google_font'] );

				// Build the inline style.
				$timeline_content_font_inline_style = $this->google_fonts_styles( $timeline_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $timeline_content_google_font );

				$timeline_content_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['timeline_content_select_font'] ) {

				// Build the inline style.
				$timeline_content_font_inline_style = 'font-family: ' . $shortcode['timeline_content_custom_font'] . ';';
				$timeline_content_font_weight_style = 'font-weight: ' . $shortcode['timeline_content_font_weight'] . ';font-style: ' . $shortcode['timeline_content_font_style'] . ';';

			} else {

				$timeline_content_font_inline_style = '';
				$timeline_content_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['timeline_date_select_font'] ) {

				// Build the timeline date font array.
				$timeline_date_google_font = $this->get_fonts_data( $shortcode['timeline_date_google_font'] );

				// Build the inline style.
				$timeline_date_font_inline_style = $this->google_fonts_styles( $timeline_date_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $timeline_date_google_font );

				$timeline_date_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['timeline_date_select_font'] ) {

				// Build the inline style.
				$timeline_date_font_inline_style = 'font-family: ' . $shortcode['timeline_date_custom_font'] . ';';
				$timeline_date_font_weight_style = 'font-weight: ' . $shortcode['timeline_date_font_weight'] . ';font-style: ' . $shortcode['timeline_date_font_style'] . ';';

			} else {

				$timeline_date_font_inline_style = '';
				$timeline_date_font_weight_style = '';

			}

			$this->timeline_title_font_inline_style = $timeline_title_font_inline_style;
			$this->timeline_title_font_container    = $timeline_title_font_container;
			$this->timeline_title_font_weight_style = $timeline_title_font_weight_style;

			$this->timeline_content_font_inline_style = $timeline_content_font_inline_style;
			$this->timeline_content_font_container    = $timeline_content_font_container;
			$this->timeline_content_font_weight_style = $timeline_content_font_weight_style;

			$this->timeline_date_font_inline_style = $timeline_date_font_inline_style;
			$this->timeline_date_font_container    = $timeline_date_font_container;
			$this->timeline_date_font_weight_style = $timeline_date_font_weight_style;

			$this->timelinestyle = $shortcode['radiant_timeline_style'];

			$i = -1;

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$output = '';

			$timeline_id = $shortcode['radiant_extra_id'] ? 'id="' . esc_attr( $shortcode['radiant_extra_id'] ) . '"' : '';

			$timeline_design_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['timeline_design_css'], ' ' ), $atts );

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
			$custom_css = ".radiantthemes-timeline.element-one.{$random_class} > .radiantthemes-timeline-item > .radiantthemes-timeline-item-dot,
            .radiantthemes-timeline.element-two.{$random_class} > .radiantthemes-timeline-item > .radiantthemes-timeline-item-dot{
                border-color: {$shortcode['radiant_timeline_color']};
            }";
			wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			$output .= '<div class="radiantthemes-timeline element-' . esc_attr( $shortcode['radiant_timeline_style'] ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . ' ' . esc_attr( $random_class ) . '">';
			if ( 'three' === $this->timelinestyle ) {
				$output .= '<!-- radiantthemes-timeline-slider -->';
				$output .= '<div class="radiantthemes-timeline-slider owl-carousel">';
			}
			$output .= do_shortcode( $content );
			if ( 'three' === $this->timelinestyle ) {
				$output .= '</div>';
				$output .= '<!-- radiantthemes-timeline-slider -->';
			}
			$output .= '</div>';

			return $output;
		}

		/**
		 * [radiantthemes_tab_style_item_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_timeline_style_item_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'radiant_timeline_image'      => '',
					'radiant_timeline_title'      => '',
					'radiant_timeline_date_month' => '',
					'radiant_timeline_date_year'  => '',
				),
				$atts
			);

			$output = '';

			if ( ! isset( $shortcode['radiant_timeline_title'] ) || '' === $shortcode['radiant_timeline_title'] ) {
				$shortcode['radiant_timeline_title'] = 'Timeline';
			}
			if ( ! isset( $shortcode['radiant_timeline_date_month'] ) || '' === $shortcode['radiant_timeline_date_month'] ) {
				$shortcode['radiant_timeline_date_month'] = 'March';
			}
			if ( ! isset( $shortcode['radiant_timeline_date_year'] ) || '' === $shortcode['radiant_timeline_date_year'] ) {
				$shortcode['radiant_timeline_date_year'] = '2018';
			}

			require 'template/template-timeline-style-' . esc_attr( $this->timelinestyle ) . '.php';

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

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Timeline_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Timeline_Style extends WPBakeryShortCodesContainer {

	}
}
if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Timeline_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Timeline_Style_Item extends WPBakeryShortCode {

	}
}
