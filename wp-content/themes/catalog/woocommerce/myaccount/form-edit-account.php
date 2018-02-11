<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php wc_print_notices(); ?>
<div class="col-md-8 col-md-offset-2">
    <form class="edit-account" action="" method="post" enctype="multipart/form-data">
    
        <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
    
        <p class="form-row form-row-first">
            <label for="account_first_name"><?php esc_html_e( 'First name', 'catalog' ); ?> <span class="required">*</span></label>
            <input type="text" class="form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
        </p>
        <p class="form-row form-row-last">
            <label for="account_last_name"><?php esc_html_e( 'Last name', 'catalog' ); ?> <span class="required">*</span></label>
            <input type="text" class="form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
        </p>
        <div class="clear"></div>
        
        <p class="form-row form-row-first">
            <label for="account_first_name"><?php esc_html_e( 'Phone Number', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_phone_number" id="account_phone_number" value="<?php echo esc_attr( get_user_meta( $user->ID, 'user_phone', true ) ); ?>" />
        </p>
        <p class="form-row form-row-last">
            <label for="account_last_name"><?php esc_html_e( 'Location', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_location" id="account_location" value="<?php echo esc_attr( get_user_meta( $user->ID, 'user_location', true ) ); ?>" />
        </p>
        <div class="clear"></div>
    
        <p class="form-row form-row-first">
            <label for="account_email"><?php esc_html_e( 'Email address', 'catalog' ); ?> <span class="required">*</span></label>
            <input type="email" class="form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
        </p>
        <p class="form-row form-row-last">
            <label for="password_current"><?php esc_html_e( 'Current Password (blank for unchanged)', 'catalog' ); ?></label>
            <input type="password" class="form-control" name="password_current" id="password_current" />
        </p>
        <div class="clear"></div>
        
        <p class="form-row form-row-first">
            <label for="password_1"><?php esc_html_e( 'New Password (blank for unchanged)', 'catalog' ); ?></label>
            <input type="password" class="form-control" name="password_1" id="password_1" />
        </p>
        <p class="form-row form-row-last">
            <label for="password_2"><?php esc_html_e( 'Confirm New Password', 'catalog' ); ?></label>
            <input type="password" class="form-control" name="password_2" id="password_2" />
        </p>
        <div class="clear"></div>
        
        <p class="form-row form-row-wide">
            <label for="password_2"><?php esc_html_e( 'Profile Banner', 'catalog' ); ?></label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail"><img src="<?php echo esc_url( get_user_meta( $user->ID, 'user_banner', true ) ); ?>" alt="<?php echo esc_attr__('banner image', 'catalog'); ?>" /></div>
                <br>
                <span class="btn btn-primary btn-file">
                    <span class="fileupload-new"><?php echo esc_html__('Select image', 'catalog'); ?></span>
                    <span class="fileupload-exists"><?php echo esc_html__('Change', 'catalog'); ?></span>
                    <input type="file" name="account_upload_banner">
                </span>
                <a href="#" class="btn btn-primary fileupload-exists" data-dismiss="fileupload"><?php echo esc_html__('Remove', 'catalog'); ?></a>
            </div>
        </p>
        <div class="clear"></div>
        
         <p class="form-row form-row-wide">
            <label for="account_facebook_id"><?php esc_html_e( 'Facebook', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_facebook_id" id="account_facebook_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'facebook', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_twitter_id"><?php esc_html_e( 'Twitter', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_twitter_id" id="account_twitter_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'twitter', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_linkedin_id"><?php esc_html_e( 'LinkedIn', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_linkedin_id" id="account_linkedin_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'linkedin', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_googleplus_id"><?php esc_html_e( 'GooglePlus', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_googleplus_id" id="account_googleplus_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'googleplus', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_dribbble_id"><?php esc_html_e( 'Dribbble', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_dribbble_id" id="account_dribbble_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'dribbble', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_behance_id"><?php esc_html_e( 'Behance', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_behance_id" id="account_behance_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'behance', true ) ); ?>"  />
        </p>
        <p class="form-row form-row-wide">
            <label for="account_pinterest_id"><?php esc_html_e( 'Pinterest', 'catalog' ); ?></label>
            <input type="text" class="form-control" name="account_pinterest_id" id="account_pinterest_id" value="<?php echo esc_attr( get_user_meta( $user->ID, 'pinterest', true ) ); ?>"  />
        </p>
    
        <?php do_action( 'woocommerce_edit_account_form' ); ?>
    
        <p>
            <?php wp_nonce_field( 'save_account_details' ); ?>
            <input type="submit" class="button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'catalog' ); ?>" />
            <input type="hidden" name="action" value="save_account_details" />
        </p>
    
        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
    
    </form>
    <?php if(class_exists('WP_User_Avatar_Setup')): ?>
    <div class="edit-account">
        <p class="form-row form-row-wide">
            <?php echo do_shortcode(wp_kses_post('[avatar_upload]')); ?>
        </p>
    </div>
    <?php endif; ?>
</div>


