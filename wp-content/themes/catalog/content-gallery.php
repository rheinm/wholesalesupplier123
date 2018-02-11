<?php $classes[] = 'form-group row wow fadeIn'; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

	<div class="post-gallery-type">
	<?php
		$attachments = get_post_meta( get_the_ID(), '_format_gallery', true );
		if( $attachments != '' ){
			echo wp_kses(do_shortcode( $attachments ), 
			array(
			'div'=>array(
				'id'=>array(), 
				'class'=>array(),  
				'title'=>array(),
			),
			'a'=>array(
				'href'=>array(), 
				'class'=>array(),  
				'title'=>array(), 
				'rel'=>array(),
				'data-rel'=>array()
			), 
			'img'=>array(
				'src'=>array(), 
				'alt'=>array(), 
				'class'=>array(), 
				'width'=>array(), 
				'height'=>array()
			)
			));
		}
	?>
    </div>
	<?php if(has_post_thumbnail()):?>
    	<?php $col_class = 'col-sm-8'; ?>
		<?php if(is_single()): ?>
            <?php catalog_post_thumb( 1200, 600 ); ?>
        <?php else: ?>
        <div class=" col-sm-4 post-thumb-img padding-left-zero">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php catalog_post_thumb( 400, 400 ); ?></a>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <?php $col_class = 'col-sm-12'; ?>
    <?php endif; ?>
    
    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
        <div class="post-meta sticky-posts">
        <?php $sticky_post_text = (function_exists('ot_get_option'))? ot_get_option( 'sticky_post_text', 'Featured' ) : 'Featured'; ?>
        <div class="sticky-content"><?php printf( '<span class="sticky-post">%s</span>', $sticky_post_text ); ?></div>
        </div>
    <?php endif; ?>
    <?php if(is_single()): ?>
    <div class="col-sm-12 col-xs-12 padding-left-zero">
    <?php else: ?>
    <div class="<?php echo esc_attr($col_class); ?> col-xs-12 padding-right-zero">
    <?php endif; ?>
    <?php if(!is_single()): ?>
    	<?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
    <?php endif; ?>
    <ul class="list-inline">
		<?php
        $categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a comma.', 'catalog' ) );
        if ( $categories_list ): ?>
        <li><i class="fa fa-folder-open-o"></i>
        <?php echo wp_kses($categories_list,array(
			'a' => array(
			  'href' => array(),
			  'rel' => array()
			),
		  )); ?>
        </li>
        <?php
        endif;
        ?>
        <li><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd M Y' ); ?></a></li>
        <li><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><i class="fa fa-user"></i> <?php echo get_the_author_meta('display_name'); ?></a></li>
    </ul><!-- end meta -->        
        
        <?php if ( is_search()): ?>
            <div class="blog-desc-small"><?php the_excerpt(); ?></div>
        <?php else : ?>
            <div class="blog-desc-small">
            <?php the_content(sprintf(esc_html__( 'Read More', 'catalog' ) ) ); ?>
            </div>
        <?php endif; ?>
    </div>
        <?php if(is_single()): ?>        
			<?php
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'catalog' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'catalog' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
            <div class="edit_post_link">
                <?php edit_post_link( esc_html__( 'Edit', 'catalog' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
        
			<?php
            $tags_list = get_the_tag_list( '<ul class="single-blog-tags"><li>' .esc_html__('Tags:', 'catalog') .'</li><li>','</li><li>','</li></ul>');
            if ( $tags_list ): ?>
                <div class="blog-tags">
                    <?php echo wp_kses( 
                      $tags_list, 
                      // Only allow ul, li tags
                      array(
                        'ul' => array(
                          'class' => array()
                        ),
                        'li' => array(
                          'class' => array()
                        ),
                        'a' => array(
                          'href' => array()
                        ),
                      )
                    ); ?>
                </div> 
            <?php 
            endif;
            ?>
        
        <?php endif; ?>
</div>