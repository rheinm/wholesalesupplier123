<?php
function catalog_forums_options( $options = array() ){
	$options = array(
	  array(
        'id'          => 'forum_layout',
        'label'       => esc_html__( 'Forum layout', 'catalog' ),
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'forums_options',
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
            'label'       => esc_html__( 'Full width', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'Left sidebar', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'Right sidebar', 'catalog' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          )
        )
      ),
    array(
        'id'          => 'forum_layout_sidebar',
        'label'       => esc_html__( 'Select Forum Sidebar', 'catalog' ),
        'desc'        => '',
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'forum_layout:not(full)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'forum_title',
        'label'       => esc_html__( 'Forum Title', 'catalog' ),
        'desc'        => esc_html__( 'Forum page title', 'catalog' ),
        'std'         => 'Community Forum',
        'type'        => 'text',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'forum_archive_banner',
        'label'       => esc_html__( 'Forum Page Banner', 'catalog' ),
        'desc'        => esc_html__( 'Banner of forum page', 'catalog' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'catalog_forums_options', $options );
}  
?>