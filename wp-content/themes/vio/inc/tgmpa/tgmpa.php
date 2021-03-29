<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Undocumented function
 */
function vio_register_required_plugins() {
	$plugins = array(
		// Redux Framework.
		array(
			'name'     => esc_html__( 'Redux Framework', 'vio' ),
			'slug'     => 'redux-framework',
			'required' => true,
		),
		// One Click Demo Import.
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'vio' ),
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),
		// RadiantThemes Custom Post Type.
		array(
			'name'     => esc_html__( 'RadiantThemes Custom Post Type', 'vio' ),
			'slug'     => 'radiantthemes-custom-post-type',
			'source'   => 'https://vio.radiantthemes.com/plugins/radiantthemes-custom-post-type.zip',
			'required' => true,
		),
		// RadiantThemes Addons.
		array(
			'name'     => esc_html__( 'RadiantThemes Addons', 'vio' ),
			'slug'     => 'radiantthemes-addons',
			'source'   => 'https://vio.radiantthemes.com/plugins/radiantthemes-addons.zip',
			'required' => true,
		),
		// WPBakery Page Builder.
		array(
			'name'     => esc_html__( 'WPBakery Page Builder', 'vio' ),
			'slug'     => 'js_composer',
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/visual-composer--SQeyhuYxqWFubs5iyeWPczR8jE7zU6zen8JpUGZw.zip',
			'required' => true,
		),
		// Contact Form 7.
		array(
			'name'     => esc_html__( 'Contact Form 7', 'vio' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		// WooCommerce.
		array(
			'name'     => esc_html__( 'WooCommerce', 'vio' ),
			'slug'     => 'woocommerce',
			'required' => false,
		),
		// YITH WooCommerce Quick View.
		array(
			'name'     => esc_html__( 'YITH WooCommerce Quick View', 'vio' ),
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => false,
		),
		// YITH WooCommerce Wishlist.
		array(
			'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'vio' ),
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'vio_register_required_plugins' );

if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( $disable_updater = true );
}
