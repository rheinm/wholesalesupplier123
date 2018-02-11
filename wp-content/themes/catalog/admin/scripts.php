<?php
// Register Style
function catalog_admin_styles() {

	wp_register_style( 'catalog-style', CATALOGTHEMEURI. 'admin/assets/css/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'catalog-style' );

}

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'catalog_admin_styles' );