<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_meta_tag($name, $content){
	get_instance()->meta_tags->set_meta_tag($name, $content);
}

function unset_meta_tag($name){
	get_instance()->meta_tags->unset_meta_tag($name);
}

function add_keyword($keyword){
	get_instance()->meta_tags->add_keyword($keyword);
}

function remove_keyword($keyword){
	get_instance()->meta_tags->remove_keyword($keyword);
}

function add_robots_rule($rule){
	get_instance()->meta_tags->add_robots_rule($rule);
}

function remove_robots_rule($rule){
	get_instance()->meta_tags->remove_robots_rule($rule);
}

function generate_meta_tags(){
	return get_instance()->meta_tags->generate_meta_tags();
}


?>