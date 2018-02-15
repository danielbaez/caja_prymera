<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Twilio
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Twilio configuration settings.
	*
	*
	*/
	/**
	 * Mode ("sandbox" or "prod")
	 **/
	$config['mode']   = 'sandbox';
	/**
	 * Account SID
	 **/
	$config['account_sid']   = 'AC77feb14fb8318b31887b54f8e73ac887'; //CB
	//$config['account_sid']   = 'AC31a24df25cb5382ac8b71a4c5e48dedf'; CP
	/**
	 * Auth Token
	 **/
	$config['auth_token']    = 'a63f28a80f7201154023bfdfb0589207'; //CB
	//$config['auth_token']    = '7573adb24f72a6e10cf68ade61b23304'; //CP
	/**
	 * API Version
	 **/
	$config['api_version']   = '2010-04-01';
	/**
	 * Twilio Phone Number
	 **/
	$config['number']        = '786-220-7333'; //CB
	$config['number']        = ''; //CP

/* End of file twilio.php */