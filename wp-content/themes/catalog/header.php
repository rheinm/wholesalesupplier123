<?php
/**
 * The Header for all pages of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- START SITE -->
    <div id="wrapper">
    	<?php 
		$header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on'; ?>
        <?php if($header_slide_menu != 'off'): ?>
        <nav class="hidden-xs cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <?php if ( is_active_sidebar( 'left-slide-1' ) ) : ?>    	
        	<?php dynamic_sidebar( 'left-slide-1' ); ?>
        <?php else: ?>
        <p class="center-area"><?php echo esc_html__('Set Up Your Left Slide Widget Area ', 'catalog'); ?></p>      
        <?php endif; ?>
        </nav>
        <?php endif; ?>
        <?php $header_sticky_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_sticky_menu', 'off' ) : 'off';
		if($header_sticky_menu == 'on'){
			$sticky_class = ' header_sticky';
		}else{
			$sticky_class = '';
		}
		 ?>
        <header class="header<?php echo esc_attr($sticky_class); ?>">
            <div class="container-menu">
                <nav class="navbar navbar-default yamm">
                	<?php $background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
					if($background_option_style == 'photo_stock'):
					$header_con_class = 'container-fluid';
					?>
                    <?php else:
					$header_con_class = 'container';
                    endif; ?>
                    <div class="<?php echo esc_attr($header_con_class); ?>">
                        <div class="navbar-table">
                            <div class="navbar-cell col-md-2">
                                <div class="navbar-header">
                                	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', CATALOGTHEMEURI. 'images/logo.png' ) : CATALOGTHEMEURI. 'images/logo.png'; ?>
                                    <a class="visible-sec navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                    </a>
                                    <div class="hidden-sec slim-wrap">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-link-text"><img src="<?php echo esc_attr($logo); ?>" alt="" /></a>
                                            <?php											
											$args_slim = array(
											'theme_location'  => 'header-menu',
											'menu_class'      => 'menu-items',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'fallback_cb'     => '',
											'container'       => '',
											);											
                                            wp_nav_menu( $args_slim );
                                            ?>
                                        </div>
                                </div><!-- end navbar-header -->
                            </div><!-- end navbar-cell -->
                            <div class="navbar-cell stretch visible-sec col-md-8">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                    <div class="navbar-cell">
                                    	<?php 
										$args = array(
										'theme_location'  => 'header-menu',
										'menu_class'      => 'nav navbar-nav navbar-center',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'fallback_cb'     => '',
										'container'       => '',
										);
										wp_nav_menu( $args ); ?>                                        
                                        
                                    </div><!-- end navbar-cell -->
                                </div><!-- /.navbar-collapse -->        
                            </div><!-- end navbar cell -->
                            
                            <div class="col-md-1"><?php
                                    $language = array(
                                        'theme_location'  => 'language-menu',
                                        'menu_class'      => 'language-menu text-right',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'fallback_cb'     => '',
                                        'depth'			  => 1,
                                        'container'       => '',
                                    );
                                    wp_nav_menu( $language );
                                    ?></div>                            
                            
                            <div class="col-md-1">
                            	<?php if(is_user_logged_in()):
								$current_user = wp_get_current_user();
								$author_link = get_author_posts_url( $current_user->ID );
								
								$extra_menu_links = '<li class="dropdown-header">'.esc_html__('Profile', 'catalog').'</li>';								
								$extra_menu_links .='<li><a href="'.esc_url($author_link).'">'.esc_html__('Public profile', 'catalog').'</a></li>';
								
								if(class_exists( 'woocommerce' )):
								$extra_menu_links .= '<li><a href="'.esc_url(wc_customer_edit_account_url()).'">'.esc_html__('Edit Account', 'catalog').'</a></li>';
								endif;
								$extra_menu_links .='<li><hr></li>';
								$extra_menu_links .='<li class="dropdown-header">'.esc_html__('Dashboard', 'catalog').'</li>';
								
								
								$args = array(
									'theme_location'  => 'profile-menu',
									'menu_class'      => 'dropdown-menu',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">'.$extra_menu_links.'%3$s</ul>',
									'fallback_cb'     => '',
									'depth'			  => 1,
									'container'       => '',
									);										
								?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown membermenu hovermenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<?php echo get_avatar( $current_user->ID, 25 ); ?> <span class="caret"></span></a>
                                        <?php
										wp_nav_menu( $args );
										?>
                                    </li>
                                </ul>
                                <?php else:
									if(class_exists( 'woocommerce' )):
									$log_in_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
									else:
									$log_in_url = wp_login_url();
									endif;
								?>
                                	<div class="login-area"><a href="<?php echo esc_url($log_in_url ); ?>" title="<?php esc_attr_e('Login / Register','catalog'); ?>"><i class="fa fa-lock" aria-hidden="true"></i>
</a></div>
                                <?php ?>
                                <?php endif; ?>
                            </div>                            
                        </div><!-- end navbar-table -->
                    </div><!-- end container fluid -->
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>