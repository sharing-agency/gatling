<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vio
 */

get_header();
?>

<?php if ( ! empty( vio_global_var( 'blog_single_layout_style', '', false ) ) ) : ?>
	<?php get_template_part( 'inc/single/single', vio_global_var( 'blog_single_layout_style', '', false ) ); ?>
<?php else : ?>
	<?php get_template_part( 'inc/single/single', 'default' ); ?>
<?php endif; ?>

<?php
get_footer();
