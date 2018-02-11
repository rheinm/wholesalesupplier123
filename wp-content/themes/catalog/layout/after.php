<?php
	if(is_page()) {
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
	else {
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

?>
        <?php 
  		if(class_exists( 'woocommerce' )):
		if(is_product()):
		else: ?>
        	 </div>
				<?php if( $layout != 'full' ): ?>
                <div id="sidebar" class="col-md-3 col-xs-12">
                    <?php get_sidebar(); ?>			
                </div>
                <?php endif; // endif ?>         
            </div><!-- end row -->
         </div><!-- end content -->
        <?php
		endif;
		else:
		?>
        </div>
        <?php if( $layout != 'full' ): ?>
        <div id="sidebar" class="col-md-3 col-xs-12">
            <?php get_sidebar(); ?>			
        </div>
        <?php endif; // endif ?>
    </div><!-- end row -->
 </div><!-- end content -->
 <?php endif; ?>
 
  <?php 
  if(class_exists( 'woocommerce' )):
  if(is_product()): ?>
</div>
<?php 
endif;
endif; ?>
<?php 
$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
if($background_option_style == 'photo_stock'):?>
</section>
<?php endif; ?>