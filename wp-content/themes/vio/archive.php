<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vio
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( ! empty( vio_global_var( 'blog-style', '', false ) ) ) { ?>
			<?php get_template_part( 'inc/blog/blog', vio_global_var( 'blog-style', '', false ) ); ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/blog/blog', 'default' ); ?>
		<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
