<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */

get_header(); ?>
<?php get_template_part( 'layout/before', '' ); ?>
    <div class="page-content">
        <div class="page-404-content">
            <div class="row">
                <div class="col-sm-6 hidden-xs">
                    <img alt="<?php echo esc_attr('404-page', 'catalog'); ?>" src="<?php echo get_template_directory_uri(); ?>/images/image-404.jpg">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h2>
                    	<?php echo esc_html__('404', 'catalog'); ?>
                    	<span><?php echo esc_html__('Error!', 'catalog'); ?></span>
                    </h2>
                    <p>
                    	<?php echo esc_html__('Sorry, we cannot find the page you are looking for.', 'catalog'); ?>
                    	<br />
                    	<?php echo esc_html__('Please go to', 'catalog'); ?>
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Home', 'catalog'); ?> </a><?php echo esc_html__(' or search something from search form.', 'catalog'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>  
<?php get_template_part( 'layout/after', '' ); ?>           
<?php get_footer(); ?>