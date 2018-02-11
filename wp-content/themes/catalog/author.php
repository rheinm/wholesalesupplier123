<?php
/**
 * The template for displaying author pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Catalog already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Catalog
 * @since Catalog 1.0
 */

get_header(); ?>
	<?php
	$success_message = '';
	if(isset($_POST['email_submit'])){
		
		$to = sanitize_email($_POST['email_to']);
		$email = sanitize_email($_POST['from_email']);
		$subject = esc_html__('From Catalog Author', 'catalog');
		$message = sanitize_text_field($_POST['comment']);
		
		if(wp_mail( $to, $subject, $message )){
			$success_message = esc_html__('Your message has been sent.', 'catalog');
		} else {
			$success_message = esc_html__('Message not sent!', 'catalog');
		}
		
	}

	$current_user = wp_get_current_user();
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	$author_link = get_author_posts_url( $curauth->ID );
	
	$updated_followers_value[] = get_user_meta($curauth->ID, 'user_followers', true);
	$updated_following_value[] = get_user_meta($current_user->ID, 'user_following', true);
	$updated_following_value_2[] = get_user_meta($curauth->ID, 'user_following', true);
	$value = '';
	$value_following = '';
	
	if(get_user_meta($curauth->ID, 'user_followers', true)){
		foreach($updated_followers_value as $key => $value ){
			$value = $value;
		}
	}
	
	if(get_user_meta($current_user->ID, 'user_following', true)){
		foreach($updated_following_value as $key => $value_following ){
			$value_following = $value_following;
		}
	}
	
	if(isset($_POST['follow_submit'])){
		$follow_users = intval($_POST['follow_user_id']);
		$following_user_id = intval($_POST['following_user_id']);		
		
		if($value == ''){
			$new_value = $follow_users;
		} else {
			$new_value = $follow_users.','.$value;
		}
		
		if($value_following == ''){
			$new_value_following = $following_user_id;
		} else {
			$new_value_following = $following_user_id.','.$value_following;
		}
						
		update_user_meta( $curauth->ID, 'user_followers', $new_value );
		update_user_meta( $current_user->ID, 'user_following', $new_value_following );
		$updated_followers_value[] = get_user_meta($curauth->ID, 'user_followers', true);
		$updated_following_value_2[] = get_user_meta($curauth->ID, 'user_following', true);	
	}
	
	if(isset($_POST['unfollow_submit'])){
		$unfollow_users = intval($_POST['unfollow_user_id']);
		$unfollowing_user_id = intval($_POST['unfollowing_user_id']);
		
		$value11 = explode(',' , $value );
		$value_following11 = explode(',' , $value_following );
		
		$arr = array_diff($value11, array($unfollow_users));		
		$arr1 = array_diff($value_following11, array($unfollowing_user_id));
		
		$new_value = implode(',',$arr);
		$new_value2 = implode(',',$arr1);
						
		update_user_meta( $curauth->ID, 'user_followers', $new_value );
		update_user_meta( $current_user->ID, 'user_following', $new_value2 );
		$updated_followers_value[] = get_user_meta($curauth->ID, 'user_followers', true);
		$updated_following_value_2[] = get_user_meta($curauth->ID, 'user_following', true);
	}

?>
<!-- Content Wrap -->
<?php
$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
if($background_option_style == 'photo_stock'):
$section_class = ' pagegrey';
else:
$section_class = ' single-wrap';
endif; ?>
<section class="section<?php echo esc_attr($section_class); ?>">
	<?php if($success_message !=''): ?>
		<div class="email-success-message"><?php echo esc_html($success_message); ?></div>
    <?php endif; ?>
    <?php if($background_option_style != 'photo_stock'): ?>
	<div class="background-overlay"></div>
    <?php endif; ?>
    <div class="container position-relative">
        <div class="cat-page-title public-profile-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                	<?php echo get_avatar( $curauth->ID, 75 ); ?>
                    <h3><?php echo esc_html($curauth->nickname); ?></h3>
                    <p class="author-info-public"><?php echo esc_html($curauth->user_description); ?></p>
                    <ul class="list-inline social">
                    	<?php if(get_user_meta($curauth->ID, 'facebook', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'facebook', true)); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'twitter', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'twitter', true)); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'url', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'url', true)); ?>"><i class="fa fa-link"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'linkedin', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'linkedin', true)); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'googleplus', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'googleplus', true)); ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'dribbble', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'dribbble', true)); ?>"><i class="fa fa-dribbble"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'behance', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'behance', true)); ?>"><i class="fa fa-behance"></i></a></li>
                        <?php endif; ?>
                        <?php if(get_user_meta($curauth->ID, 'pinterest', true)): ?>
                        <li><a href="<?php echo esc_url(get_user_meta($curauth->ID, 'pinterest', true)); ?>"><i class="fa fa-pinterest"></i></a></li>
                        <?php endif; ?>                       
                    </ul>
                    <?php if(is_user_logged_in() && ($current_user->ID != $curauth->ID)): ?>
                    <a href="#email_box" class="followbtn" id="contact_email_box"><?php echo esc_html__('Contact', 'catalog'); ?>
                    </a> 
                    <span>-</span>
                    <?php endif; ?>
                    <?php
					if(get_user_meta($curauth->ID, 'user_followers', true)):
						$followers_value = catalog_explode_total_value($updated_followers_value);
					else:
						$followers_value = array();
					endif;
					if(get_user_meta($curauth->ID, 'user_following', true)):
						$following_value = catalog_explode_total_value($updated_following_value_2);
					endif;
					
					if( in_array($current_user->ID, $followers_value ) ):
						$value = esc_attr__('Following', 'catalog');
						$disable = ' disabled="'.esc_attr('disabled').'"';
					else:
						$value = esc_attr__('Follow', 'catalog');
						$disable = '';
					endif;
					?>

                    <?php if(is_user_logged_in() && ($current_user->ID != $curauth->ID)): ?>
                    <form action="" method="post" class="follow-form">
                    	<input type="hidden" name="follow_user_id" value="<?php echo esc_attr($current_user->ID); ?>" />
                        <input type="hidden" name="following_user_id" value="<?php echo esc_attr($curauth->ID); ?>" /> 
                    	<input type="submit" value="<?php echo esc_attr($value); ?>" name="follow_submit" class="followbtn"<?php echo esc_attr($disable); ?> />                        
                    </form>
                    <?php if( in_array($current_user->ID, $followers_value ) ): ?>
                    <form action="" method="post" class="unfollow-form">
                    	<input type="hidden" name="unfollow_user_id" value="<?php echo esc_attr($current_user->ID); ?>" />
                        <input type="hidden" name="unfollowing_user_id" value="<?php echo esc_attr($curauth->ID); ?>" /> 
                    	<input type="submit" value="<?php echo esc_attr__('Unfollow', 'catalog'); ?>" name="unfollow_submit" class="followbtn" />                        
                    </form>
                    <?php endif; ?>
                    <?php endif; ?>                  
                </div>
            </div>
        </div>
        <?php if($background_option_style == 'photo_stock'): ?>
        </div>
     </section>
     <section class="section hometab">
     	<div class="container">
        <?php endif; ?>
        <div class="content-top">
            <div class="row">
            	<?php $header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on'; ?>
                <?php if($header_slide_menu != 'off'): ?>
                <div class="col-xs-6 col-sm-6">
                    <div class="custommenu hidden-xs">
                        <a id="showLeft" href="#" title="" class="bt-menu-trigger"><span></span>
                        <?php $fev_url = get_template_directory_uri().'/images/fav.png'; ?>
                        <img src="<?php echo esc_url($fev_url); ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php endif; ?>
				<?php if($background_option_style != 'photo_stock'): ?>
                <div class="col-sm-6 col-xs-12 cen-xs text-right pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li class="active"><?php echo esc_html($curauth->nickname); ?> <?php echo esc_html__('Public Profile', 'catalog'); ?></li>
                        </ol>
                    </div>					  
                </div>
                <?php endif; ?>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs nopadtop">
            <div class="row">
                <div class="col-md-12">
        <div class="publicprofile">
            <ul class="nav nav-tabs" role="tablist">
            	<li role="presentation" class="active"><a href="#products" aria-controls="products" role="tab" data-toggle="tab"><?php echo esc_html__('Products', 'catalog'); ?></a></li>
                <li role="presentation"><a href="#following" aria-controls="following" role="tab" data-toggle="tab"><?php printf(esc_html__('Following (%d)', 'catalog'),           catalog_user_follower_number($updated_following_value_2)); ?></a></li>
                <li role="presentation"><a href="#followers" aria-controls="followers" role="tab" data-toggle="tab"><?php printf(esc_html__('Followers (%d)', 'catalog'), catalog_user_follower_number($updated_followers_value)); ?></a></li>
                
            </ul>
            
            <div class="tab-content">
            	<div role="tabpanel" class="tab-pane active" id="products">
                	<div class="row">
                    <?php
					global $paged;
					$args = array('post_type' => 'product', 'posts_per_page' => 12, 'author'  => $curauth->ID, 'paged' => $paged); 					
					$wp_query = new WP_Query($args);
					if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    
                    	<div class="col-md-3 col-sm-6">
                            <div class="item-box">
                            	<?php
								if ( has_post_thumbnail() ) {
									$image = catalog_post_thumb( 600, 600, false );
								} elseif ( wc_placeholder_img_src() ) {
									$image = wc_placeholder_img( 600 );
								} ?>
                                <div class="item-media entry">
                                	<a href="<?php echo esc_url(get_permalink()); ?>">
                                    <span class="background-overlay-img"></span>
                                    <?php 
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
										  ));
										 ?>
                                        </a></p>
                                    </div>
                                </div><!-- end item-media -->
                                <h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h4>
                                <?php if(function_exists('pvc_get_post_views')): ?>
                                <small><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-eye"></i> 
								<?php echo wp_kses(pvc_get_post_views( get_the_ID() ), array('span'=>array())); ?>
								</a></small>
                                <?php endif; ?>
                                <small><a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a></small>
                            </div><!-- end item-box -->
                        </div><!-- end col -->
                        <?php endwhile;
					else: ?>
                        <h4><?php esc_html_e('No items by this author.', 'catalog'); ?></h4>
                
                    <?php endif;
					?>
                    </div>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="following">
                    <div class="storelist panel panel-info">
                        <div class="panel-body">
                        	<?php
							if(get_user_meta($curauth->ID, 'user_following', true)):
							foreach($following_value as $key => $value_following ):
							$user_info = get_userdata( $value_following );
							$author_link = get_author_posts_url( $value_following );
							?>
                            <div class="form-group row">
                                <div class="col-md-3 col-xs-12">
                                	<?php 
									if(get_user_meta( $value_following, 'user_banner', true )):
                                    	$new_url = get_user_meta( $value_following, 'user_banner', true );
										$img_url = catalog_image_resize($new_url, 600, 340);
                                    else:
										$img_url = 'http://placehold.it/600x340';
                                    endif; ?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="" class="img-responsive img-thumbnail" />
                                </div>
                                <div class="col-md-2 col-xs-12">
                                     <h4><a href="<?php echo esc_url($author_link); ?>"><?php echo esc_html($user_info->nickname); ?></a></h4>
                                    <ul class="followers-info">
                                        <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html__('Get Support', 'catalog'); ?></a></li>
                                        <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-image"></i> <?php echo count_user_posts( $value_following , 'product' ); ?> <?php echo esc_html__('Items', 'catalog'); ?></a></li>
                                        <?php if(get_user_meta( $value_following, 'user_location', true )): ?>
										<li><i class="fa fa-map-marker"></i> <?php echo get_user_meta( $value_following, 'user_location', true ); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-xs-12">
                                   <ul class="list-inline followers-items">
                                   		<?php
										$args1 = array(
											'author'        =>  $value_following,
											'post_type' 	=> 'product',
											'posts_per_page' => 5
											);
										
										$current_user_posts = get_posts( $args1 );
										foreach ( $current_user_posts as $post ) : setup_postdata( $post );
										if ( has_post_thumbnail() ) {
											$fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											$image_link = $fullsize[0];
											$image = catalog_post_thumb( 60, 60, false );
										} elseif ( wc_placeholder_img_src() ) {
											$image_link = wc_placeholder_img_src();
											$image = wc_placeholder_img( 60 );
										}
										?>                                                                                
                                        <li><a href="<?php echo esc_url(get_permalink()); ?>" class="screenshot" data-gal="<?php echo esc_url($image_link); ?>" title="<?php the_title(); ?> <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_price()); ?></span>">
										<?php echo wp_kses($image,array(
											'img' => array(
											  'src' => array(),
											  'alt' => array(),
											  'class' => array()
											),
										  )); ?></a>
                                        </li>
                                        <?php endforeach; 
                                        wp_reset_postdata();?>										
                                    </ul>
                                </div><!-- end col -->
                                <div class="col-md-2 col-xs-12 text-center">
                                    <ul class="followers-new-info">
                                        <li><a href="<?php echo esc_url($author_link); ?>" class="btn btn-primary btn-block"><?php echo esc_html__('Follow Store', 'catalog'); ?></a></li>
                                        <?php $updated_followers_value_current[] = get_user_meta($value_following, 'user_followers', true); ?>
                                        <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_followers_value_current));?> <?php echo esc_html__(' Followers', 'catalog'); ?></a></li>
                                        <?php $updated_following_value_current[] = get_user_meta($value_following, 'user_following', true); ?>
                                        <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_following_value_current));?><?php echo esc_html__(' Following', 'catalog'); ?></a></li>
                                    </ul>
                                </div>
                            </div><!-- end form-group -->
                            
                            <?php endforeach; ?>
                            <?php else: ?>
                            <h4><?php echo esc_html__('No Following', 'catalog'); ?></h4>							
							<?php endif; ?>
                        </div><!-- end panel-body -->
                    </div><!-- end panel -->
                </div>
                
                <div role="tabpanel" class="tab-pane" id="followers">
                    <div class="storelist panel panel-info">
                        <div class="panel-body">
                        	<?php 
							if(get_user_meta($curauth->ID, 'user_followers', true)):
							foreach($followers_value as $key => $user_id_value ):
							$user_info = get_userdata( $user_id_value );
							$author_link = get_author_posts_url( $user_id_value );
							?>
                            <div class="form-group row">
                                <div class="col-md-3 col-xs-12">
                                    <?php 
									if(get_user_meta( $user_id_value, 'user_banner', true )):
                                    	$new_url = get_user_meta( $user_id_value, 'user_banner', true );
										$img_url = catalog_image_resize($new_url, 600, 340);
                                    else:
										$img_url = 'http://placehold.it/600x340';
                                    endif; ?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="" class="img-responsive img-thumbnail" />                                    
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <h4><a href="<?php echo esc_url($author_link); ?>"><?php echo esc_html($user_info->nickname); ?></a></h4>
                                    <ul class="followers-info">
                                        <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html__('Get Support', 'catalog'); ?></a></li>
                                        <li><a href="<?php echo esc_url($author_link); ?>"><i class="fa fa-image"></i> <?php echo count_user_posts( $user_id_value , 'product' ); ?> <?php echo esc_html__('Items', 'catalog'); ?></a></li>
                                        <?php if(get_user_meta( $user_id_value, 'user_location', true )): ?>
                                        <li><i class="fa fa-map-marker"></i> <?php echo get_user_meta( $user_id_value, 'user_location', true ); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-xs-12">
                                   <ul class="list-inline followers-items">
                                        <?php
										$args2 = array(
											'author'        =>  $user_id_value,
											'post_type' 	=> 'product',
											'posts_per_page' => 5
											);
										
										$current_user_posts1 = get_posts( $args2 );
										foreach ( $current_user_posts1 as $post ) : setup_postdata( $post );
										if ( has_post_thumbnail() ) {
											$fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											$image_link = $fullsize[0];
											$image = catalog_post_thumb( 60, 60, false );
										} elseif ( wc_placeholder_img_src() ) {
											$image_link = wc_placeholder_img_src();
											$image = wc_placeholder_img( 60 );
										}
										?>                                                                                
                                        <li><a href="<?php echo esc_url(get_permalink()); ?>" class="screenshot" data-gal="<?php echo esc_url($image_link); ?>" title="<?php the_title(); ?> <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_price()); ?></span>">
										<?php echo wp_kses($image,array(
											'img' => array(
											  'src' => array(),
											  'alt' => array(),
											  'class' => array()
											),
										  )); ?></a></li>
                                        <?php endforeach; 
                                        wp_reset_postdata();?>
                                    </ul>
                                </div><!-- end col -->
                                <div class="col-md-2 col-xs-12 text-center">
                                    <ul class="followers-new-info">
                                        <li><a href="<?php echo esc_url($author_link); ?>" class="btn btn-primary btn-block"><?php echo esc_html__('Follow Store', 'catalog'); ?></a></li>
                                        <?php $updated_followers_value_current2[] = get_user_meta($user_id_value, 'user_followers', true); ?>
                                        <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_followers_value_current2));?> <?php echo esc_html__(' Followers', 'catalog'); ?></a></li>
                                        <?php $updated_following_value_current2[] = get_user_meta($user_id_value, 'user_following', true); ?>
                                        <li><a href="<?php echo esc_url($author_link); ?>" title=""><?php echo esc_html(catalog_user_follower_number($updated_following_value_current2));?><?php echo esc_html__(' Following', 'catalog'); ?></a></li>
                                    </ul>
                                </div>
                            </div><!-- end form-group -->
                            <?php endforeach;
							else: ?>
								<h4><?php echo esc_html__('No Followers', 'catalog'); ?></h4>
							<?php endif;
							 ?> 
                        </div><!-- end panel-body -->
                    </div><!-- end panel --> 
                </div>
            </div>
        </div>   
            
	<?php get_template_part( 'layout/after', 'author' ); ?>
    
    <?php catalog_posts_nav(); ?>
    
    <?php if(is_user_logged_in()): ?>
    <div id="email_box" class="email-author content-after text-center boxs">
    	<div class="row">
            <div class="col-sm-6 col-sm-offset-3">
            	<div class="error_box"></div>
                <form action="" name="emailcontactform" method="post" id="emailcontactform">
                    <input type="email" name="email" id="email" class="form-control email-form-control" disabled="disabled" value="<?php echo esc_attr($current_user->user_email); ?>">
                    <input type="hidden" value="<?php echo esc_attr($current_user->user_email); ?>" name="from_email" id="from_email" />
                    <input type="hidden" value="<?php echo esc_attr($curauth->user_email); ?>" name="email_to" id="email_to" />
                    <textarea class="form-control" name="comment" id="comment" rows="6" placeholder="<?php echo esc_attr__('Message Below', 'catalog'); ?>"></textarea>
                    <input type="submit" value="<?php echo esc_attr__('Send Email', 'catalog'); ?>" id="email_submit" name="email_submit" class="btn btn-primary" />
                </form>
            </div>
        </div>
 	</div>
    <?php endif; ?>
    
<?php get_footer(); ?>