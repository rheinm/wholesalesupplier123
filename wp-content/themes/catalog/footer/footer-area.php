<?php
	$background_option_style = (function_exists('ot_get_option'))? ot_get_option( 'background_option_style' ) : '';
	$box_class = ' boxs';
	if($background_option_style == 'photo_stock'){
		$box_class = '';
	}
	if ( is_active_sidebar( 'footer-top' ) ) : ?>
		<div class="footer-top-area-details"><div class="content-message<?php echo esc_attr($box_class); ?>">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<?php dynamic_sidebar( 'footer-top' ); ?>
				</div>
			</div><!-- .widget-area -->
		</div>
        </div>
		<?php
	endif;
	?>
	</div><!-- end container -->
</section>
<?php 
$footer_widget_area = (function_exists('ot_get_option'))? ot_get_option('footer_widget_area', 'on') : 'on';
if($footer_widget_area == 'on'):
	get_template_part('footer/footer-widget-area', '');
endif; ?>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-5">
				<div class="media cen-xs">
					<?php
						$copyright_text = (function_exists('ot_get_option'))? ot_get_option( 'copyright_text' ) : '';
						echo wp_kses(do_shortcode($copyright_text), 
						array(
						'a'=>array(
							'href'=>array(), 
							'class'=>array(), 
							'title'=>array()
						),
						'i'=>array(
							'class'=>array()
						),
						'h1'=>array(
							'class'=>array(), 
						),
						'h2'=>array(
							'class'=>array(), 
						),
						'h3'=>array(
							'class'=>array(), 
						),
						'h4'=>array(
							'class'=>array(), 
						),
						'h5'=>array(
							'class'=>array(), 
						),
						'h6'=>array(
							'class'=>array(), 
						),
						'h6'=>array(
							'class'=>array(), 
						), 
						'span'=>array(
							'class'=>array()
						), 
						'div'=>array(
							'class'=>array(),
							'id'=>array()
						),
						'br'=>array(),
						)); 
						?>
				</div>
			</div>
			<div class="col-md-6 col-lg-7 text-right">
				<?php											
				$args = array(
				'theme_location'  => 'footer-menu',
				'menu_class'      => 'list-inline text-right cen-xs footer-menu',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'fallback_cb'     => '',
				'container'       => '',
				'depth'			  => 1
				);											
				wp_nav_menu( $args );
				?>
				<a class="topbutton" href="#"><?php echo esc_html__('Back to top', 'catalog'); ?> <i class="fa fa-angle-up"></i></a>
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</footer><!-- end footer -->