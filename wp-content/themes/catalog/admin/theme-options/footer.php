<?php
function catalog_footer_options( $options = array() ){
	$options = array(
	  array(
        'id'          => 'footer_home_widget',
        'label'       => esc_html__( 'Footer Home Widget Area', 'catalog' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_widget_area',
        'label'       => esc_html__( 'Footer widget area', 'catalog' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_widget_box',
        'label'       => esc_html__( 'Footer widget box', 'catalog' ),
        'desc'        => '',
        'std'         => '3',
        'type'        => 'numeric-slider',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,4,1',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copyright_text',
        'label'       => esc_html__( 'Copyright Text', 'catalog' ),
        'desc'        => '',
        'std'         => '&copy; Catalog INC. All Rights Reserverd. <br/>Developed by <a class="madeby" href="#">ThemeStall</a> made with <i class="fa fa-heart"></i> coded with <i class="fa fa-html5"></i>',
        'type'        => 'textarea',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'catalog_footer_options', $options );
}  
?>