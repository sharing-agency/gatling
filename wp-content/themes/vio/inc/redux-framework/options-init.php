<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package vio
 */

// Check if Redux installed.
if ( ! class_exists( 'Redux' ) ) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'vio_theme_option';

/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'             => $opt_name,
	'disable_tracking'     => true,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => esc_html__( 'Powered By: RadiantThemes Customizer', 'vio' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'vio' ),
	'page_title'           => esc_html__( 'Theme Options', 'vio' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-hammer',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-hammer',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'footer_credit'        => $theme->get( 'Name' ),
	'show_import_export'   => true,
	'show_options_object'  => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	'ajax_save'            => true,
	'hints'                => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
);
Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/**
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START Basic Fields.
Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'General', 'vio' ),
		'icon'  => 'el el-cog',
		'id'    => 'theme-general',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Layout', 'vio' ),
		'icon'       => 'el el-screen',
		'id'         => 'layout',
		'subsection' => true,
		'fields'     => array(

			// Layout Info.
			array(
				'id'    => 'info_layout',
				'type'  => 'info',
				'title' => esc_html__( 'Layout Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Layout Type.
			array(
				'id'       => 'layout_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Layout Type', 'vio' ),
				'subtitle' => esc_html__( 'Select layout type. (Please Note: Please set "Row stretch" to "Default" from WPBakery Page Builder "Row Settings"/"Section Settings" for "Boxed" layout.)', 'vio' ),
				'options'  => array(
					'full-width' => 'Full Width',
					'boxed'      => 'Boxed',
				),
				'default'  => 'full-width',
			),

			// Layout Type Boxed Width.
			array(
				'id'            => 'layout_type_boxed_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Boxed Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select Boxed width. Min is 1000px, Max is 1400px and Default is 1200px.', 'vio' ),
				'min'           => 1000,
				'step'          => 10,
				'max'           => 1400,
				'default'       => 1200,
				'display_value' => 'text',
				'required'      => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Boxed Background Color.
			array(
				'id'       => 'layout_type_boxed_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Boxed Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for Boxed layout. (Please Note: This can be overright by setting section background color.)', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-website-layout',
				),
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Body Background.
			array(
				'id'       => 'layout_type_body_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Body Background', 'vio' ),
				'subtitle' => esc_html__( 'Choose a background for the theme. (Please Note: This can be overright by setting section background color.)', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Color', 'vio' ),
		'icon'       => 'el el-brush',
		'id'         => 'color',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_color_scheme',
				'type'  => 'info',
				'title' => esc_html__( 'Color Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Color Scheme Type.
			array(
				'id'       => 'color_scheme_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Color Scheme Type', 'vio' ),
				'subtitle' => esc_html__( 'Select color scheme type', 'vio' ),
				'options'  => array(
					'predefined-color' => 'Predefined Color',
					'custom-color'     => 'Custom Color',
				),
				'default'  => 'predefined-color',
			),

			// Color Scheme Type Predefined.
			array(
				'id'       => 'color_scheme_type_predefined',
				'type'     => 'palette',
				'title'    => esc_html__( 'Select Theme Color', 'vio' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'vio' ),
				'palettes' => array(
					'#3a3d42' => array(
						'#3a3d42',
					),
					'#253cac' => array(
						'#253cac',
					),
					'#1d4fce' => array(
						'#1d4fce',
					),
					'#0992c9' => array(
						'#0992c9',
					),
					'#556df4' => array(
						'#556df4',
					),
					'#0b88ee' => array(
						'#0b88ee',
					),
					'#3367d6' => array(
						'#3367d6',
					),
					'#0a88ee' => array(
						'#0a88ee',
					),
					'#0a88ee' => array(
						'#0a88ee',
					),
					'#3367d6' => array(
						'#3367d6',
					),
					'#ff1053' => array(
						'#ff1053',
					),

					'#556df4' => array(
						'#556df4',
					),
					'#fe002f' => array(
						'#fe002f',
					),
					'#ff0f27' => array(
						'#ff0f27',
					),
					'#ff8522' => array(
						'#ff8522',
					),
					'#fec00a' => array(
						'#fec00a',
					),
					'#ef173b' => array(
						'#ef173b',
					),
					'#ea0026' => array(
						'#ea0026',
					),
					'#bf9e58' => array(
						'#bf9e58',
					),
					'#ee363f' => array(
						'#ee363f',
					),
					'#ef403b' => array(
						'#ef403b',
					),
					'#27ae60' => array(
						'#27ae60',
					),
					'#25c16f' => array(
						'#25c16f',
					),
					'#2cb66a' => array(
						'#2cb66a',
					),
					'#00c57c' => array(
						'#00c57c',
					),
					'#0abc5f' => array(
						'#0abc5f',
					),
					'#6760bc' => array(
						'#6760bc',
					),
				),
				'default'  => '#ff0f27',
				'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'predefined-color',
					),
				),
			),

			// Color Scheme Type Custom.
			array(
				'id'       => 'color_scheme_type_custom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Select Theme Color', 'vio' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'vio' ),
				'desc'     => esc_html__( 'Select alpha value if you want to use alpha in selected areas.', 'vio' ),
				'default'  => array(
					'color' => '#2b65eb',
					'alpha' => 0.85,
				),
				'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'custom-color',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Favicon', 'vio' ),
		'id'         => 'favicon',
		'icon'       => 'el el-bookmark-empty',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'title'    => esc_html__( 'Favicon', 'vio' ),
				'subtitle' => esc_html__( 'You can upload Favicon on your website. (.ico 32x32 pixels)', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Favicon-Default.ico',
				),
			),

			array(
				'id'       => 'apple-icon',
				'type'     => 'media',
				'title'    => esc_html__( 'Apple Touch Icon', 'vio' ),
				'subtitle' => esc_html__( 'apple-touch-icon.png 192x192 pixels', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Apple-Touch-Icon-192x192-Default.png',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Fonts', 'vio' ),
		'id'         => 'basic-settings',
		'icon'       => 'el el-fontsize',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'             => 'general_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Poppins',
                    'font-weight'    => '400',
                    'font-size'      => '16px',
                    'color'          => '#565656',
                    'line-height'    => '28px',
				),
			),

			array(
				'id'             => 'h1_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '400',
					'font-size'      => '40px',
					'color'          => '#0e0e0e',
					'line-height'    => '48px',
				),
			),

			array(
				'id'             => 'h2_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Poppins',
                    'font-weight'    => '700',
                    'font-size'      => '40px',
                    'color'          => '#141414',
                    'line-height'    => '43px',
				),
			),

			array(
				'id'             => 'h3_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Poppins',
                    'font-weight'    => '600',
                    'font-size'      => '55px',
                    'color'          => '#000000',
                    'line-height'    => '65px',
				),
			),

			array(
				'id'             => 'h4_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Montserrat',
                    'font-weight'    => '400',
                    'font-size'      => '30px',
                    'color'          => '#0e0e0e',
                    'line-height'    => '35px',
				),
			),

			array(
				'id'             => 'h5_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Montserrat',
                    'font-weight'    => '400',
                    'font-size'      => '18px',
                    'color'          => '#0e0e0e',
                    'line-height'    => '26px',
				),
			),

			array(
				'id'             => 'h6_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
                    'google'         => true,
                    'font-family'    => 'Montserrat',
                    'font-weight'    => '600',
                    'font-size'      => '15px',
                    'color'          => '#0e0e0e',
                    'line-height'    => '26px',
				),
			),
		),
	)
);

$fields_array      = array();
$how_many_sections = 50;

for ( $i = 1; $i <= $how_many_sections; $i++ ) {
	$j               = $i - 1;
	$sectionstartid  = 'section-start-';
	$sectionstartid .= $i;

	if ( 1 === $i ) {
		$sectionstart = array(
			'id'     => $sectionstartid,
			'type'   => 'section',
			'title'  => esc_html__( 'Custom Font ', 'vio' ) . $i,
			'indent' => true,
		);
	} else {
		$sectionstart = array(
			'id'       => $sectionstartid,
			'type'     => 'section',
			'title'    => esc_html__( 'Custom Font ', 'vio' ) . $i,
			'indent'   => true,
			'required' => array(
				array(
					'webfontName' . $j,
					'!=',
					false,
				),
			),
		);
	}

	$webfontnameid  = 'webfontName';
	$webfontnameid .= $i;

	$webfontname = array(
		'id'    => $webfontnameid,
		'type'  => 'text',
		'title' => esc_html__( 'Font Name', 'vio' ),
		'desc'  => esc_html__( 'Give this any custom Name', 'vio' ),
	);

	$woofid  = 'woff';
	$woofid .= $i;

	$woof = array(
		'id'             => $woofid,
		'type'           => 'media',
		'title'          => esc_html__( 'WOFF ', 'vio' ),
		'class'          => 'medium-text',
		'mode'           => false,
		'preview'        => false,
		'library_filter' => array( 'woof' ),
		'placeholder'    => 'No Fonts selected',
	);

	$wooftwoid  = 'woffTwo';
	$wooftwoid .= $i;

	$wooftwo = array(
		'id'             => $wooftwoid,
		'type'           => 'media',
		'title'          => esc_html__( 'WOFF2 ', 'vio' ),
		'class'          => 'medium-text',
		'mode'           => false,
		'preview'        => false,
		'library_filter' => array( 'woof2' ),
		'placeholder'    => 'No Fonts selected',
	);

	$ttfid  = 'ttf';
	$ttfid .= $i;

	$ttf = array(
		'id'          => $ttfid,
		'type'        => 'media',
		'title'       => esc_html__( 'TTF ', 'vio' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$svgid  = 'svg';
	$svgid .= $i;

	$svg = array(
		'id'          => $svgid,
		'type'        => 'media',
		'title'       => esc_html__( 'SVG ', 'vio' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$eotid  = 'eot';
	$eotid .= $i;

	$eot = array(
		'id'          => $eotid,
		'type'        => 'media',
		'title'       => esc_html__( 'EOT ', 'vio' ),
		'class'       => 'medium-text',
		'mode'        => false,
		'preview'     => false,
		'placeholder' => 'No Fonts selected',
	);

	$sectionendid  = 'section-end-';
	$sectionendid .= $i;

	$sectionend = array(
		'id'     => $sectionendid,
		'type'   => 'section',
		'indent' => false,
	);

	array_push( $fields_array, $sectionstart );
	array_push( $fields_array, $webfontname );
	array_push( $fields_array, $woof );
	array_push( $fields_array, $wooftwo );
	array_push( $fields_array, $ttf );
	array_push( $fields_array, $svg );
	array_push( $fields_array, $eot );
	array_push( $fields_array, $sectionend );
}

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Custom Fonts', 'vio' ),
		'icon'       => 'el el-screen',
		'id'         => 'custom-fonts',
		'desc'       => esc_html__( 'Upload Custom Fonts.', 'vio' ),
		'subsection' => true,
		'fields'     => $fields_array,
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Custom Slug', 'vio' ),
		'icon'       => 'el el-folder-open',
		'id'         => 'custom_slug',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_change_slug',
				'type'  => 'info',
				'title' => esc_html__( 'Change Custom Post Type Slug', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			array(
				'id'       => 'change_slug_portfolio',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'project',
			),
			array(
				'id'       => 'change_slug_team',
				'type'     => 'text',
				'title'    => esc_html__( 'Team', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'team',
			),
			array(
				'id'       => 'change_slug_casestudies',
				'type'     => 'text',
				'title'    => esc_html__( 'Case Study', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'case-studies',
			),
			array(
				'id'       => 'change_slug_property',
				'type'     => 'text',
				'title'    => esc_html__( 'Property', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'properties',
			),
			array(
				'id'       => 'change_slug_department',
				'type'     => 'text',
				'title'    => esc_html__( 'Department', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'departments',
			),
			array(
				'id'       => 'change_slug_tour',
				'type'     => 'text',
				'title'    => esc_html__( 'Tour', 'vio' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'vio' ),
				'validate' => 'no_special_chars',
				'default'  => 'tours',
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Preloader', 'vio' ),
		'icon'       => 'el el-hourglass',
		'id'         => 'preloader',
		'subsection' => true,
		'fields'     => array(

			// Preloader Info.
			array(
				'id'    => 'info_preloader',
				'type'  => 'info',
				'title' => esc_html__( 'Preloader Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Preloader Switch.
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Preloader', 'vio' ),
				'subtitle' => esc_html__( 'Choose if want to activate Preloader or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Preloader Style.
			array(
				'id'       => 'preloader_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Preloader Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Style of the Preloader. (Powered By: "Loading.io")', 'vio' ),
				'options'  => array(
                    'circle'       => 'Circle',
                    'default'      => 'Default',
                    'dual-ring'    => 'Dual Ring',
                    'ellipsis'     => 'Ellipsis',
                    'facebook'     => 'Facebook',
                    'grid'         => 'Grid',
                    'heart'        => 'Heart',
                    'hourglass'    => 'Hourglass',
                    'ring'         => 'Ring',
                    'ripple'       => 'Ripple',
                    'roller'       => 'Roller',
                    'spinner'      => 'Spinner',
				),
				'default'  => 'roller',
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Background Color.
			array(
				'id'       => 'preloader_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for the Preloader.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.preloader',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Color.
			array(
				'id'       => 'preloader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a color for the Preloader.', 'vio' ),
				'default'  => array(
					'color' => '#212127',
					'alpha' => 1,
				),
				'output'   => array(
                    'background-color'   => '.lds-circle, .lds-default > div, .lds-ellipsis > div, .lds-facebook > div, .lds-grid > div, .lds-heart > div, .lds-heart > div:after, .lds-heart > div:before, .lds-roller > div:after, .lds-spinner > div:after',
                    'border-color'       => '.lds-ripple > div',
                    'border-top-color'   => '.lds-dual-ring:after, .lds-hourglass:after, .lds-ring > div',
                    'border-bottom-color'=> '.lds-dual-ring:after, .lds-hourglass:after',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Timeout.
			array(
				'id'            => 'preloader_timeout',
				'type'          => 'slider',
				'title'         => esc_html__( 'Preloader Timeout', 'vio' ),
				'subtitle'      => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 3000ms and Default is 500ms.', 'vio' ),
				'min'           => 100,
				'step'          => 100,
				'max'           => 3000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Page Transition', 'vio' ),
		'icon'       => 'el el-magic',
		'id'         => 'page_transition',
		'subsection' => true,
		'fields'     => array(

			// Page Transition Info.
			array(
				'id'    => 'info_page_transition',
				'type'  => 'info',
				'title' => esc_html__( 'Page Transition Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Page Transition Switch.
			array(
				'id'       => 'page_transition_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Page Transition', 'vio' ),
				'subtitle' => esc_html__( 'Choose if want to activate Page Transition or not. (Please Note: Preloader option will not work if you enable this.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Page Transition Background Color.
			array(
				'id'       => 'page_transition_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.page-transition-layer',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

			// Page Transition Loader Color.
			array(
				'id'       => 'page_transition_loader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Loader Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition Loader.', 'vio' ),
				'default'  => array(
					'color' => '#ff8522',
					'alpha' => 1,
				),
				'output'   => array(
					'stroke' => '.page-transition-layer-spinner .page-transition-layer-spinner-path',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Scroll To Top', 'vio' ),
		'icon'       => 'el el-chevron-up',
		'id'         => 'scroll_to_top',
		'subsection' => true,
		'fields'     => array(

			// Scroll To Top Info.
			array(
				'id'    => 'info_scroll_to_top',
				'type'  => 'info',
				'title' => esc_html__( 'Scroll To Top Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Scroll To Top Switch.
			array(
				'id'       => 'scroll_to_top_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Scroll To Top', 'vio' ),
				'subtitle' => esc_html__( 'Choose if want to activate Scroll To Top or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Scroll To Top Direction.
			array(
				'id'       => 'scroll_to_top_direction',
				'type'     => 'select',
				'title'    => esc_html__( 'Direction', 'vio' ),
				'subtitle' => esc_html__( 'Select Direction of the Scroll To Top.', 'vio' ),
				'options'  => array(
					'left'  => 'Left',
					'right' => 'Right',
				),
				'default'  => 'right',
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Background Color.
			array(
				'id'       => 'scroll_to_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for the Scroll To Top.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body > .scrollup',
				),
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Icon Color.
			array(
				'id'       => 'scroll_to_top_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a icon color for the Scroll To Top.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => 'body > .scrollup',
				),
				'required' => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'GDPR Notice', 'vio' ),
		'icon'       => 'el el-exclamation-sign',
		'id'         => 'gdpr_notice',
		'subsection' => true,
		'fields'     => array(

			// GDPR Notice Info.
			array(
				'id'    => 'info_gdpr_notice',
				'type'  => 'info',
				'title' => esc_html__( 'GDPR Notice Options', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// GDPR Notice Switch.
			array(
				'id'       => 'gdpr_notice_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate GDPR Notice', 'vio' ),
				'subtitle' => esc_html__( 'Choose if want to activate GDPR Notice or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// GDPR Notice Background Color.
			array(
				'id'       => 'gdpr_notice_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for the GDPR Notice.', 'vio' ),
				'default'  => array(
					'color' => '#3b4354',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.gdpr-notice',
				),
				'required' => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Typography.
			array(
				'id'             => 'gdpr_notice_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'GDPR Notice Typography', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font of GDPR Notice.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array(
					'.gdpr-notice p',
				),
				'units'          => 'px',
				'default'        => array(
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'required'       => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Content.
			array(
				'id'       => 'gdpr_notice_content',
				'type'     => 'textarea',
				'title'    => esc_html__( 'GDPR Notice Content', 'vio' ),
				'subtitle' => esc_html__( 'Enter content to show on GDPR Notice.', 'vio' ),
				'default'  => "Our website use cookies to improve and personalize your experience and to display advertisements (if any). Our website may also include cookies from third parties like Google Adsense, Google Analytics, YouTube. By using this website, you consent to the use of cookies. We've updated our Privacy Policy, please click on the button beside to check our Privacy Policy.",
				'required' => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Text.
			array(
				'id'       => 'gdpr_notice_button_text',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Enter Button Text for GDPR Notice button.', 'vio' ),
				'default'  => 'Privacy Policy',
				'required' => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Link.
			array(
				'id'       => 'gdpr_notice_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Enter Button Link for GDPR Notice button.', 'vio' ),
				'default'  => '#',
				'required' => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Remove Link.
			array(
				'id'    => 'gdpr_notice_remove_link',
				'type'  => 'info',
				'style' => 'warning',
				'desc'  => wp_kses_post( '<a href="' . esc_url( 'tools.php?page=remove_personal_data' ) . '" target="_blank">Click here</a> to forget a user.' ),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Header', 'vio' ),
		'icon'  => 'el el-website',
		'id'    => 'header',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'General', 'vio' ),
		'icon'       => 'el el-cog-alt',
		'id'         => 'general',
		'subsection' => true,
		'fields'     => array(

			// Header Style Info.
			array(
				'id'    => 'info_header_style',
				'type'  => 'info',
				'title' => esc_html__( 'Header Style', 'vio' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Header Style Options.
			array(
				'id'       => 'header-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Header Style (Header will be changed as per selection || N.B.: You can change header even from page to page).', 'vio' ),
				'options'  => array(
					'header-style-default' => array(
						'alt'   => esc_html__( 'Default Style', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Default.png' ),
						'title' => esc_html__( 'Default Style', 'vio' ),
					),
					'header-style-one'     => array(
						'alt'   => esc_html__( 'Style One', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-One.png' ),
						'title' => esc_html__( 'Style One', 'vio' ),
					),
					'header-style-two'     => array(
						'alt'   => esc_html__( 'Style Two', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two', 'vio' ),
					),
					'header-style-two-a'     => array(
						'alt'   => esc_html__( 'Style Two A', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two A', 'vio' ),
					),
					'header-style-two-b'     => array(
						'alt'   => esc_html__( 'Style Two B', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two B', 'vio' ),
					),
					'header-style-three'   => array(
						'alt'   => esc_html__( 'Style Three', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Three.png' ),
						'title' => esc_html__( 'Style Three', 'vio' ),
					),
					'header-style-four'    => array(
						'alt'   => esc_html__( 'Style Four', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Four.png' ),
						'title' => esc_html__( 'Style Four', 'vio' ),
					),
					'header-style-five'    => array(
						'alt'   => esc_html__( 'Style Five', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Five.png' ),
						'title' => esc_html__( 'Style Five', 'vio' ),
					),
					'header-style-six'     => array(
						'alt'   => esc_html__( 'Style Six', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Six.png' ),
						'title' => esc_html__( 'Style Six', 'vio' ),
					),
					'header-style-seven'   => array(
						'alt'   => esc_html__( 'Style Seven', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Seven.png' ),
						'title' => esc_html__( 'Style Seven', 'vio' ),
					),
					'header-style-eight'   => array(
						'alt'   => esc_html__( 'Style Eight', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eight.png' ),
						'title' => esc_html__( 'Style Eight', 'vio' ),
					),
					'header-style-nine'   => array(
						'alt'   => esc_html__( 'Style Nine', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Nine.png' ),
						'title' => esc_html__( 'Style Nine', 'vio' ),
					),
					'header-style-ten'   => array(
						'alt'   => esc_html__( 'Style Ten', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten', 'vio' ),
					),
					'header-style-ten-a'   => array(
						'alt'   => esc_html__( 'Style Ten A', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten A', 'vio' ),
					),
					'header-style-ten-b'   => array(
						'alt'   => esc_html__( 'Style Ten B', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten B', 'vio' ),
					),
					'header-style-eleven'   => array(
						'alt'   => esc_html__( 'Style Eleven', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eleven.png' ),
						'title' => esc_html__( 'Style Eleven', 'vio' ),
					),
					'header-style-twelve'   => array(
						'alt'   => esc_html__( 'Style Twelve', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Twelve.png' ),
						'title' => esc_html__( 'Style Twelve', 'vio' ),
					),
					'header-style-thirteen'   => array(
						'alt'   => esc_html__( 'Style Thirteen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Thirteen.png' ),
						'title' => esc_html__( 'Style Thirteen', 'vio' ),
					),
					'header-style-fourteen'   => array(
						'alt'   => esc_html__( 'Style Fourteen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Fourteen.png' ),
						'title' => esc_html__( 'Style Fourteen', 'vio' ),
					),
					'header-style-fifteen'   => array(
						'alt'   => esc_html__( 'Style Fifteen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Fifteen.png' ),
						'title' => esc_html__( 'Style Fifteen', 'vio' ),
					),
					'header-style-sixteen'   => array(
						'alt'   => esc_html__( 'Style Sixteen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Sixteen.png' ),
						'title' => esc_html__( 'Style Sixteen', 'vio' ),
					),
					'header-style-seventeen'   => array(
						'alt'   => esc_html__( 'Style Seventeen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Seventeen.png' ),
						'title' => esc_html__( 'Style Seventeen', 'vio' ),
					),
					'header-style-eightteen'   => array(
						'alt'   => esc_html__( 'Style Eightteen', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eightteen.png' ),
						'title' => esc_html__( 'Style Eightteen', 'vio' ),
					),
				),
				'default'  => 'header-style-one',
			),

			// START OF HEADER DEFAULT OPTIONS.

			// Header Default Info.
			array(
				'id'    => 'header_default_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Default Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Default Header Main Background Color.
			array(
				'id'       => 'header_default_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Default" only)', 'vio' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-default .wraper_header_main',
				),
			),

			// END OF HEADER DEFAULT OPTIONS.

			// START OF HEADER ONE OPTIONS.

			// Header One Info.
			array(
				'id'    => 'header_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header One Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header One Floating.
			array(
				'id'       => 'header_one_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header One Header Main Background Color.
			array(
				'id'       => 'header_one_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main',
				),
			),

			// Header One Sticky.
			array(
				'id'       => 'header_one_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header One Sticky Style.
			array(
				'id'       => 'header_one_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style One".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_one_sticky',
						'equals',
						true,
					),
				),
			),

			// Header One Sticky Delay.
			array(
				'id'            => 'header_one_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_one_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header One Sticky Header Main Background Color.
			array(
				'id'       => 'header_one_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .is-sticky .wraper_header_main, .wraper_header.style-one .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_one_sticky',
						'equals',
						true,
					),
				),
			),

			// Header One Logo.
			array(
				'id'       => 'header_one_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header One Retina Logo.
			array(
				'id'       => 'header_one_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header One Menu SinglePageMode.
			array(
				'id'       => 'header_one_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header One Menu Typography.
			array(
				'id'             => 'header_one_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '300',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '26px',
				),
				'output'         => array(
					'.wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header One Menu Underline Color.
			array(
				'id'       => 'header_one_menu_underline_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Underline Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the menu underline.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header One Submenu Background Color.
			array(
				'id'       => 'header_one_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-one .rt-mega-menu',
				),
			),

			// Header One Submenu Typography.
			array(
				'id'             => 'header_one_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Montserrat',
					'font-weight' => '300',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '26px',
				),
				'output'         => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header One Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_one_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'validate' => 'color',
				'default'  => 'color',
				'output'   => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header One Cart Display.
			array(
				'id'       => 'header_one_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style One".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header One Cart Counter Color.
			array(
				'id'       => 'header_one_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#1bcc88',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-one .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
				'required' => array(
					array(
						'header_one_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header One Search Display.
			array(
				'id'       => 'header_one_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header One Hamburger Display.
			array(
				'id'       => 'header_one_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header One Hamburger Mobile.
			array(
				'id'       => 'header_one_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Width.
			array(
				'id'            => 'header_one_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Background.
			array(
				'id'       => 'header_one_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-one"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Display.
			array(
				'id'       => 'header_one_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header One Mobile Menu Background Color.
			array(
				'id'       => 'header_one_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-one"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Typography.
			array(
				'id'             => 'header_one_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-one"] .mobile-menu-nav',
				),
				'required'       => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER ONE OPTIONS.

			// START OF HEADER TWO OPTIONS.

			// Header Two Info.
			array(
				'id'    => 'header_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Two Floating.
			array(
				'id'       => 'header_two_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two Header Main Background Color.
			array(
				'id'       => 'header_two_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main > .container',
				),
			),

			// Header Two Sticky.
			array(
				'id'       => 'header_two_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two Sticky Style.
			array(
				'id'       => 'header_two_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Two".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_two_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two Sticky Delay.
			array(
				'id'            => 'header_two_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Two Sticky Header Main Background Color.
			array(
				'id'       => 'header_two_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .is-sticky .wraper_header_main, .wraper_header.style-two .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_two_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two Logo.
			array(
				'id'       => 'header_two_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Two Retina Logo.
			array(
				'id'       => 'header_two_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Two Menu SinglePageMode.
			array(
				'id'       => 'header_two_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two Menu Typography.
			array(
				'id'             => 'header_two_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '15px',
					'color'          => '#18161b',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Two Submenu Background Color.
			array(
				'id'       => 'header_two_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-two .rt-mega-menu',
				),
			),

			// Header Two Submenu Typography.
			array(
				'id'             => 'header_two_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Lato',
					'font-weight' => '700',
					'font-size'   => '14px',
					'color'       => '#18161b',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Two Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_two_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'validate' => 'color',
				'default'  => '#f54ea2',
				'output'   => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Two Cart Display.
			array(
				'id'       => 'header_two_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Two".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two Cart Counter Color.
			array(
				'id'       => 'header_two_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#f54ea2',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-two .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
				'required' => array(
					array(
						'header_two_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Search Display.
			array(
				'id'       => 'header_two_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two Hamburger Display.
			array(
				'id'       => 'header_two_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two Hamburger Mobile.
			array(
				'id'       => 'header_two_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Width.
			array(
				'id'            => 'header_two_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Background.
			array(
				'id'       => 'header_two_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-two"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Display.
			array(
				'id'       => 'header_two_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two Mobile Menu Background Color.
			array(
				'id'       => 'header_two_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#18161b',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-two"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Typography.
			array(
				'id'             => 'header_two_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-two"] .mobile-menu-nav',
				),
				'required'       => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TWO OPTIONS.

			// START OF HEADER TWO A OPTIONS.

			// Header Two A Info.
			array(
				'id'    => 'header_two_a_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two A Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Two A Floating.
			array(
				'id'       => 'header_two_a_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two A Header Main Background Color.
			array(
				'id'       => 'header_two_a_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-a .wraper_header_main > .container',
				),
			),

			// Header Two A Sticky.
			array(
				'id'       => 'header_two_a_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two A Sticky Style.
			array(
				'id'       => 'header_two_a_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Two".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_two_a_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two A Sticky Delay.
			array(
				'id'            => 'header_two_a_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_a_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Two A Sticky Header Main Background Color.
			array(
				'id'       => 'header_two_a_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-a .is-sticky .wraper_header_main, .wraper_header.style-two-a .wraper_header_main.radiantthemes-sticky-style-two-a.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_two_a_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two A Logo.
			array(
				'id'       => 'header_two_a_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Two A Retina Logo.
			array(
				'id'       => 'header_two_a_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Two A Menu SinglePageMode.
			array(
				'id'       => 'header_two_a_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two A Menu Typography.
			array(
				'id'             => 'header_two_a_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '15px',
					'color'          => '#18161b',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Two A Submenu Background Color.
			array(
				'id'       => 'header_two_a_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-two-a .rt-mega-menu',
				),
			),

			// Header Two A Submenu Typography.
			array(
				'id'             => 'header_two_a_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Lato',
					'font-weight' => '700',
					'font-size'   => '14px',
					'color'       => '#18161b',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Two A Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_two_a_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'validate' => 'color',
				'default'  => '#f54ea2',
				'output'   => array(
					'.wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-two-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Two A Cart Display.
			array(
				'id'       => 'header_two_a_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Two".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two A Cart Counter Color.
			array(
				'id'       => 'header_two_a_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#f54ea2',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-a .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-two-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-two-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-two-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-two-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
				'required' => array(
					array(
						'header_two_a_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Two A Search Display.
			array(
				'id'       => 'header_two_a_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two A Hamburger Display.
			array(
				'id'       => 'header_two_a_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two A Hamburger Mobile.
			array(
				'id'       => 'header_two_a_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_two_a_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two A Hamburger Width.
			array(
				'id'            => 'header_two_a_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_a_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two A Hamburger Background.
			array(
				'id'       => 'header_two_a_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-two-a"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_two_a_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two A Mobile Menu Display.
			array(
				'id'       => 'header_two_a_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two A Mobile Menu Background Color.
			array(
				'id'       => 'header_two_a_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#18161b',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-two-a"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_two_a_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two A Mobile Menu Typography.
			array(
				'id'             => 'header_two_a_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-two-a"] .mobile-menu-nav',
				),
				'required'       => array(
					array(
						'header_two_a_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TWO A OPTIONS.

			// START OF HEADER TWO B OPTIONS.

			// Header Two B Info.
			array(
				'id'    => 'header_two_b_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two B Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Two B Floating.
			array(
				'id'       => 'header_two_b_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two B Header Main Background Color.
			array(
				'id'       => 'header_two_b_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-b .wraper_header_main > .container',
				),
			),

			// Header Two B Sticky.
			array(
				'id'       => 'header_two_b_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two B Sticky Style.
			array(
				'id'       => 'header_two_b_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Two".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_two_b_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two B Sticky Delay.
			array(
				'id'            => 'header_two_b_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_b_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Two B Sticky Header Main Background Color.
			array(
				'id'       => 'header_two_b_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-b .is-sticky .wraper_header_main, .wraper_header.style-two-b .wraper_header_main.radiantthemes-sticky-style-two-b.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_two_b_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two B Logo.
			array(
				'id'       => 'header_two_b_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Two B Retina Logo.
			array(
				'id'       => 'header_two_b_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Two B Menu SinglePageMode.
			array(
				'id'       => 'header_two_b_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two B Menu Typography.
			array(
				'id'             => 'header_two_b_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '15px',
					'color'          => '#18161b',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Two B Submenu Background Color.
			array(
				'id'       => 'header_two_b_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-two-b .rt-mega-menu',
				),
			),

			// Header Two B Submenu Typography.
			array(
				'id'             => 'header_two_b_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Lato',
					'font-weight' => '700',
					'font-size'   => '14px',
					'color'       => '#18161b',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Two B Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_two_b_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'validate' => 'color',
				'default'  => '#f54ea2',
				'output'   => array(
					'.wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-two-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Two B Cart Display.
			array(
				'id'       => 'header_two_b_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Two".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two B Cart Counter Color.
			array(
				'id'       => 'header_two_b_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#f54ea2',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two-b .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-two-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-two-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-two-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-two-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
				'required' => array(
					array(
						'header_two_b_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Two B Search Display.
			array(
				'id'       => 'header_two_b_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two B Hamburger Display.
			array(
				'id'       => 'header_two_b_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Two B Hamburger Mobile.
			array(
				'id'       => 'header_two_b_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_two_b_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two B Hamburger Width.
			array(
				'id'            => 'header_two_b_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_two_b_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two B Hamburger Background.
			array(
				'id'       => 'header_two_b_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-two-b"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_two_b_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two B Mobile Menu Display.
			array(
				'id'       => 'header_two_b_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Two B Mobile Menu Background Color.
			array(
				'id'       => 'header_two_b_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#18161b',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-two-b"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_two_b_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two B Mobile Menu Typography.
			array(
				'id'             => 'header_two_b_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-two-b"] .mobile-menu-nav',
				),
				'required'       => array(
					array(
						'header_two_b_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TWO B OPTIONS.

			// START OF HEADER THREE OPTIONS.

			// Header Three Info.
			array(
				'id'    => 'header_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Three Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Three Header Main Background Color.
			array(
				'id'       => 'header_three_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-three"] .wraper_header_main',
				),
			),

			// Header Three Header Color Scheme.
			array(
				'id'       => 'header_three_header_color_scheme',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Header Color Scheme', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#e21535',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
					'color'            => 'body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-three"] .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li.current-menu-item a, body[data-header-style="header-style-three"] .wraper_header_main .header_main .header-social ul.social li a:hover',
					'border-color'     => 'body[data-header-style="header-style-three"] .wraper_header_main .header_main .header-social ul.social li a:hover',
				),
			),

			// Header Three Logo.
			array(
				'id'       => 'header_three_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Three Retina Logo.
			array(
				'id'       => 'header_three_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Three Menu SinglePageMode.
			array(
				'id'       => 'header_three_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Three Menu Typography.
			array(
				'id'             => 'header_three_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
				),
				'output'         => array(
					'body[data-header-style="header-style-three"] .wraper_header_main .nav',
				),
			),

			// Header Three Copyright Text.
			array(
				'id'       => 'header_three_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Copyright Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'vio' ),
				'default'  => esc_html__( 'vio Theme © All Rights Reserved', 'vio' ),
			),

			// END OF HEADER THREE OPTIONS.

			// START OF HEADER FOUR OPTIONS.

			// Header Four Info.
			array(
				'id'    => 'header_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Four Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Four Header Main Background Color.
			array(
				'id'       => 'header_four_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-four"] .sidr',
				),
			),

			// Header Four Header Color Scheme.
			array(
				'id'       => 'header_four_header_color_scheme',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Header Color Scheme', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#fe6c33',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li a:before, body[data-header-style="header-style-four"] .wraper_header_main .header_main .header-search-bar .form-row:before',
					'color'            => 'body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, body[data-header-style="header-style-four"] .wraper_header_main .header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > ul li.current-menu-item a',
				),
			),

			// Header Four Branding Icon.
			array(
				'id'       => 'header_four_branding_icon',
				'type'     => 'media',
				'title'    => esc_html__( 'Branding Icon', 'vio' ),
				'subtitle' => esc_html__( 'You can upload Branding Icon on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Branding.png',
				),
			),

			// Header Four Logo.
			array(
				'id'       => 'header_four_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Four Retina Logo.
			array(
				'id'       => 'header_four_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Four Menu Typography.
			array(
				'id'             => 'header_four_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Playfair Display',
					'font-weight' => '400',
					'font-size'   => '30px',
					'color'       => '#ffffff',
					'line-height' => '38px',
				),
				'output'         => array(
					'body[data-header-style="header-style-four"] .wraper_header_main .nav',
				),
			),

			// Header Four Search Display.
			array(
				'id'       => 'header_four_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			), // END OF HEADER FOUR OPTIONS.

			// START OF HEADER FIVE OPTIONS.
			// Header Five Info.
			array(
				'id'    => 'header_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Five Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Five Floating.
			array(
				'id'       => 'header_five_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Five Header Main Background Color.
			array(
				'id'       => 'header_five_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_header_main',
				),
			),

			// Header Five Sticky.
			array(
				'id'       => 'header_five_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Five Sticky Style.
			array(
				'id'       => 'header_five_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Five".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_five_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Five Sticky Delay.
			array(
				'id'            => 'header_five_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_five_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Five Sticky Header Main Background Color.
			array(
				'id'       => 'header_five_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"]  .is-sticky .wraper_header_main, body[data-header-style="header-style-five"]  .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_five_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Five Logo.
			array(
				'id'       => 'header_five_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Dark.png',
				),
			),

			// Header Five Retina Logo.
			array(
				'id'       => 'header_five_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Five Flyout Menu Background Color.
			array(
				'id'       => 'header_five_flyout_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Flyout Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for flyout menu.', 'vio' ),
				'default'  => array(
					'color' => '#040404',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_flyout_menu, body[data-header-style="header-style-five"] .flyout-menu-overlay > .flyout-menu-overlay-line',
				),
			),

			// Header Five Menu Typography.
			array(
				'id'             => 'header_five_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Eczar',
					'font-weight' => '400',
					'font-size'   => '42px',
					'color'       => '#ffffff',
					'line-height' => '50px',
				),
				'output'         => array(
					'body[data-header-style="header-style-five"] .wraper_flyout_menu > .table > .table-cell > .flyout-menu > .flyout-menu-nav',
				),
			),

			// Header Five Cart Display.
			array(
				'id'       => 'header_five_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Five".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Five Cart Counter Color.
			array(
				'id'       => 'header_five_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#b7914a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count',
				),
				'required' => array(
					array(
						'header_five_cart_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER FIVE OPTIONS.

			// START OF HEADER SIX OPTIONS.

			// Header Six Info.
			array(
				'id'    => 'header_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Six Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Six Header Main Background Color.
			array(
				'id'       => 'header_six_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main',
				),
			),

			// Header Six Sticky.
			array(
				'id'       => 'header_six_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Six Sticky Style.
			array(
				'id'       => 'header_six_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Six".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Delay.
			array(
				'id'            => 'header_six_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_six_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Six Logo.
			array(
				'id'       => 'header_six_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Please Note: If you want retina logo then you need a logo, which should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png". You need to upload retina logo along with normal logo on media.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Six Menu SinglePageMode.
			array(
				'id'       => 'header_six_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Six Menu Typography.
			array(
				'id'             => 'header_six_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Six Menu Underline Color.
			array(
				'id'       => 'header_six_menu_underline_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Underline Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the menu underline.', 'vio' ),
				'default'  => array(
					'color' => '#f1588d',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header Six Submenu Background Color.
			array(
				'id'       => 'header_six_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-six .rt-mega-menu',
				),
			),

			// Header Six Submenu Typography.
			array(
				'id'             => 'header_six_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Poppins',
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-six .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Six Cart Display.
			array(
				'id'       => 'header_six_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Six".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Six Cart Icon Color.
			array(
				'id'       => 'header_six_cart_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart icon.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-six .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon',
				),
				'required' => array(
					array(
						'header_six_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Cart Counter Color.
			array(
				'id'       => 'header_six_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#ff2c54',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a:before, .wraper_header.style-six .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a:before',
				),
				'required' => array(
					array(
						'header_six_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Search Display.
			array(
				'id'       => 'header_six_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Six Search Icon Color.
			array(
				'id'       => 'header_six_search_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Search Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the search icon.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-six .wraper_header_main .header_main_action ul > li i',
				),
				'required' => array(
					array(
						'header_six_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Display.
			array(
				'id'       => 'header_six_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Six Hamburger Mobile.
			array(
				'id'       => 'header_six_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Background Color.
			array(
				'id'       => 'header_six_hamburger_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hamburger Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Hamburger icon background counter.', 'vio' ),
				'default'  => array(
					'color' => '#f1588d',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main .header-hamburger-menu',
				),
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Width.
			array(
				'id'            => 'header_six_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Hamburger Background.
			array(
				'id'       => 'header_six_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-six"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_six_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Mobile Menu Enable.
			array(
				'id'       => 'header_six_mobile_menu_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want mobile menu on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Six Mobile Menu Background Color.
			array(
				'id'       => 'header_six_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_six_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-six .wraper_header_main .header-responsive-nav',
				),
			),

			// Header Six Mobile Menu Background Color.
			array(
				'id'       => 'header_six_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_six_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-six"] #mobile-menu',
				),
			),

			// Header Six Mobile Menu Typography.
			array(
				'id'             => 'header_six_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'required' => array(
					array(
						'header_six_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'         => array(
					'body[data-header-style="header-style-six"] .mobile-menu-nav',
				),
			),

			// Header Six Sticky.
			array(
				'id'       => 'header_six_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Six Sticky Style.
			array(
				'id'       => 'header_six_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Six".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Delay.
			array(
				'id'            => 'header_six_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_six_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Six Sticky Header Main Background Color.
			array(
				'id'       => 'header_six_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .is-sticky .wraper_header_main, .wraper_header.style-six .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Logo.
			array(
				'id'       => 'header_six_sticky_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website\' sticky header.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Menu Color.
			array(
				'id'       => 'header_six_sticky_menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Menu Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#030712',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-six .is-sticky .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a, .wraper_header.style-six .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .nav > [class*="menu-"] > ul.menu > li > a',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Cart Icon Color.
			array(
				'id'       => 'header_six_sticky_cart_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart icon.', 'vio' ),
				'default'  => array(
					'color' => '#030712',
					'alpha' => 1,
				),
				'output'   => array(
					'.wraper_header.style-six .is-sticky .wraper_header_main .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon, .wraper_header.style-six .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main_action ul > li.header-cart-bar > .header-cart-bar-icon',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Search Icon Color.
			array(
				'id'       => 'header_six_sticky_search_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Search Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the search icon.', 'vio' ),
				'default'  => array(
					'color' => '#030712',
					'alpha' => 1,
				),
				'output'   => array(
					'.wraper_header.style-six .is-sticky .wraper_header_main .header_main_action ul > li i, .wraper_header.style-six .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main_action ul > li i',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Sticky Mobile Menu Icon Color.
			array(
				'id'       => 'header_six_sticky_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Mobile Menu Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#030712',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-six .is-sticky .wraper_header_main .header-responsive-nav, .wraper_header.style-six .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header-responsive-nav',
				),
			),

			// END OF HEADER SIX OPTIONS.

			// START OF HEADER SEVEN OPTIONS.

			// Header Seven Info.
			array(
				'id'    => 'header_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Seven Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Seven Header Main Background Color.
			array(
				'id'       => 'header_seven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"] .wraper_header_main',
				),
			),

			// Header Seven Sticky.
			array(
				'id'       => 'header_seven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Seven Sticky Style.
			array(
				'id'       => 'header_seven_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Seven".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_seven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seven Sticky Delay.
			array(
				'id'            => 'header_seven_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_seven_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Seven Sticky Header Main Background Color.
			array(
				'id'       => 'header_seven_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"]  .is-sticky .wraper_header_main, body[data-header-style="header-style-seven"] .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_seven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seven Logo.
			array(
				'id'       => 'header_seven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Seven Retina Logo.
			array(
				'id'       => 'header_seven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Seven Flyout Menu Icon Background Color.
			array(
				'id'       => 'header_six_flyout_menu_icon_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Flyout Menu Icon Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Flyout Menu icon background counter.', 'vio' ),
				'default'  => array(
					'color' => '#ff2c54',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-seven .wraper_header_main .header-flexi-menu',
				),
			),

			// Header Seven Flyout Menu Background Color.
			array(
				'id'       => 'header_seven_flyout_menu_background_color',
				'type'     => 'background',
				'title'    => esc_html__( 'Flyout Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for Flyout Menu.', 'vio' ),
				'default'  => array(
					'background-image'    => get_template_directory_uri() . '/assets/images/Header-7-Menu-Background.png',
					'background-size'     => 'cover',
					'background-position' => 'right center',
					'background-color'    => '#ffffff',
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seven"] .wraper_flexi_menu > .flexi-menu-overlay',
				),
			),

			// Header Seven Menu SinglePageMode.
			array(
				'id'       => 'header_seven_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Seven Menu Typography.
			array(
				'id'             => 'header_seven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '32px',
					'color'          => '#363F54',
					'line-height'    => '45px',
				),
				'output'         => array(
					'body[data-header-style="header-style-seven"] .wraper_flexi_menu > .table > .table-cell > .flexi-menu > .flexi-menu-nav',
				),
			),

			// END OF HEADER SEVEN OPTIONS.

			// START OF HEADER EIGHT OPTIONS.

			// Header Eight Info.
			array(
				'id'    => 'header_eight_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eight Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Eight Header Main Background Color.
			array(
				'id'       => 'header_eight_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .wraper_header_main',
				),
			),

			// Header Eight Logo.
			array(
				'id'       => 'header_eight_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Please Note: If you want retina logo then you need a logo, which should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png". You need to upload retina logo along with normal logo on media.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Eight Menu SinglePageMode.
			array(
				'id'       => 'header_eight_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Eight Menu Typography.
			array(
				'id'             => 'header_eight_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Poppins',
					'font-weight'     => '400',
					'font-size'       => '15px',
					'color'           => '#ffffff',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-eight .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Eight Submenu Background Color.
			array(
				'id'       => 'header_eight_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#0a0a0a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-eight .rt-mega-menu',
				),
			),

			// Header Eight Submenu Typography.
			array(
				'id'             => 'header_eight_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Poppins',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#191919',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Eight Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_eight_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#f435b9',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Eight Mobile Menu Enable.
			array(
				'id'       => 'header_eight_mobile_menu_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want mobile menu on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eight Mobile Menu Background Color.
			array(
				'id'       => 'header_eight_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-eight .wraper_header_main .header-responsive-nav',
				),
			),

			// Header Eight Mobile Menu Background Color.
			array(
				'id'       => 'header_eight_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-eight"] #mobile-menu',
				),
			),

			// Header Eight Mobile Menu Typography.
			array(
				'id'             => 'header_eight_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Roboto',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
					'letter-spacing' => '0.5px',
				),
				'required' => array(
					array(
						'header_eight_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'         => array(
					'body[data-header-style="header-style-eight"] .mobile-menu-nav',
				),
			),

			// Header Eight Button One Dispay.
			array(
				'id'       => 'header_eight_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eight Button One Border Color.
			array(
				'id'       => 'header_eight_button_one_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Border Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eight" only.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_button_one_display',
						'equals',
						true,
					),
				),
				'output'   => array(
					'border-color' => '.wraper_header.style-eight .wraper_header_main .header_main_calltoaction > .btn.button-one',
				),
			),

			// Header Eight Button One Typography.
			array(
				'id'             => 'header_eight_button_one_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Applies for header "Style Eight" only.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
				),
				'required' => array(
					array(
						'header_eight_button_one_display',
						'equals',
						true,
					),
				),
				'output'         => array(
					'.wraper_header.style-eight .wraper_header_main .header_main_calltoaction .btn',
				),
			),

			// Header Eight Button One Text.
			array(
				'id'       => 'header_eight_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'vio' ),
				'default'  => esc_html__( 'Sign Up', 'vio' ),
				'required' => array(
					array(
						'header_eight_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Button One Link.
			array(
				'id'       => 'header_eight_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_eight_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Sticky.
			array(
				'id'       => 'header_eight_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eight Sticky Style.
			array(
				'id'       => 'header_eight_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Eight".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eight Sticky Delay.
			array(
				'id'            => 'header_eight_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_eight_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Eight Sticky Header Main Background Color.
			array(
				'id'       => 'header_eight_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .is-sticky .wraper_header_main, .wraper_header.style-eight .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eight Sticky Logo.
			array(
				'id'       => 'header_eight_sticky_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website\' sticky header.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eight Sticky Menu Color.
			array(
				'id'       => 'header_eight_sticky_menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Menu Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#3f11a3',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-eight .is-sticky .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a, .wraper_header.style-eight .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .nav > [class*="menu-"] > ul.menu > li > a',
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eight Sticky Mobile Menu Icon Color.
			array(
				'id'       => 'header_eight_sticky_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Mobile Menu Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#3f11a3',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-eight .is-sticky .wraper_header_main .header-responsive-nav, .wraper_header.style-eight .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header-responsive-nav',
				),
			),

			// Header Eight Sticky Button One Border Color.
			array(
				'id'       => 'header_eight_sticky_button_one_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Border Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eight" only.', 'vio' ),
				'default'  => array(
					'color' => '#3f11a3',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'border-color' => '.wraper_header.style-eight .is-sticky .wraper_header_main .header_main_calltoaction > .btn.button-one, .wraper_header.style-eight .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main_calltoaction > .btn.button-one',
				),
			),

			// Header Eight Sticky Button One Font Color.
			array(
				'id'       => 'header_eight_sticky_button_one_font_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Font Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eight" only.', 'vio' ),
				'default'  => array(
					'color' => '#3f11a3',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-eight .is-sticky .wraper_header_main .header_main_calltoaction > .btn.button-one, .wraper_header.style-eight .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main_calltoaction > .btn.button-one',
				),
			),

			// END OF HEADER EIGHT OPTIONS.

			// START OF HEADER NINE OPTIONS.

			// Header Nine Info.
			array(
				'id'    => 'header_nine_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Nine Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Nine Header Main Background Color.
			array(
				'id'       => 'header_nine_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .wraper_header_main',
				),
			),

			// Header Nine Sticky.
			array(
				'id'       => 'header_nine_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Nine Sticky Style.
			array(
				'id'       => 'header_nine_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Nine".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_nine_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Nine Sticky Delay.
			array(
				'id'            => 'header_nine_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_nine_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Nine Sticky Header Main Background Color.
			array(
				'id'       => 'header_nine_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .is-sticky .wraper_header_main, .wraper_header.style-nine .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_nine_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Nine Logo.
			array(
				'id'       => 'header_nine_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Nine Retina Logo.
			array(
				'id'       => 'header_nine_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Nine Menu SinglePageMode.
			array(
				'id'       => 'header_nine_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Nine Menu Typography.
			array(
				'id'             => 'header_nine_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'text-transform'  => 'uppercase',
					'font-family'     => 'Lato',
					'font-weight'     => '700',
					'font-size'       => '14px',
					'color'           => '#24323D',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-nine .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Nine Submenu Background Color.
			array(
				'id'       => 'header_nine_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-nine .rt-mega-menu',
				),
			),

			// Header Nine Submenu Typography.
			array(
				'id'             => 'header_nine_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Lato',
					'font-weight' => '700',
					'font-size'   => '14px',
					'color'       => '#24323D',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Nine Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_nine_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#24323D',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Nine Button One Dispay.
			array(
				'id'       => 'header_nine_phonenumber_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Phone Number', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want phone number on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Nine Button One Text.
			array(
				'id'       => 'header_nine_phonenumber_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone Number', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'vio' ),
				'default'  => esc_html__( '+888-123-4567', 'vio' ),
				'required' => array(
					array(
						'header_nine_phonenumber_display',
						'equals',
						true,
					),
				),
			),

			// Header Nine Button One Dispay.
			array(
				'id'       => 'header_nine_email_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Email', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want email on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Nine Button One Text.
			array(
				'id'       => 'header_nine_email_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'vio' ),
				'default'  => esc_html__( 'info@example.com', 'vio' ),
				'required' => array(
					array(
						'header_nine_email_display',
						'equals',
						true,
					),
				),
			),

			// Header Nine Mobile Menu Background Color.
			array(
				'id'       => 'header_nine_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-nine"] #mobile-menu',
				),
			),

			// Header Nine Mobile Menu Typography.
			array(
				'id'             => 'header_nine_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-nine"] .mobile-menu-nav',
				),
			),

			// END OF HEADER NINE OPTIONS.

			// START OF HEADER TEN OPTIONS.

			// Header Ten Info.
			array(
				'id'    => 'header_ten_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Ten Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Ten Header Top Background Color.
			array(
				'id'       => 'header_ten_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#0e204c',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_top',
				),
			),

			// Header Ten Header Top Address.
			array(
				'id'       => 'header_ten_header_top_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '121 King St, Melbourne VIC 3000', 'vio' ),
			),

			// Header Ten Header Top Email.
			array(
				'id'       => 'header_ten_header_top_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'info@example.com', 'vio' ),
			),

			// Header Ten Header Top Phone.
			array(
				'id'       => 'header_ten_header_top_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '888-123-4567', 'vio' ),
			),

			// Header Ten Header Main Background Color.
			array(
				'id'       => 'header_ten_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_main',
				),
			),

			// Header Ten Logo.
			array(
				'id'       => 'header_ten_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Ten Retina Logo.
			array(
				'id'       => 'header_ten_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Ten Menu SinglePageMode.
			array(
				'id'       => 'header_ten_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Ten Menu Typography.
			array(
				'id'             => 'header_ten_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Roboto',
					'font-weight'     => '500',
					'font-size'       => '16px',
					'color'           => '#030303',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Ten Submenu Background Color.
			array(
				'id'       => 'header_ten_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-ten .rt-mega-menu',
				),
			),

			// Header Ten Submenu Typography.
			array(
				'id'             => 'header_ten_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Roboto',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#030303',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Ten Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_ten_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#ff5e14',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Ten Search Display.
			array(
				'id'       => 'header_ten_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Search Icon Color.
			array(
				'id'       => 'header_ten_search_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Search Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the search icon.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten .wraper_header_main .header_main_action ul > li span[class*="ti-"], .wraper_header.style-ten .wraper_header_main .header_main_action ul > li.header-slideout-searchbar > .header-slideout-searchbar-holder > .header-slideout-searchbar-box > .form-row button[type=submit]',
				),
				'required' => array(
					array(
						'header_ten_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Dispay.
			array(
				'id'       => 'header_ten_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#ff5e14',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_main .header_main_calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_ten_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Text.
			array(
				'id'       => 'header_ten_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'Get a Free Quote', 'vio' ),
				'required' => array(
					array(
						'header_ten_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Link.
			array(
				'id'       => 'header_ten_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_ten_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Enable.
			array(
				'id'       => 'header_ten_mobile_menu_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want mobile menu on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten .wraper_header_main .header-responsive-nav',
				),
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-ten"] #mobile-menu',
				),
			),

			// Header Ten Mobile Menu Typography.
			array(
				'id'             => 'header_ten_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Roboto',
					'font-weight'    => '500',
					'font-size'      => '16px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'         => array(
					'body[data-header-style="header-style-ten"] .mobile-menu-nav',
				),
			),

			// Header Ten Sticky.
			array(
				'id'       => 'header_ten_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Sticky Style.
			array(
				'id'       => 'header_ten_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Ten".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_ten_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Ten Sticky Delay.
			array(
				'id'            => 'header_ten_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 700,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_ten_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Ten Sticky Header Main Background Color.
			array(
				'id'       => 'header_ten_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .is-sticky .wraper_header_main, .wraper_header.style-ten .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_ten_sticky',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TEN OPTIONS.

			// START OF HEADER TEN A OPTIONS.

			// Header Ten Info.
			array(
				'id'    => 'header_ten_a_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Ten A Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Ten Header Top Background Color.
			array(
				'id'       => 'header_ten_a_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#0e204c',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-a .wraper_header_top',
				),
			),

			// Header Ten Header Top Address.
			array(
				'id'       => 'header_ten_a_header_top_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '121 King St, Melbourne VIC 3000', 'vio' ),
			),

			// Header Ten Header Top Email.
			array(
				'id'       => 'header_ten_a_header_top_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'info@example.com', 'vio' ),
			),

			// Header Ten Header Top Phone.
			array(
				'id'       => 'header_ten_a_header_top_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '888-123-4567', 'vio' ),
			),

			// Header Ten Header Main Background Color.
			array(
				'id'       => 'header_ten_a_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-a .wraper_header_main',
				),
			),

			// Header Ten Logo.
			array(
				'id'       => 'header_ten_a_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Ten Retina Logo.
			array(
				'id'       => 'header_ten_a_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Ten Menu SinglePageMode.
			array(
				'id'       => 'header_ten_a_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Ten Menu Typography.
			array(
				'id'             => 'header_ten_a_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Roboto',
					'font-weight'     => '500',
					'font-size'       => '16px',
					'color'           => '#030303',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten-a .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Ten Submenu Background Color.
			array(
				'id'       => 'header_ten_a_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-ten-a .rt-mega-menu',
				),
			),

			// Header Ten Submenu Typography.
			array(
				'id'             => 'header_ten_a_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Roboto',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#030303',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Ten Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_ten_a_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#ff5e14',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-ten-a .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Ten Search Display.
			array(
				'id'       => 'header_ten_a_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Search Icon Color.
			array(
				'id'       => 'header_ten_a_search_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Search Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the search icon.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten-a .wraper_header_main .header_main_action ul > li span[class*="ti-"], .wraper_header.style-ten-a .wraper_header_main .header_main_action ul > li.header-slideout-searchbar > .header-slideout-searchbar-holder > .header-slideout-searchbar-box > .form-row button[type=submit]',
				),
				'required' => array(
					array(
						'header_ten_a_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Dispay.
			array(
				'id'       => 'header_ten_a_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_a_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#ff5e14',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-a .wraper_header_main .header_main_calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_ten_a_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Text.
			array(
				'id'       => 'header_ten_a_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'Get a Free Quote', 'vio' ),
				'required' => array(
					array(
						'header_ten_a_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Link.
			array(
				'id'       => 'header_ten_a_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_ten_a_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Enable.
			array(
				'id'       => 'header_ten_a_mobile_menu_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want mobile menu on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_a_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_a_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten-a .wraper_header_main .header-responsive-nav',
				),
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_a_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_a_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-ten"] #mobile-menu',
				),
			),

			// Header Ten Mobile Menu Typography.
			array(
				'id'             => 'header_ten_a_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Roboto',
					'font-weight'    => '500',
					'font-size'      => '16px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'required' => array(
					array(
						'header_ten_a_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'         => array(
					'body[data-header-style="header-style-ten"] .mobile-menu-nav',
				),
			),

			// Header Ten Sticky.
			array(
				'id'       => 'header_ten_a_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Sticky Style.
			array(
				'id'       => 'header_ten_a_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Ten".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_ten_a_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Ten Sticky Delay.
			array(
				'id'            => 'header_ten_a_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 700,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_ten_a_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Ten Sticky Header Main Background Color.
			array(
				'id'       => 'header_ten_a_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-a .is-sticky .wraper_header_main, .wraper_header.style-ten-a .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_ten_a_sticky',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TEN A OPTIONS.

			// START OF HEADER TEN B OPTIONS.

			// Header Ten Info.
			array(
				'id'    => 'header_ten_b_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Ten B Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Ten Header Top Background Color.
			array(
				'id'       => 'header_ten_b_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#0e204c',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-b .wraper_header_top',
				),
			),

			// Header Ten Header Top Address.
			array(
				'id'       => 'header_ten_b_header_top_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '121 King St, Melbourne VIC 3000', 'vio' ),
			),

			// Header Ten Header Top Email.
			array(
				'id'       => 'header_ten_b_header_top_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'info@example.com', 'vio' ),
			),

			// Header Ten Header Top Phone.
			array(
				'id'       => 'header_ten_b_header_top_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '888-123-4567', 'vio' ),
			),

			// Header Ten Header Main Background Color.
			array(
				'id'       => 'header_ten_b_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-b .wraper_header_main',
				),
			),

			// Header Ten Logo.
			array(
				'id'       => 'header_ten_b_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Ten Retina Logo.
			array(
				'id'       => 'header_ten_b_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Ten Menu SinglePageMode.
			array(
				'id'       => 'header_ten_b_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Ten Menu Typography.
			array(
				'id'             => 'header_ten_b_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Roboto',
					'font-weight'     => '500',
					'font-size'       => '16px',
					'color'           => '#030303',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten-b .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Ten Submenu Background Color.
			array(
				'id'       => 'header_ten_b_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-ten-b .rt-mega-menu',
				),
			),

			// Header Ten Submenu Typography.
			array(
				'id'             => 'header_ten_b_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Roboto',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#030303',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Ten Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_ten_b_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#ff5e14',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-ten-b .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Ten Search Display.
			array(
				'id'       => 'header_ten_b_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Search Icon Color.
			array(
				'id'       => 'header_ten_b_search_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Search Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the search icon.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten-b .wraper_header_main .header_main_action ul > li span[class*="ti-"], .wraper_header.style-ten-b .wraper_header_main .header_main_action ul > li.header-slideout-searchbar > .header-slideout-searchbar-holder > .header-slideout-searchbar-box > .form-row button[type=submit]',
				),
				'required' => array(
					array(
						'header_ten_b_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Dispay.
			array(
				'id'       => 'header_ten_b_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_b_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#ff5e14',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-b .wraper_header_main .header_main_calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_ten_b_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Text.
			array(
				'id'       => 'header_ten_b_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( 'Get a Free Quote', 'vio' ),
				'required' => array(
					array(
						'header_ten_b_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Button One Link.
			array(
				'id'       => 'header_ten_b_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_ten_b_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Enable.
			array(
				'id'       => 'header_ten_b_mobile_menu_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want mobile menu on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_b_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#030303',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_b_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-ten-b .wraper_header_main .header-responsive-nav',
				),
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_b_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_ten_b_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-ten"] #mobile-menu',
				),
			),

			// Header Ten Mobile Menu Typography.
			array(
				'id'             => 'header_ten_b_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Roboto',
					'font-weight'    => '500',
					'font-size'      => '16px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'required' => array(
					array(
						'header_ten_b_mobile_menu_enable',
						'equals',
						true,
					),
				),
				'output'         => array(
					'body[data-header-style="header-style-ten"] .mobile-menu-nav',
				),
			),

			// Header Ten Sticky.
			array(
				'id'       => 'header_ten_b_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Ten Sticky Style.
			array(
				'id'       => 'header_ten_b_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Ten".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_ten_b_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Ten Sticky Delay.
			array(
				'id'            => 'header_ten_b_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 700,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_ten_b_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Ten Sticky Header Main Background Color.
			array(
				'id'       => 'header_ten_b_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten-b .is-sticky .wraper_header_main, .wraper_header.style-ten-b .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_ten_b_sticky',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER TEN B OPTIONS.

			// START OF HEADER ELEVEN OPTIONS.

			// Header Eleven Info.
			array(
				'id'    => 'header_eleven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eleven Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Eleven Header Top Background Color.
			array(
				'id'       => 'header_eleven_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_top',
				),
			),

			// Header Eleven Header Top Note.
			array(
				'id'       => 'header_eleven_header_top_note',
				'type'     => 'text',
				'title'    => esc_html__( 'Top Note', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => esc_html__( 'Welcome to vio', 'vio' ),
			),

			// Header Eleven Button One Dispay.
			array(
				'id'       => 'header_eleven_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eleven Button One Background Color.
			array(
				'id'       => 'header_eleven_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#15224d',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_top .header_top .header_top_item .header-top-calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_eleven_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Button One Text.
			array(
				'id'       => 'header_eleven_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => esc_html__( 'Get Free Quote', 'vio' ),
				'required' => array(
					array(
						'header_eleven_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Button One Link.
			array(
				'id'       => 'header_eleven_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_ten_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Button Two Dispay.
			array(
				'id'       => 'header_eleven_button_two_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eleven Button Two Background Color.
			array(
				'id'       => 'header_eleven_button_two_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#c11414',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_top .header_top .header_top_item .header-top-calltoaction .btn.button-two',
				),
				'required' => array(
					array(
						'header_eleven_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Button Two Text.
			array(
				'id'       => 'header_eleven_button_two_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => esc_html__( 'Contact Us Now', 'vio' ),
				'required' => array(
					array(
						'header_eleven_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Button Two Link.
			array(
				'id'       => 'header_eleven_button_two_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_ten_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Header Main Background Color.
			array(
				'id'       => 'header_eleven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_main',
				),
			),

			// Header Eleven Logo.
			array(
				'id'       => 'header_eleven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Eleven Retina Logo.
			array(
				'id'       => 'header_eleven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Eleven Header Top Address.
			array(
				'id'       => 'header_eleven_header_top_address',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Address', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => wp_kses_post( '121 King St, Melbourne <br> VIC 3000, Australia', 'vio' ),
			),

			// Header Eleven Header Top Phone.
			array(
				'id'       => 'header_eleven_header_top_phone',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => wp_kses_post( 'Contact Phone: <strong>888-123-4567</strong>', 'vio' ),
			),

			// Header Eleven Header Top Email.
			array(
				'id'       => 'header_eleven_header_top_email',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'vio' ),
				'default'  => wp_kses_post( 'Contact Email: <strong>info@example.com</strong>', 'vio' ),
			),

			// Header Eleven Header Nav Background Color.
			array(
				'id'       => 'header_eleven_header_nav_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#15224d',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_nav',
				),
			),

			// Header Eleven Sticky.
			array(
				'id'       => 'header_eleven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Eleven Sticky Style.
			array(
				'id'       => 'header_eleven_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Eleven".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_eleven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Sticky Delay.
			array(
				'id'            => 'header_eleven_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_eleven_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Eleven Sticky Header Main Background Color.
			array(
				'id'       => 'header_eleven_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#15224d',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .is-sticky .wraper_header_main, .wraper_header.style-eleven .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_eleven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Menu SinglePageMode.
			array(
				'id'       => 'header_eleven_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Eleven Menu Typography.
			array(
				'id'             => 'header_eleven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'text-transform'  => 'uppercase',
					'font-family'     => 'Lato',
					'font-weight'     => '400',
					'font-size'       => '14px',
					'color'           => '#ffffff',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-eleven .wraper_header_nav .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Eleven Submenu Background Color.
			array(
				'id'       => 'header_eleven_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#c11414',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-eleven .rt-mega-menu',
				),
			),

			// Header Eleven Submenu Typography.
			array(
				'id'             => 'header_eleven_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Lato',
					'font-weight' => '400',
					'font-size'   => '14px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Eleven Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_eleven_menu_hover_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => array(
					'color' => '#c11414',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Eleven Mobile Menu Background Color.
			array(
				'id'       => 'header_eleven_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-eleven"] #mobile-menu',
				),
			),

			// Header Eleven Mobile Menu Typography.
			array(
				'id'             => 'header_eleven_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '400',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-eleven"] .mobile-menu-nav',
				),
			),

			// END OF HEADER ELEVEN OPTIONS.

			// START OF HEADER TWELVE OPTIONS.

			// Header Twelve Info.
			array(
				'id'    => 'header_twelve_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Twelve Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Twelve Header Top Background Color.
			array(
				'id'       => 'header_twelve_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.25,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .wraper_header_top',
				),
			),

			// Header Twelve Header Top Address.
			array(
				'id'       => 'header_twelve_header_top_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Twelve" only.', 'vio' ),
				'default'  => esc_html__( '121 King St, Melbourne VIC 3000', 'vio' ),
			),

			// Header Twelve Header Top Email.
			array(
				'id'       => 'header_twelve_header_top_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Twelve" only.', 'vio' ),
				'default'  => esc_html__( 'info@example.com', 'vio' ),
			),

			// Header Twelve Header Top Phone.
			array(
				'id'       => 'header_twelve_header_top_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Twelve" only.', 'vio' ),
				'default'  => esc_html__( '888-123-4567', 'vio' ),
			),

			// Header Twelve Header Main Background Color.
			array(
				'id'       => 'header_twelve_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .wraper_header_main',
				),
			),

			// Header Twelve Sticky.
			array(
				'id'       => 'header_twelve_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Twelve Sticky Style.
			array(
				'id'       => 'header_twelve_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Twelve".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_twelve_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Sticky Delay.
			array(
				'id'            => 'header_twelve_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_twelve_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Twelve Sticky Header Main Background Color.
			array(
				'id'       => 'header_twelve_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.5,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .is-sticky .wraper_header_main, .wraper_header.style-twelve .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_twelve_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Logo.
			array(
				'id'       => 'header_twelve_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Twelve Retina Logo.
			array(
				'id'       => 'header_twelve_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Twelve Menu SinglePageMode.
			array(
				'id'       => 'header_twelve_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Twelve Menu Typography.
			array(
				'id'             => 'header_twelve_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'text-transform'  => 'uppercase',
					'font-family'     => 'Poppins',
					'font-weight'     => '500',
					'font-size'       => '15px',
					'color'           => '#ffffff',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-twelve .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Twelve Submenu Background Color.
			array(
				'id'       => 'header_twelve_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-twelve .rt-mega-menu',
				),
			),

			// Header Twelve Submenu Typography.
			array(
				'id'             => 'header_twelve_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Poppins',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#252525',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Twelve Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_twelve_menu_hover_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => array(
					'color' => '#ff9a3a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header Twelve Mobile Menu Background Color.
			array(
				'id'       => 'header_twelve_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-twelve"] #mobile-menu',
				),
			),

			// Header Twelve Mobile Menu Typography.
			array(
				'id'             => 'header_twelve_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-twelve"] .mobile-menu-nav',
				),
			),

			// END OF HEADER TWELVE OPTIONS.

			// START OF HEADER THIRTEEN OPTIONS.

			// Header Thirteen Info.
			array(
				'id'    => 'header_thirteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Thirteen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Thirteen Header Top Background Color.
			array(
				'id'       => 'header_thirteen_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#2c4ca5',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .wraper_header_top',
				),
			),

			// Header Thirteen Header Top Phone.
			array(
				'id'       => 'header_thirteen_header_top_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( 'For Urget Help, Call Us: 888-123-4567', 'vio' ),
			),

			// Header Thirteen Header Top Email.
			array(
				'id'       => 'header_thirteen_header_top_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( 'Email: info@example.com', 'vio' ),
			),

			// Header Thirteen Header Top Timing.
			array(
				'id'       => 'header_thirteen_header_top_timing',
				'type'     => 'text',
				'title'    => esc_html__( 'Timing', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( 'Opening Hours: Mon-Sat 9am-6pm', 'vio' ),
			),

			// Header Thirteen Button One Dispay.
			array(
				'id'       => 'header_thirteen_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Thirteen Button One Background Color.
			array(
				'id'       => 'header_thirteen_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#44a6f0',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .wraper_header_top .header_top .header_top_item .header-calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_thirteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Button One Text.
			array(
				'id'       => 'header_thirteen_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( 'Career', 'vio' ),
				'required' => array(
					array(
						'header_thirteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Button One Link.
			array(
				'id'       => 'header_thirteen_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_thirteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Button Two Dispay.
			array(
				'id'       => 'header_thirteen_button_two_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button Two', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Thirteen Button Two Background Color.
			array(
				'id'       => 'header_thirteen_button_two_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Two Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#44a6f0',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .wraper_header_top .header_top .header_top_item .header-calltoaction .btn.button-two',
				),
				'required' => array(
					array(
						'header_thirteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Button Two Text.
			array(
				'id'       => 'header_thirteen_button_two_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Two Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( 'Contact Us', 'vio' ),
				'required' => array(
					array(
						'header_thirteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Button Two Link.
			array(
				'id'       => 'header_thirteen_button_two_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Two Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_thirteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Header Main Background Color.
			array(
				'id'       => 'header_thirteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .wraper_header_main',
				),
			),

			// Header Thirteen Sticky.
			array(
				'id'       => 'header_thirteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Thirteen Sticky Style.
			array(
				'id'       => 'header_thirteen_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Thirteen".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_thirteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Sticky Delay.
			array(
				'id'            => 'header_thirteen_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_thirteen_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Thirteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_thirteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .is-sticky .wraper_header_main, .wraper_header.style-thirteen .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_thirteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Logo.
			array(
				'id'       => 'header_thirteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
			),

			// Header Thirteen Retina Logo.
			array(
				'id'       => 'header_thirteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Thirteen Menu SinglePageMode.
			array(
				'id'       => 'header_thirteen_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Thirteen Menu Typography.
			array(
				'id'             => 'header_thirteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Montserrat',
					'font-weight'     => '500',
					'font-size'       => '15px',
					'color'           => '#282828',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-thirteen .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Thirteen Submenu Background Color.
			array(
				'id'       => 'header_thirteen_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-thirteen .rt-mega-menu',
				),
			),

			// Header Thirteen Submenu Typography.
			array(
				'id'             => 'header_thirteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Montserrat',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#282828',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Thirteen Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_thirteen_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => '#44a6f0',
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a',
				),
			),

			// Header Thirteen Search Display.
			array(
				'id'       => 'header_thirteen_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Thirteen Mobile Menu Background Color.
			array(
				'id'       => 'header_thirteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-thirteen"] #mobile-menu',
				),
			),

			// Header Thirteen Mobile Menu Typography.
			array(
				'id'             => 'header_thirteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-thirteen"] .mobile-menu-nav',
				),
			),

			// END OF HEADER THIRTEEN OPTIONS.

			// START OF HEADER FOURTEEN OPTIONS.

			// Header Fourteen Info.
			array(
				'id'    => 'header_fourteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Fourteen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Fourteen Header Main Background Color.
			array(
				'id'       => 'header_fourteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-fourteen"] .wraper_header_main',
				),
			),

			// Header Fourteen Logo.
			array(
				'id'       => 'header_fourteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Please Note: If you want retina logo then you need a logo, which should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png". You need to upload retina logo along with normal logo on media.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Fourteen Menu Icon Color.
			array(
				'id'       => 'header_fourteen_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the menu icon.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-fourteen .wraper_header_main .header_main .header-slideout-menu',
				),
			),

			// Header Fourteen Social Icon Color.
			array(
				'id'       => 'header_fourteen_social_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Social Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the menu icon.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.wraper_header.style-fourteen .wraper_header_main .header_main ul.header-social > li > a',
				),
			),

			// Header Fourteen Flyout Menu Background Color.
			array(
				'id'       => 'header_fourteen_flyout_menu_background_color',
				'type'     => 'background',
				'title'    => esc_html__( 'Flyout Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for Flyout Menu.', 'vio' ),
				'default'  => array(
					'background-color'    => '#000000',
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-fourteen"] .wraper_slideout_menu',
				),
			),

			// Header Fourteen Menu Typography.
			array(
				'id'             => 'header_fourteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Taviraj',
					'font-weight'    => '400',
					'font-size'      => '35px',
					'color'          => '#ffffff',
					'line-height'    => '45px',
					'letter-spacing' => '1px',
				),
				'output'         => array(
					'body[data-header-style="header-style-fourteen"] .wraper_slideout_menu .slideout-menu > .slideout-menu-nav',
				),
			),

			// Header Fourteen Sticky.
			array(
				'id'       => 'header_fourteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Fourteen Sticky Style.
			array(
				'id'       => 'header_fourteen_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Fourteen".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'two',
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Sticky Delay.
			array(
				'id'            => 'header_fourteen_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 700px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 700,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_fourteen_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Fourteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_fourteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-fourteen"] .is-sticky .wraper_header_main, body[data-header-style="header-style-fourteen"] .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Sticky Logo.
			array(
				'id'       => 'header_fourteen_sticky_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website\' sticky header.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-Black.png',
				),
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Sticky Mobile Menu Icon Color.
			array(
				'id'       => 'header_fourteen_sticky_mobile_menu_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sticky Mobile Menu Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-fourteen .is-sticky .wraper_header_main .header_main .header-slideout-menu, .wraper_header.style-fourteen .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main .header-slideout-menu',
				),
			),

			// Header Fourteen Sticky Social Icon Color.
			array(
				'id'       => 'header_fourteen_sticky_social_icon_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Social Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the menu icon.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
				'output'   => array(
					'color' => '.wraper_header.style-fourteen .is-sticky .wraper_header_main .header_main ul.header-social > li > a, .wraper_header.style-fourteen .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky .header_main ul.header-social > li > a',
				),
			),

			// END OF HEADER FOURTEEN OPTIONS.

			// START OF HEADER FIFTEEN OPTIONS.

			// Header Fifteen Info.
			array(
				'id'    => 'header_fifteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Fifteen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Fifteen Header Top Background Color.
			array(
				'id'       => 'header_fifteen_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'vio' ),
				'default'  => array(
					'color' => '#090d19',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .wraper_header_top',
				),
			),

			// Header Fifteen Header Top Note.
			array(
				'id'       => 'header_fifteen_header_top_note',
				'type'     => 'text',
				'title'    => esc_html__( 'Top Note', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Fifteen" only.', 'vio' ),
				'default'  => esc_html__( 'Founded in 1920, On The Other Hand We Denounce.', 'vio' ),
			),

			// Header Fifteen Button One Dispay.
			array(
				'id'       => 'header_fifteen_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button One', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Fifteen Button One Background Color.
			array(
				'id'       => 'header_fifteen_button_one_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button One Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#0c1125',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .wraper_header_top .header_top .header_top_item .header-calltoaction .btn.button-one',
				),
				'required' => array(
					array(
						'header_fifteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Button One Text.
			array(
				'id'       => 'header_fifteen_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Fifteen" only.', 'vio' ),
				'default'  => esc_html__( 'Career', 'vio' ),
				'required' => array(
					array(
						'header_fifteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Button One Link.
			array(
				'id'       => 'header_fifteen_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button One Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Fifteen" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_fifteen_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Button Two Dispay.
			array(
				'id'       => 'header_fifteen_button_two_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Button Two', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want button one on header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Fifteen Button Two Background Color.
			array(
				'id'       => 'header_fifteen_button_two_display_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Button Two Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for button one only.', 'vio' ),
				'default'  => array(
					'color' => '#0c1125',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .wraper_header_top .header_top .header_top_item .header-calltoaction .btn.button-two',
				),
				'required' => array(
					array(
						'header_fifteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Button Two Text.
			array(
				'id'       => 'header_fifteen_button_two_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Two Text', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Fifteen" only.', 'vio' ),
				'default'  => esc_html__( 'Contact Us', 'vio' ),
				'required' => array(
					array(
						'header_fifteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Button Two Link.
			array(
				'id'       => 'header_fifteen_button_two_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Two Link', 'vio' ),
				'subtitle' => esc_html__( 'Applies for header "Style Fifteen" only.', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
				'required' => array(
					array(
						'header_fifteen_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Header Main Background Color.
			array(
				'id'       => 'header_fifteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#18244a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .wraper_header_main',
				),
			),

			// Header Fifteen Sticky.
			array(
				'id'       => 'header_fifteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Fifteen Sticky Style.
			array(
				'id'       => 'header_fifteen_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Fifteen".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_fifteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Sticky Delay.
			array(
				'id'            => 'header_fifteen_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_fifteen_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Fifteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_fifteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#18244a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .is-sticky .wraper_header_main, .wraper_header.style-fifteen .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_fifteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fifteen Logo.
			array(
				'id'       => 'header_fifteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Fifteen Retina Logo.
			array(
				'id'       => 'header_fifteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Fifteen Menu SinglePageMode.
			array(
				'id'       => 'header_fifteen_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Fifteen Menu Typography.
			array(
				'id'             => 'header_fifteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'          => true,
					'font-family'     => 'Poppins',
					'font-weight'     => '500',
					'font-size'       => '15px',
					'color'           => '#ffffff',
					'line-height'     => '28px',
				),
				'output'         => array(
					'.wraper_header.style-fifteen .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Fifteen Submenu Background Color.
			array(
				'id'       => 'header_fifteen_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-fifteen .rt-mega-menu',
				),
			),

			// Header Fifteen Submenu Typography.
			array(
				'id'             => 'header_fifteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'text-align'  => 'left',
					'font-family' => 'Poppins',
					'font-weight' => '500',
					'font-size'   => '15px',
					'color'       => '#252525',
					'line-height' => '28px',
				),
				'output'         => array(
					'.wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-fifteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Fifteen Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_fifteen_menu_hover_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Hover Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'vio' ),
				'default'  => array(
					'color' => '#ffbb3c',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fifteen .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a:before',
				),
			),

			// Header Fifteen Search Display.
			array(
				'id'       => 'header_fifteen_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Fifteen Mobile Menu Background Color.
			array(
				'id'       => 'header_fifteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#010101',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-fifteen"] #mobile-menu',
				),
			),

			// Header Fifteen Mobile Menu Typography.
			array(
				'id'             => 'header_fifteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-fifteen"] .mobile-menu-nav',
				),
			),

			// END OF HEADER FIFTEEN OPTIONS.

			// START OF HEADER SIXTEEN OPTIONS.

			// Header Sixteen Info.
			array(
				'id'    => 'header_sixteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Sixteen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Sixteen Header Main Background Color.
			array(
				'id'       => 'header_sixteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-sixteen .wraper_header_main',
				),
			),

			// Header Sixteen Sticky.
			array(
				'id'       => 'header_sixteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Sixteen Sticky Style.
			array(
				'id'       => 'header_sixteen_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Sixteen".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_sixteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Sticky Delay.
			array(
				'id'            => 'header_sixteen_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_sixteen_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Sixteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_sixteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-sixteen .is-sticky .wraper_header_main, .wraper_header.style-sixteen .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_sixteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Logo.
			array(
				'id'       => 'header_sixteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
			),

			// Header Sixteen Retina Logo.
			array(
				'id'       => 'header_sixteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Sixteen Menu SinglePageMode.
			array(
				'id'       => 'header_sixteen_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Sixteen Menu Typography.
			array(
				'id'             => 'header_sixteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#000000',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-sixteen .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Sixteen Submenu Background Color.
			array(
				'id'       => 'header_sixteen_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-sixteen .rt-mega-menu',
				),
			),

			// Header Sixteen Submenu Typography.
			array(
				'id'             => 'header_sixteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#000000',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-sixteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Sixteen Actionarea Display.
			array(
				'id'       => 'header_sixteen_actionarea_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Action Area', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Action Area" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Sixteen Search Display.
			array(
				'id'       => 'header_sixteen_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
				'required' => array(
					array(
						'header_sixteen_actionarea_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Cart Display.
			array(
				'id'       => 'header_sixteen_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Only for header "Style Sixteen".)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
				'required' => array(
					array(
						'header_sixteen_actionarea_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Cart Counter Color.
			array(
				'id'       => 'header_sixteen_cart_counter_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Cart Counter Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the cart counter.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-sixteen .wraper_header_main .header-main-action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count',
				),
				'required' => array(
					array(
						'header_sixteen_cart_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Hamburger Display.
			array(
				'id'       => 'header_sixteen_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_sixteen_actionarea_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Hamburger Mobile.
			array(
				'id'       => 'header_sixteen_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
				'required' => array(
					array(
						'header_sixteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Hamburger Width.
			array(
				'id'            => 'header_sixteen_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'vio' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 550px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 550,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_sixteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Hamburger Background.
			array(
				'id'       => 'header_sixteen_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-sixteen"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_sixteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Sixteen Mobile Menu Background Color.
			array(
				'id'       => 'header_sixteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-sixteen"] #mobile-menu',
				),
			),

			// Header Sixteen Mobile Menu Typography.
			array(
				'id'             => 'header_sixteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Lato',
					'font-weight'    => '700',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-sixteen"] .mobile-menu-nav',
				),
			),

			// END OF HEADER SIXTEEN OPTIONS.

			// START OF HEADER SEVENTEEN OPTIONS.

			// Header Seventeen Info.
			array(
				'id'    => 'header_seventeen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Seventeen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Seventeen Header Main Background Color.
			array(
				'id'       => 'header_seventeen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seventeen"] .wraper_header_main',
				),
			),

			// Header Seventeen Sticky.
			array(
				'id'       => 'header_seventeen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Seventeen Sticky Style.
			array(
				'id'       => 'header_seventeen_sticky_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Sticky Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Sticky Style for header "Style Seventeen".', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Classic)',
					'two'   => 'Style Two (Delayed)',
				),
				'default'  => 'one',
				'required' => array(
					array(
						'header_seventeen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seventeen Sticky Delay.
			array(
				'id'            => 'header_seventeen_sticky_delay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Sticky Delay', 'vio' ),
				'subtitle'      => esc_html__( 'Select sticky delay value. Min is 200px, Max is 2000px and Default is 500px.', 'vio' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 2000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'header_seventeen_sticky_style',
						'equals',
						'two',
					),
				),
			),

			// Header Seventeen Sticky Header Main Background Color.
			array(
				'id'       => 'header_seventeen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'vio' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seventeen"]  .is-sticky .wraper_header_main, body[data-header-style="header-style-seventeen"] .wraper_header_main.radiantthemes-sticky-style-two.i-am-delayed-sticky',
				),
				'required' => array(
					array(
						'header_seven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seventeen Logo.
			array(
				'id'       => 'header_seventeen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Seventeen Retina Logo.
			array(
				'id'       => 'header_seventeen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Seventeen Flyout Menu Icon Background Color.
			array(
				'id'       => 'header_seventeen_flyout_menu_icon_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Flyout Menu Icon Background', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Flyout Menu icon background counter.', 'vio' ),
				'default'  => array(
					'color' => '#ff2c54',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-seventeen .wraper_header_main .header-slideout-menu',
				),
			),

			// Header Seventeen Flyout Menu Background Color.
			array(
				'id'       => 'header_seventeen_flyout_menu_background_color',
				'type'     => 'background',
				'title'    => esc_html__( 'Flyout Menu Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for Flyout Menu.', 'vio' ),
				'default'  => array(
					'background-color'    => '#000000',
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-seventeen"] .wraper_slideout_menu',
				),
			),

			// Header Seventeen Menu Typography.
			array(
				'id'             => 'header_seventeen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Great Vibes',
					'font-weight'    => '400',
					'font-size'      => '40px',
					'color'          => '#ffffff',
					'line-height'    => '50px',
					'letter-spacing' => '1px',
				),
				'output'         => array(
					'body[data-header-style="header-style-seventeen"] .wraper_slideout_menu .slideout-menu > .slideout-menu-nav',
				),
			),

			// END OF HEADER SEVENTEEN OPTIONS.

			// START OF HEADER EIGHTTEEN OPTIONS.

			// Header Eightteen Info.
			array(
				'id'    => 'header_eightteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eightteen Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Eightteen Header Main Background Color.
			array(
				'id'       => 'header_eightteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-eightteen"] .wraper_header_main',
				),
			),

			// Header Eightteen Logo.
			array(
				'id'       => 'header_eightteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'vio' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/Logo-Default-White.png',
				),
			),

			// Header Eightteen Retina Logo.
			array(
				'id'       => 'header_eightteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'vio' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'vio' ),
			),

			// Header Eightteen Menu SinglePageMode.
			array(
				'id'       => 'header_eightteen_menu_singlepagemode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Single Page Mode', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Single Page Mode" option for navigation or not. (Please Note: If you trun this on then this menu will work only for single page system and remote links will not work.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Header Eightteen Menu Typography.
			array(
				'id'             => 'header_eightteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-eightteen .wraper_header_main .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Eightteen Submenu Background Color.
			array(
				'id'       => 'header_eightteen_submenu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Submenu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for the Submenu.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul li ul, .wraper_header.style-eightteen .rt-mega-menu',
				),
			),

			// Header Eightteen Submenu Typography.
			array(
				'id'             => 'header_eightteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Montserrat',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#000000',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-eightteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Eightteen Mobile Menu Display.
			array(
				'id'       => 'header_eightteen_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			// Header Eightteen Mobile Menu Background Color.
			array(
				'id'       => 'header_eightteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'vio' ),
				'default'  => array(
					'color' => '#191919',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-eightteen"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_eightteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Eightteen Mobile Menu Typography.
			array(
				'id'             => 'header_eightteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-eightteen"] .mobile-menu-nav',
				),
				'required'       => array(
					array(
						'header_eightteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// END OF HEADER EIGHTTEEN OPTIONS.

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Short Header', 'vio' ),
		'icon'       => 'el el-website',
		'id'         => 'inner_page_banner',
		'subsection' => true,
		'fields'     => array(

			// Short Header Style Options.
			array(
				'id'       => 'short-header',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Select Short Header', 'vio' ),
				'subtitle' => esc_html__( 'Choose what kind of short header you want to set.', 'vio' ),
				'options'  => array(
					'Banner-With-Breadcrumb' => array(
						'alt'   => esc_html__( 'Banner-With-Breadcrumb', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-With-Breadcrumb.png' ),
						'title' => esc_html__( 'Banner & Breadcrumb', 'vio' ),
					),
					'Banner-only'            => array(
						'alt'   => esc_html__( 'Banner Only', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-Only.png' ),
						'title' => esc_html__( 'Banner Only', 'vio' ),
					),
					'breadcrumb-only'        => array(
						'alt'   => esc_html__( 'Breadcrumb-Only', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Breadcrumb-Only.png' ),
						'title' => esc_html__( 'Breadcrumb Only', 'vio' ),
					),
					'banner-none'            => array(
						'alt'   => esc_html__( 'Banner None', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-None.png' ),
						'title' => esc_html__( 'Banner None', 'vio' ),
					),
				),
				'default'  => 'Banner-With-Breadcrumb',
			),

			// Inner Page Banner Info.
			array(
				'id'    => 'inner_page_banner_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Inner Page Banner', 'vio' ),
			),

			// Inner Page Banner Background.
			array(
				'id'       => 'inner_page_banner_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Inner Page Banner Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'vio' ),
				'default'  => array(
					'background-position' => 'center center',
					'background-repeat'   => 'no-repeat',
					'background-size'     => 'cover',
					'background-color'    => '#111111',
				),
				'output'   => array(
					'.wraper_inner_banner',
				),
			),

			// Inner Page Banner Border Bottom.
			array(
				'id'       => 'inner_page_banner_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Inner Page Banner Border Bottom', 'vio' ),
				'subtitle' => esc_html__( 'Set Border Bottom for Inner Page Banner.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_inner_banner_main',
				),
			),

			// Inner Page Banner Padding.
			array(
				'id'             => 'inner_page_banner_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Inner Page Banner Padding', 'vio' ),
				'subtitle'       => esc_html__( 'Set padding for inner page banner area.', 'vio' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '165px',
					'padding-bottom' => '14px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_main > .container',
				),
			),

			// Inner Page Banner Title Font.
			array(
				'id'             => 'inner_page_banner_title_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Title Font', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner title.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '400',
					'font-size'      => '60px',
					'color'          => '#ffffff',
					'line-height'    => '63px',
				),
				'output'         => array(
					'.inner_banner_main .title',
				),
			),

			// Inner Page Banner Subtitle Font.
			array(
				'id'             => 'inner_page_banner_subtitle_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Subtitle Font', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '300',
					'font-size'      => '20px',
					'color'          => '#ffffff',
					'line-height'    => '30px',
				),
				'output'         => array(
					'.inner_banner_main .subtitle',
				),
			),

			// Inner Page Banner Alignment.
			array(
				'id'      => 'inner_page_banner_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Inner Page Banner Alignment', 'vio' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

			// Breadcrumb Style Info.
			array(
				'id'    => 'breadcrumb_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Breadcrumb', 'vio' ),
			),

			// Breadcrumb Arrow Style.
			array(
				'id'       => 'breadcrumb_arrow_style',
				'type'     => 'select',
				'title'    => __( 'Breadcrumb Arrow Style', 'vio' ),
				'subtitle' => __( 'Select an icon for breadcrumb arrow.', 'vio' ),
				'data'     => 'elusive-icons',
				'default'  => 'el el-chevron-right',
			),

			// Breadcrumb Font.
			array(
				'id'             => 'breadcrumb_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Breadcrumb Font', 'vio' ),
				'subtitle'       => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'vio' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '300',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.inner_banner_breadcrumb #crumbs',
				),
			),

			// Breadcrumb Padding.
			array(
				'id'             => 'breadcrumb_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Breadcrumb Padding', 'vio' ),
				'subtitle'       => esc_html__( 'Set padding for breadcrumb area.', 'vio' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '0px',
					'padding-bottom' => '135px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_breadcrumb > .container',
				),
			),

			// Breadcrumb Alignment.
			array(
				'id'      => 'breadcrumb_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Breadcrumb Alignment', 'vio' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Footer', 'vio' ),
		'icon'   => 'el el-photo',
		'id'     => 'footer',
		'fields' => array(

			// Footer Style Info.
			array(
				'id'    => 'footer_style_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Footer Style', 'vio' ),
			),

			// Footer Style Options.
			array(
				'id'       => 'footer-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer Style', 'vio' ),
				'subtitle' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'vio' ),
				'options'  => array(
					'footer-default' => array(
						'alt'   => esc_html__( 'Default Footer', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Default.png' ),
						'title' => esc_html__( 'Default Footer', 'vio' ),
					),
					'footer-custom'  => array(
						'alt'   => esc_html__( 'Custom Footer', 'vio' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Custom.png' ),
						'title' => esc_html__( 'Custom Footer ', 'vio' ),
					),
				),
				'default'  => 'footer-default',
			),

			// START OF FOOTER ONE OPTIONS.

			// Footer One Info.
			array(
				'id'       => 'footer_one_info',
				'type'     => 'info',
				'title'    => esc_html__( 'Footer Default Settings', 'vio' ),
				'class'    => 'radiant-subheader',
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Open social links in new window.
			array(
				'id'       => 'hide-footer-widget',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hide footer widget area', 'vio' ),
				'default'  => true,
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Background.
			array(
				'id'       => 'footer_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for Footer.', 'vio' ),
				'output'   => array(
					'.wraper_footer.style-default',
				),
				'required' => array(
					array(
						'hide-footer-widget',
						'equals',
						true,
					),
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Background.
			array(
				'id'       => 'footer_one_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section.', 'vio' ),
				'default'  => array(
					'background-color' => '#161b27',
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Main Bottom Border.
			array(
				'id'       => 'footer_one_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'vio' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section.', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.17,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-default .wraper_footer_main',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Background.
			array(
				'id'       => 'footer_one_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background.', 'vio' ),
				'default'  => array(
					'background-color' => '#161b27',
				),
				'output'   => array(
					'.wraper_footer.style-default .wraper_footer_copyright',
				),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// Footer One Copyright Text.
			array(
				'id'       => 'footer_one_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'vio' ),
				'subtitle' => esc_html__( 'Enter Copyright Text.', 'vio' ),
				'default'  => esc_html__( '© 2019 vio Theme. RadiantThemes', 'vio' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-default',
					),
				),
			),

			// END OF FOOTER DEFAULT OPTIONS.

			// START OF FOOTER CUSTOM OPTIONS.

			// Footer Eleven Info.
			array(
				'id'       => 'footer_custom_info',
				'type'     => 'info',
				'class'    => 'radiant-subheader',
				'title'    => esc_html__( 'Custom Footer Settings', 'vio' ),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			array(
				'id'       => 'footer_list_text',
				'title'    => __( 'Custom Footer', 'vio' ),
				'type'     => 'select',
				'options'  => radiant_get_custom_footers_list(),
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			// Footer Custom Stucking.
			array(
				'id'       => 'footer_custom_stucking',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stucking Option', 'vio' ),
				'subtitle' => esc_html__( 'Choose if you want the stucking effect on footer or not.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
				'required' => array(
					array(
						'footer-style',
						'=',
						'footer-custom',
					),
				),
			),

			// END OF FOOTER ELEVEN OPTIONS.
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Elements', 'vio' ),
		'icon'  => 'el el-braille',
		'id'    => 'elements',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Scroll Bar', 'vio' ),
		'id'         => 'scroll_bar',
		'icon'       => 'el el-adjust-alt',
		'subsection' => true,
		'fields'     => array(

			// Display Footer Main Section.
			array(
				'id'       => 'scrollbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Custom Scrollbar', 'vio' ),
				'subtitle' => esc_html__( 'Choose if Custom Scrollbar will be activate or not. (Please Note: This will take effect on infinity scroll areas but not for entire website.)', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			// Scroll Bar Color.
			array(
				'id'       => 'scrollbar_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Scroll Bar Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a color for Scroll Bar.', 'vio' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 1,
				),
			),

			// Scroll Bar Width.
			array(
				'id'       => 'scrollbar_width',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'height'   => false,
				'title'    => esc_html__( 'Scroll Bar Width', 'vio' ),
				'subtitle' => esc_html__( 'Set width for Scroll Bar.', 'vio' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'width' => '7',
					'units' => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Button', 'vio' ),
		'icon'       => 'el el-off',
		'id'         => 'button-style',
		'subsection' => true,
		'fields'     => array(

			// Button Padding.
			array(
				'id'             => 'button_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Button Padding', 'vio' ),
				'subtitle'       => esc_html__( 'Allow padding for buttons.', 'vio' ),
				'default'        => array(
					'padding-top'    => '12px',
					'padding-right'  => '35px',
					'padding-bottom' => '13px',
					'padding-left'   => '35px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Button Background Color.
			array(
				'id'       => 'button_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons.', 'vio' ),
				'default'  => array(
					'color' => '#3a3d42',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Background Color Hover.
			array(
				'id'       => 'button_background_color_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Background Color', 'vio' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons hover.', 'vio' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit]:hover, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border.
			array(
				'id'      => 'button_border',
				'type'    => 'border',
				'title'   => esc_html__( 'Border', 'vio' ),
				'default' => array(
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px',
					'border-style'  => 'solid',
					'border-color'  => '#3a3d42',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn span, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Border Color.
			array(
				'id'      => 'button_hover_border_color',
				'type'    => 'border',
				'title'   => esc_html__( 'Hover Border Color', 'vio' ),
				'default' => array(
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px',
					'border-style'  => 'solid',
					'border-color'  => '#131313',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit]:hover, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border Radius.
			array(
				'id'             => 'border-radius',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Border Radius', 'vio' ),
				'subtitle'       => esc_html__( 'Users can change the Border Radius for Buttons.', 'vio' ),
				'all'            => false,
				'default'        => array(
					'margin-top'    => '0px',
					'margin-right'  => '0px',
					'margin-bottom' => '0px',
					'margin-left'   => '0px',
					'units'         => 'px',
				),
			),

			// Box Shadow.
			array(
				'id'      => 'theme_button_box_shadow',
				'type'    => 'box_shadow',
				'title'   => esc_html__( 'Theme Button Box Shadow', 'vio' ),
				'units'   => array( 'px', 'em', 'rem' ),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
				'opacity' => true,
				'rgba'    => true,
				'default' => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '0',
					'spread'       => '0',
					'opacity'      => '0.01',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),

			),

			// Button Typography.
			array(
				'id'             => 'button_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'vio' ),
				'subtitle'       => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'vio' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Montserrat',
					'font-weight'    => '700',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .shop_single > .summary form.cart .button, .shop_single #review_form #respond input[type=submit], .woocommerce button.button[name=apply_coupon], .woocommerce button.button[name=update_cart], .woocommerce button.button[name=update_cart]:disabled, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form.checkout_coupon .form-row .button, .woocommerce #payment #place_order, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Font Color.
			array(
				'id'       => 'button_typography_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover Font Color', 'vio' ),
				'subtitle' => esc_html__( 'Select button hover font color.', 'vio' ),
				'default'  => '#ffffff',
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .shop_single > .summary form.cart .button:hover, .shop_single #review_form #respond input[type=submit]:hover, .woocommerce button.button[name=apply_coupon]:hover, .woocommerce button.button[name=update_cart]:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce form.checkout_coupon .form-row .button:hover, .woocommerce #payment #place_order:hover, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .woocommerce table.shop_table.wishlist_table > tbody > tr > td.product-add-to-cart a:hover, .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=submit]:hover, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Icon Color.
			array(
				'id'       => 'button_typography_icon',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main i',
				),
			),

			// Hover Icon Color.
			array(
				'id'       => 'button_typography_icon_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Icon Color', 'vio' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'vio' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover i',
				),
			),

			// Hover Style.
			array(
				'id'       => 'button_hover_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hover Style', 'vio' ),
				'subtitle' => esc_html__( 'Select Hover Style of the "Button". (Please Note: This option will work only for "Theme Button" element.)', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Fade)',
					'two'   => 'Style Two (Sweep Right)',
					'three' => 'Style Three (Zoom Out)',
					'four'  => 'Style Four (Fade with Icon Right)',
					'five'  => 'Style Five (3D Shadow With SlideUp)',
					'six'   => 'Style Six (Horizontal Shake)',
					'seven' => 'Style Seven (Zoom Out)',
				),
				'default'  => 'five',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Contact Form', 'vio' ),
		'icon'       => 'el el-tasks',
		'id'         => 'contact_form_style',
		'subsection' => true,
		'fields'     => array(

			// Height For Row Gap.
			array(
				'id'             => 'contact_form_style_row_gap',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => __( 'Gap For Rows', 'vio' ),
				'subtitle'       => __( 'Users can change gap for rows.', 'vio' ),
				'default'        => array(
					'margin-top'    => '0px',
					'margin-right'  => '0px',
					'margin-bottom' => '20px',
					'margin-left'   => '0px',
					'units'         => 'px',
				),
				'output'         => array(
					'.radiant-contact-form .form-row, div.wpcf7-response-output',
				),
			),

			// Height For Input Fields.
			array(
				'id'       => 'contact_form_style_input_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Input Fields', 'vio' ),
				'subtitle' => __( 'Users can change height for Input Fields.', 'vio' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '45',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select',
				),
			),

			// Height For Textarea Fields.
			array(
				'id'       => 'contact_form_style_textarea_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Textarea Fields', 'vio' ),
				'subtitle' => __( 'Users can change height for Textarea Fields.', 'vio' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '100',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row textarea',
				),
			),

			// Padding For Input Fields Focus.
			array(
				'id'             => 'contact_form_style_input_padding_focus',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => false,
				'title'          => esc_html__( 'Padding For Input Fields Focus', 'vio' ),
				'subtitle'       => esc_html__( 'Users can change padding for input fields focus.', 'vio' ),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-right'  => '0px',
					'padding-bottom' => '0px',
					'padding-left'   => '0px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiant-contact-form .form-row input[type=text]:focus, .radiant-contact-form .form-row input[type=email]:focus, .radiant-contact-form .form-row input[type=url]:focus, .radiant-contact-form .form-row input[type=tel]:focus, .radiant-contact-form .form-row input[type=number]:focus, .radiant-contact-form .form-row input[type=password]:focus, .radiant-contact-form .form-row input[type=date]:focus, .radiant-contact-form .form-row input[type=time]:focus, .radiant-contact-form .form-row select:focus, .radiant-contact-form .form-row textarea:focus',
				),
			),

			// Box Shadow For Input Fields.
			array(
				'id'       => 'contact_form_style_input_box_shadow',
				'type'     => 'box_shadow',
				'title'    => esc_html__( 'Box Shadow For Input Fields', 'vio' ),
				'subtitle' => esc_html__( 'Users can change the Box Shadow for input fields.', 'vio' ),
				'units'    => array( '' ),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select, .radiant-contact-form .form-row textarea',
				),
				'opacity'  => true,
				'rgba'     => true,
				'default'  => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Pages', 'vio' ),
		'icon'  => 'el el-book',
		'id'    => 'pages-option',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Error 404', 'vio' ),
		'icon'       => 'el el-error',
		'id'         => '404_error',
		'subsection' => true,
		'fields'     => array(

			// 404 Page Style.
			array(
				'id'       => '404_error_style',
				'type'     => 'select',
				'title'    => esc_html__( '404 Page Style', 'vio' ),
				'subtitle' => esc_html__( 'Select 404 Page Style of the website.', 'vio' ),
				'options'  => array(
					'one'   => 'Style One (Only Text)',
					'two'   => 'Style Two (Image, Text and Button)',
					'three' => 'Style Three (Image, Text and Button)',
					'four'  => 'Style Four (Image, Text and Button)',
				),
				'default'  => 'one',
			),

			// START OF 404 ERROR ONE OPTIONS.

			// Footer One Info.
			array(
				'id'    => '404_error_one_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style One Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error One Content.
			array(
				'id'       => '404_error_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'vio' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style One".)', 'vio' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>Oops! Page is not available</h1><h2>We\'re not being able to find the page you\'re looking for.</h2>',
			),

			// 404 Error One Button Text.
			array(
				'id'       => '404_error_one_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'vio' ),
				'default'  => esc_html__( 'Back To Home', 'vio' ),
			),

			// 404 Error One Button Link.
			array(
				'id'       => '404_error_one_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'vio' ),
				'default'  => esc_url( get_home_url() ),
			),

			// END OF 404 ERROR ONE OPTIONS.

			// START OF 404 ERROR TWO OPTIONS.
			// 404 Error Two Info.
			array(
				'id'    => '404_error_two_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Two Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Two Background.
			array(
				'id'       => '404_error_two_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Two".)', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-two',
				),
			),

			// 404 Error Two Image.
			array(
				'id'       => '404_error_two_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'vio' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Two".)', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/404-Error-Style-Two-Image.png',
				),
			),

			// 404 Error Two Content.
			array(
				'id'       => '404_error_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'vio' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Two".)', 'vio' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>The requested page could not be found!</h1>',
			),

			// 404 Error Two Button Text.
			array(
				'id'       => '404_error_two_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'vio' ),
				'default'  => esc_html__( 'Back To Home Page', 'vio' ),
			),

			// 404 Error Two Button Link.
			array(
				'id'       => '404_error_two_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
			), // END OF 404 ERROR TWO OPTIONS.

			// START OF 404 ERROR THREE OPTIONS.
			// 404 Error Three Info.
			array(
				'id'    => '404_error_three_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Three Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Three Background.
			array(
				'id'       => '404_error_three_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Three".)', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-three',
				),
			),

			// 404 Error Three Image.
			array(
				'id'       => '404_error_three_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'vio' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Three".)', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/404-Error-Style-Three-Image.png',
				),
			),

			// 404 Error Three Content.
			array(
				'id'       => '404_error_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'vio' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Three".)', 'vio' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Oops!</h1><h2>We can't seem to find the page you're looking for.</h2>",
			),

			// 404 Error Three Button Text.
			array(
				'id'       => '404_error_three_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'vio' ),
				'default'  => esc_html__( 'Back To Home Page', 'vio' ),
			),

			// 404 Error Three Button Link.
			array(
				'id'       => '404_error_three_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
			), // END OF 404 ERROR THREE OPTIONS.

			// START OF 404 ERROR FOUR OPTIONS.
			// 404 Error Four Info.
			array(
				'id'    => '404_error_four_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Four Settings', 'vio' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Four Background.
			array(
				'id'       => '404_error_four_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'vio' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Four".)', 'vio' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-four',
				),
			),

			// 404 Error Four Image.
			array(
				'id'       => '404_error_four_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'vio' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Four".)', 'vio' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/assets/images/404-Error-Style-Four-Image.png',
				),
			),

			// 404 Error Four Content.
			array(
				'id'       => '404_error_four_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'vio' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Four".)', 'vio' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>Sorry! This Page Was Lost</h1>',
			),

			// 404 Error Four Button Text.
			array(
				'id'       => '404_error_four_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'vio' ),
				'default'  => esc_html__( 'Back To Home Page', 'vio' ),
			),

			// 404 Error Four Button Link.
			array(
				'id'       => '404_error_four_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'vio' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'vio' ),
				'default'  => esc_html__( '#', 'vio' ),
			),
			// END OF 404 ERROR FOUR OPTIONS.
		),
	)
);
if ( class_exists( 'Radiantthemes_Addons' ) ) {
	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Maintenance Mode', 'vio' ),
			'icon'       => 'el el-broom',
			'id'         => 'maintenance_mode',
			'subsection' => true,
			'fields'     => array(

				// Maintenance Mode Switch.
				array(
					'id'       => 'maintenance_mode_switch',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Maintenance Mode?', 'vio' ),
					'subtitle' => esc_html__( 'Choose if want to Activate Maintenance Mode.', 'vio' ),
					'on'       => esc_html__( 'Yes', 'vio' ),
					'off'      => esc_html__( 'No', 'vio' ),
					'default'  => false,
				),

				// Maintenance Mode Style.
				array(
					'id'       => 'maintenance_mode_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Maintenance Mode Style', 'vio' ),
					'subtitle' => esc_html__( 'Select Maintenance Mode Style of the website.', 'vio' ),
					'options'  => array(
						'one'   => 'Style One (Background With Text)',
						'two'   => 'Style Two (Image With Text)',
						'three' => 'Style Three (Background With Text)',
					),
					'default'  => 'one',
				),

				// START OF MAINTENANCE MODE ONE OPTIONS.
				// Maintenance Mode One Info.
				array(
					'id'    => 'maintenance_mode_one_info',
					'type'  => 'info',
					'title' => esc_html__( 'Maintenance Mode Style One Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Maintenance Mode One Background.
				array(
					'id'       => 'maintenance_mode_one_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Maintenance Mode Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style One".)', 'vio' ),
					'default'  => array(
						'background-image' => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-One-Image.png',
						'background-color' => '#ffffff',
					),
					'output'   => array(
						'.wraper_maintenance_main.style-one',
					),
				),

				// Maintenance Mode One Content.
				array(
					'id'       => 'maintenance_mode_one_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Maintenance Mode Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style One".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>',
				), // END OF MAINTENANCE MODE ONE OPTIONS.

				// START OF MAINTENANCE MODE TWO OPTIONS.
				// Maintenance Mode Two Info.
				array(
					'id'    => 'maintenance_mode_two_info',
					'type'  => 'info',
					'title' => esc_html__( 'Maintenance Mode Style Two Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Maintenance Mode Two Background.
				array(
					'id'       => 'maintenance_mode_two_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Maintenance Mode Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Two".)', 'vio' ),
					'default'  => array(
						'background-image' => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-Two-Image.png',
						'background-color' => '#ffffff',
					),
					'output'   => array(
						'.wraper_maintenance_main.style-two',
					),
				),

				// Maintenance Mode Two Content.
				array(
					'id'       => 'maintenance_mode_two_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Maintenance Mode Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Two".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1><strong>This Website Is</strong> Under Construction.</h1><h2>Please Check Back Soon...</h2>',
				), // END OF MAINTENANCE MODE TWO OPTIONS.

				// START OF MAINTENANCE MODE THREE OPTIONS.
				// Maintenance Mode Three Info.
				array(
					'id'    => 'maintenance_mode_three_info',
					'type'  => 'info',
					'title' => esc_html__( 'Maintenance Mode Style Three Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Maintenance Mode Three Background.
				array(
					'id'       => 'maintenance_mode_three_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Maintenance Mode Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Three".)', 'vio' ),
					'default'  => array(
						'background-image' => get_template_directory_uri() . '/assets/images/Maintenance-More-Style-Three-Image.png',
						'background-color' => '#ffffff',
					),
					'output'   => array(
						'.wraper_maintenance_main.style-three',
					),
				),

				// Maintenance Mode Three Content.
				array(
					'id'       => 'maintenance_mode_three_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Maintenance Mode Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Three".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>',
				),
				// END OF MAINTENANCE MODE THREE OPTIONS.
			),
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Coming Soon', 'vio' ),
			'icon'       => 'el el-warning-sign',
			'id'         => 'coming_soon',
			'subsection' => true,
			'fields'     => array(

				// Coming Soon Switch.
				array(
					'id'       => 'coming_soon_switch',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Coming Soon', 'vio' ),
					'subtitle' => esc_html__( 'Choose if want to activate Coming Soon mode.', 'vio' ),
					'on'       => esc_html__( 'Yes', 'vio' ),
					'off'      => esc_html__( 'No', 'vio' ),
					'default'  => false,
				),

				// Coming Soon Launch Date-Time.
				array(
					'id'       => 'coming_soon_datetime',
					'type'     => 'text',
					'title'    => esc_html__( 'Launch Date & Time', 'vio' ),
					'subtitle' => esc_html__( 'Enter Launch Date & Time.', 'vio' ),
					'default'  => '2019-08-25 12:00',
				),

				// Coming Soon Style.
				array(
					'id'       => 'coming_soon_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Coming Soon Style', 'vio' ),
					'subtitle' => esc_html__( 'Select Coming Soon Style of the website.', 'vio' ),
					'options'  => array(
						'one'   => 'Style One',
						'two'   => 'Style Two',
						'three' => 'Style Three',
					),
					'default'  => 'one',
				),

				// START OF COMING SOON ONE OPTIONS.
				// Coming Soon One Info.
				array(
					'id'    => 'coming_soon_one_info',
					'type'  => 'info',
					'title' => esc_html__( 'Coming Soon Style One Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Coming Soon One Background.
				array(
					'id'       => 'coming_soon_one_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Coming Soon Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style One".)', 'vio' ),
					'default'  => array(
						'background-image'    => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-One-Background-Image.png',
						'background-color'    => '#000000',
						'background-size'     => 'cover',
						'background-position' => 'center-center',
					),
					'output'   => array(
						'.wraper_comingsoon_main.style-one',
					),
				),

				// Coming Soon One Content.
				array(
					'id'       => 'coming_soon_one_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Coming Soon Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style One".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>Our New Site Is Coming Soon</h1><h2>Stay tuned for something amazing</h2>',
				), // END OF COMING SOON ONE OPTIONS.

				// START OF COMING SOON TWO OPTIONS.
				// Coming Soon Two Info.
				array(
					'id'    => 'coming_soon_two_info',
					'type'  => 'info',
					'title' => esc_html__( 'Coming Soon Style Two Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Coming Soon Two Background.
				array(
					'id'       => 'coming_soon_two_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Coming Soon Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Two".)', 'vio' ),
					'default'  => array(
						'background-image'    => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-Two-Background-Image.png',
						'background-color'    => '#000000',
						'background-size'     => 'cover',
						'background-position' => 'center-center',
					),
					'output'   => array(
						'.wraper_comingsoon_main.style-two',
					),
				),

				// Coming Soon Two Content.
				array(
					'id'       => 'coming_soon_two_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Coming Soon Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Two".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>Coming Soon</h1><h2>Stay tuned for something amazing</h2>',
				), // END OF COMING SOON TWO OPTIONS.

				// START OF COMING SOON THREE OPTIONS.
				// Coming Soon Three Info.
				array(
					'id'    => 'coming_soon_three_info',
					'type'  => 'info',
					'title' => esc_html__( 'Coming Soon Style Three Settings', 'vio' ),
					'class' => 'radiant-subheader enable-toggle',
				),

				// Coming Soon Three Background.
				array(
					'id'       => 'coming_soon_three_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Coming Soon Background', 'vio' ),
					'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Three".)', 'vio' ),
					'default'  => array(
						'background-image'    => get_template_directory_uri() . '/assets/images/Coming-Soon-Style-Three-Background-Image.png',
						'background-color'    => '#000000',
						'background-size'     => 'cover',
						'background-position' => 'center-center',
					),
					'output'   => array(
						'.wraper_comingsoon_main.style-three',
					),
				),

				// Coming Soon Three Content.
				array(
					'id'       => 'coming_soon_three_content',
					'type'     => 'editor',
					'title'    => esc_html__( 'Coming Soon Content', 'vio' ),
					'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Three".)', 'vio' ),
					'args'     => array(
						'teeny' => false,
					),
					'default'  => '<h1>Our Awesome Website Is <strong>Coming Soon!</strong></h1><h2>Stay tuned for something amazing</h2>',
				), // END OF COMING SOON THREE OPTIONS.

			),
		)
	);
}
Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Search', 'vio' ),
		'icon'       => 'el el-search-alt',
		'id'         => 'search',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'search_page_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Search Page Banner Image', 'vio' ),
				'subtitle' => esc_html__( 'Select search page banner image', 'vio' ),
			),

			array(
				'id'       => 'search_page_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Title', 'vio' ),
				'subtitle' => esc_html__( 'Enter search page banner title', 'vio' ),
				'default'  => 'Search',
			),

			array(
				'id'       => 'search_page_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Subtitle', 'vio' ),
				'subtitle' => esc_html__( 'Enter search page banner subtitle', 'vio' ),
				'default'  => '',
			),

		),
	)
);
if ( class_exists( 'Tribe__Events__Main' ) ) {
	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Event', 'vio' ),
			'icon'       => 'el el-calendar',
			'id'         => 'banner_layout',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'events_banner_details',
					'type'     => 'select',
					'title'    => esc_html__( 'Banner Details', 'vio' ),
					'subtitle' => esc_html__( 'Select Banner options', 'vio' ),
					'options'  => array(
						'banner-breadcumbs' => 'Short Banner With Breadcumbs',
						'banner-only'       => 'Short Banner Only',
						'breadcumbs-only'   => 'Breadcumbs Only',
						'none'              => 'None',
					),
					'default'  => 'banner-breadcumbs',
				),
				array(
					'id'       => 'event_banner_image',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Event Banner Image', 'vio' ),
					'subtitle' => esc_html__( 'Select event banner image', 'vio' ),
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
				array(
					'id'       => 'event_banner_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Event Title', 'vio' ),
					'subtitle' => esc_html__( 'Enter event banner title', 'vio' ),
					'default'  => 'Events',
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
				array(
					'id'       => 'event_banner_subtitle',
					'type'     => 'text',
					'title'    => esc_html__( 'Event Subtitle', 'vio' ),
					'subtitle' => esc_html__( 'Enter event banner subtitle', 'vio' ),
					'default'  => '',
					'required' => array(
						array(
							'events_banner_details',
							'!=',
							'none',
						),
						array(
							'events_banner_details',
							'!=',
							'breadcumbs-only',
						),
					),
				),
			),
		)
	);
}

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Blog', 'vio' ),
		'icon'  => 'el el-bullhorn',
		'id'    => 'blog',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Blog Layout', 'vio' ),
		'icon'       => 'el el-check-empty',
		'id'         => 'blog_layout',
		'subsection' => true,
		'fields'     => array(

			// Blog Style.
			array(
				'id'       => 'blog-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Style', 'vio' ),
				'subtitle' => esc_html__( 'Select blog style', 'vio' ),
				'options'  => array(
					'default' => array(
						'alt'   => 'Default',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Default.png',
						'title' => esc_html__( 'Default', 'vio' ),
					),
					'one'     => array(
						'alt'   => 'Classic',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Classic.png',
						'title' => esc_html__( 'Classic', 'vio' ),
					),
					'two'     => array(
						'alt'   => 'Masonry',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Masonry.png',
						'title' => esc_html__( 'Masonry', 'vio' ),
					),
					'three'   => array(
						'alt'   => 'List',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List.png',
						'title' => esc_html__( 'List', 'vio' ),
					),
					'four'    => array(
						'alt'   => 'Masonry (No Image)',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List-No-Image.png',
						'title' => esc_html__( 'List (No Image)', 'vio' ),
					),
					'five'    => array(
						'alt'   => 'Standard',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Metro.png',
						'title' => esc_html__( 'Standard', 'vio' ),
					),
				),
				'default'  => 'default',
			),

			// Blog Layout.
			array(
				'id'       => 'blog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Layout', 'vio' ),
				'subtitle' => esc_html__( 'Select blog layout', 'vio' ),
				'options'  => array(
					'leftsidebar'  => array(
						'alt' => 'Left Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Left-Sidebar.png',
					),
					'nosidebar'    => array(
						'alt' => 'No Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-No-Sidebar.png',
					),
					'rightsidebar' => array(
						'alt' => 'Right Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Right-Sidebar.png',
					),
				),
				'default'  => 'rightsidebar',
				'required' => array(
					array(
						'blog-style',
						'!=',
						'default',
					),
				),
			),

			// Blog Layout Sidebar Width.
			array(
				'id'       => 'blog-layout-sidebar-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Width', 'vio' ),
				'subtitle' => esc_html__( 'Select sidebar width for blog pages.', 'vio' ),
				'options'  => array(
					'three-grid' => '3 Grids',
					'four-grid'  => '4 Grids',
					'five-grid'  => '5 Grids',
				),
				'default'  => 'three-grid',
				'required' => array(
					array(
						'blog-layout',
						'!=',
						'nosidebar',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Single Page Layout', 'vio' ),
		'icon'       => 'el el-bold',
		'id'         => 'blog_single_layout',
		'subsection' => true,
		'fields'     => array(

			// Single Page Style.
			array(
				'id'       => 'blog_single_layout_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Single Page Style', 'vio' ),
				'subtitle' => esc_html__( 'Select blog single page style', 'vio' ),
				'options'  => array(
					'default' => array(
						'alt'   => 'Default',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-Default.png',
						'title' => esc_html__( 'Default', 'vio' ),
					),
					'one'     => array(
						'alt'   => 'Style One',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-One.png',
						'title' => esc_html__( 'Style One', 'vio' ),
					),
					'two'     => array(
						'alt'   => 'Style Two',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Single-Style-Two.png',
						'title' => esc_html__( 'Style Two', 'vio' ),
					),
				),
				'default'  => 'one',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Blog Options', 'vio' ),
		'icon'       => 'el el-ok-sign',
		'id'         => 'blog_options',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'display_social_sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Sharing Box', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show Social Sharing icons on Blog Page (applicable for default structure).', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),
			array(
				'id'       => 'display_author_information',
				'type'     => 'switch',
				'title'    => esc_html__( 'Author Information Box', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show author information on Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_categries',
				'type'     => 'switch',
				'title'    => esc_html__( 'Categories', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show the categories on both Blog Page and Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Tags', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show the tags on both Blog Page and Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_navigation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Navigation', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to previous and next navigation the Previous/Next Navigation on Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_related_article',
				'type'     => 'switch',
				'title'    => esc_html__( 'Related Article', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show related article on Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => false,
			),

			array(
				'id'       => 'blog_comment_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Comments', 'vio' ),
				'subtitle' => esc_html__( 'Select if you want to show comments on Blog Details Page.', 'vio' ),
				'on'       => esc_html__( 'Yes', 'vio' ),
				'off'      => esc_html__( 'No', 'vio' ),
				'default'  => true,
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Team', 'vio' ),
		'icon'  => 'el el-user',
		'id'    => 'team',
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'      => esc_html__( 'Team Details', 'vio' ),
		'icon'       => 'el el-address-book',
		'id'         => 'team_details',
		'subsection' => true,
		'fields'     => array(

			// Team Details Style.
			array(
				'id'       => 'team_details_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Team Details Style', 'vio' ),
				'subtitle' => esc_html__( 'Select team details style', 'vio' ),
				'options'  => array(
					'blank' => array(
						'alt'   => 'Blank',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-Blank.png',
						'title' => esc_html__( 'Blank', 'vio' ),
					),
					'one'   => array(
						'alt'   => 'Style One',
						'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-One.png',
						'title' => esc_html__( 'Style One', 'vio' ),
					),
				),
				'default'  => 'blank',
			),

		),
	)
);

if ( class_exists( 'woocommerce' ) ) {

	Redux::setSection(
		$opt_name,
		array(
			'title' => esc_html__( 'Shop', 'vio' ),
			'icon'  => 'el el-shopping-cart',
			'id'    => 'shop',
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Product Listing', 'vio' ),
			'icon'       => 'el el-list-alt',
			'id'         => 'product_listing',
			'subsection' => true,
			'fields'     => array(

				// Product Listing Layout.
				array(
					'id'       => 'shop-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Listing Layout', 'vio' ),
					'subtitle' => esc_html__( 'Select Product Listing Layout', 'vio' ),
					'options'  => array(
						'shop-style-three-column' => array(
							'title' => 'Three Column',
							'alt'   => 'Three Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-One.jpg',
						),
						'shop-style-four-column'  => array(
							'title' => 'Four Column',
							'alt'   => 'Four Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Two.jpg',
						),
						'shop-style-five-column'  => array(
							'title' => 'Five Column',
							'alt'   => 'Five Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Three.jpg',
						),
						'shop-style-six-column'   => array(
							'title' => 'Six Column',
							'alt'   => 'Six Column',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Four.jpg',
						),
					),
					'default'  => 'shop-style-four-column',
				),

				// Products Per Page.
				array(
					'id'       => 'shop-products-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Products Per Page', 'vio' ),
					'subtitle' => esc_html__( 'Put number of products you wants to show per page', 'vio' ),
					'default'  => '12',
					'validate' => 'numeric',
				),

				// Sidebar.
				array(
					'id'       => 'shop-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar.', 'vio' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'vio' ),
					'options'  => array(
						'shop-leftsidebar'  => array(
							'alt' => 'Left Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Left-Sidebar.jpg',
						),
						'shop-nosidebar'    => array(
							'alt' => 'No Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-No-Sidebar.jpg',
						),
						'shop-rightsidebar' => array(
							'alt' => 'Right Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-nosidebar',
				),

				// Shop Box Style.
				array(
					'id'       => 'shop_box_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Box Style', 'vio' ),
					'subtitle' => esc_html__( 'Select Style of the Shop Box.', 'vio' ),
					'options'  => array(
						'style-one'   => array(
							'title' => 'Overlay',
							'alt'   => 'Overlay',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-One.jpg',
						),
						'style-two'   => array(
							'title' => 'Minimal',
							'alt'   => 'Minimal',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Two.jpg',
						),
						'style-three' => array(
							'title' => 'Classic',
							'alt'   => 'Classic',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Three.jpg',
						),
						'style-four'  => array(
							'title' => 'Simple',
							'alt'   => 'Simple',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Four.jpg',
						),
						'style-five'  => array(
							'title' => 'Detailed',
							'alt'   => 'Detailed',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Five.jpg',
						),
						'style-six'  => array(
							'title' => 'Overlay With Icon',
							'alt'   => 'Detailed With Icon',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Six.jpg',
						),
					),
					'default'  => 'style-six',
				),

			),
		)
	);

	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Product Details', 'vio' ),
			'icon'       => 'el el-shopping-cart',
			'id'         => 'product_details',
			'subsection' => true,
			'fields'     => array(

				// Product Details Layout.
				array(
					'id'       => 'shop-details-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Details Layout', 'vio' ),
					'subtitle' => esc_html__( 'Select Product Details Layout', 'vio' ),
					'options'  => array(
						'style-one'   => array(
							'alt' => 'Style One',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-One.jpg',
						),
						'style-two'   => array(
							'alt' => 'Style Two',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Two.jpg',
						),
						'style-three' => array(
							'alt' => 'Style Three',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Three.jpg',
						),
					),
					'default'  => 'style-one',
				),

				// Sidebar.
				array(
					'id'       => 'shop-details-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar', 'vio' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'vio' ),
					'options'  => array(
						'shop-details-leftsidebar'  => array(
							'alt'   => 'Left Sidebar',
							'title' => 'Left Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Left-Sidebar.jpg',
						),
						'shop-details-nosidebar'    => array(
							'alt'   => 'No Sidebar',
							'title' => 'No Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-No-Sidebar.jpg',
						),
						'shop-details-rightsidebar' => array(
							'alt'   => 'Right Sidebar',
							'title' => 'Right Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-details-nosidebar',
				),

			),
		)
	);

}

Redux::setSection(
	$opt_name,
	array(
		'title'   => esc_html__( 'Social Icons', 'vio' ),
		'icon'    => 'el el-globe',
		'id'      => 'social_icons',
		'submenu' => false,
		'fields'  => array(

			// Open social links in new window.
			array(
				'id'      => 'social-icon-target',
				'type'    => 'switch',
				'title'   => esc_html__( 'Open links in new window', 'vio' ),
				'desc'    => esc_html__( 'Open social links in new window', 'vio' ),
				'default' => true,
			),

			// Google +.
			array(
				'id'      => 'social-icon-googleplus',
				'type'    => 'text',
				'title'   => esc_html__( 'Google +', 'vio' ),
				'desc'    => esc_html__( 'Link to the profile page', 'vio' ),
				'default' => '#',
			),

			// Facebook.
			array(
				'id'      => 'social-icon-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook', 'vio' ),
				'desc'    => esc_html__( 'Link to the profile page', 'vio' ),
				'default' => '#',
			),

			// Twitter.
			array(
				'id'      => 'social-icon-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter', 'vio' ),
				'desc'    => esc_html__( 'Link to the profile page', 'vio' ),
				'default' => '#',
			),

			// Vimeo.
			array(
				'id'      => 'social-icon-vimeo',
				'type'    => 'text',
				'title'   => esc_html__( 'Vimeo', 'vio' ),
				'desc'    => esc_html__( 'Link to the profile page', 'vio' ),
				'default' => '#',
			),

			// YouTube.
			array(
				'id'    => 'social-icon-youtube',
				'type'  => 'text',
				'title' => esc_html__( 'YouTube', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Flickr.
			array(
				'id'    => 'social-icon-flickr',
				'type'  => 'text',
				'title' => esc_html__( 'Flickr', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// LinkedIn.
			array(
				'id'    => 'social-icon-linkedin',
				'type'  => 'text',
				'title' => esc_html__( 'LinkedIn', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Pinterest.
			array(
				'id'    => 'social-icon-pinterest',
				'type'  => 'text',
				'title' => esc_html__( 'Pinterest', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Xing.
			array(
				'id'    => 'social-icon-xing',
				'type'  => 'text',
				'title' => esc_html__( 'Xing', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Viadeo.
			array(
				'id'    => 'social-icon-viadeo',
				'type'  => 'text',
				'title' => esc_html__( 'Viadeo', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Vkontakte.
			array(
				'id'    => 'social-icon-vkontakte',
				'type'  => 'text',
				'title' => esc_html__( 'Vkontakte', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Tripadvisor.
			array(
				'id'    => 'social-icon-tripadvisor',
				'type'  => 'text',
				'title' => esc_html__( 'Tripadvisor', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Tumblr.
			array(
				'id'    => 'social-icon-tumblr',
				'type'  => 'text',
				'title' => esc_html__( 'Tumblr', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Behance.
			array(
				'id'    => 'social-icon-behance',
				'type'  => 'text',
				'title' => esc_html__( 'Behance', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Instagram.
			array(
				'id'    => 'social-icon-instagram',
				'type'  => 'text',
				'title' => esc_html__( 'Instagram', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Dribbble.
			array(
				'id'    => 'social-icon-dribbble',
				'type'  => 'text',
				'title' => esc_html__( 'Dribbble', 'vio' ),
				'desc'  => esc_html__( 'Link to the profile page', 'vio' ),
			),

			// Skype.
			array(
				'id'    => 'social-icon-skype',
				'type'  => 'text',
				'title' => esc_html__( 'Skype', 'vio' ),
				'desc'  => wp_kses_post( 'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix' ),
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'   => esc_html__( 'Custom CSS', 'vio' ),
		'icon'    => 'el el-css',
		'id'      => 'radiantthemes_custom_css_section',
		'submenu' => false,
		'fields'  => array(

			// Custom CSS Editor.
			array(
				'id'       => 'radiantthemes_custom_css_editor',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom CSS', 'vio' ),
				'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'vio' ),
				'mode'     => 'css',
				'compiler' => true,
				'theme'    => 'chrome',
				'default'  => 'body.home .wraper_inner_banner_main > .container { padding-bottom: 135px !important }',
			),

		),
	)
);
// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
add_filter( 'redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3 );


if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * Undocumented function
	 *
	 * @param [type] $options Options.
	 * @param [type] $css CSS.
	 * @param [type] $changed_values Changed Values.
	 */
	function compiler_action( $options, $css, $changed_values ) {
		global $wp_filesystem;

		$filename = get_parent_theme_file_path( '/assets/css/radiantthemes-user-custom.css' );
		$css      = $options['radiantthemes_custom_css_editor'];

		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		if ( $wp_filesystem ) {
			$wp_filesystem->put_contents(
				$filename,
				$css,
				FS_CHMOD_FILE // predefined mode settings for WP files.
			);
		}
	}
}

/**
 * Custom Footers List
 *
 * @return array
 */
function radiant_get_custom_footers_list() {
	$footers      = array( '' => __( 'Default', 'vio' ) );
	$footers_list = get_posts( 'post_type="radiant_footer"&post_status="private"&numberposts=-1' );
	foreach ( $footers_list as $footer ) {
		$footers[ $footer->ID ] = $footer->post_title . ' (ID = ' . $footer->ID . ')';
	}
	return $footers;
}
