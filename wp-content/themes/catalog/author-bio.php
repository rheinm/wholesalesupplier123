<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */
 
?>
<article class="page-with-bg author-wrapper">
	<?php $description = get_the_author_meta( 'description' ); ?>
    <?php if($description != ''): ?>
    <div class="widget-title">
        <h4><?php printf(esc_html__('About %s', 'catalog'), get_the_author()); ?></h4>   
    </div>
    <?php endif; ?>
    <div class="media">
        <div class="about_img">
            <?php 
            $author_bio_avatar_size = apply_filters( 'catalog_author_bio_avatar_size', 65 );
            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, null, null, array( 'class' => array( 'img-responsive', 'alignleft' ) ) );
            ?>
        </div>
        <p><?php the_author_meta( 'description' ); ?></p>
    </div>
    <div class="post-footer">
        <div class="pull-left">
        	<a class="author-link readmore" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        <?php printf( esc_html__( "View all posts [..]", 'catalog' ), get_the_author() ); ?>
        </a>
        </div>
        <div class="pull-right">
            <ul class="social list-inline">
            	<?php if(get_the_author_meta('facebook') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('twitter') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('url') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('url')); ?>"><i class="fa fa-link"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('linkedin') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('googleplus') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('googleplus')); ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('dribbble') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('dribbble')); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('behance') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('behance')); ?>"><i class="fa fa-behance"></i></a></li>
                <?php endif; ?>
                <?php if(get_the_author_meta('pinterest') != ''): ?>
                <li><a href="<?php echo esc_url(get_the_author_meta('pinterest')); ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php endif; ?> 
            </ul><!-- end ul -->
        </div>
    </div>
</article><!-- end author-wrapper -->