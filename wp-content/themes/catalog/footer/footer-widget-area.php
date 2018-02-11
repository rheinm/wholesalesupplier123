<?php
/**
 * footer widget area
 *
 *
 * @package WordPress
 * @subpackage catalog
 * @since catalog 1.0
 */
?>
<?php
if( function_exists( 'ot_get_option' ) ):
	$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
	if( $footer_widget_area == 'on' ): ?>
	<div class="footer-widget-wrap">
    	<?php
        $col_class = ot_get_option( 'footer_widget_box', 3 );
		?>
        <div class="container">
            <div class="row">                
				<?php				
                    for( $i = 1; $i <= $col_class; $i++ ):
                        if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-widget-area">
                            <div class="widget-area-footer" role="complementary">
                                <?php dynamic_sidebar( 'footer-'.$i ); ?>
                            </div><!-- .widget-area -->
                        </div>
                        <?php
                        endif;
                    endfor; 
                endif; ?>                
            </div>
        </div>
	</div>
	<?php
endif;	//if( function_exists( 'ot_get_option' ) ):
?>