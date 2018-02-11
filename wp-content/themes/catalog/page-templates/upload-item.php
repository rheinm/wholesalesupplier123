<?php
/**
 * Template Name: Upload Item
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
if(!is_user_logged_in()):
wp_redirect( home_url() );
endif;

if(is_user_logged_in()):
	global $wp_roles;
	foreach ( $wp_roles->role_names as $role => $name ) :							
		if ( current_user_can( $role ) ):
		$user_role = $role;
		endif;							
	endforeach;
	
	$current_user = wp_get_current_user();
	$author_link = get_author_posts_url( $current_user->ID );
	$success_message = '';
	
	if( isset ( $_POST['upload_product_submission'] ) ) {
		$errors = array();
		$check = true;
		
		$upload_product_title = sanitize_title($_POST['upload_product_title']);
		$upload_product_description = sanitize_text_field($_POST['upload_product_description']);
		
		$terms = $_POST['product_category_update'];
		$tags = $_POST['upload_product_tags'];
		
		$product_upload_type = $_POST['product_upload_type'];
		if($product_upload_type == 'type_photo_stock'){
			$upload_photo_id = sanitize_text_field($_POST['upload_photo_id']);
		} else{
			$upload_product_version = sanitize_text_field($_POST['upload_product_version']);
			$upload_product_compatible = sanitize_text_field($_POST['upload_product_compatible']);
			$upload_software_version = sanitize_text_field($_POST['upload_software_version']);
			$upload_product_layout = sanitize_text_field($_POST['upload_product_layout']);
			$upload_product_column = sanitize_text_field($_POST['upload_product_column']);
			$upload_product_preview_url = sanitize_text_field($_POST['upload_product_preview_url']);
		}
		
		$upload_product_standard_price = sanitize_text_field($_POST['upload_product_standard_price']);
		
		$upload_product_comments = sanitize_text_field($_POST['upload_product_comments']);
		
		if ( $upload_product_title == '' ){
			$errors['upload_product_title'] = '<span class="warning">'.esc_html__('Please Type your title', 'catalog').'</span>';
			$check = false;
		}		
		
		if ( $upload_product_description == '' ){
			$errors['upload_product_description'] = '<span class="warning">'.esc_html__('Please Type your description', 'catalog').'</span>';
			$check = false;
		}
		
		if ( empty($tags) ){
			$errors['upload_product_tags'] = '<span class="warning">'.esc_html__('Please type tags', 'catalog').'</span>';
			$check = false;
		}
		
		if($product_upload_type == 'type_photo_stock'){
			if ( $upload_photo_id == '' ){
				$errors['upload_photo_id'] = '<span class="warning">'.esc_html__('Please Type product id', 'catalog').'</span>';
				$check = false;
			}
		}else{
		if ( $upload_product_version == '' ){
			$errors['upload_product_version'] = '<span class="warning">'.esc_html__('Please Type version', 'catalog').'</span>';
			$check = false;
		}
		
		if ( $upload_product_compatible == '' ){
			$errors['upload_product_compatible'] = '<span class="warning">'.esc_html__('Please Type compatibility', 'catalog').'</span>';
			$check = false;
		}
		
		if ( $upload_software_version == '' ){
			$errors['upload_software_version'] = '<span class="warning">'.esc_html__('Please Type software version', 'catalog').'</span>';
			$check = false;
		}
		
		if ( $upload_product_layout == '' ){
			$errors['upload_product_layout'] = '<span class="warning">'.esc_html__('Please Type layout', 'catalog').'</span>';
			$check = false;
		}
		
		if ( $upload_product_column == '' ){
			$errors['upload_product_column'] = '<span class="warning">'.esc_html__('Please Type column', 'catalog').'</span>';
			$check = false;
		}
		
		if ( $upload_product_preview_url == '' ){
			$errors['upload_product_preview_url'] = '<span class="warning">'.esc_html__('Please Type preview url', 'catalog').'</span>';
			$check = false;
		}
		}
		
		if ( $upload_product_standard_price == '' ){
			$errors['upload_product_standard_price'] = '<span class="warning">'.esc_html__('Please Type standard price', 'catalog').'</span>';
			$check = false;
		}
		
		if ($_FILES['upload_product_screenshot']['size'] == 0) {
			$errors['upload_product_screenshot'] = '<span class="warning">'.esc_html__('Please upload screenshot', 'catalog').'</span>';
			$check = false;
		}
		
		if ($_FILES['upload_product_files']['size'] == 0) {
			$errors['upload_product_files'] = '<span class="warning">'.esc_html__('Please upload product files', 'catalog').'</span>';
			$check = false;
		}
		
		if($check){
			$my_post = array(
			'post_title'    => $upload_product_title,
			'post_content'  => $upload_product_description,
			'post_status'   => 'pending',
			'post_author'   => $current_user->ID,
			'post_type'     => 'product',
			);
			
			// Insert the post into the database
			$post_id = wp_insert_post( $my_post );
			wp_set_post_terms( $post_id, $terms, 'product_cat' );
			wp_set_post_terms( $post_id, $tags, 'product_tag' );
			
			if ($_FILES) {
			array_reverse($_FILES);
			$i = 0;//this will count the posts
			foreach ($_FILES as $file => $array) {
				if ($i == 0) $set_feature = 1; //if $i ==0 then we are dealing with the first post
				else $set_feature = 0; //if $i!=0 we are not dealing with the first post
				$newupload = catalog_insert_attachment($file,$post_id, $set_feature);
				$i++; //count posts
				}
			} 
			
			if($product_upload_type == 'type_photo_stock'){
				update_post_meta( $post_id, 'image_id_stock', $upload_photo_id );
			}else{
			update_post_meta( $post_id, 'upload_product_preview_url', $upload_product_preview_url );
			update_post_meta( $post_id, 'product_release_version', $upload_product_version );
			update_post_meta( $post_id, 'product_requirements', $upload_product_compatible );
			update_post_meta( $post_id, 'product_software', $upload_software_version );
			update_post_meta( $post_id, 'product_layout', $upload_product_layout );
			update_post_meta( $post_id, 'upload_product_column', $upload_product_column );
			}
			update_post_meta( $post_id, 'product_type', $product_upload_type );
			update_post_meta( $post_id, '_regular_price', $upload_product_standard_price );
			update_post_meta( $post_id, 'upload_product_comments', $upload_product_comments );
			
			$success_message = esc_html__('Item Upload Successfully', 'catalog');
		}
	}
endif;

get_header(); ?>
	<?php get_template_part( 'layout/before', '' ); ?>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			
			 if(is_user_logged_in()){
				 if($user_role == 'vendor' || $user_role == 'administrator'){
		global $product;
		$args = array( 'hide_empty' => false );
		$taxonomy_name = 'product_cat';
		$terms = get_terms( $taxonomy_name, $args );
		?>
		<div class="col-md-8 col-md-offset-2">
				<div class="widget-title">
                	<?php if($success_message !=''): ?>
					<h4 class="upload-success-message"><?php echo esc_html($success_message); ?></h4> 
                    <?php endif; ?>
					<h4><?php echo esc_html__('Upload New Item', 'catalog'); ?></h4>
				</div><!-- end widget-title -->
				<form class="uploaditem" method="post" enctype="multipart/form-data">
					<div class="space"> 
						<label><?php echo esc_html__('Item Type : ', 'catalog'); ?></label> 
						<select class="selectpicker" data-live-search="true" name="product_upload_type" id="product_upload_type">
							<option value="type_app_stock" selected="selected"><?php echo esc_html__('App', 'catalog'); ?></option>
                            <option value="type_photo_stock"><?php echo esc_html__('Photo', 'catalog'); ?></option>
						</select>  
					</div>
                    <div class="space"> 
						<label><?php echo esc_html__('Item Category : ', 'catalog'); ?></label> 
						<select class="selectpicker" data-live-search="true" name="product_category_update">
                        	<?php foreach ( $terms as $term ): ?>
							<option value="<?php echo esc_html($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>
                            <?php endforeach; ?>
						</select>  
					</div>

					<div class="space">
						<label><?php echo esc_html__('Item Title : ', 'catalog'); ?><?php if(isset($errors['upload_product_title'])) echo wp_kses($errors['upload_product_title'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_title">    
					</div>

					<div class="space">
						<label><?php echo esc_html__('Item Details : ', 'catalog'); ?><?php if(isset($errors['upload_product_description'])) echo wp_kses($errors['upload_product_description'], array('span'=>array('class'=>array()))); ?></label>
						<textarea class="form-control" placeholder="" name="upload_product_description"></textarea>
					</div>

					<div class="space">
						<label><?php echo esc_html__('Tags (Separate by commas) : ', 'catalog'); ?><?php if(isset($errors['upload_product_tags'])) echo wp_kses($errors['upload_product_tags'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_tags">    
					</div>
                    
					<div class="product-fields-app-version">
                    
					<div class="space">
						<label><?php echo esc_html__('Version (Ex : 1.2) ', 'catalog'); ?><?php if(isset($errors['upload_product_version'])) echo wp_kses($errors['upload_product_version'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_version">    
					</div>

					<div class="space">
						<label><?php echo esc_html__('Compatible : ', 'catalog'); ?><?php if(isset($errors['upload_product_compatible'])) echo wp_kses($errors['upload_product_compatible'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_compatible">    
					</div>

					<div class="space">   
						<label><?php echo esc_html__('Software : ', 'catalog'); ?><?php if(isset($errors['upload_software_version'])) echo wp_kses($errors['upload_software_version'], array('span'=>array('class'=>array()))); ?></label>
                        <input type="text" class="form-control" name="upload_software_version" placeholder="">  
					</div>

					<div class="space">   
						<label><?php echo esc_html__('Layout : ', 'catalog'); ?><?php if(isset($errors['upload_product_layout'])) echo wp_kses($errors['upload_product_layout'], array('span'=>array('class'=>array()))); ?></label> 
						<input type="text" class="form-control" name="upload_product_layout" placeholder="">  
					</div>

					<div class="space">
						<label><?php echo esc_html__('Columns : ', 'catalog'); ?><?php if(isset($errors['upload_product_column'])) echo wp_kses($errors['upload_product_column'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_column">    
					</div>

					<div class="space">
						<label><?php echo esc_html__('Preview URL : ', 'catalog'); ?><?php if(isset($errors['upload_product_preview_url'])) echo wp_kses($errors['upload_product_preview_url'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="<?php echo esc_attr__('http://', 'catalog'); ?>" name="upload_product_preview_url">    
					</div>
                    
                    </div> <!--product-fields-photo-version-->
                    
                    <div class="product-fields-photo-version">

					<div class="space">   
						<label><?php echo esc_html__('Photo ID : ', 'catalog'); ?><?php if(isset($errors['upload_photo_id'])) echo wp_kses($errors['upload_photo_id'], array('span'=>array('class'=>array()))); ?></label>
                        <input type="text" class="form-control" name="upload_photo_id" placeholder="">  
					</div>
                    
                    </div> <!--product-fields-photo-version-->

					<div class="space">
						<label><?php echo esc_html__('Submit a Screenshot ', 'catalog'); ?> <?php if(isset($errors['upload_product_screenshot'])) echo wp_kses($errors['upload_product_screenshot'], array('span'=>array('class'=>array()))); ?></label>
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="fileupload-preview thumbnail"></div>
							<br>
							<span class="btn btn-primary btn-file">
								<span class="fileupload-new"><?php echo esc_html__('Select image', 'catalog'); ?></span>
								<span class="fileupload-exists"><?php echo esc_html__('Change', 'catalog'); ?></span>
								<input type="file" name="upload_product_screenshot">
							</span>
							<a href="#" class="btn btn-primary fileupload-exists" data-dismiss="fileupload"><?php echo esc_html__('Remove', 'catalog'); ?></a>
						</div>
					</div>

					<div class="space">
						<label><?php echo esc_html__('Standard License Price : ', 'catalog'); ?><?php if(isset($errors['upload_product_standard_price'])) echo wp_kses($errors['upload_product_standard_price'], array('span'=>array('class'=>array()))); ?></label>
						<input type="text" class="form-control" placeholder="" name="upload_product_standard_price">    
					</div>

					<div class="space">
						<label><?php echo esc_html__('Upload Item (only .zip) : ', 'catalog'); ?> <?php if(isset($errors['upload_product_files'])) echo wp_kses($errors['upload_product_files'], array('span'=>array('class'=>array()))); ?></label>
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="fileupload-preview thumbnail"></div>
							<br>
							<span class="btn btn-primary btn-file">
								<span class="fileupload-new"><?php echo esc_html__('Select File', 'catalog'); ?></span>
								<span class="fileupload-exists"><?php echo esc_html__('Change', 'catalog'); ?></span>
								<input type="file" name="upload_product_files">
							</span>
							<a href="#" class="btn btn-primary fileupload-exists" data-dismiss="fileupload"><?php echo esc_html__('Remove', 'catalog'); ?></a>
						</div>
					</div>

					<div class="space">
						<label><?php echo esc_html__('Extra Notes : ', 'catalog'); ?></label>
						<textarea class="form-control" placeholder="" name="upload_product_comments"></textarea>
					</div>

					<div class="space">
                    	<input type="submit" class="btn btn-primary btn-block" name="upload_product_submission" value="<?php echo esc_html__('Submit Item', 'catalog'); ?>" />
					</div>

				</form>
			</div>
            <?php
				} else{
					if (class_exists('WCV_Vendors') ) {
						$redirect_to = get_permalink(WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ));
					} else {
						$redirect_to = home_url();
					}
					wp_redirect( $redirect_to );
				}
			 }

		// End the loop.
		endwhile;
		?>
    <?php get_template_part( 'layout/after', '' ); ?>
<?php get_footer(); ?>
