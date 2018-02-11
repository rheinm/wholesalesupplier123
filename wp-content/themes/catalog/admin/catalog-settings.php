<?php
/**
 * Initialize the meta boxes. 
 */

add_action( 'admin_init', 'catalog_meta_boxes' );


function catalog_meta_boxes() {
  if( function_exists( 'ot_get_option' ) ): 
  $my_meta_box = array(
    'id'        => 'catalog_meta_box',
    'title'     => esc_html__('Catalog Page Settings', 'catalog'),
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(     
     array(
        'id'          => 'header_settings',
        'label'       => esc_html__('Header Settings', 'catalog'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ), 	
      array(
        'id'          => 'custom_title',
        'label'       => esc_html__('Custom Title', 'catalog'),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'class'       => '',
        'choices'     => array(),
        'condition'	  => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'title',
        'label'       => esc_html__('Title', 'catalog'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'custom_title:is(on)'
      ),
      array(
        'id'          => 'content_tab',
        'label'       => esc_html__('Layout Settings', 'catalog'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'page_layout',
        'label'       => esc_html__( 'Default Layout', 'catalog' ),
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => esc_html__( 'Full Width', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'With Left Sidebar', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'With Right sidebar', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          ),
        )
      ),
      array(
        'id'          => 'sidebar',
        'label'       => esc_html__('Select Sidebar', 'catalog'),
        'desc'        => '',
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'   => 'page_layout:not(full)'
      ),
    )
  );
  
  ot_register_meta_box( $my_meta_box );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>