<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Language extends Debug{



	protected $language;



	protected $lang_codes;



	protected $countries;



	protected $lang_country;



	protected $country_trans;



	protected $active_languages;



	public function __construct(){

		parent::__construct();



		$this->config->load('language');

		$this->config->load('paypal');

		$this->lang_codes = $this->config->item('language_codes');

		$this->countries = $this->config->item('country_codes');

		$this->lang_country = $this->config->item('lang_country');

		$this->country_trans = $this->config->item('country_transitions');

		$this->active_languages = $this->config->item('active_languages');



		$this->load->library('session');

		$this->load->helper('language');



		log_message('info', 'Language Controller Initialized');

	}



	public function detect_lang(){

		return (null !== $this->session->userdata('language')) ? $this->session->userdata('language') : $this->config->item('language');

	}



	public function set_lang($lang = null){

		$lang = (null !== $lang) ? $lang : $this->detect_lang();

		if(strlen($lang) <= 2){

			$lang = $this->lang_codes[strtolower($lang)];

		}

		$this->language = strtolower($lang);

	}



	public function load_lang_files(){

		$this->lang->load('sugar', $this->language);

	}



	public function switchLang($lang = 'english'){

		$this->session->set_userdata('language', $lang);

		redirect(base_url().$this->session->last_page(1));

	}



	public function get_lang(){

		return $this->language;

	}



	public function get_lang_code(){

		return array_search(ucfirst($this->language), $this->lang_codes);

	}



	public function get_country_from_lang($lang = null){

		$lang = (null === $lang) ? $this->language : $lang;

		$c = (array_search(ucfirst($lang), $this->lang_country));

		return $c;

	}



	public function get_country(){



	}



	public function get_country_code($country = null){

		$country = (null === $country) ? $this->get_country_from_lang() : $country;

		$maybe = strtolower(array_search(ucfirst($country), $this->countries));

		$has = (empty($maybe)) ? strtolower(array_search(ucfirst($this->country_trans[$country]), $this->countries)) : $maybe;

		return $has;

	}



	public function get_other_languages(){

		$langs = $this->active_languages;

		$current_lang = array_search(ucfirst($this->language), $langs);

		unset($langs[$current_lang]);

		return $langs;

	}



}



class MY_Controller extends Language{



	protected $scripts = array(

		'jquery/jquery-1.9.1',

		'jquery/jquery-ui-1.12.0',

		'jquery/fancybox/fancybox',

		'annex/jquery.annex',

		'annex/jquery.annex.validation-plugin',

		'bootstrap/bootstrap.min',

		'bootstrap/bootstrap-toggle.min',

		'Common'

	);



	protected $styles = array(

		'jquery/jquery-ui', 

		'jquery/jquery-ui.structure', 

		'jquery/jquery-ui.theme',

		'jquery/fancybox/fancybox',

		'style',

		'bootstrap/bootstrap-toggle.min'

	);



	public function __construct(){

		parent::__construct();

		// Load database

		$this->load->database();

		// Set up the required constants and vars

		$this->set_constants();

		$this->set_vars();

		// Set up this: 

		// Load CMS

		$this->load();

		log_message('info', 'MY_Controller Initialized');

	}



	protected function set_constants(){



		// Alias for DIRECTORY_SEPARATOR

		if(!defined('DS')){

			define('DS', DIRECTORY_SEPARATOR);

		}



		// URL for the APP Folder

		if(!defined('APPURI')){

			define('APPURI', $this->get_app_uri());

		}

	}



	protected function set_vars(){



		// Set theme vars as config items

		global $application_folder;

		$this->config->set_item('theme_path', $this->load->get_theme_path());

		$this->config->set_item('theme_uri', $application_folder.DS.'views'.DS.$this->load->get_theme());



		$app_uri = explode(DS, APPPATH);

		array_pop($app_uri);

		$folder = end($app_uri);

		$this->config->set_item('app_folder', $folder);

		$this->config->set_item('app_uri', base_url().$folder.'/');



		$view_uri = explode(DS, VIEWPATH);

		array_pop($view_uri);

		$folder = end($view_uri);

		$this->config->set_item('view_folder', $folder);

		$this->config->set_item('view_uri', $this->get_app_uri().$folder); // alias

		$this->config->set_item('view_url', $this->get_app_uri().$folder);



		$this->config->set_item('theme_uri', $this->config->item('view_uri').'/'.$this->config->item('theme'));



	}



	public function get_app_uri(){

		return $this->config->item('app_uri');

	}



	public function get_view_url(){

		return $this->config->item('view_url');

	}



	protected function load(){



		// Load the app config

		$this->config->load('sugar');



		// Set the selected theme

		$this->load->theme();



		// Load libraries

		$this->load->kit('ion_auth');
		$this->user = $this->ion_auth->user_full();
		
		$this->set_lang();
		$this->load_lang_files();

		$this->load->library('status_codes', 'status');

		$this->load->kit('meta_tags');

		$this->load->library('json_handler', NULL, 'json');



		// Load helpers

		$this->load->helper('date');

		$this->load->helper('html');

		$this->load->helper('array');

		$this->load->helper('directory');

		$this->load->helper('file');

		$this->load->helper('url');

		$this->load->kit('template');

		$this->load->helper('hooks');


	}



	public function set_metas(){

		//$this->meta_tags->initialize();



		/*$this->meta_tags->set_meta_tag('author', 'Pablo Villalba');

		$this->meta_tags->set_meta_tag('description', 'descripcion de prueba');*/

	}



	public function add_js( $handle, $src, $deps = array(), $ver = false, $args = null ){

		$this->template->add_js( $handle, $src, $deps, $ver, $args );

	}



	public function get_scripts(){

		return (array)$this->scripts;

	}



	public function get_styles(){

		return $this->styles;

	}



}





class Debug extends CI_Controller{



	public function __construct(){

		parent::__construct();



		if($this->is_development()){

			$this->load->kit('kint');

			$this->load->kit('ubench');

		}



		log_message('info', 'Debug Controller Initialized');



	}



	protected function is_development(){

		if(defined('ENVIRONMENT') AND ENVIRONMENT === 'development') return true;

		return false;

	}



	public function dump($array, $die = true){

		if(!$this->is_development()){

			return;

		}

		ini_set('xdebug.var_display_max_depth', 5);

		ini_set('xdebug.var_display_max_children', 256);

		ini_set('xdebug.var_display_max_data', 1024);



		echo '<pre>';



		if(is_array($array))

			var_dump($array);

		elseif (is_object($array))

			var_dump($array);

		else 

			$array;



		if($die)

			die('</pre>Dying in MY_Controller::Debug::dump function');

		else

			echo '</pre>';

	}



	public function var_die($arr = null){



	}



	public function find_function($func = null, $dump_it = false){

		if(null === $func){

			die('You must provide a function name');

		}



		$func = new ReflectionFunction($func);



		// Print out basic information

		printf(

			"\n\n<pre>".

			"===> The %s function '%s'\n".

			"	declared in %s\n".

			"	lines %d to %d\n".

			"	%d params\n".

			"	%d required params:\n".

			"	%s".

			"\n</pre>",

			$func->isInternal() ? 'internal' : 'user-defined',

			$func->getName(),

			$func->getFileName(),

			$func->getStartLine(),

			$func->getEndline(),

			$func->getNumberOfParameters(),

			$func->getNumberOfRequiredParameters(),

			json_encode($func->getParameters())

		);



		// Printdocumentation comment

		printf("<pre>---> Documentation:\n %s</pre>\n", var_export($func->getDocComment(), 1));



		// Print static variables if existant

		if ($statics = $func->getStaticVariables()){

			printf("<pre>---> Static variables: %s</pre>\n", var_export($statics, 1));

		}



		die('---function found---');



	}



	/*

	 * UBENCH start alias

	 */

	public function start(){

		$this->ubench->start();

	}



	/*

	 * UBENCH end alias

	 */

	public function end(){

		$this->ubench->end();

	}



	/*

	 * UBENCH getTime alias

	 */

	public function getTime($raw = false, $format = null){

		return $this->ubench->getTime($raw, $format);

	}



	/*

	 * UBENCH getMemoryUsage alias

	 */

	public function getMemoryUsage($raw = false, $format = null){

		return $this->ubench->getMemoryUsage($raw, $format);

	}



	/*

	 * UBENCH getMemoryPeak alias

	 */

	public function getMemoryPeak($raw = false, $format = null){

		return $this->ubench->getMemoryPeak($raw, $format);

	}



	/*

	 * UBENCH run alias

	 */

	public function run(callable $callable){

		return $this->ubench->run($callable);

	}



	/*

	 * UBENCH readableSize alias

	 */

	public function readableSize($size, $format = null, $round = 3){

		return $this->ubench->readableSize($size, $format, $round);

	}



	/*

	 * UBENCH readableElapsedTime alias

	 */

	public function readableElapsedTime($microtime, $format = null, $round = 3){

		return $this->ubench->readableElapsedTime($microtime, $format, $round);

	}



}





?>