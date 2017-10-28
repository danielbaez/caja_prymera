<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Email
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @Jhonataniberico
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
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = 'ssl://smtp.gmail.com';
	$config['smtp_user'] = 'miauto@prymera.pe';
	$config['smtp_pass'] = '8hUpuv6da_@v';
	$config['smtp_port'] = 465;
	$config['mailtype'] = 'html';
	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";

