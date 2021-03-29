<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vio
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( vio_global_var( '404_error_style', '', false ) ) { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-<?php echo esc_attr( vio_global_var( '404_error_style', '', false ) ); ?>">
				<?php if ( 'one' === vio_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE ONE CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<!-- radiantthemes-counterup -->
									<div class="radiantthemes-counterup odometer" data-counterup-value="<?php echo esc_attr__( '404', 'vio' ); ?>"></div>
									<!-- radiantthemes-counterup -->
									<?php echo wp_kses_post( vio_global_var( '404_error_one_content', '', false ) ); ?>
									<?php if ( vio_global_var( '404_error_one_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( vio_global_var( '404_error_one_button_link', '', false ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html( vio_global_var( '404_error_one_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE ONE CONTENT -->
				<?php elseif ( 'two' === vio_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE TWO CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<img src="<?php echo esc_url( vio_global_var( '404_error_two_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( vio_global_var( '404_error_two_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( vio_global_var( '404_error_two_image', 'width', true ) ); ?>" height="<?php echo esc_attr( vio_global_var( '404_error_two_image', 'height', true ) ); ?>">
									<?php echo wp_kses_post( vio_global_var( '404_error_two_content', '', false ) ); ?>
									<?php if ( vio_global_var( '404_error_two_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( vio_global_var( '404_error_two_button_link', '', false ) ); ?>"><?php echo esc_html( vio_global_var( '404_error_two_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE TWO CONTENT -->
				<?php elseif ( 'three' === vio_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE THREE CONTENT -->
					<div class="container">
						<!-- error_main -->
						<div class="row error_main">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right text-center">
								<!-- error_main_item -->
								<div class="error_main_item">
									<img src="<?php echo esc_url( vio_global_var( '404_error_three_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( vio_global_var( '404_error_three_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( vio_global_var( '404_error_three_image', 'width', true ) ); ?>" height="<?php echo esc_attr( vio_global_var( '404_error_three_image', 'height', true ) ); ?>">
								</div>
								<!-- error_main_item -->
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left text-left">
								<!-- error_main_item -->
								<div class="error_main_item">
									<?php echo wp_kses_post( vio_global_var( '404_error_three_content', '', false ) ); ?>
									<?php if ( vio_global_var( '404_error_three_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( vio_global_var( '404_error_three_button_link', '', false ) ); ?>"><?php echo esc_html( vio_global_var( '404_error_three_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main_item -->
							</div>
						</div>
						<!-- error_main -->
					</div>
					<!-- END OF 404 STYLE THREE CONTENT -->
				<?php elseif ( 'four' === vio_global_var( '404_error_style', '', false ) ) : ?>
					<!-- START OF 404 STYLE FOUR CONTENT -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!-- error_main -->
								<div class="error_main">
									<img src="<?php echo esc_url( vio_global_var( '404_error_four_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( vio_global_var( '404_error_four_image', 'alt', true ) ); ?>" width="<?php echo esc_attr( vio_global_var( '404_error_four_image', 'width', true ) ); ?>" height="<?php echo esc_attr( vio_global_var( '404_error_four_image', 'height', true ) ); ?>">
									<?php echo wp_kses_post( vio_global_var( '404_error_four_content', '', false ) ); ?>
									<?php if ( vio_global_var( '404_error_four_button_link', '', false ) != '' ) { ?>
										<a class="btn" href="<?php echo esc_url( vio_global_var( '404_error_four_button_link', '', false ) ); ?>"><?php echo esc_html( vio_global_var( '404_error_four_button_text', '', false ) ); ?></a>
									<?php } ?>
								</div>
								<!-- error_main -->
							</div>
						</div>
						<!-- row -->
					</div>
					<!-- END OF 404 STYLE FOUR CONTENT -->
				<?php endif; ?>
			</div>
			<!-- wraper_error_main -->

		<?php } else { ?>

			<!-- wraper_error_main -->
			<div class="wraper_error_main style-one">
				<!-- START OF 404 STYLE ONE CONTENT -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- error_main -->
							<div class="error_main">
								<!-- radiantthemes-counterup -->
								<div class="radiantthemes-counterup odometer" data-counterup-value="<?php echo esc_attr__( '404', 'vio' ); ?>"></div>
								<!-- radiantthemes-counterup -->
								<h1><?php echo esc_html__( 'Opps! Page is not available', 'vio' ); ?></h1>
								<h2><?php echo esc_html__( 'We\'re not being able to find the page you\'re looking for', 'vio' ); ?></h2>
								<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="ti-arrow-left"></span> <?php echo esc_html__( 'Back To Home', 'vio' ); ?></a>
							</div>
							<!-- error_main -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
			</div>
			<!-- wraper_error_main -->

		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
