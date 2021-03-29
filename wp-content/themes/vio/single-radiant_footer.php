<?php
/**
 * The template for displaying Custom footer
 *
 * @package vio
 */

get_header();
?>
<div id="main-content" class="main-content">
	<div class="block-content">
		<div class="container">
			<div class="panel row">
				<div class="col-xs-12">
					<p><?php esc_html_e( 'This is test text for testing footer template.', 'vio' ); ?></p>
				</div>
			</div>
		</div><!-- .container -->
	</div><!-- .block-content -->
</div><!-- #main-content -->

<?php
get_footer( 'custom-footer' );
