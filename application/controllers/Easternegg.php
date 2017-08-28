<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Loads a small eastern egg with a css3 made beating heart
 */

class Easternegg extends My_Controller{

	public function __construct(){

		parent::__construct();

	}

	public function index(){

		$this->load->view('beating_heart');

	}

}

?>