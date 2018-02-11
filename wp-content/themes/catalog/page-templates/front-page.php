<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in prestige consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */
get_header(); ?>
	<?php get_template_part( 'layout/before', '' ); ?>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			 the_content(); 

		// End the loop.
		endwhile;
		?>
    <?php get_template_part( 'layout/after', '' ); ?>
<?php get_footer('home'); ?>