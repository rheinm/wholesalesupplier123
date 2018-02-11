<?php
/**
 * footer home widget area
 *
 *
 * @package WordPress
 * @subpackage catalog
 * @since catalog 1.0
 */
?>
<?php
	$footer_home_widget = (function_exists('ot_get_option'))? ot_get_option( 'footer_home_widget', 'on' ) : 'on';
	
	if( $footer_home_widget == 'on' ): ?>
    <?php if ( is_active_sidebar( 'footer-home-1' ) ) : ?>
        <div class="footer-home-widget-wrap">            
            <?php dynamic_sidebar( 'footer-home-1' ); ?>            
        </div>
        <?php endif; ?>
    <?php
	endif;