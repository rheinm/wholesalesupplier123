<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 */

get_header(); ?>
<?php get_template_part( 'layout/before', '' ); ?>
		<?php
		// Start the loop.
		if ( have_posts() ) :

			// Include the page content template.
			woocommerce_content();

		// End the loop.
		endif;
		?>
    <?php get_template_part( 'layout/after', '' ); ?>

<?php
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			get_footer();
		}
		elseif( is_woocommerce() ){
			get_footer('home');
		}
	} else {
 		get_footer(); 
	} ?>
