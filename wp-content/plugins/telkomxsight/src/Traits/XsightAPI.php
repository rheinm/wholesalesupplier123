<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Traits;

trait XsightAPI {

	private $access_token_request_url = 'https://api.mainapi.net/token';
	private $otp_verification_url = 'https://api.mainapi.net/smsotp/1.0.1/otp/xsight-otp/verifications';
	private $generate_otp_url = 'https://api.mainapi.net/smsotp/1.0.1/otp/xsight-otp';
	private $vessel_schedule_url = 'https://api.mainapi.net/logistic/v1.0/vessel/schedule';
	private $track_container_url = 'https://api.mainapi.net/logistic/v1.0/container/track';
	private $send_sms_notification_url = 'https://api.mainapi.net/smsnotification/1.0.0/messages';

	private function getCredential()
	{
		$xsight_credential = get_option('xsight_credential');

		if(!$xsight_credential || ($xsight_credential && $xsight_credential->expires_in < time()))
		{
			$ba = "Basic ".base64_encode(get_option('xsight_client_id').':'.get_option('xsight_client_secret'));
			$args = [
				'headers' 	=> 'Authorization: ' . $ba,
				'timeout'	=> 10,
				'body'		=> [
					'grant_type'	=> 'client_credentials'
				]
			];
			$response = wp_remote_post($this->access_token_request_url,$args);
			$response_code = wp_remote_retrieve_response_code($response);
			$body = json_decode(wp_remote_retrieve_body($response));
			
			if($response_code == 200)
			{
				$body->expires_in = time() + $body->expires_in;
				update_option('xsight_credential',$body);
			}
			else
			{
				update_option('xsight_credential',false);	
			}
			$xsight_credential = $body;	
			
		}
		return $xsight_credential;
	}

	public function postOTPVerification($otpstr)
	{
		$status = false;
		$message = "";
		$credential = $this->getCredential();

		if(isset($credential->error))
		{
			$status = false;
			$message = $credential->error_description;
		}
		else
		{
			$args = [
				'headers' => [
					'Accept' => 'application/json',
					'Content-type' => 'application/x-www-form-urlencoded',
					'Authorization' => $credential->token_type.' '.$credential->access_token
				],
				'timeout'	=> 10,
				'body' => [
					'otpstr' => $otpstr,
					'digit' => get_option('xsight_smsotp_digit')
				]
			];

			$response = wp_remote_post($this->otp_verification_url, $args);
			$response_code = wp_remote_retrieve_response_code($response);
			if($response_code == 200)
			{
				$status = true;
				$message = "Your phone number has been validated";
			}
			else{
				$status = false;
				$message = "Your OTP is invalid or maybe your OTP has been expired";
			}
		}

		return [
			'status' => $status,
			'message' => $message
		];
	}

	public function putOTPCode()
	{
		$credential = $this->getCredential();
		if(isset($credential->error))
		{
			$status = false;
			$message = $credential->error_description;
		}
		else
		{
			$user_id = get_current_user_id();
			$phoneNum = get_user_meta($user_id, 'user_phone', true);
			$digit = get_option('xsight_smsotp_digit');
			$args = [
				'headers' => [
					'Accept' => 'application/json',
					'Content-type' => 'application/x-www-form-urlencoded',
					'Authorization' => $credential->token_type.' '.$credential->access_token
				],
				'timeout'	=> 10,
				'body' => [
					'phoneNum' => $phoneNum,
					'digit' => $digit
				],
				'method' => 'PUT'
			];

			$response = wp_remote_request('https://api.mainapi.net/smsotp/1.0.1/otp/xsight-otp', $args);
			$response_code = wp_remote_retrieve_response_code($response);
			if($response_code == 200)
			{
				$status = true;
				$message = "OTP code sent";
			}
			else
			{
				$status = false;
				$message = "Failed to sent OTP code";	
			}
		}

		return [
			'status' => $status,
			'message' => $message
		];
	}

	public function getVesselSchedule($start_date, $end_date)
	{

		$credential = $this->getCredential();
		if(isset($credential->error))
		{
			$status = false;
			$message = $credential->error_description;
		}
		else
		{
			$args = [
				'headers' => [
					'Accept' => 'application/json',
					'Authorization' => $credential->token_type.' '.$credential->access_token
				],
				'timeout'	=> 10
			];

			$response = wp_remote_get($this->vessel_schedule_url.'?start='.$start_date.'&end='.$end_date,$args);
			$response_code = wp_remote_retrieve_response_code($response);
			if($response_code == 200)
			{
				$status = true;
				$message = json_decode(wp_remote_retrieve_body($response));
			}
			else
			{
				$status = false;
				$message = "Failed to retrieve vessel schedule";
			}
		}

		return [
			'status' => $status,
			'message' => $message
		];
	}

	public function getContainerLocation($container_no)
	{
		$credential = $this->getCredential();
		if(isset($credential->error))
		{
			$status = false;
			$message = $credential->error_description;
		}
		else
		{
			$args = [
				'headers' => [
					'Accept' => 'application/json',
					'Authorization' => $credential->token_type.' '.$credential->access_token
				],
				'timeout'	=> 10,
				'body' => [
					'no_cont'	=> $container_no,
				]
			];

			$response = wp_remote_get($this->track_container_url,$args);
			$response_code = wp_remote_retrieve_response_code($response);
			if($response_code == 200)
			{
				$status = true;
				$message = json_decode(wp_remote_retrieve_body($response));
			}
			else if($response_code == 404)
			{
				$status = false;
				$message = "Container not found";	
			}
			else
			{
				$status = false;
				$message = "Failed to retrieve container data";
			}
		}

		return [
			'status' => $status,
			'message' => $message
		];
	}

	public function postSMSNotification($phone_no, $message)
	{
		$credential = $this->getCredential();
		if(isset($credential->error))
		{
			$status = false;
			$message = $credential->error_description;
		}
		else
		{
			$args = [
				'headers' => [
					'Accept' => 'application/json',
					'Content-type' => 'application/x-www-form-urlencoded',
					'Authorization' => $credential->token_type.' '.$credential->access_token
				],
				'timeout'	=> 10,
				'body' => [
					'msisdn'	=> $phone_no,
					'content'	=> $message
				]
			];

			$response = wp_remote_post($this->send_sms_notification_url,$args);
			$response_code = wp_remote_retrieve_response_code($response);

			if($response_code == 200)
			{
				$status = true;
				$message = "Message sent";
			}
			else
			{
				$status = false;
				$message = "Failed to sent message";
			}
		}

		return [
			'status' => $status,
			'message' => $message
		];
	}
}