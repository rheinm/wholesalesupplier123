<?php

/**
 * @package TelkomXsight
 */

namespace Xsight;

use Xsight\SMSOTP\SMSOTP;
use Xsight\SMSNotification\SMSNotification;
use Xsight\TrackLogistic\TrackLogistic;
use Xsight\Interfaces\Feature;
use Xsight\Callbacks\FieldCallback;
use Xsight\Callbacks\SanitizeCallback;
use Xsight\Base\Menu;
use Xsight\Base\Submenu;
use Xsight\Base\Setting;

class Xsight implements Feature
{
	private $menu;
	private $sub_menu;
	private $features = [];
	private $field_callback;
	private $sanitize_callback;

	public function __construct() {
		$this->menu = new Menu("Telkom Xsight Setting", "Telkom Xsight", "manage_options", "telkom_xsight_setting",[$this, 'settingPage'],'dashicons-admin-users',12);
		$this->sub_menu = new Submenu("Telkom Xsight Setting", "Dashboard", "manage_options", "telkom_xsight_setting",[$this, 'settingPage']);
		$this->sub_menu->addParentMenu($this->menu);
		$this->field_callback = new FieldCallback();
		$this->sanitize_callback = new SanitizeCallback();
	}

	public static function activate()
	{
		flush_rewrite_rules();
	}

	public static function deactivate()
	{
		flush_rewrite_rules();
	}

	#Load Features from database
	public function loadFeatures()
	{
		if(get_option('xsight_smsnotification_option'))
		{
			$feature = new SMSNotification();
			array_push($this->features, $feature);
		}
		if(get_option('xsight_smsotp_option'))
		{
			$feature = new SMSOTP();
			array_push($this->features, $feature);
		}
		if(get_option('xsight_tracklogistic_option'))
		{
			$feature = new TrackLogistic();
			array_push($this->features, $feature);
		}
	}

	public function addParent($parent)
	{
		return;
	}

	public function register_pages()
	{
		$this->menu->add();
		$this->sub_menu->add();
		foreach ($this->features as $feature) {
			$feature->addParent($this->menu);
			$feature->register_pages();
		}
	}

	public function register_settings()
	{
		foreach ($this->features as $feature) {
			$feature->register_settings();
		}
		$this->buildSettingPage();
	}

	public function register_shortcodes()
	{
		foreach ($this->features as $feature) {
			$feature->register_shortcodes();
		}
	}

	public function register_hooks()
	{
		foreach ($this->features as $feature) {
			$feature->register_hooks();
		}	
	}

	public function register()
	{
		$this->loadFeatures();
		add_action('admin_menu', [$this, 'register_pages']);
		add_action('admin_init', [$this, 'register_settings']);
		add_action('load-options.php',[$this, 'clearXsightCredential']);
		$this->register_shortcodes();
		$this->register_hooks();
	}

	public function clearXsightCredential()
	{
		if($_POST['option_page'] == 'xsight_settings' && $_POST['action'] == 'update')
	      	update_option('xsight_credential',false);
	}

	public function settingPage()
	{
		require_once plugin_dir_path(__FILE__)."../views/admin/setting.php";
	}

	public function buildSettingPage()
	{
		$setting = new Setting();
		$setting->createOptionGroup('xsight_settings')
				->intoSection(
					'xsight_generate_access_token',
					'Generate Access Token')
				->intoPage($this->sub_menu)
				->addField(
					'xsight_client_id',
					'Client ID',
					[$this->field_callback, 'textField'],
					[$this->sanitize_callback, 'textField'])
				->addField(
					'xsight_client_secret',
					'Client Secret',
					[$this->field_callback, 'textField'],
					[$this->sanitize_callback, 'textField'])
				->generate_for_wp();

		$setting = new Setting();
		$setting->createOptionGroup('xsight_settings')
				->intoSection(
					'xsight_feature_options_section', 
					'Choose APIs to be integrated')
				->intoPage($this->sub_menu)
				->addField(
					'xsight_smsotp_option', 
					'SMS OTP API', 
					[$this->field_callback, 'checkBox'], 
					[$this->sanitize_callback, 'checkBox'],
					['class' => 'ui-toggle'])
				->addField(
					'xsight_smsnotification_option', 
					'SMS Notification API',
					[$this->field_callback, 'checkBox'], 
					[$this->sanitize_callback, 'checkBox'],
					['class' => 'ui-toggle'])
				->addField(
					'xsight_tracklogistic_option', 
					'Track Logistic API',
					[$this->field_callback, 'checkBox'], 
					[$this->sanitize_callback, 'checkBox'],
					['class' => 'ui-toggle'])
				->generate_for_wp();
	}
}