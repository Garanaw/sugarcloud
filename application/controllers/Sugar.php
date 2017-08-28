<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sugar extends MY_Controller {

	/*
	 * Set the lang files and front-end scripts/styles, and retrieve the user data if logged in
	 */
	public function __construct(){

		parent::__construct();

		$this->lang->load('ion_auth', $this->language);

		$this->lang->load('auth', $this->language);


		$this->load->model('sugar_m', 'sugar');

		$this->styles[] = 'jquery/jquery-ui-1.8.11-custom';

		$this->scripts[] = 'jquery-timepicker';

		$this->scripts[] = 'date';

		$this->user = $this->ion_auth->user_full();

	}



	public function index(){

		$this->meta_tags->set_title(__('meta_basic_title'));

		$this->load->view('home');

	}


	/**
	 * Loads the charts to see the bloodsugar tests graphically
	 */
	public function charts(){

		$this->styles[] = 'jquery-timepicker';

		$this->styles[] = 'morris/morris-charts';

		$this->scripts[] = 'raphael/raphael';

		$this->scripts[] = 'morris-charts/morris.min';

		$this->scripts[] = 'sugar-chart';

		$this->template->generate_title(__('meta_charts_title'), '|');

		$args['user'] = $this->user;

		$args['template'] = 'charts';

		$this->load->view('sugar', $args);

	}

	/**
	 * Loads the calendar to see the bloodsugar records by date
	 */
	public function calendar(){

		$this->styles[] = 'jquery-timepicker';

		$this->styles[] = 'weekcalendar.default';

		$this->styles[] = 'jquery.weekcalendar';

		$this->scripts[] = 'jquery.weekcalendar';

		$this->scripts[] = 'sugar-calendar';

		$this->template->generate_title(__('meta_calendar_title'), '|');

		$args['template'] = 'calendar';

		$this->load->view('sugar', $args);

	}


	/**
	 * Records a new bloodsugar test
	 */
	public function record_sugar(){

		$inputs = $this->input->post();

		$recorded = $this->sugar->record_new_value($inputs);

		print_r($recorded);

	}

	public function get_week_controls(){

		$date = $this->input->post();

		$date['day_of_week'] = (isset($date['day_of_week'])) ? $date['day_of_week'] : 'CURDATE()';

		$result = $this->sugar->get_week_controls($date['day_of_week']);

		if($this->input->is_ajax_request()){

			header('Content-Type: application/json');

			//echo '['.json_encode($result).']';

			echo json_encode($result);

			return;

		}

		return $result;

	}

	public function get_day_controls(){

		$date = $this->input->post();

		$date['day'] = (isset($date['day'])) ? $date['day'] : 'CURDATE()';

		$result = $this->sugar->get_day_controls($date['day']);

		//var_dump($result);die();

		if($this->input->is_ajax_request()){

			header('Content-Type: application/json');

			echo '['.json_encode($result).']';

			return;

		}

		return $result;

	}



	public function get_averages(){

		$this->load->library('json_handler', 'json');

		$this->load->helper('input');

		$date = ($this->input->post('data')) ? $this->input->post('data') : '2016-9-9';

		$res['month_max'] = number_format($this->sugar->get_month_max($date)['month_max'], 2);

		$res['month_min'] = number_format($this->sugar->get_month_min($date)['month_min'], 2);

		$res['month_avg'] = number_format($this->sugar->get_month_avg($date)['month_avg'], 2);

		$res['week_max'] = number_format($this->sugar->get_week_max($date)['week_max'], 2);

		$res['week_min'] = number_format($this->sugar->get_week_min($date)['week_min'], 2);

		$res['week_avg'] = number_format($this->sugar->get_week_avg($date)['week_avg'], 2);


		if(!is_ajax()){

			//return false;

		}

		header('Content-Type: application/json');

		echo '['.$this->json->encode($res).']';

		return;

	}


	public function test(){

		//var_dump($this->user);

		//var_dump($this->sugar->get_day_controls('2016-10-01'));

		$this->get_day_controls('2016-10-01');

	}





}

