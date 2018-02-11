<?php
function catalog_background_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'background_option_style',
        'label'       => esc_html__( 'Background Style', 'catalog' ),
        'desc'        => esc_html__( 'style of background(app stock ot photo stock)', 'catalog' ),
        'std'         => 'app_stock',
        'type'        => 'select',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'app_stock',
            'label'       => esc_html__( 'App Stock', 'catalog' ),
          ),
		  array(
            'value'       => 'photo_stock',
            'label'       => esc_html__( 'Photo Stock', 'catalog' ),
          ),
        )
      ),
		array(
        'id'          => 'container_width',
        'label'       => esc_html__( 'Container width', 'catalog' ),
        'desc'        => esc_html__( 'Main container width', 'catalog' ),
        'std'         => array(1250, 'px'),
        'type'        => 'measurement',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      =>array(
                array(
                    'selector' => '.container',
                    'property' => 'max-width'
                    )
            )
      ),
      array(
        'id'          => 'body_background',
        'label'       => esc_html__( 'Body background', 'catalog' ),
        'desc'        => esc_html__( 'Background can be image or color', 'catalog' ),
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'body'
                    )
            )
      ),
      array(
        'id'          => 'main_container_background',
        'label'       => esc_html__( 'Main container background', 'catalog' ),
        'desc'        => esc_html__( 'Background can be image or color', 'catalog' ),
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.container'
                    )
            )
      ),
    array(
        'id'          => 'sidebar_background',
        'label'       => esc_html__( 'Sidebar background', 'catalog' ),
        'desc'        => esc_html__( 'Sidebar Background', 'catalog' ),
        'std'         => array('background-image' => '', 'background-color' => '#fff'),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.sidebar'
                    )
            )
      ),     
    );

	return apply_filters( 'catalog_background_options', $options );
}  
?>