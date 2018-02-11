<?php
//include theme options
include CATALOGTHEMEDIR . '/admin/theme-options/general.php';
include CATALOGTHEMEDIR . '/admin/theme-options/background.php';
include CATALOGTHEMEDIR . '/admin/theme-options/header.php';
include CATALOGTHEMEDIR . '/admin/theme-options/sidebar.php';
include CATALOGTHEMEDIR . '/admin/theme-options/footer.php';
include CATALOGTHEMEDIR . '/admin/theme-options/blog.php';
include CATALOGTHEMEDIR . '/admin/theme-options/woocommerce.php';
include CATALOGTHEMEDIR . '/admin/theme-options/forums.php';
include CATALOGTHEMEDIR . '/admin/theme-options/styling.php';
include CATALOGTHEMEDIR . '/admin/theme-options/customcss.php';
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'catalog_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function catalog_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  //available option functions - return type array()
  $general_options = catalog_general_options();
  $background_options = catalog_background_options();
  $header_options = catalog_header_options();
  $sidebar_options = catalog_sidebar_options();
  $footer_options = catalog_footer_options();
  $blog_options = catalog_blog_options();
  $woocommerce_options = catalog_woocommerce_options();
  $forum_options = catalog_forums_options();
  $styling_options = catalog_styling_options();
  $custom_css = catalog_custom_css();

  //merge all available options
  $settings = array_merge( $general_options, $background_options, $header_options, $sidebar_options, $footer_options, $blog_options, $woocommerce_options, $forum_options, $styling_options, $custom_css ); 

  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => esc_html__( 'General Options', 'catalog' )
      ),
      array(
        'id'          => 'background_options',
        'title'       => esc_html__( 'Background Options', 'catalog' )
      ),
     array(
        'id'          => 'header_options',
        'title'       => esc_html__( 'Header Options', 'catalog' )
      ),
      array(
        'id'          => 'footer_options',
        'title'       => esc_html__( 'Footer Options', 'catalog' )
      ),
      array(
        'id'          => 'sidebar_option',
        'title'       => esc_html__( 'Sidebar Options', 'catalog' )
      ),
      array(
        'id'          => 'blog_options',
        'title'       => esc_html__( 'Blog Options', 'catalog' )
      ),
	  array(
        'id'          => 'woocommerce_options',
        'title'       => esc_html__( 'Woocommerce Options', 'catalog' )
      ),
	  array(
        'id'          => 'forums_options',
        'title'       => esc_html__( 'Forums Options', 'catalog' )
      ),
      array(
        'id'          => 'styling_options',
        'title'       => esc_html__( 'Styling Options', 'catalog' )
      ),
      array(
        'id'          => 'custom_css',
        'title'       => esc_html__( 'Custom CSS', 'catalog' )
      )
    ),
    'settings'        => $settings
  );

  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

  return $custom_settings[ 'settings' ];
  
}