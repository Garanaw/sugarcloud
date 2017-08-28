<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Retrieve the name of the highest priority template file that exists.
 */
function locate_template($template_names, $load = false){
	return get_instance()->template->locate_template($template_names, $load);
}

function get_header( $name = null ){
	return get_instance()->template->get_header($name);
}

function get_footer( $name = null ){
	return get_instance()->template->get_footer($name);
}

function get_sidebar( $name = null ){
	return get_instance()->template->get_sidebar($name);
}

function get_menu( $name = null ){
	return get_instance()->template->get_menu($name);
}

function get_template_part( $slug, $name = null ){
	return get_instance()->template->get_template_part($slug, $name);
}

function print_scripts(){
	$scripts = get_instance()->template->get_scripts();
}

function get_form ($form ){
	return get_instance()->template->get_form($form);
}

function generate_title($sep = '&raquo', $title = null){
	get_instance()->template->generate_title($sep, $title);
}

?>