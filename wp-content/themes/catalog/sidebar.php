<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */
?>
<?php

if(is_page()){
		$sidebar = get_post_meta( get_the_ID(), 'sidebar', true );		
		if($sidebar == '') $sidebar = 'sidebar-1';
}
elseif(is_single()){
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
}
else {
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_sidebar', 'sidebar-1' ) : 'sidebar-1';
}

if ( class_exists( 'woocommerce' ) ){
	if( is_product() ){
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'product_layout_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
	elseif( is_woocommerce() ){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'shop_layout_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}

if(class_exists( 'bbPress' )){
	if(is_bbpress()){	
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'forum_layout_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}
?>

<div class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( $sidebar ) ) : ?>
		<?php dynamic_sidebar( $sidebar ); ?>
	<?php endif; ?>
</div><!-- .sidebar -->