<?php

function catalog_woocommerce_options( $options = array() ){

	$options = array(
	
	  
	  array(
        'id'          => 'add_cart_link',
        'label'       => esc_html__( 'Add to Cart Link', 'catalog' ),
        'desc'        => esc_html__( 'Select your add to cart page to link.', 'catalog' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'woocommerce_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(

        'id'          => 'add_to_cart_text',

        'label'       => esc_html__( 'Add to Cart Text', 'catalog' ),

        'desc'        => esc_html__( 'Write your add to cart text', 'catalog' ),

        'std'         => 'Add To Cart',

        'type'        => 'text',

        'section'     => 'woocommerce_options',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'min_max_step'=> '',

        'class'       => '',

        'condition'   => '',

        'operator'    => 'and'

      ),

	  array(

        'id'          => 'shop_layout',

        'label'       => esc_html__( 'Shop layout', 'catalog' ),

        'desc'        => '',

        'std'         => 'full',

        'type'        => 'radio-image',

        'section'     => 'woocommerce_options',

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

        'id'          => 'shop_layout_sidebar',

        'label'       => esc_html__( 'Select shop Sidebar', 'catalog' ),

        'desc'        => '',

        'std'         => 'sidebar-1',

        'type'        => 'sidebar-select',

        'section'     => 'woocommerce_options',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'min_max_step'=> '',

        'class'       => '',

        'condition'   => 'shop_layout:not(full)',

        'operator'    => 'and'

      ),

	  array(

        'id'          => 'shop_title',

        'label'       => esc_html__( 'Shop Title', 'catalog' ),

        'desc'        => esc_html__( 'Shop page title', 'catalog' ),

        'std'         => 'Shopping',

        'type'        => 'text',

        'section'     => 'woocommerce_options',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'min_max_step'=> '',

        'class'       => '',

        'condition'   => '',

        'operator'    => 'and'

      ),

	  array(

        'id'          => 'shop_archive_banner',

        'label'       => esc_html__( 'Shop Page Banner', 'catalog' ),

        'desc'        => esc_html__( 'Banner of shop page', 'catalog' ),

        'std'         => '',

        'type'        => 'upload',

        'section'     => 'woocommerce_options',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'min_max_step'=> '',

        'class'       => '',

        'condition'   => '',

        'operator'    => 'and'

      ),

	  array(

        'id'          => 'single_product_right_info',

        'label'       => esc_html__( 'Single Product Right Info', 'catalog' ),

        'desc'        => '',

        'std'         => 'on',

        'type'        => 'on-off',

        'section'     => 'woocommerce_options',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'min_max_step'=> '',

        'class'       => '',

        'condition'   => '',

        'operator'    => 'and'

      ),

    );



	return apply_filters( 'catalog_woocommerce_options', $options );

}  

?>