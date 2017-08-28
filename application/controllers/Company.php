<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Not much to say about this controller, just loads the
 * views for the pages "privacy policies" and "about us"
 */
class Company extends MY_Controller {


	public function __construct(){

		parent::__construct();

		$this->lang->load('sugar', $this->language);

	}



	public function index(){

		$this->load->view('privacy_policies');

	}


	public function privacy(){

		$this->load->view('privacy_policies');

	}


	public function about(){

		$this->load->view('about_us');

	}

}



?>