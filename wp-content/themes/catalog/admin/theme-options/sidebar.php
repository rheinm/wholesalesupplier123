<?php
function catalog_sidebar_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'create_sidebar',
        'label'       => esc_html__( 'Create Sidebar', 'catalog' ),
        'desc'        => esc_html__( 'Click add new to add new sidebar', 'catalog' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebar_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(           
          array(
            'id'          => 'desc',
            'label'       => esc_html__( 'Description', 'catalog' ),
            'desc'        => esc_html__( '(optional)', 'catalog' ),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
    );

	return apply_filters( 'catalog_sidebar_options', $options );
}   
?>