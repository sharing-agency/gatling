<?php
/**
 * Image Gallery Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Image_Gallery' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Image_Gallery extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Image Gallery', 'radiantthemes-addons' ),
					'base'        => 'rt_image_gallery',
					'description' => esc_html__( 'Add Image Gallery with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/assets/icons/Image-Gallery-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_image_gallery',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Image Gallery Style', 'radiantthemes-addons' ),
							'param_name'  => 'image_gallery_style_variation',
							'value'       => array(
								esc_html__( 'Style One (Large Image With Thumbnail)', 'radiantthemes-addons' )  => 'one',
								esc_html__( 'Style Two (Image Grid - Large)', 'radiantthemes-addons' )          => 'two',
								esc_html__( 'Style Three (Image Grid - Small)', 'radiantthemes-addons' )        => 'three',
								esc_html__( 'Style Four (Masonry)', 'radiantthemes-addons' )                    => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_images',
							'heading'     => esc_html__( 'Upload Images', 'radiantthemes-addons' ),
							'holder'      => 'div',
							'param_name'  => 'image_gallery_url',
							'description' => esc_html__( 'Upload Images for Gallery', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items in small gallery', 'radiantthemes-addons' ),
							'param_name'  => 'item_small_gallery',
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
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
					),
				)
			);
			add_shortcode( 'rt_image_gallery', array( $this, 'radiantthemes_image_gallery_style_func' ) );
		}

		/**
		 * [radiantthemes_image_gallery_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_image_gallery_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'image_gallery_style_variation' => 'one',
					'image_gallery_url'             => '',
					'item_small_gallery'            => '4',
					'extra_class'                   => '',
					'extra_id'                      => '',
				),
				$atts
			);

			// ADD RADIANTTHEMES MAIN CSS.
			wp_register_style(
				'radiantthemes-addons-custom',
				plugins_url( 'radiantthemes-addons/assets/css/radiantthemes-addons-custom.css' ),
				array(),
				time()
			);
			wp_enqueue_style( 'radiantthemes-addons-custom' );

			$image_ids = explode( ',', $shortcode['image_gallery_url'] );

			$output = '<div class="rt-image-gallery element-' . $shortcode['image_gallery_style_variation'] . '" data-thumbnail-items="' . $shortcode['item_small_gallery'] . '">';
			
			if ( 'one' === $shortcode['image_gallery_style_variation'] ) {
				// START OF LAYOUT ONE.
				$output .= '<ul class="rt-image-gallery-holder owl-carousel">';
				foreach ( $image_ids as $img_id ) {
					$images  = wp_get_attachment_image_src( $img_id, 'full' );
					$output .= '<li><img src="' . $images[0] . '" alt="image-gallery"></li>';
				}
				$output .= '</ul>';
			} elseif ( 'two' === $shortcode['image_gallery_style_variation'] ) {
				// START OF LAYOUT TWO.
				$output .= '<ul class="rt-image-gallery-holder row">';
				foreach ( $image_ids as $img_id ) {
					$images_thumbnail = wp_get_attachment_image_src( $img_id, 'thumbnail' );
					$images_medium    = wp_get_attachment_image_src( $img_id, 'medium' );
					$images_large     = wp_get_attachment_image_src( $img_id, 'large' );
					$images_full      = wp_get_attachment_image_src( $img_id, 'full' );
					$output          .= '<li class="rt-image-gallery-item col-lg-4 col-md-4 col-sm-4 col-xs-4">';
						$output      .= '<div class="holder">';
							$output  .= '<a class="pic" data-fancybox="image-gallery" href="' . $images_full[0] . '" style="background-image:url(' . $images_large[0] . ');"></a>';
						$output      .= '</div>';
					$output          .= '</li>';
				}
				$output .= '</ul>';
			} elseif ( 'three' === $shortcode['image_gallery_style_variation'] ) {
				// START OF LAYOUT THREE.
				$output .= '<ul class="rt-image-gallery-holder row">';
				foreach ( $image_ids as $img_id ) {
					$images_thumbnail = wp_get_attachment_image_src( $img_id, 'thumbnail' );
					$images_medium    = wp_get_attachment_image_src( $img_id, 'medium' );
					$images_large     = wp_get_attachment_image_src( $img_id, 'large' );
					$images_full      = wp_get_attachment_image_src( $img_id, 'full' );
					$output          .= '<li class="rt-image-gallery-item col-lg-4 col-md-4 col-sm-4 col-xs-4">';
						$output      .= '<div class="holder">';
							$output  .= '<a class="pic" data-fancybox="image-gallery" href="' . $images_full[0] . '" style="background-image:url(' . $images_thumbnail[0] . ');"></a>';
						$output      .= '</div>';
					$output          .= '</li>';
				}
				$output .= '</ul>';
			} elseif ( 'four' === $shortcode['image_gallery_style_variation'] ) {
				// START OF LAYOUT FOUR.
				$output .= '<ul class="rt-image-gallery-holder row isotope">';
				$j       = 1;
				$k       = 1;
				
						
				foreach ( $image_ids as $img_id ) {
					if ( $j == 2 ) {
						$k = 0;

							$images_thumbnail = wp_get_attachment_image_src( $img_id, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $img_id, 'medium' );
							$images_large     = wp_get_attachment_image_src( $img_id, 'large' );
							$images_full      = wp_get_attachment_image_src( $img_id, 'full' );

							// SECOND LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-6 col-md-6 col-sm-6 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $images_large[0] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
							if ( '' !== get_the_title( $img_id ) ) {
								$output .= '<h4 class="title">' . get_the_title( $img_id ) . '</h4>';
							}
							if ( '' !== wp_get_attachment_caption( $img_id ) ) {
								$output .= '<h5 class="description">' . wp_get_attachment_caption( $img_id ) . '</h5>';
							}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';
						
					} elseif ( ! ( $k % 5 ) ) {

							$images_thumbnail = wp_get_attachment_image_src( $img_id, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $img_id, 'medium' );
							$images_large     = wp_get_attachment_image_src( $img_id, 'large' );
							$images_full      = wp_get_attachment_image_src( $img_id, 'full' );

							// SECOND LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-6 col-md-6 col-sm-6 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $images_large[0] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
							if ( '' !== get_the_title( $img_id ) ) {
								$output .= '<h4 class="title">' . get_the_title( $img_id ) . '</h4>';
							}
							if ( '' !== wp_get_attachment_caption( $img_id ) ) {
								$output .= '<h5 class="description">' . wp_get_attachment_caption( $img_id ) . '</h5>';
							}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';
						
					} else {

							$images_thumbnail = wp_get_attachment_image_src( $img_id, 'thumbnail' );
							$images_medium    = wp_get_attachment_image_src( $img_id, 'medium' );
							$images_large     = wp_get_attachment_image_src( $img_id, 'large' );
							$images_full      = wp_get_attachment_image_src( $img_id, 'full' );

							// FIRST LAYOUT.
							$output                 .= '<li class="rt-image-gallery-item col-lg-3 col-md-3 col-sm-3 col-xs-12">';
								$output             .= '<div class="holder">';
									$output         .= '<div class="pic">';
										$output     .= '<img src="' . $images_large[0] . '">';
									$output         .= '</div>';
									$output         .= '<div class="overlay"></div>';
									$output         .= '<div class="data">';
										$output     .= '<div class="table">';
											$output .= '<div class="table-cell">';
							if ( '' !== get_the_title( $img_id ) ) {
								$output .= '<h4 class="title">' . get_the_title( $img_id ) . '</h4>';
							}
							if ( '' !== wp_get_attachment_caption( $img_id ) ) {
								$output .= '<h5 class="description">' . wp_get_attachment_caption( $img_id ) . '</h5>';
							}
											$output .= '</div>';
										$output     .= '</div>';
									$output         .= '</div>';
									$output         .= '</div>';
									$output         .= '</li>';
						
					}
					$k++;
					$j++;
				}	
				//endwhile;

				$output .= '</ul>';
			}

			$output .= '</div>';
			return $output;
		}
	}
}
