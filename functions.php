<?php
/**
	 * CTG Theme functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package CTG
	 * @since 1.0.0
	 */

if ( preg_match("/\/locations/", $_SERVER['REQUEST_URI'] ) && !preg_match("/category/", $_SERVER['REQUEST_URI'] ) ) {
	$redirect_url = home_url('category/locations', 'https');
	header("Location:{$redirect_url}", 301 );
	die();
}


function ctg_add_info_to_page() {

	if ( current_user_can('administrator') && is_front_page() ) {

	}

}
add_action( 'wp_enqueue_scripts', 'ctg_add_info_to_page' );
/*
	 * Define Constants
	 * 
	 * */

define( 'CHILD_THEME_CTG_VERSION', '2.4.5' );
define('CTG_THEME_URI', trailingslashit( esc_url( get_stylesheet_directory_uri() ) ) );
define('CTG_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );



/*
	 * Register add-ons
	 * 
	 * */

//include_once get_stylesheet_directory() . '/inc/Virtual_JSON_LD.php';

require_once CTG_THEME_DIR . 'inc/ctg-links.php';

/*
	 * Enqueue styles
	 * 
	 * */

function ctg_styles() {

	wp_enqueue_style( 'ctg-theme-css', CTG_THEME_URI . 'style.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );

	if ( is_single('crypto') ) {
		wp_enqueue_style( 'ctg-crypto-css', CTG_THEME_URI . 'assets/css/ctg-crypto.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );
	}

	wp_enqueue_style( 'ctg-general-css', CTG_THEME_URI . 'assets/css/ctg-general.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );

	wp_enqueue_style( 'ctg-events-css', CTG_THEME_URI . 'assets/css/ctg-events.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );

	if (is_page ('reviews') ) {
		wp_enqueue_style( 'ctg-reviews-css', CTG_THEME_URI . 'assets/css/ctg-reviews.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );	
	}

	if ( is_page('amanda') ) {
		wp_enqueue_style( 'ctg-amanda-css', CTG_THEME_URI . 'assets/css/amanda-links.css', array('astra-theme-css'), CHILD_THEME_CTG_VERSION, 'all' );

	}

	if ( ctg_core_check_post_subcategories( $ctg_parent_category = get_term_by( 'slug', 'locations', 'category','ARRAY_N' ) ) ) {
		wp_enqueue_style( 'ctg-locations-pages', CTG_THEME_URI . 'assets/css/ctg-locations-pages.css', array(), CHILD_THEME_CTG_VERSION, 'all' );
	}

	if ( is_page_template ('single-linkpage.php') || is_category ('Success Partners') )	{
		wp_enqueue_style( 'ctg-link-pages-css', CTG_THEME_URI . 'assets/css/ctg-link-pages.css', array(), CHILD_THEME_CTG_VERSION, 'all' );
	}

	if ( is_archive () && is_category('Success Partners') )	{
		wp_enqueue_style( 'ctg-archives-css', CTG_THEME_URI . 'assets/css/ctg-archives.css', array(), CHILD_THEME_CTG_VERSION, 'all' );
	}

	if ( ctg_locations_is_locations_category() && !ctg_locations_is_hq() ) {
		wp_enqueue_style( 'ctg-franchise-locations-css', CTG_THEME_URI . 'assets/css/ctg-franchise-locations.css', array(), CHILD_THEME_CTG_VERSION, 'all' );
	}

}

function ctg_admin () {
	wp_enqueue_style( 'ctg-admin-css', CTG_THEME_URI . 'assets/css/ctg-admin.css', CHILD_THEME_CTG_VERSION, 'all' );
}

function ctg_scripts() {
	wp_enqueue_script('ctg-links', CTG_THEME_URI . 'assets/js/vcf-download.js', array('jquery','jquery-ui-core'),true);

	if ( ctg_locations_is_locations_category() && !ctg_locations_is_hq() ) {
		wp_enqueue_script( 'ctg-franchise-locations-js', CTG_THEME_URI . 'assets/js/ctg-franchise-locations.js', array('jquery'), true );
	}

}


function koopid_integration() {	
	echo '<script type="application/javascript" src="https://app.koopid.ai/static/common/js/koopid-embed.min.js"></script>
		<link rel="stylesheet" href="https://app.koopid.ai/static/common/css/koopid.css" />
		<script type="text/javascript">
				kpde.server = "https://app.koopid.ai";
		</script>';
	add_filter(
		'astra_schema_body',
		function( $attr ) {
			$attr .= ' data-kpdprovemail="info@celebrationtitlegroup.com" ';

			return $attr;
		}
	);
}

function koopid_footer() {

	if ( ! ctg_check_post_subcategories( $ctg_parent_category = get_term_by( 'slug', 'locations', 'category','ARRAY_N' ) ) ) {
		echo '<div class="koopid-container">
		<div class="koopid-callout">Need Help? Ask Gail!</div>
		<svg id="kpd_koopidtag" data-kpdprovemail="info@celebrationtitlegroup.com" data-kpdguest="true" data-kpdembedded="true" data-kpdtag="Welcome_102205" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 783.05 783.05"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle cx="391.53" cy="391.53" r="391.53"/><path d="M631.57,337.64s-228.41,92.52-331.32,205.8c-4.28,4.7,1.9,11.65,7.1,8,44.76-31.35,140.53-88.84,326.51-165.53,13.28-5.48,24-16.91,26.44-31.06C662.33,343.18,657.8,332.73,631.57,337.64Z" /><path d="M231.42,421.76c1.18-2.17,7.61-79.81-5.8-68.9C212.8,363.3,230,424.36,231.42,421.76Z" /><path d="M418.4,222.89c-1.35-13.82-15.22-31-29.74-5.92-16.88,29.21-74.79,114.56-112.2,300.62-1.34,6.65,4.38,11.29,6.44,4.83,17.79-55.66,62.92-142.66,127.31-262.12C416.36,248.87,419.66,235.8,418.4,222.89Z" /><path d="M252.22,247.59c-15,62.53-2.05,218.9,5.36,274.07a2.07,2.07,0,0,0,4.11,0c5.14-50,20.64-205.45,21.21-263.95C283.11,236.11,262.46,205,252.22,247.59Z" /><path d="M176.93,354.91c-8-10.32-38.9-18.38-23.23,19.26,0,0,58.07,103.19,84.17,170.3a2,2,0,0,0,3.88-1.08C232.19,492.78,201.33,386.38,176.93,354.91Z" /><path d="M145.61,429.65c-4.78-5.15-10.12-8.12-15-7.78-5.64.38-12.34,5.61-5.24,20.2,7.57,15.57,66.35,62.46,96.87,109.58,1.32,2,2.8,0,1.73-2.43C211.75,522.21,186.29,473.51,145.61,429.65Z" /><path d="M310.53,509.69c30.78-40.1,122.23-141.06,162.23-179.08,15.64-14.87,3.43-45.28-20.09-20.7-76.19,79.65-111.35,139.9-149.18,196.92C298.23,514.76,305.16,516.68,310.53,509.69Z" /><path d="M556.79,561.23c-8-18.48-34.19-19.15-51.1-21.16a472.31,472.31,0,0,0-138.56,4.08c-19.72,3.52-40.16,9.33-57.08,17.22-4.36,2-1.35,4.91,3.12,4.66,1.14-.06,24.43-8.3,53-8.59,33.23-.35,65-.24,97.28,7.57,12.75,3.08,99.77,30.11,94.25-.77A12.57,12.57,0,0,0,556.79,561.23Z" /></g></g></svg>
		<img src="" ></div>';
	}
}


function include_vcf_mimes( $mime_types = array () ){
	$mime_types['vcf'] = 'text/vcard';
	$mime_types['vcard'] = 'text/vcard';
	return $mime_types;
}

function include_svg_mimes( $mime_types = array () ){
	$mime_types['svg'] = 'image/svg+xml';
	return $mime_types;
}

function ctg_links_body_classes ( $classes ) {
	if ( is_page_template('linkpage') ) {
		$classes[] = 'hide-header-and-footer';
		return $classes;
	}
}

function ctg_seo() {
	echo '<script type="application/ld+json">
		{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://celebrationtitlegroup.com/#organization","name":"Celebration Title Group","url":"https://celebrationtitlegroup.com/","sameAs":["https://facebook.com/celebrationtitlegroup","https://instagram.com/celebrationtitlegroup","https://www.linkedin.com/company/celebration-title-group/"],"logo":{"@type":"ImageObject","@id":"https://celebrationtitlegroup.com/#logo","inLanguage":"en-US","url":"https://celebrationtitlegroup.com/wp-content/uploads/2021/03/Asset-96.png","contentUrl":"https://celebrationtitlegroup.com/wp-content/uploads/2021/03/Asset-96.png","width":1500,"height":465,"caption":"Celebration Title Group"},"image":{"@id":"https://celebrationtitlegroup.com/#logo"}},{"@type":"WebSite","@id":"https://celebrationtitlegroup.com/#website","url":"https://celebrationtitlegroup.com/","name":"Celebration Title Group","description":"Celebrate with us!","publisher":{"@id":"https://celebrationtitlegroup.com/#organization"},"potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://celebrationtitlegroup.com/?s={search_term_string}"},"query-input":"required name=search_term_string"}],"inLanguage":"en-US"},{"@type":"ImageObject","@id":"https://celebrationtitlegroup.com/#primaryimage","inLanguage":"en-US","url":"https://celebrationtitlegroup.com/wp-content/uploads/2021/03/favcon.png","contentUrl":"https://celebrationtitlegroup.com/wp-content/uploads/2021/03/favcon.png","width":512,"height":512},{"@type":"WebPage","@id":"https://celebrationtitlegroup.com/#webpage","url":"https://celebrationtitlegroup.com/","name":"Home - Celebration Title Group","isPartOf":{"@id":"https://celebrationtitlegroup.com/#website"},"about":{"@id":"https://celebrationtitlegroup.com/#organization"},"primaryImageOfPage":{"@id":"https://celebrationtitlegroup.com/#primaryimage"},"datePublished":"2021-03-18T13:36:54+00:00","dateModified":"2022-03-30T14:58:46+00:00","breadcrumb":{"@id":"https://celebrationtitlegroup.com/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://celebrationtitlegroup.com/"]}]},{"@type":"BreadcrumbList","@id":"https://celebrationtitlegroup.com/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Home"}]}]}</script>';
}

function ctg_pixel_verification() {
	$pixel_key = get_option('ctg_pixel_verification_key', true);

	echo isset( $pixel_key ) ? "<meta name='facebook-domain-verification' content='{$pixel_key}'>" : "";

}


function ctg_check_file_download_query() {
	if ( !is_page( 'agent-resources' ) ) {
		return;
	} else if ( ! isset( $_GET['ctg_download_file_attachment'] ) ) {
		return;
	} else {

		if ( $_GET['ctg_download_file_attachment'] == 'hometown_heroes_occupation_file_download' ) {

			$upload_dir = wp_upload_dir( '2022/07', false );
			$filename = 'CTG-Hometown-Heroes-Info.pdf';
			$file = trailingslashit( $upload_dir['url'] ) . $filename;

			header("Content-Type: application/pdf");
			header("Content-Disposition: attachment; filename={$filename}", true, 200 );
			readfile($file);

		}

	} 
}

function ctg_tradeshow_registration() {
	if ( ! is_page('check-in') ) {
		return;
	}
	wp_enqueue_script( 'ctg-check-in', 'https://form.jotform.com/jsform/222344736601148', array(), true );

}

function ctg_exclude_locations_from_blog_page( $query ) {

	if ( $query->is_home() ) {
		$success_partners = get_category_by_slug('success-partners');
		$locations = get_category_by_slug('locations');
		$locations_children = get_term_children( $locations->term_id, 'category' );
		$all_category_ids = array_merge( array( $locations->term_id, $success_partners->term_id ), $locations_children );
		$query->set( 'category__not_in', $all_category_ids );
	}
}
add_action( 'pre_get_posts', 'ctg_exclude_locations_from_blog_page' );

add_action( 'wp_enqueue_scripts', 'ctg_tradeshow_registration' );
add_action( 'wp', 'ctg_check_file_download_query' );

add_filter( 'body_class', 'ctg_links_body_classes' );
add_filter( 'upload_mimes', 'include_vcf_mimes' );
add_filter( 'upload_mimes', 'include_svg_mimes' );
add_action( 'wp_enqueue_scripts', 'ctg_scripts' );
add_action( 'admin_enqueue_scripts', 'ctg_admin' );

add_action( 'wp_head', 'ctg_seo' );
add_action( 'wp_head', 'ctg_pixel_verification' );
add_action( 'wp_enqueue_scripts', 'ctg_styles' );