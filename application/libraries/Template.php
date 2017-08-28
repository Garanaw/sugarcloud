<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

	private $CI;

	private $config;

	private $theme_path;

	private $scripts = array();

	private $footer_scripts = array();

	private $styles = array();

	protected $widgets = array();

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->config('template');
		$this->CI->load->helper(array('string', 'file'));
		
		$this->theme_path = VIEWPATH . rtrim(rtrim($this->CI->config->item('theme'), '\\'), '/');
		$this->theme_url = base_url().get_app_directory().'/'.get_views_directory().'/'.$this->CI->config->item('theme');

		log_message('info', 'Template Class Initialized');
	}

	public function add_js( $handle, $src = false, $deps = array(), $ver = false, $args = null ){
		if ( isset($this->scripts[$handle]) )
			return $this;

		$this->scripts[$handle] = array(
				'src' => $src,
				'deps' => (array)$deps,
				'ver' => $ver,
				'args' => $args
		);
		return $this;
	}

	public function get_scripts(){
		return $this->scripts;
	}

	public function add_css( $handle, $src = false, $deps = array(), $ver = false, $media = 'all' ){
		if ( isset($this->styles[$handle]) )
			return $this;

		if(is_array($handle)){
			foreach($handle as $a){
				$this->add_css($a);
			}
			return $this;
		}

		$this->styles[$handle] = array(
				'src' => $src,
				'deps' => (array)$deps,
				'ver' => $ver,
				'media' => $media
		);
		return true;
	}

	public function get_styles(){
		return $this->styles;
	}

	public function get_themes( $args = array() ){

	}

	public function generate_title($title = null, $sep = '&raquo'){
		$brand = __('meta_basic_title');
		if(null !== $title){
			$title = $title." $sep ".$brand;
		}
		get_instance()->meta_tags->set_title($title);
	}

	public function get_header( $name = NULL ){

		do_action( 'get_header', $name );

		$templates = array();
		$name = (string) $name;
		if ( '' !== $name ) {
			$templates[] = $this->CI->config->item('header_path')."header-{$name}.php";
		}

		$templates[] = $this->CI->config->item('header_path').'header.php';

		$this->locate_template( $templates, true );

	}

	public function get_form( $form ){

		do_action('get_form', $form);

		$templates = array();
		$name = (string) $form;
		if('' !== $form){
			$templates[] = "forms/form-{$form}.php";
		}

		$templates[] = 'forms/form.php';

		$this->locate_template( $templates, true );
	}

	/**
	 * Load footer template.
	 *
	 * Includes the footer template for a theme or if a name is specified then a
	 * specialised footer will be included.
	 *
	 * For the parameter, if the file is called "footer-special.php" then specify
	 * "special".
	 *
	 * @param string $name The name of the specialised footer.
	 */
	public function get_footer( $name = null ) {

		do_action( 'get_footer', $name );

		$templates = array();
		$name = (string) $name;
		if ( '' !== $name ) {
			$templates[] = $this->CI->config->item('footer_path')."footer-{$name}.php";
		}

		$templates[]    = $this->CI->config->item('footer_path').'footer.php';

		$this->locate_template( $templates );
	}

	/**
	 * Load sidebar template.
	 *
	 * Includes the sidebar template for a theme or if a name is specified then a
	 * specialised sidebar will be included.
	 *
	 * For the parameter, if the file is called "sidebar-special.php" then specify
	 * "special".
	 *
	 * @param string $name The name of the specialised sidebar.
	 */
	public function get_sidebar( $name = null ) {

		do_action( 'get_sidebar', $name );

		$templates = array();
		$name = (string) $name;
		if ( '' !== $name )
			$templates[] = $this->CI->config->item('sidebar_path')."sidebar-{$name}.php";

		$templates[] = $this->CI->config->item('sidebar_path').'sidebar.php';

		$this->locate_template( $templates );
	}

	public function get_menu( $name = null ){

		do_action( 'get_menu', $name );

		$templates = array();
		$name = (string) $name;
		if ( '' !== $name )
			$templates[] = $this->CI->config->item('menu_path')."menu-{$name}.php";

		$templates[] = $this->CI->config->item('menu_path').'menu.php';
		$this->locate_template( $templates );

	}

	public function get_widget($name = NULL){
		if(NULL === $name){
			return;
		}
	}

	/**
	 * Load a template part into a template
	 *
	 * Makes it easy for a theme to reuse sections of code in a easy to overload way
	 * for child themes.
	 *
	 * Includes the named template part for a theme or if a name is specified then a
	 * specialised part will be included. If the theme contains no {slug}.php file
	 * then no template will be included.
	 *
	 * The template is included using require, not require_once, so you may include the
	 * same template part multiple times.
	 *
	 * For the $name parameter, if the file is called "{slug}-special.php" then specify
	 * "special".
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 */
	public function get_template_part( $slug, $name = null ) {

		do_action( "get_template_part_{$slug}", $slug, $name );

		$templates = array();
		$name = (string) $name;
		if ( '' !== $name )
			$templates[] = "{$slug}-{$name}.php";

		$templates[] = "{$slug}.php";

		$this->locate_template($templates, true);
	}

	public function locate_template($template_names, $load = true ) {

		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( !$template_name ){
				continue;
			}

			if ( file_exists($this->theme_path . DS . $template_name)) {
				$located = $template_name;
				break;
			}
		}

		if ( $load && '' != $located ){
			$this->load_template( $located );
		}

		return $located;
	}
	public function load_template( $_template_file ) {
		$this->CI->load->view($_template_file);
	}

}

?>