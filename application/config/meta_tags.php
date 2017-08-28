<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Meta Tags
|--------------------------------------------------------------------------
|
| The library meta_tags requires some configuration for the Doctype and other stuff
| Here is where it's stored
|
| 'doctype' = the doctype of the document (html, xhtml)
| 'tags' = the tags to be created
| 'robots' = the robots rules
| 'keywords' = the keywords to include
*/
//$config['meta_tags']['doctype'] = 'xhtml';
$config['meta_tags']['doctype'] = 'html';

//$config['meta_tags']['tags'] = array('tagname'=>'tagcontent', 'another tag'=>'some other content');
$config['meta_tags']['tags'] = array(
	'viewport'=>'width=device-width, initial-scale=1', 
	'author'=>'Pablo Villalba',
	'google'=>'notranslate',
	'generator'=>'CodeIgniter 3.0.1'
);

//$config['meta_tags']['keywords'] = array('great', 'php', 'framework');
$config['meta_tags']['keywords'] = __('meta_keywords');

//$config['meta_tags']['robots'] = array('NOINDEX', 'FOLLOW', 'NOARCHIVE');
$config['meta_tags']['robots'] = array('INDEX', 'FOLLOW', 'NOODP', 'NOYDIR', 'NOARCHIVE');


?>