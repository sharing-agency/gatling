<?php
/**
 * Template for Blog Three
 *
 * @package vio
 */

?>
<!-- wraper_blog_main -->
<section class="vc_section section_banner_category">
	<div class="vc_row wpb_row vc_row-fluid row_banner_category">
		<div class="wpb_column vc_column_container vc_col-sm-6">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					<div class="wpb_text_column wpb_content_element ">
						<div class="wpb_wrapper">
							<h1><?php echo single_cat_title( '', false ) ?> - Archives</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wpb_column vc_column_container vc_col-sm-6">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					
				</div>
			</div>
		</div>
	</div>
</section>

<div class="wraper_blog_main style-three wraper_blog_list">
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php if ( 'nosidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php } else { ?>
				<?php if ( 'leftsidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-right">
				<?php } elseif ( 'rightsidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
				<?php } else { ?>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<?php } ?>
			<?php } ?>
					<!-- blog_main -->
					<div class="blog_main">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content-three', get_post_format() );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
						<?php vio_pagination(); ?>
					</div>
					<!-- blog_main -->
				</div>
				<?php if ( 'nosidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
				<?php } else { ?>
					<?php if ( 'leftsidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left">
					<?php } elseif ( 'rightsidebar' === vio_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
					<?php } else { ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php } ?>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_blog_main -->
