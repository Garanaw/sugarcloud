<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{

	private $theme = 'Default/';

	private $theme_path;

	private $theme_uri;

	private static $flag = 0;

	/**
	 * List of loaded views
	 *
	 * @return array
	 */
	protected $_ci_views = array();

	public function __construct(){
		parent::__construct();
		$this->config('template');
	}

	/**
	 * List of loaded helpers
	 *
	 * @return array
	 */
	public function get_helpers(){ return $this->_ci_helpers; }

	/**
	 * List of loaded views
	 *
	 * @return array
	 */
	public function get_views(){ return $this->_ci_views; }

	public function get_models(){ return $this->_ci_models; }

	/**
	 * Kit loader
	 *
	 * Loads both, a library and a helper if they exist
	 */
	public function kit($handler){
		$this->library($handler);
		$this->helper($handler);
	}

	/**
	 * View loader
	 *
	 * Loads "view" files adding the theme folder to it
	 */
	public function view($view, $vars = array(), $return = FALSE){
		$view = $this->theme . $view;
		parent::view($view, $vars, $return);
	}

	/**
	 * Template loader
	 *
	 * Sets a template directory
	 */
	public function theme( $theme = NULL){

		// Find if a theme has been set up
		if( NULL !== $theme){
			$this->theme = $theme;
		}else{
			$this->theme = get_instance()->config->item('theme');
		}
		
		// Add trailing slash if necessary
		if('' !== $this->theme){
			$this->theme = add_trailing_slash($this->theme);
		}

		// set the theme path var and constant, and the theme uri var
		$this->theme_path = VIEWPATH . rtrim(rtrim($this->theme, '\\'), '/');
		defined('THEMEPATH') OR define('THEMEPATH', $this->theme_path);
		$this->theme_uri = base_url().get_app_directory().'/'.get_views_directory().'/'.$this->theme;

	}

	public function get_theme_path(){
		return $this->theme_path;
	}

	public function get_theme_url(){
		return $this->theme_uri;
	}

	public function get_theme(){
		return $this->theme;
	}

}


?>