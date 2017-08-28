<?php
defined('BASEPATH') OR exit('No direct script access allowed');



function get_user_id(){
	try{
		return get_instance()->ion_auth->get_user_id();
	}catch(Exception $e){
		return null;
	}
}

function in_group($check_group, $id=false, $check_all = false){
	return get_instance()->ion_auth->in_group($check_group, $id, $check_all);
}

function get_username($id = null){
	return get_instance()->ion_auth->user($id)->row()->username;
}

function get_email($id = null){
	return get_instance()->ion_auth->user($id)->row()->email;
}

function get_fullname($id = null){
	if(get_instance()->ion_auth->logged_in()){
		return get_instance()->ion_auth->user($id)->row()->first_name.' '.get_instance()->ion_auth->user($id)->row()->last_name;
	}
	return null;
}

function logged_in(){
	return is_logged_in();
}

function is_logged_in(){
	return (is_object(get_instance()->ion_auth->user()->row())) ? true : false;
}

?>