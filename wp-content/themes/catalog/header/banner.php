<?php
	$title = '';	
		
	if(is_single()){
		$title = get_the_title();
	}
	elseif( is_home() ){		
		$title = (function_exists('ot_get_option'))? ot_get_option('blog_title') : '';
	}
	elseif ( is_category() ){
		$title = esc_html__( 'Category Archives: ', 'catalog' ).single_cat_title( '', false );
	}
	elseif(is_search()){
		$title = esc_html__('Search Result', 'catalog');
	}
	elseif ( is_author() ){
		$title = esc_html__( 'Author Archives: ', 'catalog' ).'' . get_the_author() . '';
	} 
	elseif( is_tag() ) {
		$title = esc_html__( 'Tag Archives: ', 'catalog' ).single_tag_title( '', false );
	}
	elseif ( is_archive() ){	
			
		if ( is_day() ) :
			$title =  esc_html__( 'Daily Archives: ', 'catalog' ).'' . get_the_date() . '';
		elseif ( is_month() ) :
			$title = esc_html__( 'Monthly Archives: ', 'catalog' ). '' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'catalog' ) ) . '' ;
		elseif ( is_year() ) :
			$title = esc_html__( 'Yearly Archives: ', 'catalog' ).'' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'catalog' ) ) . '' ;
		else :
			$title = esc_html__( 'Archives', 'catalog' );
		endif;
	} 	
	 elseif(is_404()){
		$title = esc_html__('Not Found', 'catalog');
	}
	elseif( is_page() ){
		$title = get_the_title();
		$custom_title = get_post_meta( get_the_ID(), 'custom_title', true );
		if( $custom_title == 'on' ){
			$alt_title = get_post_meta( get_the_ID(), 'title', true );
			$title = ( $alt_title != '' )? $alt_title : $title;
		}
	}
	else {
		$title = get_the_title();
	}
	
	if(class_exists( 'woocommerce' )){
		if(is_woocommerce()){
			$title = (function_exists('ot_get_option'))? ot_get_option('shop_title') : '';
		}
		if(is_product()){
			$title = get_the_title();
		}
	}
	
	if(class_exists( 'bbPress' )){
		if(is_bbpress()){	
			$title = (function_exists('ot_get_option'))? ot_get_option('forum_title') : '';
		}
	}
?>

<?php if(is_front_page() && is_page()): ?>
	<h3><?php echo get_bloginfo( 'name', 'display' ); ?></h3>
	<p class="blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
    <?php $background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
	if($background_option_style != 'photo_stock'): ?>
	<?php											
	$args_slim = array(
	'theme_location'  => 'home-menu',
	'menu_class'      => 'home-menu-items',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'fallback_cb'     => '',
	'depth'			  => 1,
	'container'       => '',
	);											
	wp_nav_menu( $args_slim );
	?>
    <?php endif; ?>
<?php 
else: ?>
	<h3><?php echo esc_html($title); ?></h3>
<?php endif; ?>

