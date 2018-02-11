<?php

/**
*single post template
 */

get_header(); ?>

<?php get_template_part( 'layout/before', '' ); ?>
	<div class="page-content">
        <div class="storelist bloglist panel panel-info">
            <div class="panel-body">     
            <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();
    
                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                     ?>
    
                     <?php get_template_part( 'content', get_post_format() ); ?>
                     
                     <?php get_template_part( 'author-bio' ); ?>
    
                    <?php comments_template( '', true ); ?>
    
                <?php
    
                endwhile;
    
            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );
    
            endif;
            ?>
            </div>
        </div>
  	</div>
<?php get_template_part( 'layout/after', '' ); ?>

<?php catalog_next_prev_posts(); ?>
            
<?php get_footer(); ?>