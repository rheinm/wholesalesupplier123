<?php

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Catalog 1.0
 */
function catalog_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'catalog' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'catalog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top Widget', 'catalog' ),
		'id' => 'footer-top',
		'description' => esc_html__( 'Appears on footer top area', 'catalog' ),
		'before_widget' => '<div id="%1$s" class="footer-top-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	$header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on';
	if($header_slide_menu != 'off'){
	register_sidebar( array(
		'name' => esc_html__( 'Left Slide Widget Area', 'catalog' ),
		'id' => 'left-slide-1',
		'description' => esc_html__( 'Appears on left slide area', 'catalog' ),
		'before_widget' => '<div id="%1$s" class="left-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="left-slide-title">',
		'after_title' => '</div>',
	) );
	}
	
	$footer_home_widget = (function_exists('ot_get_option'))? ot_get_option( 'footer_home_widget', 'on' ) : 'on';
	if($footer_home_widget != 'off'){
	register_sidebar( array(
		'name' => esc_html__( 'Footer Home Widget Area', 'catalog' ),
		'id' => 'footer-home-1',
		'description' => esc_html__( 'Appears on hope page footer area', 'catalog' ),
		'before_widget' => '<div id="%1$s" class="footer-home-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	}

	if( function_exists( 'ot_get_option' ) ):
		$sidebarArr = ot_get_option( 'create_sidebar', array() );
		if( !empty( $sidebarArr ) ){
			$i = 4;
			foreach ($sidebarArr as $sidebar) {

				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => 'sidebar-'.$i,
					'description' => $sidebar['desc'],
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="widget-title"><h4>',
					'after_title' => '</h4></div>',
				) );

				$i++;
			}
		}
	endif;	//if( function_exists( 'ot_get_option' ) ):	
	
	if( function_exists( 'ot_get_option' ) ):
		$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
		if( $footer_widget_area == 'on' ):
			$footer_widget_box = ot_get_option( 'footer_widget_box', 3 );
			for( $i = 1; $i <= $footer_widget_box; $i++ ):
				register_sidebar( array(
					'name' => sprintf(esc_html__( 'Footer Widget Area %d', 'catalog' ), $i),
					'id' => 'footer-'.$i,
					'description' => sprintf(esc_html__( 'Appears in Footer column %d', 'catalog' ), $i),
					'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="title">',
					'after_title' => '</h3>',
				) );
			endfor; 
		endif;
	endif;	//if( function_exists( 'ot_get_option' ) ):
}
add_action( 'widgets_init', 'catalog_widgets_init' );
?>