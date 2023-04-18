<?php
/*
 * Template Name: Success Partners
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


	


get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php 
		
		/*
		 * This is what happens when astra_archive_header() is called.
		 * The function that fills that info is in inc/core/common-functions.php, line 923.
		 * On category archive pages, the breadcrumbs happen, then the title is called,
		 * then whatever happens after is called, then the description is called,
		 * then whatever happens after the description is called.
		 * 
		 * */
		

		
		?>
		
		
		
		<section class="ctg-archive-header">
					<?php do_action( 'astra_before_archive_title' ); ?>
					<h1 class="page-title ast-archive-title bree" style="text-align:center;"><?php echo single_cat_title(); ?></h1>
					<?php do_action( 'astra_after_archive_title' ); ?>
					<?php echo wp_kses_post( wpautop( get_the_archive_description() ) ); ?>
					<?php do_action( 'astra_after_archive_description' ); ?>
		</section>

		<?php astra_content_loop(); ?>

		<?php astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>


	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif;

?>

<?php get_footer(); 