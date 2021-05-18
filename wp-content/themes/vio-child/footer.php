<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vio
 */

?>

		</div>
		<!-- #content -->
	</div>
	<!-- #page -->

<?php
if ( ! class_exists( 'ReduxFrameworkPlugin' ) || ( is_404() ) || ( is_search() ) ) {
	get_template_part( 'inc/footer/footer-style', 'default' );
} else {
	$footerBuilder_id      = esc_html( get_post_meta( $post->ID, 'custom_footer', true ) );
	$custom_footer_post_id = $footerBuilder_id;
	if ( $footerBuilder_id && ( is_numeric( $footerBuilder_id ) ) ) {
		$footerBuilder_id = esc_html( get_post_meta( $post->ID, 'custom_footer', true ) );
		$getFooterPost    = get_post( $footerBuilder_id );
		echo '<!-- wraper_footer -->';
		if ( true == vio_global_var( 'footer_custom_stucking', '', false ) && ! wp_is_mobile() ) {
			echo '<div class="footer-custom-stucking-container"></div>
              <footer class="wraper_footer custom-footer footer-custom-stucking-mode">';
		} else {
			echo '<footer class="wraper_footer custom-footer">';
		}
		echo "<div class='container'>";
		$content = $getFooterPost->post_content;
		echo do_shortcode( $content );
		echo '</div>';
		echo '</footer>';
		echo '<!-- wraper_footer -->';
	} else {
		get_template_part( 'inc/footer/footer-style', 'default' );
	}
}
?>

</div>
<!-- radiantthemes-website-layout -->

<?php wp_footer(); ?>

<!-- custom js -->
<script type="text/javascript">
jQuery(document).ready(function($){
	setTimeout(function() { 
		<?php if(isset($_GET['use-cases'])) { ?>
    		$('span[data-vc-grid-filter-value=".vc_grid-term-62"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['cloud'])) { ?>
    		$('a[href="#cloud"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['self-hosted'])) { ?>
    		$('a[href="#self_hosted"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['aws'])) { ?>
    		$('a[href="#aws"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['azure'])) { ?>
    		$('a[href="#azure"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['open-source'])) { ?>
    		$('a[href="#open_source"]').trigger('click');
    	<?php } ?>
    	<?php if(isset($_GET['enterprise'])) { ?>
    		$('a[href="#enterprise"]').trigger('click');
    	<?php } ?>
    }, 400);
}
);
</script>

</body>
</html>
