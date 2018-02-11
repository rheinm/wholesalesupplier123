<?php

if(!defined('WP_UNINSTALL_PLUGIN')) die;

delete_option('xsight_access_token');
delete_option('xsight_client_id');
delete_option('xsight_client_secret');
delete_option('xsight_credential');
delete_option('xsight_smsnotification_option');
delete_option('xsight_smsotp_digit');
delete_option('xsight_smsotp_option');
delete_option('xsight_tracklogistic_option');
delete_metadata( 'user', 0, 'xsight_otp_validated', null, true );