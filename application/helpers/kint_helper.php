<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_development(){
	return (defined('ENVIRONMENT') AND ENVIRONMENT === 'development') ? true : false;
}

function dump($array, $die = true){
	if(!is_development()){
		return;
	}
	get_instance()->dump($array, $die);
}

function find_function($func_name, $dump_it = false){
	get_instance()->find_function($func_name, $dump_it);
}

function var_die($arr = null){
	get_instance()->var_die($arr);
}

?>