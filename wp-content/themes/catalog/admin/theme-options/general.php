<?php
function catalog_general_options( $options = array() ){
	
	$options = array(
	  array(
        'id'          => 'main_logo',
        'label'       => esc_html__( 'Header Logo', 'catalog' ),
        'desc'        => esc_html__( 'Header logo', 'catalog' ),
        'std'         => CATALOGTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'admin_logo',
        'label'       => esc_html__( 'Admin Logo', 'catalog' ),
        'desc'        => esc_html__( 'Admin login logo', 'catalog' ),
        'std'         => CATALOGTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'show_breadcrumbs',
        'label'       => esc_html__( 'Display Breadcrumbs', 'catalog' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'bredcrumb_menu_prefix',
        'label'       => esc_html__( 'Breadcrumb Prefix', 'catalog' ),
        'desc'        => esc_html__( 'Breadcrumb prefix', 'catalog' ),
        'std'         => 'Home',
        'type'        => 'text',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'show_breadcrumbs:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'google_api_key',
        'label'       => esc_html__( 'Google API Key', 'catalog' ),
        'desc'        => esc_html__( 'Google API key for google map', 'catalog' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	);

	return apply_filters( 'catalog_general_options', $options );
}
?>