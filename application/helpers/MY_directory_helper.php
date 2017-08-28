<?php

/**
 * Returns the application folder name
 */
function get_app_directory(){
	$all = explode(DS, APPPATH);
	pop_empty($all);
	return end($all);
}

/**
 * Returns the views folder name
 */
function get_views_directory(){
	$all = explode(DS, VIEWPATH);
	pop_empty($all);
	return end($all);
}

/**
 * Returns the theme name / folder
 */
function get_theme(){
	return get_instance()->load->get_theme();
}

/**
 * Returns a subfolder cotained into a theme folder, including the theme name / folder
 */
function get_theme_subdir($subdir = null){
	return (null === $subdir) ? get_theme() : get_theme().$subdir;
}

/**
 * Returns the full path of any provided subdirectory in the theme's folder. If no
 * subdirectory is provided, returns the full path of the theme's folder.
 */
function get_subdir_full_path($subdir = null){
	return (null === $subdir) ? 
		get_instance()->config->slash_item('base_url').get_app_directory().'/'.get_views_directory().'/'.get_theme() : 
		get_instance()->config->slash_item('base_url').get_app_directory().'/'.get_views_directory().'/'.get_theme_subdir($subdir);
}

?>