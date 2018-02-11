<?php
/**
 * @package TelkomXsight
 */

/*
Plugin Name:	Telkom Xsight
Plugin URI:		http://www.telkomxsight.com/
Description:	A plugin that integrates APIs from Telkom Xsight. This plugin currently integrates SMSOTP API, SMSNotification API, and TrackLogistic API
Version:		1.0.0
Author: 		Muhammad Zullidar
License:		GPL2
*/

defined('ABSPATH') or die;

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
{
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function telkomxsight_activate()
{
	\Xsight\Xsight::activate();
}
register_activation_hook(__FILE__, 'telkomxsight_activate');

function telkomxsight_deactivate()
{
	\Xsight\Xsight::deactivate();
}
register_deactivation_hook(__FILE__, 'telkomxsight_deactivate');

$telkomxsight = new Xsight\Xsight();
$telkomxsight->register();