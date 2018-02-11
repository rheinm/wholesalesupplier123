<?php
function catalog_header_options( $options = array() ){
	$social_array = array(						
	array(
	  'title' => esc_html__( 'Facebook', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-facebook'
	  ),
	array(
	  'title' => esc_html__( 'Twitter', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-twitter'
	  ),
	  array(
	  'title' => esc_html__( 'Google+', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-google-plus'
	  ),
	  array(
	  'title' => esc_html__( 'Dribbble', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-dribbble'
	  ),
	  array(
	  'title' => esc_html__( 'Behance', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-behance'
	  ),
	   array(
	  'title' => esc_html__( 'Pinterest', 'catalog' ),
	  'link'  => '#',
	  'icon'  => 'fa-pinterest'
	  ),						
	);
	$options = array(
		array(
        'id'          => 'header_sticky_menu',
        'label'       => esc_html__( 'Header Sticky Menu', 'catalog' ),
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'header_social_icons',
        'label'       => esc_html__( 'Header Social Icons', 'catalog' ),
        'desc'        => '',
        'std'         => $social_array,
        'type'        => 'list-item',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'link',
            'label'       => esc_html__( 'Link', 'catalog' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'icon',
            'label'       => esc_html__( 'Icon', 'catalog' ),
            'desc'        => esc_html__('exemple: fa-facebook', 'catalog'),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => ''
          ),
        ),
      ),
	  array(
        'id'          => 'header_slide_menu',
        'label'       => esc_html__( 'Left Slide Area', 'catalog' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	
	);
	return apply_filters( 'catalog_header_options', $options );
} 
?>