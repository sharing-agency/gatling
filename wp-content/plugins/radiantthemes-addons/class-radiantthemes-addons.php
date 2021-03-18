<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * @wordpress-plugin
 * Plugin Name: RadiantThemes Addons
 * Description: Includes RadiantThemes Addons elements like Blog, Team and Testimonials and more.
 * Version:     1.2.4
 * Author:      RadiantThemes
 * Author URI:  http://www.radiantthemes.com
 * License:     GPL2.
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: radiantthemes-addons
 */

/**
 * [vc_after_init_actions description]
 */
function vc_after_init_actions() {
	// Remove VC Elements.
	if ( function_exists( 'vc_remove_element' ) ) {

		// Remove VC Separator Element.
		vc_remove_element( 'vc_separator' );

		// Remove VC Tab Element.
		vc_remove_element( 'vc_tta_tabs' );

		// Remove VC Accordion Element.
		vc_remove_element( 'vc_tta_accordion' );

		// Remove VC FAQ Element.
		vc_remove_element( 'vc_toggle' );

		// Remove VC Call to Action Element.
		vc_remove_element( 'vc_cta' );

		// Remove VC Custom Menu.
		vc_remove_element( 'vc_wp_custommenu' );

		// Remove VC Hoverbox.
		vc_remove_element( 'vc_hoverbox' );

		// Remove VC Hoverbox.
		vc_remove_element( 'vc_image_gallery' );

		// Remove VC Masonry Hoverbox.
		vc_remove_element( 'vc_masonry_media_grid' );
	}
}
// After VC Init.
add_action( 'vc_after_init', 'vc_after_init_actions' );

// Set if vc editor is enable or not.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

$params_dir = plugin_dir_path( __FILE__ ) . 'params/';

// check for plugin using plugin name.
if ( class_exists( 'WPBakeryShortCode' ) ) {

	// Activate - params.
	foreach ( glob( $params_dir . '/*.php' ) as $param ) {
		require_once $param;
	}
}

/**
 * Check if Contact Form 7 is installed and activated.
 */
function rt_init_vendor_cf7() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
		require_once 'cf7/class-radiantthemes-style-cf7.php';
	} // if contact form7 plugin active.

}
add_action( 'plugins_loaded', 'rt_init_vendor_cf7' );


// Require files.
require_once 'widget/facebook-page-box/class-radiantthemes-facebook-widget.php';
require_once 'widget/twitter-widget/class-radiantthemes-twitter-widget.php';
require_once 'widget/contact-box/class-radiantthemes-contact-box-widget.php';
require_once 'widget/social-widget/class-radiantthemes-social-widget.php';
require_once 'widget/recent-posts/class-radiantthemes-recent-posts-widget.php';

require_once 'accordion/class-radiantthemes-style-accordion.php';
require_once 'alert-box/class-radiantthemes-style-alert.php';
require_once 'animated-link/class-radiantthemes-style-animated-link.php';
require_once 'beforeafter/class-radiantthemes-style-beforeafter.php';
require_once 'blockquote/class-radiantthemes-style-blockquote.php';
require_once 'blog/class-radiantthemes-style-blog.php';
require_once 'calltoaction/class-radiantthemes-style-calltoaction.php';
require_once 'case-studies/class-radiantthemes-style-case-study.php';
require_once 'case-studies-slider/class-radiantthemes-style-case-studies-slider.php';
require_once 'circular-progress-bar/class-radiantthemes-style-circular-progress-bar.php';
require_once 'clients/class-radiantthemes-style-clients.php';
require_once 'contact-box/class-radiantthemes-style-contact-box.php';
require_once 'countdown/class-radiantthemes-style-countdown.php';
require_once 'counterup/class-radiantthemes-style-counterup.php';
require_once 'custom-button/class-radiantthemes-style-custom-button.php';
require_once 'custom-menu/class-radiantthemes-style-menu.php';
require_once 'dropcap/class-radiantthemes-style-dropcap.php';
require_once 'fancytextbox/class-radiantthemes-style-fancy-text-box.php';
require_once 'flip-box/class-radiantthemes-style-flip-box.php';
require_once 'highlight-box/class-radiantthemes-style-highlight-box.php';
require_once 'iconbox/class-radiantthemes-style-iconbox.php';
require_once 'ihover/class-radiantthemes-style-ihover.php';
require_once 'image-gallery/class-radiantthemes-style-image-gallery.php';
require_once 'image-slider/class-radiantthemes-style-image-slider.php';
require_once 'list/class-radiantthemes-style-list.php';
require_once 'popup-video/class-radiantthemes-style-popup-video.php';
require_once 'portfolio/class-radiantthemes-style-portfolio.php';
require_once 'portfolio-slider/class-radiantthemes-style-portfolio-slider.php';
require_once 'pricingtable/class-radiantthemes-style-pricing-table.php';
require_once 'progressbar/class-radiantthemes-style-progressbar.php';
require_once 'social-widget/class-radiantthemes-social-widget.php';
require_once 'recent-posts/class-radiantthemes-recent-posts.php';
require_once 'separator/class-radiantthemes-style-separator.php';
require_once 'tabs/class-radiantthemes-style-tabs.php';
require_once 'team/class-radiantthemes-style-team.php';
require_once 'testimonial/class-radiantthemes-style-testimonial.php';
require_once 'typewriter-text/class-radiantthemes-style-typewriter-text.php';
require_once 'button/class-radiantthemes-style-button.php';
require_once 'timeline/class-radiantthemes-style-timeline.php';
require_once 'twitter-widget/class-radiantthemes-twitter-widget.php';

if ( ! class_exists( 'Radiantthemes_Addons' ) ) {
	/**
	 * Class Definition.
	 */
	class Radiantthemes_Addons {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			if ( ! function_exists( 'rt_accordion_style_func' ) ) {
				new RadiantThemes_Style_Accordion();
			}
			if ( ! function_exists( 'radiantthemes_alert_style_func' ) ) {
				new Radiantthemes_Style_Alert();
			}
			if ( ! function_exists( 'rt_animated_link_style_func' ) ) {
				new RadiantThemes_Style_Animated_Link();
			}
			if ( ! function_exists( 'radiantthemes_beforeafter_style_func' ) ) {
				new Radiantthemes_Style_Beforeafter();
			}
			if ( ! function_exists( 'radiantthemes_blockquote_style_func' ) ) {
				new Radiantthemes_Style_Blockquote();
			}
			if ( ! function_exists( 'radiantthemes_blog_style_func' ) ) {
				new Radiantthemes_Style_Blog();
			}
			if ( ! function_exists( 'radiantthemes_calltoaction_style_func' ) ) {
				new Radiantthemes_Style_Calltoaction();
			}
			if ( ! function_exists( 'radiantthemes_case_study_style_func' ) ) {
				new Radiantthemes_Style_Case_Study();
			}
			if ( ! function_exists( 'radiantthemes_case_studies_slider_style_func' ) ) {
				new Radiantthemes_Style_Case_Studies_Slider();
			}
			if ( ! function_exists( 'radiantthemes_circular_progress_bar_style_func' ) ) {
				new Radiantthemes_Style_Circular_Progress_Bar();
			}
			if ( ! function_exists( 'radiantthemes_clients_style_func' ) ) {
				new Radiantthemes_Style_Clients();
			}
			if ( ! function_exists( 'rt_contact_box_style_func' ) ) {
				new RadiantThemes_Style_Contact_Box();
			}
			if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
				if ( ! function_exists( 'rt_cf7_style_func' ) ) {
					new RadiantThemes_Style_Cf7();
				}
			}
			if ( ! function_exists( 'radiantthemes_countdown_style_func' ) ) {
				new Radiantthemes_Style_Countdown();
			}
			if ( ! function_exists( 'radiantthemes_counterup_style_func' ) ) {
				new Radiantthemes_Style_Counterup();
			}
			if ( ! function_exists( 'radiantthemes_custom_button_style_func' ) ) {
				new Radiantthemes_Style_Custom_Button();
			}
			if ( ! function_exists( 'radiantthemes_menu_style_func' ) ) {
				new Radiantthemes_Style_Menu();
			}
			if ( ! function_exists( 'radiantthemes_dropcap_style_func' ) ) {
				new Radiantthemes_Style_Dropcap();
			}
			if ( ! function_exists( 'radiantthemes_fancy_text_box_style_func' ) ) {
				new RadiantThemes_Style_Fancy_Text_Box();
			}
			if ( ! function_exists( 'radiantthemes_flip_box_style_func' ) ) {
				new RadiantThemes_Style_Flip_Box();
			}
			if ( ! function_exists( 'radiantthemes_highlight_box_style_func' ) ) {
				new RadiantThemes_Style_Highlight_Box();
			}
			if ( ! function_exists( 'radiantthemes_iconbox_style_func' ) ) {
				new RadiantThemes_Style_Iconbox();
			}
			if ( ! function_exists( 'radiantthemes_ihover_style_func' ) ) {
				new RadiantThemes_Style_ihover();
			}
			if ( ! function_exists( 'radiantthemes_image_gallery_style_func' ) ) {
				new RadiantThemes_Style_Image_Gallery();
			}
			if ( ! function_exists( 'radiantthemes_image_slider_style_func' ) ) {
				new RadiantThemes_Style_Image_Slider();
			}
			if ( ! function_exists( 'rt_list_style_func' ) ) {
				new RadiantThemes_Style_List();
			}
			if ( ! function_exists( 'radiantthemes_popup_video_style_func' ) ) {
				new Radiantthemes_Style_Popup_Video();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_style_func' ) ) {
				new Radiantthemes_Style_Portfolio();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_slider_style_func' ) ) {
				new Radiantthemes_Style_Portfolio_Slider();
			}
			if ( ! function_exists( 'radiantthemes_pricing_table_style_func' ) ) {
				new Radiantthemes_Style_Pricing_Table();
			}
			if ( ! function_exists( 'radiantthemes_progressbar_style_func' ) ) {
				new Radiantthemes_Style_Progressbar();
			}
			if ( ! function_exists( 'radiantthemes_social_widget_func' ) ) {
				new RadiantThemes_Style_Social_Widget();
			}
			if ( ! function_exists( 'radiantthemes_post_thumbnail_widget_func' ) ) {
				new RadiantThemes_Style_Post();
			}
			if ( ! function_exists( 'radiantthemes_separator_style_func' ) ) {
				new Radiantthemes_Style_Separator();
			}
			if ( ! function_exists( 'rt_tabs_style_func' ) ) {
				new RadiantThemes_Style_Tabs();
			}
			if ( ! function_exists( 'radiantthemes_team_style_func' ) ) {
				new Radiantthemes_Style_Team();
			}
			if ( ! function_exists( 'radiantthemes_testimonial_style_func' ) ) {
				new Radiantthemes_Style_Testimonial();
			}
			if ( ! function_exists( 'radiantthemes_typewriter_text_style_func' ) ) {
				new RadiantThemes_Style_Typewriter_Text();
			}
			if ( ! function_exists( 'radiantthemes_button_style_func' ) ) {
				new Radiantthemes_Style_Button();
			}
			if ( ! function_exists( 'radiantthemes_timeline_style_func' ) ) {
				new RadiantThemes_Style_Timeline();
			}
			if ( ! function_exists( 'radiantthemes_twitter_widget_func' ) ) {
				new RadiantThemes_Style_Twitter_Widget();
			}
		}
	}
}

/**
 * [radiantthemes_vc_addons_notice description]
 */
function radiantthemes_vc_addons_notice() {
	$plugin_data = get_plugin_data( __FILE__ );
	echo '
	<div class="updated">
		<p>' .
			sprintf( wp_kses_post( '<strong>%s</strong> requires <strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'radiantthemes-addons' ), esc_html( $plugin_data['Name'] ) ) .
		'</p>
	</div>';
}
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Load scripts for backend
 *
 * @return void
 */
function radiantthemes_load_admin_scripts() {
	wp_enqueue_style(
		'icofont',
		plugins_url( 'assets/css/icofont.min.css', __FILE__ ),
		array(),
		time()
	);
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_load_admin_scripts' );

/**
 * Load scripts for frontend
 *
 * @return void
 */
function radiantthemes_load_frontend_scripts() {
	// ADD ICOFONT CSS.
	wp_register_style(
		'icofont',
		plugins_url( '/assets/css/icofont.min.css', __FILE__ ),
		array(),
		time()
	);
	wp_enqueue_style( 'icofont' );

	// ADD RADIANTTHEMES CORE CSS.
	wp_register_style(
		'radiantthemes-addons-core',
		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-core.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'radiantthemes-addons-core' );

	// ADD RADIANTTHEMES CORE CSS.
	wp_register_style(
		'radiantthemes-custom-fonts',
		plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-custom-fonts.css' ),
		array(),
		time()
	);
	wp_enqueue_style( 'radiantthemes-custom-fonts' );

	// ADD RADIANTTHEMES CORE JS.
	wp_register_script(
		'radiantthemes-addons-core',
		plugins_url( 'radiantthemes-addons/assets/js/radiantthemes-addons-core.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-addons-core' );

	// ADD RADIANTTHEMES CUSTOM JS.
	wp_register_script(
		'radiantthemes-addons-custom',
		plugins_url( 'radiantthemes-addons/assets/js/radiantthemes-addons-custom.js' ),
		array( 'jquery', 'radiantthemes-addons-core' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-addons-custom' );
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_load_frontend_scripts' );

/**
 * UNWANTED NOTICE REMOVE
 *
 * @return void
 */
function radiantthemes_unwanted_notice_remove() {
	echo '<style type="text/css">.rs-update-notice-wrap,.vc_license-activation-notice{display:none;}</style>';
}
add_action( 'admin_head', 'radiantthemes_unwanted_notice_remove' );

include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		/**
		 * Add button radiaus custom css to wp_head().
		 */
		function vio_button_radius_head_styles() {
			$buttonradius  = '';
			$buttonradius  = esc_html( vio_global_var( 'border-radius', 'margin-top', true ) );
			$buttonradius .= ' ' . esc_html( vio_global_var( 'border-radius', 'margin-top', true ) );
			$buttonradius .= ' ' . esc_html( vio_global_var( 'border-radius', 'margin-top', true ) );
			$buttonradius .= ' ' . esc_html( vio_global_var( 'border-radius', 'margin-top', true ) );

			$buttonborderradius = '.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn{
		        border-radius: ' . $buttonradius . ' ;
		    }';

			echo '<style type="text/css">' . $buttonborderradius . '</style>';
		}
		add_action( 'wp_head', 'vio_button_radius_head_styles' );
	}

/**
 * [radiantthemes_vc_bundle_init description]
 */
function radiantthemes_vc_bundle_init() {

	// Localization.
	load_plugin_textdomain( 'radiantthemes-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	if ( ! defined( 'WPB_VC_VERSION' ) ) {
		add_action( 'admin_notices', 'radiantthemes_vc_addons_notice' );
		return;
	}

	if ( class_exists( 'Radiantthemes_Addons' ) ) {

		new Radiantthemes_Addons();

		$list = array(
			'page',
			'team',
			'portfolio',
			'case-studies',
			'product',
			'post',
		);
		vc_set_default_editor_post_types( $list );
	}
}

add_action( 'init', 'radiantthemes_vc_bundle_init' );

/**
 * Add google fonts to Custom Heading Element
 *
 * @package Radiantthemes Addons
 */

if ( ! function_exists( 'helper_vc_fonts' ) ) {
	/**
	 * Undocumented function
	 *
	 * @param array $fonts_list Fonts to add.
	 * @return array
	 */
	function helper_vc_fonts( $fonts_list ) {

		// Montserrat Fonts.
		$montserrat->font_family             = 'Montserrat';
		$montserrat->font_types              = '400 regular: 400: normal,500 medium: 500: normal,600 semi-bold: 600: normal,700 bold: 700: normal,800 extra-bold: 800: normal';
		$montserrat->font_styles             = 'regular,500,600,700,800';
		$montserrat->font_family_description = esc_html_e( 'Select font family', 'helper' );
		$montserrat->font_style_description  = esc_html_e( 'Select font styling', 'helper' );
		$fonts_list[]                        = $montserrat;

		// Poppins Fonts.
		$poppins->font_family             = 'Poppins';
		$poppins->font_types              = '100 thin: 100: normal,200 extra-light: 200: normal,300 light: 300: normal,400 regular: 400: normal,500 medium: 500: normal,600 semi-bold: 600: normal,700 bold: 700: normal,800 extra-bold: 800: normal';
		$poppins->font_styles             = '100,200,300,regular,500,600,700,800';
		$poppins->font_family_description = esc_html_e( 'Select font family', 'helper' );
		$poppins->font_style_description  = esc_html_e( 'Select font styling', 'helper' );
		$fonts_list[]                     = $poppins;

		// Rubik Fonts.
		$rubik->font_family             = 'Rubik';
		$rubik->font_types              = '300 light: 300: normal,400 regular: 400: normal,500 medium: 500: normal,700 bold: 700: normal,900 black: 900: normal';
		$rubik->font_styles             = '300,regular,500,700,900';
		$rubik->font_family_description = esc_html_e( 'Select font family', 'helper' );
		$rubik->font_style_description  = esc_html_e( 'Select font styling', 'helper' );
		$fonts_list[]                   = $rubik;

		// Taviraj Fonts.
		$taviraj->font_family             = 'Taviraj';
		$taviraj->font_types              = '400 regular: 400: normal,500 medium: 500: normal,600 semi-bold: 600: normal,700 bold: 700: normal';
		$taviraj->font_styles             = 'regular,500,600,700';
		$taviraj->font_family_description = esc_html_e( 'Select font family', 'helper' );
		$taviraj->font_style_description  = esc_html_e( 'Select font styling', 'helper' );
		$fonts_list[]                     = $taviraj;

		return $fonts_list;
	}
}
add_filter( 'vc_google_fonts_get_fonts_filter', 'helper_vc_fonts' );

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Add params to WP Bakery Elements
	 *
	 * @return void
	 */
	function radiant_vc_add_attr() {

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

		$client_terms = get_terms(
			array(
				'taxonomy'   => 'client-category',
				'hide_empty' => false,
			)
		);

		$client_category_array = array();
		$client_category_array = array( 'Show all categories' => 'all' );
		if ( ! empty( $client_terms ) ) {
			foreach ( $client_terms as $client_term ) {
				$client_category_array[ $client_term->name ] = $client_term->slug;
			}
		}
		$attributes = array(
			'type'       => 'dropdown',
			'heading'    => 'Select Client Category',
			'param_name' => 'client_category_list',
			'value'      => $client_category_array,
			'weight'     => 1,
			'std'        => 'all',
		);
		vc_add_param( 'rt_clients_style', $attributes );

		$testimonial_terms = get_terms(
			array(
				'taxonomy'   => 'testimonial-category',
				'hide_empty' => false,
			)
		);

		$testimonial_category_array = array();
		$testimonial_category_array = array( 'Show all categories' => 'all' );
		if ( ! empty( $testimonial_terms ) ) {
			foreach ( $testimonial_terms as $testimonial_term ) {
				$testimonial_category_array[ $testimonial_term->name ] = $testimonial_term->slug;
			}
		}
		$attributes = array(
			'type'       => 'dropdown',
			'heading'    => 'Select Testimonial Category',
			'param_name' => 'testimonial_category_list',
			'value'      => $testimonial_category_array,
			'weight'     => 1,
			'std'        => 'all',
		);
		vc_add_param( 'rt_testimonial_style', $attributes );

		// VC CUSTOM HEADING EDIT.
		$custom_heading_attributes = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Select Font', 'radiantthemes-addons' ),
				'param_name' => 'custom_heading_select_font',
				'value'      => array(
					esc_html__( 'Select Font Type', 'radiantthemes-addons' ) => '',
					esc_html__( 'Google Font', 'radiantthemes-addons' )      => 'gfont',
					esc_html__( 'Custom Font', 'radiantthemes-addons' )      => 'cfont',
				),
				'std'        => 'gfont',
				'weight'     => 1,
				'group'      => 'Typography',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'custom_heading_custom_font',
				'value'      => $final_font_array,
				'dependency' => array(
					'element' => 'custom_heading_select_font',
					'value'   => 'cfont',
				),
				'std'        => '',
				'group'      => 'Typography',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
				'param_name' => 'custom_heading_font_weight',
				'value'      => '400',
				'group'      => 'Typography',
				'dependency' => array(
					'element' => 'custom_heading_select_font',
					'value'   => 'cfont',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
				'param_name'  => 'custom_heading_font_style',
				'value'       => array(
					esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
					esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
				),
				'std'         => 'normal',
				'group'       => 'Typography',
				'dependency'  => array(
					'element' => 'custom_heading_select_font',
					'value'   => 'cfont',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Select Style', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select custom heading style.', 'radiantthemes-addons' ),
				'param_name'  => 'custom_heading_style',
				'value'       => array(
					esc_html__( 'Style One (Default)', 'radiantthemes-addons' )           => 'one',
					esc_html__( 'Style Two (Cut Out)', 'radiantthemes-addons' )           => 'two',
					esc_html__( 'Style Three (SlideOut Right)', 'radiantthemes-addons' )  => 'three',
					esc_html__( 'Style Four (SlideOut Left)', 'radiantthemes-addons' )    => 'four',
				),
				'description' => esc_html__( 'Enter description.', 'radiantthemes-addons' ),
				'std'         => 'one',
				'group'       => 'RadiantThemes Style',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Slide Out Color', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Set your slide out color. (If not selected, it will take default color)', 'radiantthemes-addons' ),
				'param_name'  => 'custom_heading_slide_out_color',
				'dependency'  => array(
					'element' => 'custom_heading_style',
					'value'   => 'three',
				),
				'std'         => '#bf0000',
				'group'       => 'RadiantThemes Style',
			),
		);
		vc_add_params( 'vc_custom_heading', $custom_heading_attributes );
		vc_remove_param( 'vc_custom_heading', 'use_theme_fonts' );

		// START OF VC COLUMN EDIT.
		$column_attributes = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Put Animation Name', 'radiantthemes-addons' ),
				'description' => sprintf( wp_kses_post( 'Enter animation name. ( Ex. fadeInUp ) (Note: Please check all animation examples here: <a href="https://daneden.github.io/animate.css/" target="_blank">animate.css</a>).', 'radiantthemes-addons' ) ),
				'param_name'  => 'column_animation_name',
				'group'       => 'RadiantThemes Style',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Put Animation Delay', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Enter animation delay below. ( Ex. 0.3s )', 'radiantthemes-addons' ),
				'param_name'  => 'column_animation_delay',
				'group'       => 'RadiantThemes Style',
			),
		);
		vc_add_params( 'vc_column', $column_attributes );
		// END OF VC COLUMN EDIT.

		// START OF VC COLUMN INNER EDIT.
		$column_inner_attributes = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Put Animation Name', 'radiantthemes-addons' ),
				'description' => sprintf( wp_kses_post( 'Enter animation name. ( Ex. fadeInUp ) (Note: Please check all animation examples here: <a href="https://daneden.github.io/animate.css/" target="_blank">animate.css</a>).', 'radiantthemes-addons' ) ),
				'param_name'  => 'column_inner_animation_name',
				'group'       => 'RadiantThemes Style',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Put Animation Delay', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Enter animation delay below. ( Ex. 0.3s )', 'radiantthemes-addons' ),
				'param_name'  => 'column_inner_animation_delay',
				'group'       => 'RadiantThemes Style',
			),
		);
		vc_add_params( 'vc_column_inner', $column_inner_attributes );
		// END OF VC COLUMN INNER EDIT.

		// VC TEXT BLOCK EDIT.
		$text_block_attributes = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Select Custom Font', 'radiantthemes-addons' ),
				'param_name' => 'text_block_custom_font',
				'value'      => $final_font_array,
				'std'        => '',
				'group'      => 'Typography',
			),
			array(
				'type'       => 'font_container',
				'param_name' => 'text_block_font_container',
				'value'      => '',
				'settings'   => array(
					'fields' => array(
						'font_size'               => '',
						'line_height',
						'color',
						'font_size_description'   => __( 'Enter font size.', 'radiantthemes-addons' ),
						'line_height_description' => __( 'Enter line height.', 'radiantthemes-addons' ),
						'color_description'       => __( 'Select heading color.', 'radiantthemes-addons' ),
					),
				),
				'group'      => 'Typography',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Font Weight', 'radiantthemes-addons' ),
				'param_name' => 'text_block_font_weight',
				'value'      => '400',
				'group'      => 'Typography',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Font Style', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select font style.', 'radiantthemes-addons' ),
				'param_name'  => 'text_block_font_style',
				'value'       => array(
					esc_html__( 'Regular', 'radiantthemes-addons' ) => 'normal',
					esc_html__( 'Italic', 'radiantthemes-addons' )  => 'italic',
				),
				'std'         => 'normal',
				'group'       => 'Typography',
			),
		);
		vc_add_params( 'vc_column_text', $text_block_attributes );

	}
	add_action( 'init', 'radiant_vc_add_attr', 999 );

	add_action(
		'vc_after_init',
		function() {
			$new_param_data_one = array(
				'type'       => 'font_container',
				'param_name' => 'font_container',
				'value'      => 'tag:h2|text_align:left',
				'settings'   => array(
					'fields' => array(
						'tag'                     => 'h2',
						// default value h2.
						'text_align',
						'font_size',
						'line_height',
						'color',
						'font_size_description'   => __( 'Enter font size.', 'radiantthemes-addons' ),
						'line_height_description' => __( 'Enter line height.', 'radiantthemes-addons' ),
						'color_description'       => __( 'Select heading color.', 'radiantthemes-addons' ),
					),
				),
				'weight'     => 2,
				'group'      => 'Typography',
			);
			vc_update_shortcode_param( 'vc_custom_heading', $new_param_data_one );

			$new_param_data_two = array(
				'type'       => 'google_fonts',
				'param_name' => 'google_fonts',
				'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => __( 'Select font family.', 'radiantthemes-addons' ),
						'font_style_description'  => __( 'Select font styling.', 'radiantthemes-addons' ),
					),
				),
				'dependency' => array(
					'element' => 'custom_heading_select_font',
					'value'   => 'gfont',
				),
				'group'      => 'Typography',
			);
			vc_update_shortcode_param( 'vc_custom_heading', $new_param_data_two );

			$new_param_data_three = array(
				'type'        => 'dropdown',
				'heading'     => __( 'Text source', 'radiantthemes-addons' ),
				'param_name'  => 'source',
				'value'       => array(
					__( 'Custom text', 'radiantthemes-addons' )        => '',
					__( 'Post or Page Title', 'radiantthemes-addons' ) => 'post_title',
				),
				'std'         => '',
				'description' => __( 'Select text source.', 'radiantthemes-addons' ),
				'weight'      => 3,
			);
			vc_update_shortcode_param( 'vc_custom_heading', $new_param_data_three );
		}
	);
}
