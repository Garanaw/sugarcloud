<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function add_trailing_slash($url){
	if (!preg_match("/.*\/$/", $url)) {
		$url .= '/'; //"$url" . DIRECTORY_SEPARATOR;
	}
	return $url;
}

function trim_extension($string, $exts = array()){
	$defaults = array('.css', '.js');

	$exts = (array)$exts;

	foreach ($exts as $k => $v) {
		$exts[$k] = '.'.ltrim($v, '.');
	}

	get_instance()->load->helper('array');

	$exts = parse_args($exts, $defaults);

	foreach ($exts as $v) {
		if(!strpos($string, $v)){
			continue;
		}

		return str_replace($v, '', $string);
	}
}

/**
 * Implement of strpos in both ways and case sensitive or not depending of the third parameter.
 * 
 * The needle argument can be any type, including an array, the list will be checked
 */
function multi_strpos($haystack, $needles, $sensitive = false, $offset = 0){
	$needles = (array)$needles;

	foreach($needles as $needle) {
		$result[$needle] = ($sensitive) ? strpos($haystack, (string)$needle, $offset) : stripos($haystack, (string)$needle, $offset);
	}
	return $result;
}

/**
 * Reemplaza todos los acentos por sus equivalentes sin ellos
 *
 * @param $string
 *  string la cadena a sanear
 *
 * @return $string
 *  string saneada
 */
function normalize($string, $underscored = true){

	$string = trim($string);

	$string = str_replace(
		array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		$string
	);

	$string = str_replace(
		array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		$string
	);
 
	$string = str_replace(
		array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		$string
	);

	$string = str_replace(
		array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
		$string
	);

	$string = str_replace(
		array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		$string
	);

	$string = str_replace(
		array('ñ', 'Ñ', 'ç', 'Ç'),
		array('n', 'N', 'c', 'C',),
		$string
	);
 	if($underscored){
 		return str_replace(' ', '_', $string);
 	}
	return $string;
}


?>