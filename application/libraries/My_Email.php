<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email{
	
	function __construct(array $config = array()){
		if(!extension_loaded('openssl')){
			throw new Exception("Sorry, You need to enable openssl in order to send emails", 1);
			
		}
		parent::__construct($config);
	}
}