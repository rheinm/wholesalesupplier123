<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$authorid = get_the_author_meta( 'ID' );
$author_name = get_the_author_meta( 'display_name' );
$author_link = get_author_posts_url( $authorid );

if ( $related_products ) : ?>

	<div class="content-after boxs related-box">
        <div class="related products">
    
            <h4 class="related-title"><?php printf( esc_html__( 'Others %1$s Items', 'catalog' ), $author_name ); ?><a href="<?php echo esc_url($author_link); ?>"><?php esc_html_e('view all', 'catalog'); ?></a></h4>
    
            <?php woocommerce_product_loop_start(); ?>
    
                <?php foreach ( $related_products as $related_product ) : ?>
    
                    <?php
                        $post_object = get_post( $related_product->get_id() );
    
                        setup_postdata( $GLOBALS['post'] =& $post_object );
    
                        wc_get_template_part( 'content', 'product' ); ?>
    
                <?php endforeach; ?>
    
            <?php woocommerce_product_loop_end(); ?>
    
        </div>
    </div>

<?php endif;

wp_reset_postdata();
