<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Checks if an external file exists
 *
 * @param	string	$file	the url containing the filename and extension
 * @return	boolean
 */
function url_file_exist($file){
	echo $file;

	//get_instance()->dump($headers);

	$return[0] = is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false;
	$return[1] = file_exists($file) ? true : false;

	foreach ($return as $key => $value) {
		echo $key.'->"'.$value.'"<br>';
	}
	die('end');
	if($return){
		die('exists: '.$file);
	}else{
		die('doesnt exist');
	}
	return $return;
}

function js_exist($js){
	get_instance()->load->helper('string');
	$js = trim_extension($js).'.js';

	real_file_exist(THEMEPATH.'js/'.$js);
}

function css_exist($css){

}

function real_file_exist($file){
	$headers = @get_headers($url);
	$common_paths = get_instance()->config->item('common_paths') or var_dump(get_instance());
	//var_dump($common_paths);die();

	echo 'real_file_exist(): '.$file;

	//die();

}

?>