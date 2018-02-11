<div class="form-group  row wow fadeIn">
        <div class="col-sm-2 col-xs-12">
        	<?php
			global $product;
			if(has_post_thumbnail()):
				$new_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
				$img_url = catalog_image_resize($new_url, 600, 600);			
			else:
				$img_url = CATALOGTHEMEURI.'images/blank2.jpg';
			endif;
			
			 ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="screenshot" data-gal="<?php echo esc_url($img_url); ?>" title="<?php the_title(); ?>">
				<img class="img-responsive img-thumbnail" src="<?php echo esc_url($img_url); ?>" alt="">
            </a>
        </div>
        <div class="col-sm-7 col-xs-12">
            <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
            <ul class="search-list">
                <li><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><i class="fa fa-user"></i> <?php echo get_the_author_meta('display_name'); ?></a></li>
                <li><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><i class="fa fa-envelope-o"></i> <?php echo esc_html__('Get Support', 'catalog'); ?></a></li>
            </ul>
        </div>
        <div class="col-sm-3 col-xs-12 text-center">
            <ul class="search-list">
                <li><a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-block">
				<?php 
				if(get_post_type() == 'product'):
				echo esc_html__('Buy Now', 'catalog');
				else:
				echo esc_html__('Read More', 'catalog');
				endif;
				?>
                </a></li>
                <?php if(get_post_type() == 'product'): ?>
                <li><a href="<?php echo esc_url( get_permalink() ); ?>" title=""><?php echo get_post_meta( $product->get_id(), 'total_sales', true ); ?> <?php echo esc_html__('Sales','catalog'); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>   