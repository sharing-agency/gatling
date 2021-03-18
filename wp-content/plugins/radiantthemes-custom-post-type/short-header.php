<?php
/**
 * Header Banner
 *
 * @package Radiantthemes
 */

/**
 * [radiantthemes_page_options description]
 */
function radiantthemes_page_options() {

	function short_header_metabox_font() {
		$google_font_url = '';
		/*
		Translators          : If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'radiantthemes-custom-post-type' ) ) {
			$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
		}
		return $google_font_url;
	}
	wp_register_style(
		'radiantthemes-short-header-google-fonts',
		short_header_metabox_font(),
		array(),
		'1.0.0'
	);
	wp_enqueue_style( 'radiantthemes-short-header-google-fonts' );

	wp_register_style(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/css/radiantthemes-page-options.css' ),
		false,
		time()
	);
	wp_enqueue_style( 'radiantthemes-page-options' );

	wp_register_script(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/js/radiantthemes-page-options.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-page-options' );
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_page_options' );

/**
 * Custom Box
 */
function radiantthemes_page_add_custom_box() {
	$screens = array( 'page', 'post' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'page_sectionid',
			__( 'Page Details', 'radiantthemes-custom-post-type' ),
			'radiantthemes_page_inner_custom_box',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'radiantthemes_page_add_custom_box' );

/**
 * Inner Custom Box
 *
 * @global type $post
 * @param type $post description.
 */
function radiantthemes_page_inner_custom_box( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'page_tm' );
	$vbtitle              = get_post_meta( $post->ID, 'banner_title', true );
	$vbstitle             = get_post_meta( $post->ID, 'banner_subtitle', true );
	$vselectheader        = get_post_meta( $post->ID, 'selectheader', true );
	$default_selectheader = empty( $vselectheader ) ? 'default' : $vselectheader;
	$vbannercheck         = get_post_meta( $post->ID, 'bannercheck', true );
	$default_bannercheck  = empty( $vbannercheck ) ? 'defaultbannercheck' : $vbannercheck;

	$footercheck = get_post_meta( $post->ID, 'custom_footer', true );
	?>
	<?php if ( ! is_front_page() ) { ?>
	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Header', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">
				<ul id="RadiantThemesPageHeaderSelector">
					<li class="header-default">
						<input type="radio" name="selectheader" value="default" <?php checked( $default_selectheader, 'default' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Default', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-one">
						<input type="radio" name="selectheader" value="one" <?php checked( $vselectheader, 'one' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header One', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-two">
						<input type="radio" name="selectheader" value="two" <?php checked( $vselectheader, 'two' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Two', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-two">
						<input type="radio" name="selectheader" value="two-a" <?php checked( $vselectheader, 'two-a' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Two A', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-two">
						<input type="radio" name="selectheader" value="two-b" <?php checked( $vselectheader, 'two-b' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Two B', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-three">
						<input type="radio" name="selectheader" value="three" <?php checked( $vselectheader, 'three' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Three', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-four">
						<input type="radio" name="selectheader" value="four" <?php checked( $vselectheader, 'four' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Four', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-five">
						<input type="radio" name="selectheader" value="five" <?php checked( $vselectheader, 'five' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Five', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-six">
						<input type="radio" name="selectheader" value="six" <?php checked( $vselectheader, 'six' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Six', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-seven">
						<input type="radio" name="selectheader" value="seven" <?php checked( $vselectheader, 'seven' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Seven', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-eight">
						<input type="radio" name="selectheader" value="eight" <?php checked( $vselectheader, 'eight' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Eight', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-nine">
						<input type="radio" name="selectheader" value="nine" <?php checked( $vselectheader, 'nine' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Nine', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-ten">
						<input type="radio" name="selectheader" value="ten" <?php checked( $vselectheader, 'ten' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Ten', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-ten">
						<input type="radio" name="selectheader" value="ten-a" <?php checked( $vselectheader, 'ten-a' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Ten A', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-ten">
						<input type="radio" name="selectheader" value="ten-b" <?php checked( $vselectheader, 'ten-b' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Ten B', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-eleven">
						<input type="radio" name="selectheader" value="eleven" <?php checked( $vselectheader, 'eleven' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Eleven', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-twelve">
						<input type="radio" name="selectheader" value="twelve" <?php checked( $vselectheader, 'twelve' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Twelve', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-thirteen">
						<input type="radio" name="selectheader" value="thirteen" <?php checked( $vselectheader, 'thirteen' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Thirteen', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-fourteen">
						<input type="radio" name="selectheader" value="fourteen" <?php checked( $vselectheader, 'fourteen' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Fourteen', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-fifteen">
						<input type="radio" name="selectheader" value="fifteen" <?php checked( $vselectheader, 'fifteen' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Fifteen', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-sixteen">
						<input type="radio" name="selectheader" value="sixteen" <?php checked( $vselectheader, 'sixteen' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Sixteen', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="header-seventeen">
						<input type="radio" name="selectheader" value="seventeen" <?php checked( $vselectheader, 'seventeen' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Header Seventeen', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
				</ul>
			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->

	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBanner" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Short Header', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">
				<ul id="RadiantThemesPageBannerSelector">
					<li class="header-default">
						<input type="radio" name="bannercheck" value="defaultbannercheck" <?php checked( $default_bannercheck, 'defaultbannercheck' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Default', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="bannerbreadcumbs">
						<input type="radio" name="bannercheck" value="bannerbreadcumbs" <?php checked( $vbannercheck, 'bannerbreadcumbs' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Banner + Breadcrumbs', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="banneronly">
						<input type="radio" name="bannercheck" value="banneronly" <?php checked( $vbannercheck, 'banneronly' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Only Banner', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="breadcumbsonly">
						<input type="radio" name="bannercheck" value="breadcumbsonly" <?php checked( $vbannercheck, 'breadcumbsonly' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'Only Breadcrumbs', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
					<li class="nobannerbreadcumbs">
						<input type="radio" name="bannercheck" value="nobannerbreadcumbs" <?php checked( $vbannercheck, 'nobannerbreadcumbs' ); ?> >
						<div class="image-holder"></div>
						<label><?php esc_html_e( 'None', 'radiantthemes-custom-post-type' ); ?></label>
					</li>
				</ul>
			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->

	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBannerText" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Custom Title & Subtitle', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-form -->
			<div class="radiantthemes-page-options-body-form">
				<input type="hidden" name="<?php echo $vbannercheck; ?>">
				<input type="text" name="banner_title" id="banner_title" value="<?php echo esc_attr( $vbtitle ); ?>" placeholder="Banner Custom Title"/><br/><br/>
				<input type="text" name="banner_subtitle" id="banner_subtitle" value="<?php echo esc_attr( $vbstitle ); ?>" placeholder="Banner Sub Title"/>
			</div>
			<!-- radiantthemes-page-options-body-form -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-page-options -->

	<!-- radiantthemes-footer-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
		<!-- radiantthemes-page-options-title -->
		<div class="radiantthemes-page-options-title">
			<p class="title"><?php esc_html_e( 'Select Custom Footer', 'radiantthemes-custom-post-type' ); ?></p>
		</div>
		<!-- radiantthemes-page-options-title -->
		<!-- radiantthemes-page-options-body -->
		<div class="radiantthemes-page-options-body">
			<!-- radiantthemes-page-options-body-image-selector -->
			<div class="radiantthemes-page-options-body-image-selector">

				<?php
				$rf = get_posts( 'post_type="radiant_footer"&post_status="private"&numberposts=-1' );

				// $contact_forms = array();
				if ( $rf ) {
					echo '<select name="custom_footer">';

					echo '<option value="Default Footer">Default Footer</option>';

					foreach ( $rf as $cf ) {
						if ( $footercheck == $cf->ID ) {
							echo '<option value="' . $cf->ID . '" selected> ' . $cf->post_title . '</option>';
						} else {
							echo '<option value="' . $cf->ID . '"> ' . $cf->post_title . '</option>';
						}
					}
					echo '</select>';
				}
				?>


			</div>
			<!-- radiantthemes-page-options-body-image-selector -->
		</div>
		<!-- radiantthemes-page-options-body -->
	</div>
	<!-- radiantthemes-footer-options -->
	<?php } ?>
	<?php
}

/**
 * Save Post data
 *
 * @param type $post_id description.
 * @return type
 */
function radiantthemes_page_save_postdata( $post_id ) {
	if ( ( false == strpos( $_SERVER['REQUEST_URI'], 'post-new.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'nav-menus.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'admin.php' ) ) && ( 'trash' != $_REQUEST['action'] ) ) {
		if ( 'page' == $_REQUEST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}
		if ( ! isset( $_POST['page_tm'] ) || ! wp_verify_nonce( $_POST['page_tm'], plugin_basename( __FILE__ ) ) ) {
			return;
		}
		$post_ID = $_POST['post_ID'];

		$tbtitle       = sanitize_text_field( $_POST['banner_title'] );
		$tbstitle      = sanitize_text_field( $_POST['banner_subtitle'] );
		$tselectheader = sanitize_html_class( $_POST['selectheader'] );
		$tbannercheck  = sanitize_html_class( $_POST['bannercheck'] );
		$tfootercheck  = sanitize_html_class( $_POST['custom_footer'] );

		update_post_meta( $post_ID, 'banner_title', $tbtitle );
		update_post_meta( $post_ID, 'banner_subtitle', $tbstitle );
		update_post_meta( $post_ID, 'selectheader', $tselectheader );
		update_post_meta( $post_ID, 'bannercheck', $tbannercheck );
		update_post_meta( $post_ID, 'custom_footer', $tfootercheck );

	}
}
add_action( 'save_post', 'radiantthemes_page_save_postdata', 10, 2 );
