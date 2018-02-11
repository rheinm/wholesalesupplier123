<?php
/**
 * Enqueue scripts and styles for the front end.
 *
 */
function catalog_scripts() {
	// Add Lato font, used in the main stylesheet.
	$fonts_url = catalog_fonts_url();
	if ( ! empty( $fonts_url ) ){
		wp_enqueue_style( 'catalog-fonts', esc_url_raw( $fonts_url ), array(), null );
	}
	wp_enqueue_style( 'bootstrap', CATALOGTHEMEURI . 'css/bootstrap.css', array(), null );
	wp_enqueue_style( 'fontawesome', CATALOGTHEMEURI . 'css/font-awesome.min.css', array(), null );	
	wp_enqueue_style( 'catalog-select', CATALOGTHEMEURI . 'css/select.css', array(), null );
	wp_enqueue_style( 'prettyPhoto', CATALOGTHEMEURI . 'css/prettyPhoto.css', array(), null );
	wp_enqueue_style( 'flexslider', CATALOGTHEMEURI . 'css/flexslider.css', array(), null );
	wp_enqueue_style( 'animate', CATALOGTHEMEURI . 'css/animate.css', array(), null );
	wp_enqueue_style( 'catalog-bbpress', CATALOGTHEMEURI . 'css/bbpress.css', array(), null );
	wp_enqueue_style( 'catalog-custom', CATALOGTHEMEURI . 'css/custom.css', array(), null );
	wp_enqueue_style( 'catalog-slimmenu', CATALOGTHEMEURI . 'css/slimmenu.css', array(), null );
	wp_enqueue_style( 'catalog-styles', CATALOGTHEMEURI . 'css/styles.css', array(), null );

	// Load our main stylesheet.
	wp_enqueue_style( 'catalog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'catalog-responsive', CATALOGTHEMEURI . 'css/responsive.css', array( 'catalog-style' ), null );


	//scripts
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	// Adds JavaScript.
	wp_enqueue_script( 'bootstrap', CATALOGTHEMEURI . 'js/bootstrap.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'timer', CATALOGTHEMEURI . 'js/timer.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'flexslider', CATALOGTHEMEURI . 'js/flexslider.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'validate', CATALOGTHEMEURI . 'js/validate-min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'fitvid', CATALOGTHEMEURI . 'js/jquery.fitvid.js', array( 'jquery' ), '', true );	
	wp_enqueue_script( 'jquery.easing.min', CATALOGTHEMEURI . 'js/jquery.easing.min.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'catalog-jquery.slimmenu.min', CATALOGTHEMEURI . 'js/jquery.slimmenu.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.appear', CATALOGTHEMEURI . 'js/jquery.appear.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'catalog-modernizr.custom.26633', CATALOGTHEMEURI . 'js/modernizr.custom.26633.js', array( 'jquery' ), '1.0', true );
	
	$header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on';
    if($header_slide_menu != 'off'){
		wp_enqueue_script( 'catalog-pushmenu', CATALOGTHEMEURI . 'js/pushmenu.js', array( 'jquery' ), '1.0', true );
	}
	wp_enqueue_script( 'catalog-custom', CATALOGTHEMEURI . 'js/custom.js', array( 'jquery' ), '', true );
	$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
	if($background_option_style == 'photo_stock'){
	wp_enqueue_script( 'jquery.gridrotator', CATALOGTHEMEURI . 'js/jquery.gridrotator.js', array( 'jquery' ), '1.0', true );
	}
	wp_enqueue_script( 'catalog-scripts', CATALOGTHEMEURI . 'js/scripts.js', array( 'jquery' ), '', true );
	
	wp_localize_script( 'catalog-scripts', 'catalog', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'CATALOGTHEMEURI' => CATALOGTHEMEURI));
	
}
add_action( 'wp_enqueue_scripts', 'catalog_scripts' );

function catalog_styles_custom() {
	wp_enqueue_style('catalog-custom-style', CATALOGTHEMEURI . 'css/custom_style.css');
    $custom_css = (function_exists('ot_get_option'))? ot_get_option('custom_css') : '';
    wp_add_inline_style( 'catalog-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'catalog_styles_custom' );

function catalog_styles_custom_banner() {
	wp_enqueue_style('catalog-custom-banner-style', CATALOGTHEMEURI . 'css/custom_style_banner.css');
	$custom_css = '';
	$banner_image = CATALOGTHEMEURI. 'images/bg.jpg';
	if(is_page()){
		if(has_post_thumbnail()){
		$banner_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		}
	} elseif(is_singular('post')) {
		if(has_post_thumbnail()){
		$banner_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		}
	} else {
		$banner_image = (function_exists('ot_get_option'))? ot_get_option('blog_banner', CATALOGTHEMEURI. 'images/bg.jpg') : CATALOGTHEMEURI. 'images/bg.jpg';
	}

	if(class_exists( 'woocommerce' )){
		if(is_woocommerce()){
			$banner_image = (function_exists('ot_get_option'))? ot_get_option('shop_archive_banner', CATALOGTHEMEURI. 'images/bg.jpg') : CATALOGTHEMEURI. 'images/bg.jpg';
		}
		if(is_product()){
			if(has_post_thumbnail()){
			$banner_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
			}
		}
	}
	
	if(class_exists( 'bbPress' )){
		if(is_bbpress()){	
			$banner_image = (function_exists('ot_get_option'))? ot_get_option('forum_archive_banner', CATALOGTHEMEURI. 'images/bg.jpg') : CATALOGTHEMEURI. 'images/bg.jpg';
		}
	}
	
	if($banner_image != ''){
    $custom_css .= ".background-overlay {
        background: url(".esc_url($banner_image).") repeat-x scroll center top;
    }";    
    }
	$custom_css .= catalog_custom_css_from_theme_options();
    wp_add_inline_style( 'catalog-custom-banner-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'catalog_styles_custom_banner' );

function catalog_custom_enqueue_script() {
   wp_enqueue_script( 'catalog-custom-script', CATALOGTHEMEURI . 'js/custom_script.js', array(), '1.0' );
   $background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
   if($background_option_style == 'photo_stock'){
   wp_enqueue_script( 'catalog-custom-script2', CATALOGTHEMEURI . 'js/custom_script_2.js', array(), '1.0' );
   }
}
add_action( 'wp_enqueue_scripts', 'catalog_custom_enqueue_script' );
?>