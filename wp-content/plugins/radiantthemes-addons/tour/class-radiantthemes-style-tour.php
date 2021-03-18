<?php
/**
 * Tour Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Tour' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Tour extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Tour', 'radiantthemes-addons' ),
					'base'        => 'rt_tour_style',
					'description' => esc_html__( 'Display Tour Packages with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Tour-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_tour_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Tour Style', 'radiantthemes-addons' ),
							'param_name' => 'tour_style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
							),
							'std'        => 'one',
						),
					),
				)
			);
			add_shortcode( 'rt_tour_style', array( $this, 'radiantthemes_tour_style_func' ) );
		}

		/**
		 * [radiantthemes_tour_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_tour_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'tour_style_variation' => 'one',
				),
				$atts
			);

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' )
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			require 'template/template-tour-style-' . esc_attr( $shortcode['tour_style_variation'] ) . '.php';

			return $output;
		}
	}
}
