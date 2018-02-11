<?php
function catalog_styling_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'preset_color',
        'label'       => esc_html__( 'Preset Color', 'catalog' ),
        'desc'        => esc_html__( 'Main preset color', 'catalog' ),
        'std'         => '#1976D2',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.pricing-box h3,.fun-facts:hover .fun-icon,.progress-bar,.dropcaps p:first-child:first-letter,.flex-direction-nav a,.btn-primary,.navbar-brand i,
.theme__button,.dropForm .btn-primary,.sticky .post-meta.sticky-posts .sticky-post,body.bundle li.dropdown.membermenu a.dropdown-toggle:focus,body.bundle li.dropdown.membermenu a.dropdown-toggle:hover,body.bundle li.dropdown.membermenu a.dropdown-toggle,body.bundle .header .container-menu,.storelist.bloglist .media-heading .comment-reply-link,.theme__button,.search-form .search-submit,.checkdate .btn,.dropForm .btn-primary,.theme__button,.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover,.photo_stock .btn-default,.photo_stock.woocommerce #respond input#submit.alt, .photo_stock.woocommerce a.button.alt, .photo_stock.woocommerce button.button.alt, .photo_stock.woocommerce input.button.alt,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.btn.btn-inverse.btn-small,.form-row .button,.bbp-search-form .button,.bbp-submit-wrapper .button.submit,.subscription-toggle, .post-password-form input[type="submit"]',
                'property'   => 'background-color'
                ),
                array(
                'selector' => '.totalprice h4 strong,.woocommerce .woocommerce-message::before',
                'property'   => 'color'
                ),
                array(
                    'selector' => '.pricing-box h3,.fun-facts:hover .fun-icon,.progress-bar,.dropcaps p:first-child:first-letter,.flex-direction-nav a,.btn-primary,.navbar-brand i,
.theme__button,.dropForm .btn-primary,.checkdate .btn,.photo_stock .btn-default,.btn.btn-inverse.btn-small',
                    'property'   => 'border-color'
                ),
                array(
                    'selector' => '',
                    'property'   => 'border-left-color'
                ),
                array(
                    'selector' => '.woocommerce .woocommerce-message',
                    'property' => 'border-top-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-right-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-bottom-color',
                ),
				array(
                    'selector' => '',
                    'property'   => 'border-color',
					'opacity'	=> 0.7,
                ),
				array(
                'selector' => '',
                'property'   => 'background-color',
				'opacity'	=> 0.8,
                ),
            )
      ),
	  array(
        'id'          => 'preset_color_hover',
        'label'       => esc_html__( 'Preset Hover Color', 'catalog' ),
        'desc'        => esc_html__( 'Main preset hover color', 'catalog' ),
        'std'         => '#FFC107',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => 'body.bundle .navbar-default .navbar-brand i,div.bbp-template-notice,div.indicator-hint,div.bbp-template-notice.info,.tagcloud a:hover,.btn-primary:hover,.btn-primary:focus,.navbar-brand:hover i,.theme__button:hover,.pagination > li > a:hover,.pagination > li > span:hover,.search-form .search-submit:hover,.page-numbers > li > a:hover,.page-numbers > li > span:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce .woocommerce-error .button:hover,.woocommerce .woocommerce-info .button:hover,
.woocommerce .woocommerce-message .button:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.photo_stock .btn-default:hover,.bbp-search-form .button:hover,.bbp-submit-wrapper .button.submit:hover,.subscription-toggle:hover,.post-password-form input[type="submit"]:hover',
                'property'   => 'background-color'
                ),
                array(
                'selector' => '.pagination > li.current > a,.page-404-content h2 span,.rating i,a:hover,.text-widget a,a:focus,.footer a:hover,.footer a:focus,.navbar-default .navbar-nav a:focus,.navbar-default .navbar-nav a:hover,.item-box:hover h4 a,.item-price small i,.footer .fa-html5,.cbp-spmenu h3 i,.widget .item-box:hover .item-author a,.home-menu-items li a:hover,.woocommerce .star-rating::before,.woocommerce .star-rating span::before,.yith-wcwl-add-to-wishlist:before,.woocommerce .woocommerce-error::before,.widget .view-all-details a:hover,.page-numbers.current',
                'property'   => 'color'
                ),
                array(
                    'selector' => 'body.bundle .navbar-default .navbar-brand i,div.bbp-template-notice,div.indicator-hint,div.bbp-template-notice.info,.tagcloud a:hover,.btn-primary:hover,.btn-primary:focus,.navbar-brand:hover i,.theme__button:hover,.pagination > li > a:hover,.pagination > li > span:hover,.page-numbers > li > a:hover,
.page-numbers > li > span:hover',
                    'property'   => 'border-color'
                ),
                array(
                    'selector' => '.woocommerce .woocommerce-error',
                    'property'   => 'border-left-color'
                ),
                array(
                    'selector' => '',
                    'property' => 'border-top-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-right-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-bottom-color',
                ),
				array(
                    'selector' => '',
                    'property'   => 'border-color',
					'opacity'	=> 0.7,
                ),
				array(
                'selector' => '',
                'property'   => 'background-color',
				'opacity'	=> 0.8,
                ),
            )
      ),
    );

	return apply_filters( 'catalog_styling_options', $options );
}  
?>