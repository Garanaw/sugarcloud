<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
function __($str = ''){
	return ('' === $str) ? false : get_instance()->lang->line($str);
}

/**
 * 
 */
function _e($str = ''){
	echo __($str);
}

/**
 * 
 */
function get_country_code($country = null){
	return get_instance()->get_country_code($country);
}

/**
 * 
 */
function get_country_from_lang($lang = null){
	return get_instance()->get_country_from_lang($lang);
}

/**
 * 
 */
function get_other_languages(){
	return get_instance()->get_other_languages();
}

?>