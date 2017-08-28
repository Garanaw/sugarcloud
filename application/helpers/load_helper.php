<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_theme(){
	return get_instance()->load->get_theme();
}

function get_theme_subdir($subdir = null){
	return (null === $subdir) ? get_theme() : get_theme().$subdir;
}





?>