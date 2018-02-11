<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="row">
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<?php endif; ?>
    <div class="col-md-4 col-sm-6" id="customer_login">
        <div class="widget">
            <div class="widget-title">
                <h4><?php esc_html_e( 'Login Account', 'catalog' ); ?></h4>
            </div><!-- end widget-title -->

            <div class="login-form">
                <form method="post" role="login">
        
                    <?php do_action( 'woocommerce_login_form_start' ); ?>
        
                    <div class="form-group">
                        <label for="username"><?php esc_html_e( 'Username or email address', 'catalog' ); ?></label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="form-group">
                        <label for="password"><?php esc_html_e( 'Password', 'catalog' ); ?></label>
                        <input class="form-control" type="password" name="password" id="password" />
                        <span class="fa fa-lock"></span>
                    </div>
        
                    <?php do_action( 'woocommerce_login_form' ); ?>
        
                        <?php wp_nonce_field( 'woocommerce-login' ); ?>
                        <input type="submit" class="btn btn-primary" name="login" value="<?php esc_attr_e( 'Login Account', 'catalog' ); ?>" />
                        <label for="rememberme" class="inline">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'catalog' ); ?>
                        </label>
                    <div class="form-group">
                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'catalog' ); ?></a>
                    </div>
        
                    <?php do_action( 'woocommerce_login_form_end' ); ?>
        
                </form>
            </div>
    	</div>
    </div>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
	<div class="col-md-8 col-sm-6" id="customer_registration">
		<div class="widget">
            <div class="widget-title">
                <h4><?php esc_html_e( 'Do not Have an Account? Register Today!', 'catalog' ); ?></h4>
            </div><!-- end widget-title -->

            <div class="login-form register-form">
                <form method="post" role="login" class="row">
        
                    <?php do_action( 'woocommerce_register_form_start' ); ?>
        
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
        
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label for="reg_username"><?php esc_html_e( 'Username', 'catalog' ); ?></label>
                                <input type="text" class="form-control" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
        
                    <?php endif; ?>
        
                    <div class="col-md-6">
                    	<div class="form-group">
                        <label for="reg_email"><?php esc_html_e( 'Email address', 'catalog' ); ?></label>
                        <input type="email" class="form-control" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
                        <span class="fa fa-envelope"></span>
                        </div>
                    </div>
        
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
        
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label for="reg_password"><?php esc_html_e( 'Password', 'catalog' ); ?></label>
                                <input type="password" class="form-control" name="password" id="reg_password" />
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
        
                    <?php endif; ?>
        
                    <!-- Spam Trap -->
                    <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'catalog' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
                    
					<?php do_action( 'woocommerce_register_form' ); ?>
                    <?php do_action( 'register_form' ); ?>
        
                    <div class="col-md-12">
                        <?php wp_nonce_field( 'woocommerce-register' ); ?>
                        <input type="submit" class="btn btn-primary" name="register" value="<?php esc_attr_e( 'Register Now', 'catalog' ); ?>" />
                    </div>
        
                    <?php do_action( 'woocommerce_register_form_end' ); ?>
        
                </form>
            </div>

	</div>

</div>

<?php endif; ?>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
