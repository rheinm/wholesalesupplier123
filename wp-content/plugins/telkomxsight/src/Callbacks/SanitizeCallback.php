<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Callbacks;

class SanitizeCallback {

	public $setting;

	public function checkBox($input)
	{
		return isset($input) ? true : false;
	}

	public function smsotp_sanitize_setting($input)
	{
		$input = sanitize_text_field($input);
		if(is_numeric($input))
		{
			$input = intval($input);
			if($input >= 2 && $input <= 10)
				return $input;
		}
		add_settings_error(
            $setting,
            '',
            'The field must be filled and must be number between 2 - 10');
	}
}