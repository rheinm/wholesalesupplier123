<?php
	if(is_page()){
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'full';
		}
	}	
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else{
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	if(is_404()){
		$layout = 'full';
	}
	
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$layout = 'full';
		}
		elseif( is_woocommerce() ){
			$layout = (function_exists('ot_get_option'))? ot_get_option('shop_layout', 'full') : 'full';
		}
	}
	
	if(class_exists( 'bbPress' )){
		if(is_bbpress()){	
			$layout = (function_exists('ot_get_option'))? ot_get_option('forum_layout', 'full') : 'full';
		}
	}
	
	if( $layout == 'full' ){
		$container_class = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
	}
	else{
		$container_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		$container_class .= ( $layout == 'ls' )? ' pull-right' : '';
	}
?>

<!-- Content Wrap -->
<?php 
$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
if($background_option_style == 'photo_stock'):
if(is_front_page() && is_page()):
?>
<section class="section nopad single-wrap firstsection">
    <div class="absolutetitle">
        <div class="page-title public-profile-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <?php get_template_part('header/banner', ''); ?>
                    <?php 
					catalog_breadcrumbs();
					 ?>
                </div>
            </div>

            <div class="content-before">
                <div class="row">
                    <div class="col-md-12 col-sx-12 cen-xs">
                    	<?php						
                    	catalog_search_form();
                    	?>
                    </div>
                </div><!-- end row -->
            </div><!-- end content before -->
        </div>
    </div><!-- end absolutetitle -->

    <div class="main hidden-xs ri-shadow">
    <div class="grid-background">
    <div id="ri-grid" class="ri-grid ri-grid-size-2">
        <img class="ri-loading-image" src="<?php echo get_template_directory_uri();?>/images/loading.gif"/>
        <ul>
        <?php if(class_exists( 'woocommerce' )):
		$args = array('post_type' => 'product', 'posts_per_page'=> 36);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : ?>        
        	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li><a href="<?php echo esc_url(get_permalink()); ?>">
			<?php 
			if(has_post_thumbnail()):
			catalog_post_thumb( 200, 180 );
			else: ?>
            <img src="<?php echo esc_url('http://placehold.it/200x180'); ?>" alt="placeholder" />
			<?php endif; ?></a></li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        
        <?php else : ?>
		<p><?php echo esc_html__( 'No photo uploaded.', 'catalog' ); ?></p>
		<?php endif; ?>
        <?php endif; ?>
        </ul>
    </div>
    </div>
    </div>
</section>
<?php else: ?>
<section class="section pagegrey">
<div class="container">
    <?php get_template_part('header/banner', ''); ?>
	<?php 
    catalog_breadcrumbs();
     ?>
    <!-- /.pull-right -->
</div>
</section>
<?php endif; ?>
<section class="section">
<div class="container">
    <div class="row">
        <div class="<?php echo esc_attr($container_class); ?>">
<?php else: ?>
<section class="section single-wrap">
	<div class="background-overlay"></div>
    <div class="container position-relative">
        <div class="cat-page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <?php get_template_part('header/banner', ''); ?>
                    <?php 
					if(class_exists( 'woocommerce' )):
						if(is_product()):
						else:
						catalog_breadcrumbs();
						endif;
					else:
						catalog_breadcrumbs();
					endif; ?>                       
                </div>
            </div>
        </div>
        <div class="content-top">
            <div class="row">
            	<?php $header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on'; ?>
                <?php if($header_slide_menu != 'off'): ?>
                <div class="col-xs-6 col-sm-6">
                    <div class="custommenu hidden-xs">
                        <a id="showLeft" href="#" title="" class="bt-menu-trigger"><span></span>
                        <img src="<?php echo get_template_directory_uri();?>/images/fav.png" alt="">
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-sm-6 col-xs-12 cen-xs text-right pull-right">
                    <?php
					$social_array = '';
					if(class_exists( 'woocommerce' )):
					if(is_product()):
					catalog_breadcrumbs();
					else: 
                    if( function_exists('ot_get_option') ){
                        $social_array = ot_get_option( 'header_social_icons', array() );
                    }
                    ?>
					<?php
                    if( function_exists('ot_get_option') ){
                        $social_array = ot_get_option( 'header_social_icons', array() );
                    }
                    ?>
                    <?php if( !empty($social_array) ): ?>
                    <ul class="list-inline social">
                        <?php foreach ($social_array as $key => $value) { ?>
                            <li>
                                <a href="<?php echo esc_url($value['link']); ?>" title="<?php echo esc_attr($value['title']); ?>">
                                    <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                </a>
                            </li>
                        <?php } ?>			
                    </ul>
                    <?php endif; ?>
                    <?php
					endif;
					else:
                    if( function_exists('ot_get_option') ){
                        $social_array = ot_get_option( 'header_social_icons', array() );
                    }
                    ?>
					<?php
                    if( function_exists('ot_get_option') ){
                        $social_array = ot_get_option( 'header_social_icons', array() );
                    }
                    ?>
                    <?php if( !empty($social_array) ): ?>
                    <ul class="list-inline social">
                        <?php foreach ($social_array as $key => $value) { ?>
                            <li>
                                <a href="<?php echo esc_url($value['link']); ?>" title="<?php echo esc_attr($value['title']); ?>">
                                    <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                </a>
                            </li>
                        <?php } ?>			
                    </ul>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->
        
        <?php 
		if(class_exists( 'woocommerce' )):
		if(is_product()): ?>
        <div class="row">
        <?php
		endif;
		endif; ?>
        
        <?php 
		if(class_exists( 'woocommerce' )):
		if(is_product()):
		else: ?>
        	<div class="content-before">
            <div class="row">
                <div class="col-md-12 col-sx-12 cen-xs">
                    <?php					
					catalog_search_form();
					?>
                </div>
            </div><!-- end row -->
        </div><!-- end content before -->
        <div class="content boxs">
            <div class="row">
                <div class="<?php echo esc_attr($container_class); ?>">
        <?php endif; ?>
        <?php
		else:
		?>
        <div class="content-before">
            <div class="row">
                <div class="col-md-12 col-sx-12 cen-xs">
                    <?php					
					catalog_search_form();
					 ?>
                </div>
            </div><!-- end row -->
        </div><!-- end content before -->
        <div class="content boxs">
            <div class="row">
                <div class="<?php echo esc_attr($container_class); ?>">
        <?php endif; ?>
<?php endif; ?>