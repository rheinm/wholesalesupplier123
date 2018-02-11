<div class="ts-pricing row pricing-tables text-center">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>                
                    <?php 
					$featured = get_post_meta( get_the_ID(), 'featured', true );
					$featured_class = ( $featured == 'off' )? 'featured-off' : 'featured-on';
					?>
                    <div id="ts-pricing-<?php the_ID(); ?>" class="col-md-6 col-sm-6 col-xs-12 <?php echo esc_attr($featured_class); ?>">
                    	<div class="pricing-box">
                            <div class="pricing-header">
                            	<?php the_title( sprintf( '<h3>' ), '</h3>' ); ?>
                            </div>  
                            <div class="pricing-price">
                            	<?php
                                $price_currency = get_post_meta( get_the_ID(), 'price_currency', true );
								$price_text = get_post_meta( get_the_ID(), 'price_text', true );
								?>
                                <p><sub><?php echo esc_html($price_currency); ?></sub><?php echo esc_html($price_text); ?></p>
                            </div><!-- end price -->
                            <div class="pricing-desc text-center">
                                <p><?php the_content(); ?></p>
                            </div><!-- end desc -->
                            <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">                               
                                <?php 
								$feature_info = get_post_meta( get_the_ID(), 'feature_info', true );
								if(!empty($feature_info)):
								$i = 1;
								foreach( $feature_info as $value ):
								?>
                                <div class="panel panel-default animation revealOnScroll">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                        	<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php the_ID(); ?><?php echo esc_attr($i); ?>" aria-expanded="true" aria-controls="collapse<?php the_ID(); ?><?php echo esc_attr($i); ?>"><?php echo esc_html($value['title']); ?></a>                                                                                       
                                        </h4>
                                    </div><!-- end heading -->
                                    
                                    <?php if($value['feature_text'] != ''): ?>
                                    <div id="collapse<?php the_ID(); ?><?php echo esc_attr($i); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php the_ID(); ?><?php echo esc_attr($i); ?>">
                                        <div class="panel-body">
                                            <p><?php echo esc_html($value['feature_text']); ?></p>
                                        </div>
                                    </div>
                                    
                                    <?php
									endif;
                                    ?>                                    
                                </div><!-- end panel -->
                                <?php
								$i++; 
								endforeach;
								endif; ?>
                            </div><!-- end panel-group -->
                            
                            <div class="pricing-footer text-center">
                            	<?php 
								$button_link = get_post_meta( get_the_ID(), 'button_link', true );
								$button_text = get_post_meta( get_the_ID(), 'button_text', true );
								?>
                                <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary"><?php echo esc_html($button_text); ?></a>
                            </div><!-- end desc -->
                        </div>
                    </div>

				<?php
			endwhile;
		}
		// Posts not found
		else { ?>
			<h3><?php echo esc_html__( 'Pricing not found', 'catalog' ); ?></h3>
		<?php }
	?>
</div>