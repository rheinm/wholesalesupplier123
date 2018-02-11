<?php
/*---stop open link---*/
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'catalog_template_loop_comments_views', 10 );

/*remove existing title and set theme's title*/
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'catalog_template_loop_product_title', 10 );

function catalog_wc_product_type_options( $product_type_options ) {
    $product_type_options['virtual']['default'] = 'yes';
    $product_type_options['downloadable']['default'] = 'yes';
    return $product_type_options;
}
add_filter( 'product_type_options', 'catalog_wc_product_type_options' );

function catalog_template_loop_product_title(){
	echo '<h4><a href="' .esc_url(get_permalink()). '">' . get_the_title() . '</a></h4>';
}

/*product thumbnail for theme's style*/
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'catalog_get_product_thumbnail', 10 );

function catalog_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $post;
	global $product;
	
	if ( has_post_thumbnail() ) {
		$image = catalog_post_thumb( 600, 600, false );
	} elseif ( wc_placeholder_img_src() ) {
		$image = wc_placeholder_img( $size );
	}
	
	$authorid = get_the_author_meta( 'ID' );
	$author_link = get_author_posts_url( $authorid );
	
	?>
	<div class="item-media entry">
    	
		<a href="<?php echo esc_url(get_permalink()); ?>">
		<span class="background-overlay-img"></span><?php 
		echo wp_kses($image,array(
			'img' => array(
			  'src' => array(),
			  'alt' => array(),
			  'class' => array()
			),
		  ));
		?>
        </a>
		<div class="magnifier">
			<div class="item-author">
				<a href="<?php echo esc_url($author_link); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30, null, null, array( 'class' => array( 'img-circle' ) ) ); ?>
				<?php echo get_the_author(); ?></a>
			</div><!-- end author -->
		</div>
		<div class="theme__button">
			<p><a href="<?php echo esc_url(get_permalink()); ?>" title="">
			<?php 
			echo wp_kses($product->get_price_html(),array(
				'a' => array(
				  'title' => array(),
				  'href' => array(),
				  'class' => array()
				),
				'span' => array(
				  'class' => array(),
				),
				'del' =>array('class'=>array()),
				'ins'	=>array('class'=>array())
			  ));
			?></a></p>
		</div>
	</div>
	
<?php
}

function catalog_template_loop_comments_views() {
	global $post;
	global $product;	
	?>
    <?php if(function_exists('pvc_get_post_views')): ?>
    <small><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-eye"></i><?php echo wp_kses(pvc_get_post_views( get_the_ID() ), array('span'=>array())); ?></a></small>
    <?php endif; ?>
    <small><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-comment-o"></i><?php echo get_comments_number(); ?></a></small>
	<?php							
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_action( 'woocommerce_single_product_summary', 'catalog_template_top_section_start', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'catalog_template_top_section_end', 50 );

function catalog_template_top_section_start() {
	?>
	<div class="boxes boxs">
		<div class="item-price text-center">
	<?php
}

function catalog_template_top_section_end() {
	?>
		</div>
	</div>
	<?php	
}

function catalog_social_share(){
	global $post;
	?>
	<ul class="list-inline social">
		<li class="facebook">
		   <!--fb-->
		   <a target="_blank" href="//www.facebook.com/share.php?u=<?php print(urlencode(the_permalink())); ?>&title=<?php print(urlencode(get_the_title())); ?>" title="<?php esc_html_e('Share this post on Facebook!', 'catalog')?>"><i class="fa fa-facebook"></i></a>
		</li>
		<li class="twitter">
		   <!--twitter-->
		   <a target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>:<?php esc_url(the_permalink()); ?>" title="<?php esc_html_e('Share this post on Twitter!', 'catalog')?>"><i class="fa fa-twitter"></i></a>
		</li>
		<li class="google-plus">
		   <!--g+-->
		   <a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" title="<?php esc_html_e('Share this post on Google Plus!', 'catalog')?>"><i class="fa fa-google-plus"></i></a>
		</li>
		<li class="linkedin">
		   <!--linkedin-->
		   <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink()); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=LinkedIn" title="<?php esc_html_e('Share this post on Linkedin!', 'catalog')?>"><i class="fa fa-linkedin"></i></a>
		</li>
		<li class="pinterest">
		   <!--Pinterest-->
		   <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink());?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo site_url()?>" class="pin-it-button" count-layout="horizontal" title="<?php esc_html_e('Share on Pinterest','catalog') ?>"><i class="fa fa-pinterest"></i></a>
		</li>
		<li class="email-share">
		   <!--Email-->
		   <a title="<?php esc_html_e('Share by email','catalog') ?>" href="mailto:?subject=Check this post - <?php the_title();?> &body= <?php esc_url(the_permalink()); ?>&title="<?php esc_attr(the_title()); ?>" email"=""><i class="fa fa-envelope"></i></a>
		</li>
	</ul>
	<?php
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'catalog_template_author_info', 60 );

function catalog_template_author_info(){	
	global $product;

	$authorid = get_the_author_meta( 'ID' );
	$author_name = get_the_author_meta( 'display_name' );
	$author_link = get_author_posts_url( $authorid );
	
	echo '<div class="boxes boxs">
		<div class="desiger-details text-center">
			'.get_avatar( get_the_author_meta( 'user_email' ), 100, null, null ).'
			<h4><a href="'.esc_url($author_link).'">'.$author_name.'</a></h4>
			<small><a href="'.esc_url($author_link).'"><i class="fa fa-envelope-o"></i>'. esc_html__('Send a Message', 'catalog').'</a> &nbsp;&nbsp; <a href="'.esc_url($author_link).'"><i class="fa fa-user-plus"></i>'.sprintf(esc_html__('Follow %s', 'catalog'), $author_name).'</a> </small>
		</div><!-- end designer -->
	</div><!-- end boxes -->';
}

/**
 * Initialize the product meta boxes. 
 */
add_action( 'admin_init', 'catalog_custom_product_meta_boxes' );

function catalog_custom_product_meta_boxes() {
	if( function_exists( 'ot_get_option' ) ):
  $my_meta_box_pro = array(
    'id'        => 'product_details_information',
    'title'     => esc_html__('Product Info', 'catalog'),
    'desc'      => '',
    'pages'     => array( 'product' ),
    'context'   => 'side',
    'priority'  => 'low',
    'fields'    => array(
		array(
        'id'          => 'product_type',
        'label'       => esc_html__('Product Type', 'catalog' ),
        'desc'        => esc_html__('Product Type', 'catalog'),
        'std'         => 'type_app_stock',
        'min_max_step' => '',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
			array(
				'value'       => 'type_app_stock',
				'label'       => esc_html__( 'App Stock', 'catalog' ),
			  ),
			   array(
				'value'       => 'type_photo_stock',
				'label'       => esc_html__( 'Photo Stock', 'catalog' ),
			  ),
		  )
      ),
	  array(
        'id'          => 'upload_product_preview_url',
        'label'       => esc_html__('Preview URL', 'catalog' ),
        'desc'        => esc_html__('Preview url of live demo', 'catalog' ),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
      array(
        'id'          => 'product_release_version',
        'label'       => esc_html__('Product Version', 'catalog' ),
        'desc'        => esc_html__('Product version', 'catalog' ),
        'std'         => '1.0',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
      array(
        'id'          => 'upload_product_column',
        'label'       => esc_html__('Columns', 'catalog' ),
        'desc'        => esc_html__('ex: 4', 'catalog'),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'product_software',
        'label'       => esc_html__('Product Software', 'catalog' ),
        'desc'        => esc_html__('Write product software', 'catalog'),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'product_requirements',
        'label'       => esc_html__('Compatible', 'catalog' ),
        'desc'        => esc_html__('Separate with commas', 'catalog'),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'product_layout',
        'label'       => esc_html__('Product Layout', 'catalog' ),
        'desc'        => esc_html__('Product layout', 'catalog'),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'product_document',
        'label'       => esc_html__('Product Document', 'catalog' ),
        'desc'        => esc_html__('Product Document', 'catalog'),
        'std'         => 'on',
        'min_max_step' => '',
        'type'        => 'on-off',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'product_info_support',
        'label'       => esc_html__('Product Support', 'catalog' ),
        'desc'        => esc_html__('Product Support', 'catalog'),
        'std'         => 'Life Time',
        'min_max_step' => '',
        'type'        => 'select',
        'class'       => '',
		'condition'   => 'product_type:not(type_photo_stock)',
        'choices'     => array(
			array(
				'value'       => '6_month',
				'label'       => esc_html__( '6 Months', 'catalog' ),
			  ),
			   array(
				'value'       => '1_year',
				'label'       => esc_html__( '1 Year', 'catalog' ),
			  ),
			   array(
				'value'       => 'life_time',
				'label'       => esc_html__( 'Life Time', 'catalog' ),
			  ),
		  )
      ),    
	array(
        'id'          => 'photo_image_size',
        'label'       => esc_html__( 'Image Details', 'catalog' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'condition'   => 'product_type:is(type_photo_stock)',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'image_size',
            'label'       => esc_html__( 'Size', 'catalog' ),
            'desc'        => '',
            'std'         => 'S',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'image_width',
            'label'       => esc_html__( 'Width (in px)', 'catalog' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => ''
          ),
		  array(
            'id'          => 'image_height',
            'label'       => esc_html__( 'Height (in px)', 'catalog' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => ''
          ),
        ),
      ),
	  array(
        'id'          => 'image_id_stock',
        'label'       => esc_html__('Photo ID', 'catalog' ),
        'desc'        => '',
        'std'         => '#123',
        'min_max_step' => '',
        'type'        => 'text',
        'class'       => '',
		'condition'   => 'product_type:is(type_photo_stock)',
        'choices'     => array()
      ),
	  array(
        'id'          => 'upload_product_comments',
        'label'       => esc_html__('Extra Notes', 'catalog' ),
        'desc'        => esc_html__('Extra notes from author', 'catalog'),
        'std'         => '',
        'min_max_step' => '',
        'type'        => 'textarea',
        'class'       => '',
        'choices'     => array()
      ),
	),
  );
  
  ot_register_meta_box( $my_meta_box_pro );
	endif;
}

/*-----product info hook*/
add_action( 'woocommerce_single_product_summary', 'catalog_template_product_info', 70 );

function catalog_template_product_info(){
	
	$single_product_right_info = (function_exists('ot_get_option'))? ot_get_option('single_product_right_info', 'on') : 'on';
	
	if($single_product_right_info != 'off'){
	global $product;
	$product_type = get_post_meta( get_the_ID(), 'product_type', true );
	if($product_type == 'type_photo_stock'){
	} else{
	$document = get_post_meta( get_the_ID(), 'product_document', true );
	if($document == 'no'){
		$value_doc = 'No';
	} else{
		$value_doc = 'Yes';
	}
	
	$product_info_support = get_post_meta( get_the_ID(), 'product_info_support', true );
	if($product_info_support == '6_months'){
		$value_sup = esc_html__( '6 Months', 'catalog' );
	} elseif($product_info_support == '1_year'){
		$value_sup = esc_html__( '1 Year', 'catalog' );
	} else{
		$value_sup = esc_html__('Life Time', 'catalog');
	}
	}
	
	?><div class="boxes boxs">
		<div class="item-details product-info">
			<table>
				<tr>
					<td><?php echo esc_html__('Release on:', 'catalog'); ?></td>
					<td><?php echo get_the_date('Y-m-d'); ?></td>
				</tr>
                <?php if($product_type == 'type_photo_stock'){ ?>
                <tr>
					<td><?php echo esc_html__('Artist:', 'catalog'); ?></td>
					<td><?php echo get_the_author(); ?></td>
				</tr>
                <tr>
					<td><?php echo esc_html__('Photo ID:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'image_id_stock', true ); ?></td>
				</tr>
                <tr>
					<td><?php echo esc_html__('Category:', 'catalog'); ?></td>
					<td>
						  <div class="product-tags">
							<?php echo get_the_term_list( get_the_ID(), 'product_cat' ); ?>
						</div>                      
					</td>
				</tr>            
				<?php } else{?>
				<tr>
					<td><?php echo esc_html__('Version:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'product_release_version', true ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__('Column:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'upload_product_column', true ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__('Software:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'product_software', true ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__('Compatible:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'product_requirements', true ); ?></td>
				</tr>
                <tr>
					<td><?php echo esc_html__('Layout:', 'catalog'); ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'product_layout', true ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__('Document:', 'catalog'); ?></td>
					<td><?php echo esc_html($value_doc); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__('Support:', 'catalog'); ?></td>
					<td><?php echo esc_html($value_sup); ?></td>
				</tr>
                <?php } ?>
				<tr>
					<td><?php echo esc_html__('Tags:', 'catalog'); ?></td>
					<td>
						  <div class="product-tags">
							<?php echo get_the_term_list( get_the_ID(), 'product_tag' ); ?>
						</div>                      
					</td>
				</tr>

			</table>
		</div>
		</div>
        <?php
	}
}

function catalog_author_cpt_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_author()) {
		  $query->set( 'posts_per_page', 12 );
        $query->set('post_type', array('product'));
      }
    }
}

add_action('pre_get_posts','catalog_author_cpt_filter');

add_filter('woocommerce_registration_errors', 'catalog_registration_errors_validation', 10,3);
function catalog_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', esc_html__( 'Passwords do not match.', 'catalog' ) );
	}
	return $reg_errors;
}
add_action( 'woocommerce_register_form', 'catalog_register_form_password_repeat' );
function catalog_register_form_password_repeat() {
	?>
	<div class="col-md-6">
    	<div class="form-group">
            <label for="reg_password2"><?php esc_html_e( 'Confirm Password', 'catalog' ); ?></label>
            <input type="password" class="form-control" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
            <span class="fa fa-lock"></span>
        </div>
	</div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="reg_phone"><?php esc_html_e( 'Phone Number', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="reg_phone" id="reg_phone" value="<?php if ( ! empty( $_POST['reg_phone'] ) ) echo esc_attr( $_POST['reg_phone'] ); ?>" />
            <span class="fa fa-phone"></span>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="reg_location"><?php esc_html_e( 'Location', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="reg_location" id="reg_location" value="<?php if ( ! empty( $_POST['reg_location'] ) ) echo esc_attr( $_POST['reg_location'] ); ?>" />
            <span class="fa fa-map-marker"></span>
        </div>
    </div>
	<?php
}

function catalog_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['reg_phone'] ) ) {
		update_user_meta( $customer_id, 'user_phone', sanitize_text_field( $_POST['reg_phone'] ) );
	}

	if ( isset( $_POST['reg_location'] ) ) {
		update_user_meta( $customer_id, 'user_location', sanitize_text_field( $_POST['reg_location'] ) );
	}
}

add_action( 'woocommerce_created_customer', 'catalog_save_extra_register_fields' );

function catalog_woocommerce_save_account_details( $user_id ) {
  
  update_user_meta( $user_id, 'user_phone', sanitize_text_field( $_POST[ 'account_phone_number' ] ) );
  update_user_meta( $user_id, 'user_location', sanitize_text_field( $_POST['account_location'] ) );
  
  update_user_meta( $user_id, 'twitter', sanitize_text_field( $_POST[ 'account_twitter_id' ] ) );
  update_user_meta( $user_id, 'facebook', sanitize_text_field( $_POST[ 'account_facebook_id' ] ) );
  update_user_meta( $user_id, 'linkedin', sanitize_text_field( $_POST[ 'account_linkedin_id' ] ) );
  update_user_meta( $user_id, 'googleplus', sanitize_text_field( $_POST[ 'account_googleplus_id' ] ) );
  update_user_meta( $user_id, 'dribbble', sanitize_text_field( $_POST[ 'account_dribbble_id' ] ) );
  update_user_meta( $user_id, 'behance', sanitize_text_field( $_POST[ 'account_behance_id' ] ) );
  update_user_meta( $user_id, 'pinterest', sanitize_text_field( $_POST[ 'account_pinterest_id' ] ) );
  
  if ($_FILES) {
	array_reverse($_FILES);
	$i = 0;//this will count the posts
	foreach ($_FILES as $file => $array) {
		//$newupload = catalog_insert_attachment($file,$post_id, $set_feature);
		if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK){ return __return_false(); 
		}
		$attach_id = media_handle_upload( $file, 0 );
		$file_url = wp_get_attachment_url( $attach_id );
		update_user_meta( $user_id, 'user_banner', esc_url( $file_url ) );
		$i++; //count posts
		}
	} 
}

add_action( 'woocommerce_save_account_details', 'catalog_woocommerce_save_account_details' );

function catalog_insert_attachment($file_handler,$post_id,$setthumb='false') {
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){ return __return_false(); 
	}

	$attach_id = media_handle_upload( $file_handler, $post_id );
	//set post thumbnail if setthumb is 1
	if ($setthumb == 1){
		update_post_meta($post_id,'_thumbnail_id',$attach_id);
	} else {
		$file_url = wp_get_attachment_url( $attach_id );
		$files[ md5( $file_url ) ] = array(
        'name' => esc_html__('downloadable file', 'catalog'),
        'file' => $file_url
      );
		update_post_meta($post_id,'_downloadable_files',$files);
	}
	return $attach_id;
}

function catalog_user_follower_number($follower_number){		
	$count_num = 0;
	$count_value = catalog_explode_total_value($follower_number);
	foreach($count_value as $key => $values ){
		if(!empty($values)){
			$count_num = count($count_value);
		} else {
			$count_num = 0;
		}
	}
	return $count_num;	
}

function catalog_explode_total_value($follower_number){	
	$value = '';
	if(is_array($follower_number) || is_object($follower_number)){
	foreach($follower_number as $key => $value ){
		$value = $value;
	}
	}
	$count_value = array_unique(explode(',' , $value ));
	return $count_value;	
}

add_filter('woocommerce_default_catalog_orderby', 'catalog_default_catalog_orderby');

function catalog_default_catalog_orderby() {
     return 'date'; // Can also use title and price
}

add_filter('woocommerce_login_redirect', 'catalog_login_redirect');

function catalog_login_redirect( $redirect_to ) {
     $redirect_to = home_url( '/' );
     return $redirect_to;
}

/*----------pgoto version-------------*/
add_action('woocommerce_before_add_to_cart_button', 'catalog_add_photo_details');

function catalog_add_photo_details(){
	global $woocommerce, $post, $product;
	$photo_image_size = get_post_meta( get_the_ID(), 'photo_image_size', true );
	if(!empty($photo_image_size)):
	?>
    <div class="table-responsive table-buy">
        <table class="table">
            <tbody>
            	<?php foreach( $photo_image_size as $value ): ?>
                <tr>
                    <th><?php echo esc_html($value['image_size']); ?></th>
                    <th class="last-img-size"><?php echo esc_html($value['image_width']); ?> x <?php echo esc_html($value['image_height']); ?> <?php echo esc_html__('pixel', 'catalog'); ?></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
	endif;
}