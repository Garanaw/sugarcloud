<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('add_trailing_slash')){
	function add_trailing_slash($url){
		if (!preg_match("/.*\/$/", $url)) {
			$url .= '/'; //"$url" . DIRECTORY_SEPARATOR;
		}
		return $url;
	}
}

if( !function_exists('site_url')){
	function site_url($url = NULL){
		return get_instance()->config->site_url($url);
	}
}

if( !function_exists('slash_item')){
	function slash_item($item = NULL){
		return get_instance()->config->slash_item($item);
	}
}

if( !function_exists('get_app_uri')){
	function get_app_uri(){
		echo 'app_uri: '.get_instance()->config->item('app_uri');
		//die('get_app_uri: '.get_instance()->config->item('theme'));
	}
}

/**
 * Get domain
 *
 * Return the domain name only based on the "base_url" item from your config file.
 *
 * @access	public
 * @return	string
 */
if ( !function_exists('get_domain')){
	function get_domain(){
		$CI =& get_instance();
		return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/","$1", $CI->config->slash_item('base_url'));
	}
}


?>