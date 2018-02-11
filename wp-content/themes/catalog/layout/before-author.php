<?php
	$follow_users = array();
	$value = esc_html__('Follow', 'catalog');
	if(isset($_POST['follow_submit'])){
		$follow_users[] = $_POST['follow_user_id'];
		$value = esc_html__('Following', 'catalog');
	}
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<!-- Content Wrap -->
<?php
$background_option_style = (function_exists('ot_get_option'))? ot_get_option('background_option_style', 'app_stock') : 'app_stock';
if($background_option_style == 'photo_stock'):
?>
<section class="section pagegrey">
    <div class="container">    
        <div class="page-title public-profile-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 75 ); ?>
                    <h3><?php echo esc_html($curauth->nickname); ?></h3>
                    <p class="author-info-public"><?php echo esc_html($curauth->user_description); ?></p>
                    <ul class="list-inline social">
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
                    </ul>
                    <a href="#" class="followbtn"><?php echo esc_html__('Contact', 'catalog'); ?>
                    </a> 
                    <span>-</span>
                    <form action="" method="post">
                    	<input type="hidden" name="follow_user_id" value="<?php echo get_the_author_meta( 'ID' ); ?>" /> 
                    	<input type="submit" value="<?php echo esc_attr($value); ?>" name="follow_submit" class="followbtn" />                        
                    </form> 
                </div>
            </div>
        </div>
    </div><!-- end container -->
</section>
<section class="section hometab">
<div class="content boxs nopadtop">
            <div class="row">
                <div class="col-md-12">
<?php else: ?>
<section class="section single-wrap">
	<div class="background-overlay"></div>
    <div class="container position-relative">
        <div class="cat-page-title public-profile-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 75 ); ?>
                    <h3><?php echo esc_html($curauth->nickname); ?></h3>
                    <p class="author-info-public"><?php echo esc_html($curauth->user_description); ?></p>
                    <ul class="list-inline social">
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
                    </ul>
                    <a href="#" class="followbtn"><?php echo esc_html__('Contact', 'catalog'); ?>
                    </a> 
                    <span>-</span>
                    <form action="" method="post">
                    	<input type="hidden" name="follow_user_id" value="<?php echo get_the_author_meta( 'ID' ); ?>" /> 
                    	<input type="submit" value="<?php echo esc_attr($value); ?>" name="follow_submit" class="followbtn" />                        
                    </form>                   
                </div>
            </div>
        </div>
        <div class="content-top">
            <div class="row">
            	<?php $header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'on'; ?>
                <?php if($header_slide_menu != 'off'): ?>
                <div class="col-xs-6 col-sm-6">
                    <div class="custommenu hidden-xs">
                        <a id="showLeft" href="#" title="" class="bt-menu-trigger"><span></span>
                        <img src="<?php echo get_template_directory_uri();?>/images/fav.png" alt="">
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-sm-6 col-xs-12 cen-xs text-right pull-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li class="active"><?php echo esc_html($curauth->nickname); ?> <?php echo esc_html__('Public Profile', 'catalog'); ?></li>
                        </ol>
                    </div>					  
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs nopadtop">
            <div class="row">
                <div class="col-md-12">
<?php endif; ?>