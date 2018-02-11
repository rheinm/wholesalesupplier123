<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\SMSNotification;
use Xsight\Base\Submenu;
use Xsight\Callbacks\FieldCallback;
use Xsight\Callbacks\SanitizeCallback;
use Xsight\Interfaces\Feature;
use Xsight\Base\Setting;
use Xsight\Traits\XsightAPI;

class SMSNotification implements Feature{

	use XsightAPI;

	public function addParent($parent_menu)
	{
		return;
	}

	public function register_pages()
	{
		return;
	}

	public function register_settings()
	{
		return;
	}

	public function register_hooks()
	{
		return;
	}

	public function register_shortcodes()
	{
		add_shortcode('xsight_sms_promotion_form',[$this, 'generateSendPromotionForm']);
	}

	public function generateSendPromotionForm()
	{
		$html = 
		'<form action="" method="POST">
		<p>
			Phone No <br/>
			<input type="text" name="xsight_phone_no">
		</p>
		<p>
			Message <br/>
			<textarea cols="35" rows="5" name="xsight_message"></textarea>
		</p>
		<p>
			<input type="submit" name="xsight_send_message" value="Send Message">
		</p>
		</form>';

		if(isset($_POST['xsight_send_message']))
		{
			$phone_no = sanitize_text_field($_POST['xsight_phone_no']);
			$message = sanitize_textarea_field($_POST['xsight_message']);
			$response = $this->postSMSNotification($phone_no, $message);
			$html.="<p>".$response['message']."</p>";
		}
		return $html;
	}
}