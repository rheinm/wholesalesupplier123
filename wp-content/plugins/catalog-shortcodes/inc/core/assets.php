<?php

/**
 * Class for managing plugin assets
 */
class Ts_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'wp_head',                     array( __CLASS__, 'register' ) );
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		add_action( 'ts/generator/preview/before', array( __CLASS__, 'register' ) );
		add_action( 'ts/examples/preview/before',  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'wp_footer',                   array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'ts/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'ts/examples/preview/after',   array( __CLASS__, 'prnt' ) );
		// Custom CSS
		add_action( 'wp_footer',                   array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'ts/generator/preview/after',  array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'ts/examples/preview/after',   array( __CLASS__, 'custom_css' ), 99 );
		// RTL support
		add_action( 'ts/assets/custom_css/after',        array( __CLASS__, 'rtl_shortcodes' ) );
		// Custom TinyMCE CSS and JS
		// add_filter( 'mce_css',                     array( __CLASS__, 'mce_css' ) );
		// add_filter( 'mce_external_plugins',        array( __CLASS__, 'mce_js' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {
		$key = (function_exists('ot_get_option'))? ot_get_option( 'google_api_key', 'AIzaSyCN-MbF-tNeFjUL62lar8UsgI0eE47u1Ks' ) : 'AIzaSyCN-MbF-tNeFjUL62lar8UsgI0eE47u1Ks';
		// Chart.js
		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', TS_PLUGIN_FILE ), false, '0.2', true );
		// SimpleSlider
		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', TS_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', plugins_url( 'assets/css/simpleslider.css', TS_PLUGIN_FILE ), false, '1.0.0', 'all' );
		// Owl Carousel
		wp_register_script( 'owl-carousel', plugins_url( 'assets/js/owl-carousel.js', TS_PLUGIN_FILE ), array( 'jquery' ), '1.3.2', true );
		wp_register_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', TS_PLUGIN_FILE ), false, '1.3.2', 'all' );
		wp_register_style( 'owl-carousel-transitions', plugins_url( 'assets/css/owl-carousel-transitions.css', TS_PLUGIN_FILE ), false, '1.3.2', 'all' );
		// Font Awesome
		wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css', false, '4.4.0', 'all' );
		// Animate.css
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', TS_PLUGIN_FILE ), false, '3.1.1', 'all' );
		// InView
		wp_register_script( 'inview', plugins_url( 'assets/js/inview.js', TS_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// qTip
		wp_register_style( 'qtip', plugins_url( 'assets/css/qtip.css', TS_PLUGIN_FILE ), false, '2.1.1', 'all' );
		wp_register_script( 'qtip', plugins_url( 'assets/js/qtip.js', TS_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// jsRender
		wp_register_script( 'jsrender', plugins_url( 'assets/js/jsrender.js', TS_PLUGIN_FILE ), array( 'jquery' ), '1.0.0-beta', true );
		
		wp_register_script( 'mapapi', 'http://maps.google.com/maps/api/js?sensor=false&key='.$key, array( 'jquery' ), '1.0.0-beta', true );
		//wp_register_script( 'mapmarker', plugins_url( 'assets/js/jquery.mapmarker.js', TS_PLUGIN_FILE ), array( 'jquery', 'mapapi' ), '1.0.0-beta', true );
		
		// Magnific Popup
		wp_register_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', TS_PLUGIN_FILE ), false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.js', TS_PLUGIN_FILE ), array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'ts_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'catalog' ),
				'loading' => __( 'Loading...', 'catalog' ),
				'prev'    => __( 'Previous (Left arrow key)', 'catalog' ),
				'next'    => __( 'Next (Right arrow key)', 'catalog' ),
				'counter' => sprintf( __( '%s of %s', 'catalog' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'catalog' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );
		// Ace
		wp_register_script( 'ace', plugins_url( 'assets/js/ace/ace.js', TS_PLUGIN_FILE ), false, '1.1.3', true );
		// Swiper
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper.js', TS_PLUGIN_FILE ), array( 'jquery' ), '2.6.1', true );
		// jPlayer
		wp_register_script( 'jplayer', plugins_url( 'assets/js/jplayer.js', TS_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// Options page
		wp_register_style( 'ts-options-page', plugins_url( 'assets/css/options-page.css', TS_PLUGIN_FILE ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_script( 'ts-options-page', plugins_url( 'assets/js/options-page.js', TS_PLUGIN_FILE ), array( 'magnific-popup', 'jquery-ui-sortable', 'ace', 'jsrender' ), TS_PLUGIN_VERSION, true );
		wp_localize_script( 'ts-options-page', 'ts_options_page', array(
				'upload_title'  => __( 'Choose files', 'catalog' ),
				'upload_insert' => __( 'Add selected files', 'catalog' ),
				'not_clickable' => __( 'This button is not clickable', 'catalog' )
			) );
		// Cheatsheet
		wp_register_style( 'ts-cheatsheet', plugins_url( 'assets/css/cheatsheet.css', TS_PLUGIN_FILE ), false, TS_PLUGIN_VERSION, 'all' );
		// Generator
		wp_register_style( 'ts-generator', plugins_url( 'assets/css/generator.css', TS_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup' ), TS_PLUGIN_VERSION, 'all' );
		wp_register_script( 'ts-generator', plugins_url( 'assets/js/generator.js', TS_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup', 'qtip' ), TS_PLUGIN_VERSION, true );
		wp_localize_script( 'ts-generator', 'ts_generator', array(
				'upload_title'         => __( 'Choose file', 'catalog' ),
				'upload_insert'        => __( 'Insert', 'catalog' ),
				'isp_media_title'      => __( 'Select images', 'catalog' ),
				'isp_media_insert'     => __( 'Add selected images', 'catalog' ),
				'presets_prompt_msg'   => __( 'Please enter a name for new preset', 'catalog' ),
				'presets_prompt_value' => __( 'New preset', 'catalog' ),
				'last_used'            => __( 'Last used settings', 'catalog' ),
				'hotkey'               => get_option( 'ts_option_hotkey' )
			) );
		// Shortcodes stylesheets
		wp_register_style( 'ts-content-shortcodes', self::skin_url( 'content-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-box-shortcodes', self::skin_url( 'box-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-media-shortcodes', self::skin_url( 'media-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-other-shortcodes', self::skin_url( 'other-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-galleries-shortcodes', self::skin_url( 'galleries-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-players-shortcodes', self::skin_url( 'players-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		// RTL stylesheets
		wp_register_style( 'ts-rtl-shortcodes', self::skin_url( 'rtl-shortcodes.css' ), false, TS_PLUGIN_VERSION, 'all' );
		wp_register_style( 'ts-rtl-admin', self::skin_url( 'rtl-admin.css' ), false, TS_PLUGIN_VERSION, 'all' );
		// Shortcodes scripts
		wp_register_script( 'ts-galleries-shortcodes', plugins_url( 'assets/js/galleries-shortcodes.js', TS_PLUGIN_FILE ), array( 'jquery', 'swiper' ), TS_PLUGIN_VERSION, true );
		wp_register_script( 'ts-players-shortcodes', plugins_url( 'assets/js/players-shortcodes.js', TS_PLUGIN_FILE ), array( 'jquery', 'jplayer' ), TS_PLUGIN_VERSION, true );
		wp_register_script( 'bg-map', plugins_url( 'assets/js/bg-map.js', TS_PLUGIN_FILE ), array( 'jquery', 'mapapi' ), TS_PLUGIN_VERSION, true );
		wp_register_script( 'ts-other-shortcodes', plugins_url( 'assets/js/other-shortcodes.js', TS_PLUGIN_FILE ), array( 'jquery' ), TS_PLUGIN_VERSION, true );
		wp_localize_script( 'ts-other-shortcodes', 'ts_other_shortcodes', array( 'no_preview' => __( 'This shortcode doesn\'t work in live preview. Please insert it into editor and preview on the site.', 'catalog' ) ) );
		// Hook to deregister assets or add custom
		do_action( 'ts/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'ts/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'ts/assets/print', $assets );
	}

	/**
	 * Print custom CSS
	 */
	public static function custom_css() {
		// Get custom CSS and apply filters to it
		$custom_css = apply_filters( 'ts/assets/custom_css', str_replace( '&#039;', '\'', html_entity_decode( (string) get_option( 'ts_option_custom-css' ) ) ) );
		// Print CSS if exists
		if ( $custom_css ) echo "\n\n<!-- Catalog Shortcodes custom CSS - begin -->\n<style type='text/css'>\n" . stripslashes( str_replace( array( '%theme_url%', '%home_url%', '%plugin_url%' ), array( trailingslashit( get_stylesheet_directory_uri() ), trailingslashit( get_option( 'home' ) ), trailingslashit( plugins_url( '', TS_PLUGIN_FILE ) ) ), $custom_css ) ) . "\n</style>\n<!-- Catalog Shortcodes custom CSS - end -->\n\n";
		// Hook
		do_action( 'ts/assets/custom_css/after' );
	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= plugins_url( 'assets/css/tinymce.css', TS_PLUGIN_FILE );
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['catalogshortcodes'] = plugins_url( 'assets/js/tinymce.js', TS_PLUGIN_FILE );
		return $plugins;
	}

	/**
	 * RTL support for shortcodes
	 */
	public static function rtl_shortcodes( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		wp_print_styles( array( 'ts-rtl-shortcodes' ) );
	}

	/**
	 * RTL support for admin
	 */
	public static function rtl_admin( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		self::add( 'css', 'ts-rtl-admin' );
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}

	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'ts/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'ts/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = catalog_shortcodes();
		$skin = get_option( 'ts_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? plugins_url( 'assets/css/', TS_PLUGIN_FILE ) : $uploads . '/catalog-skins/' . $skin;
		return trailingslashit( apply_filters( 'ts/assets/skin', $url ) ) . $file;
	}
}

new Ts_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function ts_query_asset( $type, $handle ) {
	Ts_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function ts_skin_url( $file ) {
	return Ts_Assets::skin_url( $file );
}
