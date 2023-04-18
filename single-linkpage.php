<?php
/*
 * Template Name: CTG Links
 * Template Post Type: linkpage, page, post
 *
 * This is the one true structure for the CTG Link page layout.
 * It is used to display a link page when nothing more specific matches a query.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
if ( astra_page_layout() == 'left-sidebar' ) :
	get_sidebar();
endif 
?>

	<div id="primary" <?php astra_primary_class(); ?>>
		<?php 
		astra_primary_content_top();
		astra_single_header_before(); 
		?>

		<main id="main" class="site-main">
		<?php 
		if ( have_posts() ) :
			do_action( 'astra_template_parts_content_top' );
			while ( have_posts() ) :
				the_post();
			astra_entry_top();

/*
 * this is what do_action('astra-template-parts-content) triggers:
 * the action itself is in template-parts.php, the function it triggers
 * is astra_entry_content_single_template, which pulls up
 * the file at template-parts/single/single-layout.php
 * 
 * this is that pile of garbage
 */

?>

<div class="ctg-links-post-container">

	<?php astra_single_header_before(); ?>

	<header class="entry-header <?php astra_entry_header_class(); ?>">

		<?php astra_single_header_top(); ?>

		
		<?php 
			if ( has_post_thumbnail() )
				{astra_blog_post_thumbnail_and_title_order();} 
		?>
		
		<div class="ctg-links-bio-wrapper">
			<h3 class="ctg-links-full-name">
				<?php echo $post->ctg_links_fname . ' ' . $post->ctg_links_lname; ?>
			</h3>
			<h4 class="ctg-links-title">
				<?php echo $post->ctg_links_title; ?>
			</h4>

		</div>
		

		<?php astra_single_header_bottom(); ?>

	</header><!-- .entry-header -->

	<?php astra_single_header_after(); ?>

	<div class="entry-content clear" 
	<?php
				echo astra_attr(
					'article-entry-content-single-layout',
					array(
						'class' => '',
					)
				);
				?> >

		<?php astra_entry_content_before(); ?>

		<div class="ctg-links-module-container">
			
			
			<div class="ctg-links-module-section">
				<div class="ctg-links-module-title">
					<h5>
						Celebrate with Me!
					</h5>
				</div>
			</div>
			<div class="ctg-links-module-section">
				
			<?php if ( ! str_contains ( $_SERVER['HTTP_USER_AGENT'], 'Instagram' ) && !empty( $post->ctg_links_vcf )) { ?>
				<?php
				if ( ! empty ( $post->ctg_links_fb ) ) { ?>
				<div class="ctg-links-list">
					<a href="<?php 
						if ( ! preg_match ("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $post->ctg_links_fb ) ) {
							echo esc_url( 'https://' . $post->ctg_links_fb, 'https' );
						} else {
							echo esc_url ( $post->ctg_links_fb, 'https' );
						}
							 ?>" target="_blank">Facebook</a>	
				</div>	
				<?php
				}
				if ( ! empty ( $post->ctg_links_insta ) ) { ?>
				<div class="ctg-links-list">
					<a href="<?php 
							 if ( ! preg_match ("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $post->ctg_links_insta ) ) {
							echo esc_url( 'https://' . $post->ctg_links_insta, 'https' );
						} else {
							echo esc_url ( $post->ctg_links_insta, 'https' );
						} ?>" target="_blank">Instagram</a>	
				</div>
				<?php 
				}
				if ( ! empty ( $post->ctg_links_vcf ) ) { ?>
				<div class="ctg-links-list">
					<a href="<?php echo $post->ctg_links_vcf['url']; ?>" target="_blank" download>Add to Contacts</a>
				</div>
				<?php 
				}
			} else { 
	
				if ( ! empty ( $post->ctg_links_fb ) ) { ?>
				<div class="ctg-links-list">
					<a href="<?php
						if ( ! preg_match ("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $post->ctg_links_fb ) ) {
							echo esc_url( 'https://' . $post->ctg_links_fb, 'https' );
						} else {
							echo esc_url ( $post->ctg_links_fb, 'https' );
						} ?>" target="_blank">Facebook</a>
				</div>
				<?php
				}
				if ( ! empty ( $post->ctg_links_insta ) ) { ?>
				<div class="ctg-links-list">
					<a href="<?php	
						if ( ! preg_match ("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $post->ctg_links_insta ) ) {
							echo esc_url( 'https://' . $post->ctg_links_insta, 'https' );
						} else {
							echo esc_url ( $post->ctg_links_insta, 'https' );
						}
							 ?>" target="_blank">Instagram</a>	
				</div>
				<?php
				}
				if ( ! empty ( $post->ctg_links_email ) ) {	?>	
				<div class="ctg-links-list">
					<a href="mailto:<?php echo $post->ctg_links_email; ?>" target="_blank">Email Me</a>	
				</div>
				<?php 
				}
				if ( ! empty ( $post->ctg_links_tel ) ) { ?>
				<div class="ctg-links-list">
					<a href="tel:<?php echo $post->ctg_links_tel; ?>" target="_blank">Call Me</a>	
				</div>
				<?php
				}
				if ( ! empty ( $post->ctg_links_sms ) ) { ?>
				<div class="ctg-links-list">
					<a href="sms:<?php echo $post->ctg_links_sms; ?>" target="_blank">Text Me</a>	
				</div>
				<?php
				}
			} ?>
			
				<div class="ctg-links-list">
					<a href="https://celebrationtitlegroup.com/locations" target="_blank">CTG Locations</a>	
				</div>
				<div class="ctg-links-list">
					<a href="https://celebrationtitlegroup.com/events" target="_blank">CTG Events</a>	
				</div>
				<div class="ctg-links-list">
					<a href="https://celebrationtitlegroup.titlecapture.com/login" target="_blank">Net Sheets App</a>
				</div>
				<div class="ctg-links-list">
					<a href="https://celebrateuonline.com/" target="_blank">Celebrate U</a>
				</div>
				<div class="ctg-links-list">
					<a href="https://celebrationtitlegroup.com/" target="_blank">CTG Home</a>
				</div>
			</div>
			
			<div class="ctg-links-module-section">
				<div class="ctg-links-handle">Follow me on social media: <?php
					preg_match('/[a-zA-Z0-9]+/', $post->ctg_links_handle, $matches );
					echo '@' . $matches[0];
				?>
				</div>
			</div>
		</div>
		<?php 
		
		
		
		the_content(); ?>

		<?php
		
			astra_edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'astra' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>

		<?php astra_entry_content_after(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>
	</div><!-- .entry-content .clear -->
</div>

			<?php
				endwhile;
					do_action( 'astra_template_parts_content_bottom' );
			else :
				do_action( 'astra_template_parts_content_none' );
			endif; 
					?>
			</main><!-- #main -->
	</div><!-- .primary  -->
<?php

		astra_pagination();

		astra_primary_content_bottom(); 
		?>
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();