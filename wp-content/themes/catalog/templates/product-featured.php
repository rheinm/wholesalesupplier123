<div class="ts-products ts-product-loop product-featured">
	<div class="homefeatured">
        <?php
		// Posts are found
		if ( $posts->have_posts() ) {
			
			$view_all_link = $posts->data['view_all_link'];
			if($view_all_link != ''):
			?>
            <span class="view-all-details"><a href="<?php esc_url($view_all_link); ?>"><?php echo esc_html__('View all', 'catalog'); ?></a></span>
            <?php
			endif;
			
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $product;
				$user_id = get_the_author_meta( 'ID' );
				$author_link = get_author_posts_url( $user_id );
				?>
            <div class="storelist panel panel-info">
                <div class="featured-panel-body">
                    <div class="form-group row">
                        <div class="col-sm-3 col-xs-12 featured-image">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
                            <?php catalog_post_thumb( 600, 340 ); ?>
                            <?php else: ?>
                            <img src="<?php echo esc_url('http://placehold.it/600x340'); ?>" alt="" />
                        	<?php endif; ?>
                            </a>
                        </div>
                        <div class="col-sm-2 col-xs-12">
                            <h4><a href="<?php echo esc_url($author_link); ?>"><?php echo get_the_author_meta('display_name'); ?></a></h4>
                            <ul class="featured-porduct-lists">
                                <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-envelope-o"></i> <?php echo esc_html__('Get Support', 'catalog'); ?></a></li>
                                <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-image"></i> <?php echo count_user_posts( $user_id , 'product' ); ?> <?php echo esc_html__('Items', 'catalog'); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-shopping-cart"></i><?php echo get_post_meta( $product->get_id(), 'total_sales', true ); ?> <?php echo esc_html__('Sales','catalog'); ?></a></li>
                                <?php if(get_user_meta( $user_id, 'user_location', true )): ?>
                                <li><i class="fa fa-map-marker"></i> <?php echo get_user_meta( $user_id, 'user_location', true ); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-md-5 col-xs-12">
                           <ul class="list-inline followers-items">
                           		<?php								
								$args2 = array(
									'author'        =>  $user_id,
									'post_type' 	=> 'product',
									'posts_per_page' => 5
									);
								
								$current_user_posts1 = get_posts( $args2 );
								foreach ( $current_user_posts1 as $post ) : setup_postdata( $post );
								if ( has_post_thumbnail() ) {
									$fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
									$image_link = catalog_image_resize($fullsize[0], 600, 600);
									$image = catalog_post_thumb( 60, 60, false );
								} elseif ( wc_placeholder_img_src() ) {
									$image_link = wc_placeholder_img_src();
									$image = wc_placeholder_img( 60 );
								}
								?>
                                <li><a href="<?php echo esc_url(get_permalink()); ?>" class="screenshot" data-gal="<?php echo esc_url($image_link); ?>" title="<?php the_title(); ?> <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_price()); ?></span>">
								<?php echo wp_kses($image,array(
								'img' => array(
								  'src' => array(),
								  'alt' => array(),
								  'class' => array()
								),
							  )); ?></a></li>                                                                               
								
								<?php endforeach; 
								wp_reset_postdata();?>
                            </ul>
                        </div><!-- end col -->
                        <div class="col-sm-2 col-xs-12 text-center">
                            <ul class="featured-porduct-lists">
                                <li><a href="<?php echo esc_url($author_link); ?>" class="btn btn-primary btn-block"><?php echo esc_html__('Follow Store', 'catalog'); ?></a></li>
                                <?php $updated_followers_value_current[] = get_user_meta($user_id, 'user_followers', true); ?>
                                <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_followers_value_current));?> <?php echo esc_html__(' Followers', 'catalog'); ?></a></li>
                                <?php $updated_following_value_current[] = get_user_meta($user_id, 'user_following', true); ?>
                                <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_following_value_current));?><?php echo esc_html__(' Following', 'catalog'); ?></a></li>
                            </ul>
                        </div>
                    </div><!-- end form-group -->
                       
                </div>
                </div>
                <hr>             	
			<?php
			endwhile;
		}
		// Posts not found
		else { ?>
			<h4><?php echo esc_html__( 'No Featured Item found', 'catalog' ); ?></h4>
		<?php }
	?>
    </div>
</div>