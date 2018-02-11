<div class="ts-products ts-product-loop product-bestseller">
	<div class="row">
        <?php
		// Posts are found
		if ( $posts->have_posts() ) {
			
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $product;
				?>
                <div class="col-md-2 col-sm-4 col-xs-12">
                <a class="sit-preview" href="<?php echo esc_url(get_permalink()); ?>">
                <?php
                if ( has_post_thumbnail() ) {
                    $fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                    $image_link = catalog_image_resize($fullsize[0], 800, 800);
                } elseif ( wc_placeholder_img_src() ) {
                    $image_link = wc_placeholder_img_src();
                }
				?>
                <img class="img-thumbnail img-responsive" alt="" src="<?php echo esc_url($image_link); ?>" data-preview-url="<?php echo esc_url($image_link); ?>"></a>
                </div>           	
			<?php
			endwhile;
		}
		// Posts not found
		else { ?>
			<h4><?php echo esc_html__( 'No Item found', 'catalog' ); ?></h4>
		<?php }
	?>
    </div>
</div>