<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function css($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE){
	return link_tag($href, $rel, $type, $title, $media, $index_page);
}

function print_css($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE){
	echo link_tag($href, $rel, $type, $title, $media, $index_page);
}

function link_tag($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE){

	if('' === $href){
		return;
	}

	$href = rtrim($href, '.css').'.css';

	$CI =& get_instance();
	$link = '<link ';
	$href = $CI->config->item('app_folder').'/views/'.$CI->config->item('theme').'/css/'.$href;

	if (is_array($href)){
		foreach ($href as $k => $v){
			if ($k === 'href' && ! preg_match('#^([a-z]+:)?//#i', $v)){
				if ($index_page === TRUE){
					$link .= 'href="'.$CI->config->site_url($v).'" ';
				}else{
					$link .= 'href="'.$CI->config->slash_item('base_url').$v.'" ';
				}
			}else{
				$link .= $k.'="'.$v.'" ';
			}
		}
	}
	else
	{
		if (preg_match('#^([a-z]+:)?//#i', $href)){
			$link .= 'href="'.$href.'" ';
		}elseif ($index_page === TRUE){
			$link .= 'href="'.$CI->config->site_url($href).'" ';
		}else{
			$link .= 'href="'.$CI->config->slash_item('base_url').$href.'" ';
		}
			$link .= 'rel="'.$rel.'" type="'.$type.'" ';

		if ($media !== ''){
			$link .= 'media="'.$media.'" ';
		}

		if ($title !== ''){
			$link .= 'title="'.$title.'" ';
		}
	}

	return $link."/>\n";
}

function js($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE){
	return script_tag($src, $language, $type, $index_page);
}

function print_js($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE){
	echo script_tag($src, $language, $type, $index_page);
}

function script_tag($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE){

	if('' === $src){
		return;
	}

	$src = rtrim($src, '.js').'.js';

	$CI =& get_instance();
	$script = '<scr'.'ipt';
	$src = $CI->config->item('app_folder').'/views/'.$CI->config->item('theme').'/js/'.$src;

	if (is_array($src)) {
		foreach ($src as $k=>$v) {
			if ($k == 'src' AND strpos($v, '://') === FALSE) {
				if ($index_page === TRUE) {
					$script .= ' src="'.$CI->config->site_url($v).'"';
				}else{
					$script .= ' src="'.$CI->config->slash_item('base_url').$v.'"';
				}
			}else {
				$script .= "$k=\"$v\"";
			}
		}

		$script .= '></scr'."ipt>\n";
	}else {
		if ( strpos($src, '://') !== FALSE) {
			$script .= ' src="'.$src.'" ';
		}elseif ($index_page === TRUE) {
			$script .= ' src="'.$CI->config->site_url($src).'" ';
		}else {
			$script .= ' src="'.$CI->config->slash_item('base_url').$src.'" ';
		}

		$script .= 'language="'.$language.'" type="'.$type.'"';
		$script .= '></scr'.'ipt>'."\n";
	}
	return $script;
}

function time_tag(){
	echo '<time datetime="'.date('c').'">'.date('Y - m - d').'</time>';
}


function a( $link, $text = null){
	$text OR $text = 'Enlace';
	echo '<a href="'.base_url().$link.'">'.$text.'</a>';
}


/**
 * Override the img creator from CodeIgniter to add the class "img-responsive"
 */
function img($src = '', $index_page = FALSE, $attributes = ''){
	if ( ! is_array($src) ){
		$src = array('src' => $src);
	}

	// If there is no alt attribute defined, set it to an empty string
	if ( ! isset($src['alt'])){
		$src['alt'] = '';
	}

	$img = '<img';

	foreach ($src as $k => $v){
		if ($k === 'src' && ! preg_match('#^([a-z]+:)?//#i', $v)){
			if ($index_page === TRUE){
				$img .= ' src="'.get_instance()->config->site_url($v).'"';
			}else{
				$v = get_app_directory().'/'.get_views_directory().'/'.get_instance()->load->get_theme().'images/'.$v;
				$img .= ' src="'.get_instance()->config->slash_item('base_url').$v.'"';
			}
		}else{
			$img .= ' '.$k.'="'.$v.'"';
		}
	}

	return $img._stringify_attributes($attributes).' />';
}

function favicon($ico){
	$href = get_instance()->load->get_theme_url().'/images/'.$ico;
	echo '<link rel="icon" type="image/x-icon" href="'.$href.'">';
}

?>