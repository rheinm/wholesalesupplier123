<?php
require CATALOGTHEMEDIR . '/include/breadcrumbs.php';
require CATALOGTHEMEDIR. '/include/widgets.php';
require CATALOGTHEMEDIR. '/include/woo_functions.php';
function catalog_excerpt_more( $more ) {
	$readmore_text = (function_exists('ot_get_option'))? ot_get_option("readmore_text", 'read more') : 'read more';
	return '<a class="read-more" href="' . esc_url(get_permalink( get_the_ID() ) ) . '">' . $readmore_text . '</a>';
} // end catalog_excerpt_more function

add_filter( 'excerpt_more', 'catalog_excerpt_more' );

function catalog_excerpt_length( $length ) {
	$length = (function_exists('ot_get_option'))? ot_get_option("excerpt_length", 20) : 20;
	if( $length!= ''){
		return $length;
	} else{
	return 20;
	}	
} // end catalog_excerpt_length function

add_filter( 'excerpt_length', 'catalog_excerpt_length', 999 );

if ( ! function_exists( 'catalog_comment_form' ) ) :
// catalog comments form
function catalog_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];

	$comments_field = '<textarea id="comment" name="comment" aria-required="true" cols="30" rows="5" placeholder="' . esc_attr__( 'Message Below', 'catalog' ) . '" class="form-control"></textarea>';
	
	$fields   =  array(
		'author' => '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Name', 'catalog' ) . '" class="form-control" />',
		
		'email'  => '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Email', 'catalog' ) . '" class="form-control" />',
		
		'url' => '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" placeholder="' . esc_attr__( 'Website', 'catalog' ) . '" class="form-control" />',
	);
	
	$defaults = array(
		'fields'               => apply_filters( 'catalog_comment_form_default_fields', $fields ),
		
		'comment_field'        => $comments_field,
		
		'must_log_in'          => '<p class="must-log-in">' . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'catalog' ), array('a' => array(
					  'href' => array()),)) , wp_login_url( apply_filters( 'catalog_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p>',
		
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'catalog' ), array('a' => array('href' => array()),)) , esc_url(get_edit_user_link()), esc_html($user_identity), wp_logout_url( apply_filters( 'catalog_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p>',
		
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => esc_html__( 'Leave a Comment', 'catalog' ),
		'title_reply_to'       => esc_html__( 'Leave a Comment to %s', 'catalog' ),
		'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'catalog' ),
		'label_submit'         => esc_html__( 'Submit Comment', 'catalog' ),
		'format'               => 'xhtml',
	);

	$args = wp_parse_args( $args, apply_filters( 'catalog_comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<div class="widget page-with-bg">
                <div class="widget-title">
					<h4><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
					<?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></h4>
                </div>
				<div class="contact_form" id="respond">
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php 
					echo wp_kses($args['must_log_in'],array(
					'a' => array(
					  'title' => array(),
					  'href' => array(),
					  'class' => array()
					),
					'span' => array(
					  'class' => array(),
					),
				  )); ?>
					<?php do_action( 'catalog_comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="contact-form"<?php echo esc_attr($html5) ? ' novalidate' : ''; ?>>
                    <?php if ( is_user_logged_in() ) : ?>
						<?php echo apply_filters( 'catalog_comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                    <?php endif; ?>
						
					<?php if ( is_user_logged_in() ) : ?>
                    <?php echo apply_filters( 'catalog_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php else : ?>
                            <?php
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "catalog_comment_form_field_{$name}", $field ) . "\n";
							}
							?>
                            <?php echo apply_filters( 'catalog_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php endif; ?>                        
						<input class="btn custombutton button--isi btn-primary" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                        <?php comment_id_fields( $post_id ); ?>
						<?php do_action( 'catalog_comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
                </div>
			</div><!--.widget-->
		<?php else : ?>
			<?php do_action( 'catalog_comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
} // end catalog_comment_form function
endif;

function catalog_body_class( $classes ) {
	
	if(is_page_template( 'page-templates/maintenance-page.php' )){
		$classes[] = 'maintenance bundle nobg';
	}
	
	$classes[] = (function_exists('ot_get_option'))? ot_get_option( 'background_option_style', 'app_stock' ) : 'app_stock';

	if(is_page()){
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'full';
		}
	}
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else{
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	
	$classes[] = 'layout-'.$layout;

	return $classes;
}
add_filter( 'body_class', 'catalog_body_class' );

 if ( ! function_exists( 'catalog_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own catalog_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function catalog_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php esc_html_e( 'Pingback:', 'catalog' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'catalog' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class('comment-list'); ?> id="comment-<?php comment_ID(); ?>">
    	<div class="media"><div class="media-left">
            <a href="<?php echo esc_url(get_comment_author_link()); ?>"><?php echo get_avatar( $comment, 65 ); ?></a>
        </div>
        <div class="media-body">
        	<h4 class="media-heading">
				<?php printf( '%1$s %2$s', get_comment_author_link(), ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'catalog' ) . '</span>' : ''
                );
                ?>
                <span class="time-comment">
					<?php
                    printf( '<small>%3$s</small>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ),
                        /* translators: 1: date, 2: time */
                        sprintf( esc_html__( '%1$s at %2$s', 'catalog' ), get_comment_date(), get_comment_time() )
                    );
                    ?>
                    <?php
                    edit_comment_link( esc_html__( 'Edit', 'catalog' ), '<span class="cedit-link btn btn-primary comment-reply btn-xs">', '</span>' );
                    comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'catalog' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                    ?>
                </span>                
             </h4>
             <p><?php comment_text(); ?></p>
             <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'catalog' ); ?></p>
                <?php endif; ?>
         </div>
         </div>							
	<?php
		break;
	endswitch; // end comment_type check
} // end catalog_comments function
endif;

function catalog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'catalog_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'catalog_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so catalog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so catalog_categorized_blog should return false.
		return false;
	}
} // end catalog_categorized_blog function

if ( ! function_exists( 'catalog_category_transient_flusher' ) ) :
function catalog_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'catalog_categories' );
} // end catalog_category_transient_flusher function
endif;

add_action( 'edit_category', 'catalog_category_transient_flusher' );
add_action( 'save_post',     'catalog_category_transient_flusher' );

if ( ! function_exists( 'catalog_fonts_url' ) ) :
function catalog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'catalog' ) ) {
		$fonts[] = 'Lora:400,400italic,700,700italic';
	}
	
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'catalog' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}
	
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'catalog' ) ) {
		$fonts[] = 'Roboto:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) )
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
} // end catalog_fonts_url function
endif;

if ( ! function_exists( 'catalog_mce_css' ) ) :
function catalog_mce_css( $mce_css ) {
	$fonts_url = catalog_fonts_url();

	if ( empty( $fonts_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $fonts_url ) );

	return $mce_css;
} // end catalog_mce_css function
endif;

add_filter( 'mce_css', 'catalog_mce_css' );

if ( ! function_exists( 'catalog_fix_gallery' ) ) :
function catalog_fix_gallery($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;
    $size_class = '';

    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => '',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        */
    $size_class = ($size != '' )?sanitize_html_class( $size ) : 'normal';
    $gallery_div = '<div id="'.esc_attr($selector).'" class="row gallery galleryid-'.esc_attr($id).'">';
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$width = round(1250/$columns);
	$height = round(1250/$columns);
	
	$col_class = intval(12/$columns);
	
    foreach ( $attachments as $id => $attachment ) {

        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		 $image_url = wp_get_attachment_url($id, $size, false, false);
		 $attatchement_image = catalog_image_resize( $image_url, $width, $height, true, false, false );
        
		$output .= '<div class="col-lg-'.esc_attr($col_class).' col-md-'.esc_attr($col_class).' col-sm-4 col-xs-12 img-content">';
        $output .= '<a data-rel="prettyPhoto[1]" href="' .esc_url($image_url). '" ><img src="' . esc_url($attatchement_image) . '" alt="'.esc_attr__('images thumbnail', 'catalog').'" /></a>
            </div>';  
    }
    $output .= '</div>';
    return $output;
} // end catalog_fix_gallery function
endif;

add_filter("post_gallery", "catalog_fix_gallery",10,2);


if ( ! function_exists( 'catalog_posts_nav' ) ) :
function catalog_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 ) {

	} else {
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="content-after text-center boxs"><div class="row"><div class="col-md-12"><nav class="pagination-wrapper"><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? 'list-nav current' : 'list-nav';

		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></nav></div></div></div>' . "\n";

} // end catalog_posts_nav function
}
endif;

function catalog_next_prev_posts() {					
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
    <div class="content-after text-center boxs">
        <div class="row">
            <div class="col-md-12">
                <nav class="pagination-wrapper">
                    <ul class="pagination">
                    <?php if (!empty( $prev_post )): ?>
                        <li>
                        <a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>" aria-label="<?php echo esc_attr('Prev', 'catalog'); ?>">
                                <span aria-hidden="true"><?php echo esc_html__('Prev Post', 'catalog'); ?></span>
                            </a>
                        </li>
                        <?php endif;
                        if (!empty( $next_post )): ?>
                        <li>
                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>" aria-label="<?php echo esc_attr('Next', 'catalog'); ?>">
                                <span aria-hidden="true"><?php echo esc_html__('Next Post', 'catalog'); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div><!-- end row -->
    </div>	
	<?php
}

function catalog_new_contactmethods( $catalog_contactmethods ) {
	// Add Twitter
	$catalog_contactmethods['twitter'] = esc_html__('Twitter', 'catalog');
	//add Facebook
	$catalog_contactmethods['facebook'] = esc_html__('Facebook', 'catalog');
	//add LinkedIn
	$catalog_contactmethods['linkedin'] = esc_html__('LinkedIn', 'catalog');
	//add GooglePlus
	$catalog_contactmethods['googleplus'] = esc_html__('GooglePlus', 'catalog');
	//add Dribbble
	$catalog_contactmethods['dribbble'] = esc_html__('Dribbble', 'catalog');
	//add Behance
	$catalog_contactmethods['behance'] = esc_html__('Behance', 'catalog');
	//add Pinterest
	$catalog_contactmethods['pinterest'] = esc_html__('Pinterest', 'catalog');
	//add Phone number
	$catalog_contactmethods['user_phone'] = esc_html__('Phone Number', 'catalog');
	//add Location
	$catalog_contactmethods['user_location'] = esc_html__('Location', 'catalog');
	//add Banner
	$catalog_contactmethods['user_banner'] = esc_html__('Banner', 'catalog');
	 
	return $catalog_contactmethods;
}
add_filter('user_contactmethods','catalog_new_contactmethods',10,1);

add_action('wp_logout','catalog_go_home');
function catalog_go_home(){
  wp_redirect( home_url() );
  exit();
}

if(class_exists('WPCF7_ContactFormTemplate')){
	function catalog_filter_wpcf7_default_template( $template, $prop ) { 
		// make filter magic happen here...
		$template ='<div class="contact_form">[text* your-name class:form-control placeholder "'. esc_attr__('Name', 'catalog') .'"]
		[email* your-email class:form-control placeholder "' . esc_attr__('Email', 'catalog').'"]
		[text your-phone class:form-control placeholder "' . esc_attr__('Phone', 'catalog'). '"]
		[textarea your-message class:form-control placeholder "'. esc_attr__('Message Below', 'catalog').'"]
		[submit class:btn class:btn-primary "' . esc_html__( 'SEND MAIL', 'catalog' ) . '"]</div>';
		return $template; 
	};			 
	// add the filter 
	add_filter( 'wpcf7_contact_form_default_pack', 'catalog_filter_wpcf7_default_template', 10, 2 );
}

add_filter( 'wp_nav_menu_items', 'catalog_custom_menu_item', 10, 2 );
function catalog_custom_menu_item ( $items, $args ) {
    if ($args->theme_location == 'profile-menu') {
        $items .= '<li><a href="'.wp_logout_url().'">'.esc_html__('Logout', 'catalog').'</a></li>';
    }
    return $items;
}

function catalog_search_form(){
	?>
    <form class="dropForm" method="get" id="searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-prepend">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="<?php echo esc_attr__('Search anything here.', 'catalog'); ?>" />
            <?php
			if (class_exists( 'woocommerce' )):
			?>
			<input type="hidden" name="post_type" value="product" />
			<?php
			endif;
			?>
            <button class="btn btn-primary hidden-xs" tabindex="-1" type="submit"><i class="fa fa-search"></i></button>                            
        </div>
    </form>
    <?php	
}