<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function parse_args($args, $defaults = ''){
	if ( is_object( $args ) ){
		$r = get_object_vars( $args );
	}elseif ( is_array( $args ) ){
		$r =& $args;
	}else{
		get_instance()->load->helper('string');
		wp_parse_str( $args, $r );
	}
 
	if ( is_array( $defaults ) ){
		return array_merge( $defaults, $r );
	}
	return $r;
}

function pop_empty(&$arr){
	if('' === end($arr)){
		array_pop($arr);
	}
}

function json_object_encode(&$array){
	die(json_encode($array));
}

?>