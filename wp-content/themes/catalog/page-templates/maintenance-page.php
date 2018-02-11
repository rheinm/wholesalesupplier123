<?php
/**
 * Template Name: Maintenance Template
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
?>
<?php
/**
 * The Header for multipage of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
        <section class="section single-wrap">
            <div class="container">
                <div class="cat-page-title public-profile-title">
                <?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
				?>
                </div>
            </div>
        </section>

    </div><!-- end wrapper -->
    <!-- END SITE -->
 	<?php wp_footer(); ?>
 </body>
</html>