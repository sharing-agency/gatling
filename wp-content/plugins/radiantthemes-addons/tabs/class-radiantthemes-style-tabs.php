<?php
/**
 * Radiant Tabs Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Tabs' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Tabs {
		/**
		 * [$tabsstyle description]
		 *
		 * @var [type]
		 */
		private $tabsstyle;

		/**
		 * [$radiant_tab_color description]
		 *
		 * @var [type]
		 */
		private $radiant_tab_color;
		/**
		 * [$titlebg description]
		 *
		 * @var [type]
		 */
		private $titlebg;
		/**
		 * [$titlecolor description]
		 *
		 * @var [type]
		 */
		private $titlecolor;
		/**
		 * [$titlehoverbg description]
		 *
		 * @var [type]
		 */
		private $titlehoverbg;
		/**
		 * [$content_str description]
		 *
		 * @var [type]
		 */
		private $content_str;
		/**
		 * [$menu_str description]
		 *
		 * @var string
		 */
		private $menu_str = '';
		/**
		 * [$titlehovercolor description]
		 *
		 * @var [type]
		 */
		private $titlehovercolor;

		/**
		 * [$radiant_tab_id description]
		 *
		 * @var [type]
		 */
		private $radiant_tab_id;

		/**
		 * [$tab_title_font_inline_style description]
		 *
		 * @var string
		 */
		private $tab_title_font_inline_style;

		/**
		 * [$tab_content_font_inline_style description]
		 *
		 * @var string
		 */
		private $tab_content_font_inline_style;

		/**
		 * [$tab_title_font_container description]
		 *
		 * @var string
		 */
		private $tab_title_font_container;

		/**
		 * [$tab_title_font_weight_style description]
		 *
		 * @var string
		 */
		private $tab_title_font_weight_style;

		/**
		 * [$tab_content_font_container description]
		 *
		 * @var string
		 */
		private $tab_content_font_container;

		/**
		 * [$tab_content_font_weight_style description]
		 *
		 * @var string
		 */
		private $tab_content_font_weight_style;

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
					'name'                    => esc_html__( 'Tabs', 'radiantthemes-addons' ),
					'base'                    => 'rt_tab_style',
					'as_parent'               => array(
						'only' => 'rt_tab_style_item',
					),
					'content_element'         => true,
					'show_settings_on_create' => true,
					'category'                => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'is_container'            => true,
					'description'             => esc_html__( 'Tabbed Content', 'radiantthemes-addons' ),
					'js_view'                 => 'VcColumnView',
					'icon'                    => plugins_url( 'radiantthemes-addons/assets/icons/Tabs-Element-Icon.png' ),
					'class'                   => 'wpb_rt_vc_extension_tab_style',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Tabs Style', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_tabsstyle',
							'value'       => array(
								esc_html__( 'Style One (Horizontal Circle Shadowed Center)', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two (Horizontal Tab Simple)', 'radiantthemes-addons' )              => 'two',
								esc_html__( 'Style Three (Horizontal Tab Creative)', 'radiantthemes-addons' )          => 'three',
								esc_html__( 'Style Four (Horizontal Tab Classic)', 'radiantthemes-addons' )            => 'four',
								esc_html__( 'Style Five (Horizontal Tab Outline)', 'radiantthemes-addons' )            => 'five',
								esc_html__( 'Style Six (Horizontal Tab Simple Bordered)', 'radiantthemes-addons' )     => 'six',
								esc_html__( 'Style Seven (Horizontal Tab Simple Fill)', 'radiantthemes-addons' )       => 'seven',
								esc_html__( 'Style Eight (Horizontal Tab Minimal Light)', 'radiantthemes-addons' )     => 'eight',
								esc_html__( 'Style Nine (Horizontal Tab Minimal Dark)', 'radiantthemes-addons' )       => 'nine',
								esc_html__( 'Style Ten (Vertical Simple Style Light)', 'radiantthemes-addons' )        => 'ten',
								esc_html__( 'Style Eleven (Vertical Simple Style Dark)', 'radiantthemes-addons' )      => 'eleven',
								esc_html__( 'Style Twelve (Vertical Tab Creative)', 'radiantthemes-addons' )           => 'twelve',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_tab_color',
							'description' => esc_html__( 'Set your Tabs Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
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
							'param_name' => 'tab_title_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'tab_title_google_font',
							'dependency' => array(
								'element' => 'tab_title_select_font',
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
							'param_name' => 'tab_title_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'tab_title_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'tab_title_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'tab_title_select_font',
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
							'param_name' => 'tab_title_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'tab_title_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'tab_title_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'tab_title_select_font',
								'value'   => 'cfont',
							),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Content Font', 'radiantthemes-addons' ),
							'param_name' => 'tab_content_select_font',
							'value'      => array(
								esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
								esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
								esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'tab_content_google_font',
							'dependency' => array(
								'element' => 'tab_content_select_font',
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
							'param_name' => 'tab_content_custom_font',
							'value'      => $final_font_array,
							'dependency' => array(
								'element' => 'tab_content_select_font',
								'value'   => 'cfont',
							),
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'font_container',
							'param_name' => 'tab_content_font_container',
							'value'      => '',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'tab_content_select_font',
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
							'param_name' => 'tab_content_font_weight',
							'value'      => '400',
							'group'      => 'Typography',
							'dependency' => array(
								'element' => 'tab_content_select_font',
								'value'   => 'cfont',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
							'param_name'  => 'tab_content_font_style',
							'value'       => array(
								esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
								esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
							),
							'std'         => 'normal',
							'group'       => 'Typography',
							'dependency'  => array(
								'element' => 'tab_content_select_font',
								'value'   => 'cfont',
							),
						),
					),
				)
			);

			vc_map(
				array(
					'name'            => esc_html__( 'Tab Item', 'radiantthemes-addons' ),
					'base'            => 'rt_tab_style_item',
					'description'     => esc_html__( 'Add the title and content', 'radiantthemes-addons' ),
					'as_parent'       => array( '' ),
					'js_view'         => 'VcColumnView',
					'as_child'        => array(
						'only' => 'rt_tab_style',
					),
					'js_view'         => 'VcColumnView',
					'content_element' => true,
					'params'          => array_merge(
						array(
							array(
								'type'       => 'checkbox',
								'heading'    => esc_html__( 'Display Icons?', 'radiantthemes-addons' ),
								'param_name' => 'radiant_display_icon',
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Icon library', 'radiantthemes-addons' ),
								'value'       => array(
									esc_html__( 'Icofont', 'radiantthemes-addons' )      => 'icofont',
									esc_html__( 'Font Awesome', 'radiantthemes-addons' ) => 'fontawesome',
									esc_html__( 'Entypo', 'radiantthemes-addons' )       => 'entypo',
									esc_html__( 'Open Iconic', 'radiantthemes-addons' )  => 'openiconic',
									esc_html__( 'Typicons', 'radiantthemes-addons' )     => 'typicons',
									esc_html__( 'Linecons', 'radiantthemes-addons' )     => 'linecons',
									esc_html__( 'Material', 'radiantthemes-addons' )     => 'material',
								),
								'param_name'  => 'radiant_tabicon',
								'description' => esc_html__( 'Select icon library.', 'radiantthemes-addons' ),
								'dependency'  => array(
									'element' => 'radiant_display_icon',
									'value'   => 'true',
								),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon (Icofont)', 'radiantthemes-addons' ),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_icofont',
								'value'       => 'icofont icofont-angry-monster',
								'settings'    => array(
									'emptyIcon'    => true,
									'type'         => 'icofont',
									'iconsPerPage' => 48,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'icofont',
								),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_fontawesome',
								'value'       => 'fa fa-handshake-o',
								'settings'    => array(
									'emptyIcon'    => true,
									'type'         => 'fontawesome',
									'iconsPerPage' => 4000,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'fontawesome',
								),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_openiconic',
								'value'       => 'vc-oi vc-oi-dial',
								'settings'    => array(
									'emptyIcon'    => false,
									'type'         => 'openiconic',
									'iconsPerPage' => 4000,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'openiconic',
								),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_typicons',
								'value'       => 'typcn typcn-adjust-brightness',
								'settings'    => array(
									'emptyIcon'    => false,
									'type'         => 'typicons',
									'iconsPerPage' => 4000,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'typicons',
								),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							),
							array(
								'type'       => 'iconpicker',
								'heading'    => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name' => 'radiant_icon_entypo',
								'value'      => 'entypo-icon entypo-icon-user',
								'settings'   => array(
									'emptyIcon'    => false,
									'type'         => 'entypo',
									'iconsPerPage' => 4000,
								),
								'dependency' => array(
									'element' => 'radiant_tabicon',
									'value'   => 'entypo',
								),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_linecons',
								'value'       => 'vc_li vc_li-heart',
								'settings'    => array(
									'emptyIcon'    => false,
									'type'         => 'linecons',
									'iconsPerPage' => 4000,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'linecons',
								),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							),
							array(
								'type'        => 'iconpicker',
								'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_icon_material',
								'value'       => 'vc-material vc-material-cake',
								'settings'    => array(
									'emptyIcon'    => false,
									'type'         => 'material',
									'iconsPerPage' => 4000,
								),
								'dependency'  => array(
									'element' => 'radiant_tabicon',
									'value'   => 'material',
								),
								'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Tab Title', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_tabtitle',
								'admin_label' => true,
							),
							array(
								'type'        => 'el_id',
								'heading'     => esc_html__( 'Tab ID', 'radiantthemes-addons' ),
								'param_name'  => 'radiant_tab_id',
								'settings'    => array(
									'auto_generate' => true,
								),
								'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href = "%s" target = "_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							),
						)
					),
				)
			);
			add_shortcode( 'rt_tab_style', array( $this, 'radiantthemes_tab_style_func' ) );
			add_shortcode( 'rt_tab_style_item', array( $this, 'radiantthemes_tab_style_item_func' ) );
		}

		/**
		 * [radiantthemes_tab_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_tab_style_func( $atts, $content = null, $tag ) {
			$tabsstyle       = '';
			$tab_color       = '';
			$titlebg         = '';
			$titlecolor      = '';
			$titlehoverbg    = '';
			$contentbg       = '';
			$contentcolor    = '';
			$titlehovercolor = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_tabsstyle'          => 'one',
					'radiant_tab_color'          => '',
					'radiant_contentcolor'       => '',
					'radiant_contentbg'          => '',
					'radiant_extra_class'        => '',
					'radiant_extra_id'           => '',
					'tab_title_select_font'      => '',
					'tab_title_google_font'      => '',
					'tab_title_custom_font'      => '',
					'tab_content_select_font'    => '',
					'tab_content_google_font'    => '',
					'tab_content_custom_font'    => '',
					'tab_title_font_container'   => '',
					'tab_title_font_weight'      => '400',
					'tab_title_font_style'       => 'normal',
					'tab_content_font_container' => '',
					'tab_content_font_weight'    => '400',
					'tab_content_font_style'     => 'normal',
				),
				$atts
			);

			if ( $shortcode['tab_title_font_container'] ) {
				$tab_title_font_container    = explode( '|', $shortcode['tab_title_font_container'] );
				$tab_title_font_container[1] = urldecode( $tab_title_font_container[1] );
				$tab_title_font_container    = implode( ';', $tab_title_font_container );
				$tab_title_font_container    = str_replace( '_', '-', $tab_title_font_container );
				$tab_title_font_container    = $tab_title_font_container . ';';
			} else {
				$tab_title_font_container = '';
			}

			if ( $shortcode['tab_content_font_container'] ) {
				$tab_content_font_container    = explode( '|', $shortcode['tab_content_font_container'] );
				$tab_content_font_container[1] = urldecode( $tab_content_font_container[1] );
				$tab_content_font_container    = implode( ';', $tab_content_font_container );
				$tab_content_font_container    = str_replace( '_', '-', $tab_content_font_container );
				$tab_content_font_container    = $tab_content_font_container . ';';
			} else {
				$tab_content_font_container = '';
			}

			if ( 'gfont' === $shortcode['tab_title_select_font'] ) {

				// Build the tab title font array.
				$tab_title_google_font = $this->get_fonts_data( $shortcode['tab_title_google_font'] );

				// Build the inline style.
				$tab_title_font_inline_style = $this->google_fonts_styles( $tab_title_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $tab_title_google_font );

				$tab_title_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['tab_title_select_font'] ) {

				// Build the inline style.
				$tab_title_font_inline_style = 'font-family: ' . $shortcode['tab_title_custom_font'] . ';';
				$tab_title_font_weight_style = 'font-weight: ' . $shortcode['tab_title_font_weight'] . ';font-style: ' . $shortcode['tab_title_font_style'] . ';';

			} else {

				$tab_title_font_inline_style = '';
				$tab_title_font_weight_style = '';

			}

			if ( 'gfont' === $shortcode['tab_content_select_font'] ) {

				// Build the tab content font array.
				$tab_content_google_font = $this->get_fonts_data( $shortcode['tab_content_google_font'] );

				// Build the inline style.
				$tab_content_font_inline_style = $this->google_fonts_styles( $tab_content_google_font );

				// Enqueue the right font.
				$this->enqueue_google_fonts( $tab_content_google_font );

				$tab_content_font_weight_style = '';

			} elseif ( 'cfont' === $shortcode['tab_content_select_font'] ) {

				// Build the inline style.
				$tab_content_font_inline_style = 'font-family: ' . $shortcode['tab_content_custom_font'] . ';';
				$tab_content_font_weight_style = 'font-weight: ' . $shortcode['tab_content_font_weight'] . ';font-style: ' . $shortcode['tab_content_font_style'] . ';';

			} else {

				$tab_content_font_inline_style = '';
				$tab_content_font_weight_style = '';

			}

			$this->tabsstyle                     = $shortcode['radiant_tabsstyle'];
			$this->tab_color                     = $shortcode['radiant_tab_color'];
			$this->contentbg                     = $shortcode['radiant_contentbg'];
			$this->contentcolor                  = $shortcode['radiant_contentcolor'];
			$this->menu_str                      = '';
			$this->tab_title_font_inline_style   = $tab_title_font_inline_style;
			$this->tab_content_font_inline_style = $tab_content_font_inline_style;
			$this->tab_title_font_container      = $tab_title_font_container;
			$this->tab_title_font_weight_style   = $tab_title_font_weight_style;
			$this->tab_content_font_container    = $tab_content_font_container;
			$this->tab_content_font_weight_style = $tab_content_font_weight_style;

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			// ADD RANDOM CLASS.
			$random_class = 'rt' . wp_rand();
			if ( $shortcode['radiant_tab_color'] ) {
				// CUSTOM CSS.
				$custom_css = ".rt-tab.element-three.{$random_class} > ul.nav-tabs > li > a:before,
                .rt-tab.element-four.{$random_class} > ul.nav-tabs > li > a:before,
                .rt-tab.element-seven.{$random_class} > ul.nav-tabs > li.active > a:before,
                .rt-tab.element-eight.{$random_class} > ul.nav-tabs > li > a:before,
                .rt-tab.element-nine.{$random_class} > ul.nav-tabs > li > a:before,
                .rt-tab.element-ten.{$random_class} > ul.nav-tabs > li > a:before,
                .rt-tab.element-eleven.{$random_class} > ul.nav-tabs > li > a:before{
                	background-color: {$shortcode['radiant_tab_color']} ;
                }
                .rt-tab.element-one.{$random_class} > ul.nav-tabs > li.active > a,
                .rt-tab.element-three.{$random_class} > ul.nav-tabs > li.active > a,
                .rt-tab.element-three.{$random_class} > ul.nav-tabs > li.active > a i,
                .rt-tab.element-six.{$random_class} > ul.nav-tabs > li.active > a,
                .rt-tab.element-eight.{$random_class} > ul.nav-tabs > li.active > a,
                .rt-tab.element-ten.{$random_class} > ul.nav-tabs > li.active > a{
                	color: {$shortcode['radiant_tab_color']} ;
                }
                .rt-tab.element-six.{$random_class} > ul.nav-tabs > li > a:before{
                	border-color: {$shortcode['radiant_tab_color']} ;
                }";
				wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );
			}
			$i = -1;

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$output            = '';
			$all_start         = '';
			$all_end           = '';
			$menu_start        = '';
			$menu_content      = '';
			$menu_end          = '';
			$container_start   = '';
			$container_content = '';
			$container_end     = '';

			$tab_id = $shortcode['radiant_extra_id'] ? 'id="' . esc_attr( $shortcode['radiant_extra_id'] ) . '"' : '';

			$output .= '<div class="rt-tab element-' . esc_attr( $shortcode['radiant_tabsstyle'] ) . ' ' . esc_attr( $random_class ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . '" ' . esc_attr( $tab_id ) . '>';

			$output .= '<ul style="' . $this->tab_title_font_inline_style . $this->tab_title_font_container . $this->tab_title_font_weight_style . '" class="nav-tabs">';
			$output .= $this->menu_str;
			$output .= '</ul>';

			$output .= '<div style="' . $this->tab_content_font_inline_style . $this->tab_content_font_container . $this->tab_content_font_weight_style . '" class="tab-content">';
			$output .= do_shortcode( $content );
			$output .= '</div>';
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
		public function radiantthemes_tab_style_item_func( $atts, $content = null, $tag ) {
			$tabicon          = '';
			$icon_icofont     = '';
			$icon_fontawesome = '';
			$icon_openiconic  = '';
			$icon_typicons    = '';
			$icon_entypo      = '';
			$icon_linecons    = '';
			$icon_pixelicons  = '';
			$icon_material    = '';
			$icon_monosocial  = '';
			$radiant_tab_id   = '';
			$border_radius    = '';
			$border_top       = '';
			$border_right     = '';
			$border_bottom    = '';
			$border_left      = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_display_icon'     => '',
					'radiant_tabicon'          => 'icofont',
					'radiant_icon_icofont'     => 'icofont icofont-angry-monster',
					'radiant_icon_fontawesome' => 'fa fa-handshake-o',
					'radiant_icon_openiconic'  => 'vc-oi vc-oi-dial',
					'radiant_icon_typicons'    => 'typcn typcn-adjust-brightness',
					'radiant_icon_entypo'      => 'entypo-icon entypo-icon-user',
					'radiant_icon_linecons'    => 'vc_li vc_li-heart',
					'radiant_icon_material'    => 'vc-material vc-material-cake',
					'radiant_icon_pixelicons'  => '',
					'radiant_icon_monosocial'  => '',
					'radiant_tabtitle'         => '',
					'radiant_tab_id'           => '',
				),
				$atts
			);

			$this->radiant_tab_id = $shortcode['radiant_tab_id'];

			// allowed metrics: http://www.w3schools.com/cssref/css_units.asp.
			$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';

			$this->radiant_display_icon = $shortcode['radiant_display_icon'];

			vc_icon_element_fonts_enqueue( $shortcode['radiant_tabicon'] );

			$output = '';

			$menu_str = $this->menu_str;

			if ( ! isset( $shortcode['radiant_tabtitle'] ) || '' === $shortcode['radiant_tabtitle'] ) {
				$shortcode['radiant_tabtitle'] = 'Tab';
			}

			$radiant_display_icon = ( 'true' == $shortcode['radiant_display_icon'] ) ? 'data-tab-icon=true' : 'data-tab-icon=false';

			$menu_str .= '<li ' . esc_attr( $radiant_display_icon ) . ' class="matchHeight">';
			$menu_str .= '<a style="' . $this->tab_title_font_container . $this->tab_title_font_weight_style . '" data-toggle="tab" href="#' . esc_attr( $shortcode['radiant_tab_id'] ) . '"><span>';
			if ( version_compare( WPB_VC_VERSION, '5.2.1' ) >= 0 && $shortcode['radiant_display_icon'] ) {
				$menu_str .= '<i class="' . esc_attr( $shortcode[ 'radiant_icon_' . $shortcode['radiant_tabicon'] ] ) . '"></i> ';
			}
			$menu_str .= esc_attr( $shortcode['radiant_tabtitle'] );
			$menu_str .= '</span></a>';
			$menu_str .= '</li>';

			$this->menu_str = $menu_str;

			$output .= '<div id="' . esc_attr( $shortcode['radiant_tab_id'] ) . '" class="tab-pane">';
			$content = preg_replace( '~</?p[^>]*>~', '', $content );
			$output .= $content;
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Tab_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Tab_Style extends WPBakeryShortCodesContainer {

	}
}
if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Tab_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Tab_Style_Item extends WPBakeryShortCodesContainer {

	}
}
