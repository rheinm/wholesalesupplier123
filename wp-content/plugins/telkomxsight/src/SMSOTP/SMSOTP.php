<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\SMSOTP;

use Xsight\Base\Submenu;
use Xsight\Interfaces\Feature;
use Xsight\Base\Setting;
use Xsight\Callbacks\FieldCallback;
use Xsight\Callbacks\SanitizeCallback;
use Xsight\Traits\XsightAPI;

class SMSOTP implements Feature{

	use XsightAPI;

	private $sub_menu;
	private $field_callback;
	private $sanitize_callback;
		
	public function __construct()
	{
		$this->sub_menu = new Submenu('Login with SMSOTP API Integration', 'SMS OTP', 'edit_dashboard','telkom_xsight_smsotp_setting', [$this, 'settingPage']);
		$this->field_callback = new FieldCallback();
		$this->sanitize_callback = new SanitizeCallback();
	}

	public function addParent($parent_menu)
	{
		$this->sub_menu->addParentMenu($parent_menu);
	}

	public function register_pages()
	{
		$this->sub_menu->add();
	}

	public function register_settings()
	{
		$this->buildSettingPage();
	}

	public function register_shortcodes()
	{
		add_shortcode('xsight_otp_validation', [$this, 'generateXsightOTPValidationForm']);
	}

	public function register_hooks()
	{
 		add_action( 'woocommerce_register_post', [$this, 'validatePhoneNumberForOTP'], 10, 3 );
 		add_action( 'woocommerce_created_customer', [$this, 'insertXsightOTPValidatedMetaKey'] );
 		add_action( 'woocommerce_registration_redirect', [$this,'redirectToValidatePhoneNumberUsingOTP']);
 		add_action( 'wp', [$this, 'checkIfXsightOTPValidated'] );
	}

	public function insertXsightOTPValidatedMetaKey($user_id)
	{
		update_user_meta($user_id,'xsight_otp_validated', false);
		$credential = $this->getCredential();
	}

	public function redirectToValidatePhoneNumberUsingOTP( ) {
		$this->putOTPCode();
		wp_safe_redirect(home_url().'/validate-phone-number');
	}

	public function generateXsightOTPValidationForm()
	{
		$html = '
			<form method="POST">
				<p>
					Input the OTP that has been sent to your phone<br/>
					<input type="text" name="xsight_otp_code">
				</p>
				<p>
					<input type="submit" name="xsight_otp_validate" value="Validate">
				</p>
				<p>
					<input type="submit" name="xsight_resend_otp_code" value="Resend OTP Code">
				</p>
			</form>
		';

		if(isset($_POST['xsight_otp_validate']))
		{
			$xsight_otp_code = sanitize_text_field($_POST['xsight_otp_code']);
			if(preg_match('/^[0-9]{2,10}$/', $xsight_otp_code))
			{
				$response = $this->postOTPVerification($xsight_otp_code);
				if($response['status'])
				{
					$user_id = get_current_user_id();
					update_user_meta($user_id,'xsight_otp_validated', true);
				}
				$html .= "<p>".$response['message']."</p>";
			}
			else $html .= "<p>OTP code must be number and between 2 until 10 digits</p>";
		}
		else if(isset($_POST['xsight_resend_otp_code']))
		{
			$response = $this->putOTPCode();			
			$html .= "<p>".$response['message']."</p>";
		}
		return $html;
	}

	public function checkIfXsightOTPValidated()
	{
		global $wp;
		$user_id = get_current_user_id();
		$request = substr($wp->request, strrpos($wp->request, '/'));
		$whitelist = ['validate-phone-number','/customer-logout','my-account'];
		$user = wp_get_current_user();
		$allowed_roles = ['administrator'];
		if( !array_intersect($allowed_roles, $user->roles ) && $user_id !== 0 && !in_array($request,$whitelist))
		{
			$otp_validated = get_user_meta($user_id, 'xsight_otp_validated', true);
			if(!$otp_validated) wp_safe_redirect(home_url().'/validate-phone-number');
		}
	}

	public function validatePhoneNumberForOTP( $username, $email, $validation_errors )
	{
		if(!isset($_POST['reg_phone']) || empty($_POST['reg_phone']))
		{
			$validation_errors->add('user_phone_error','Phone number must be filled');
		}
		else
		{
			if(!preg_match('/^[0-9]{11,16}$/', $_POST['reg_phone'] ))
				$validation_errors->add('user_phone_error','Phone number must be number and between 11 until 16 digits');
		}
		return $validation_errors;
	}

	public function settingPage()
	{
		require_once plugin_dir_path(__FILE__)."../../views/admin/smsotp/setting.php";
	}

	public function buildSettingPage()
	{
		$this->sanitize_callback->setting = 'xsight_smsotp_setting';
		$setting = new Setting();
		$setting->createOptionGroup('xsight_smsotp_setting')
				->intoSection(
					'xsight_smsotp_section',
					'Insert the total digit of the OTP')
				->intoPage($this->sub_menu)
				->addField(
					'xsight_smsotp_digit',
					'Total Digit',
					[$this->field_callback, 'textField'],
					[$this->sanitize_callback, 'smsotp_sanitize_setting'])
				->generate_for_wp();
	}

}