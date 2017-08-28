<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller{

	private $data;

	public function __construct()	{

		parent::__construct();

		$this->lang->load('ion_auth', $this->language);

		$this->lang->load('auth', $this->language);

		$this->lang->load('form_validation', $this->language);

		$this->lang->load('sugar', $this->language);

		$this->load->helper('form');

		// add needed scripts

		$this->scripts[] = 'jquery-timepicker';

		$this->scripts[] = 'date';

		$this->scripts[] = 'bootstrap/dobPicker.min';

		$this->scripts[] = 'user-account';

		// setup the user's data

		$this->data['user'] = $this->ion_auth->user()->row();

		$this->data['user_meta'] = $this->ion_auth->sort_meta($this->ion_auth->user_meta()->result_array());

	}

	public function index(){

		if(!$this->ion_auth->logged_in()){

			redirect(base_url().'user/login');

		}else{

			redirect(base_url().'user/account');

		}
	}


	public function login(){

		if($this->ion_auth->logged_in()){

			redirect(base_url('user/account'));

		}

		$this->template->generate_title(__('meta_login_title'), '|');

		$this->load->view('auth/login');

	}


	public function logout(){

		$this->ion_auth->logout();

		//redirect(base_url().$this->session->last_page(1));

		redirect(base_url('user/login'));

	}


	public function register(){

		if(logged_in()){

			redirect(base_url('user/account'));

		}

		$this->template->generate_title(__('meta_signup_title'), '|');

		$this->load->view('auth/create_user');

	}


	public function edit(){

		if(!logged_in()){

			redirect(base_url('user/login'));

		}

		$this->load->view('auth/edit_user');

	}


	public function account(){

		if(!logged_in()){

			$this->load->view('auth/login');

			return;

		}

		$this->general();

	}


	public function general(){

		if(!logged_in()){

			$this->load->view('auth/login');

			return;

		}

		//$this->data['title'] = __('user_account_title');

		$this->template->generate_title(__('user_account_title'), '|');

		$this->load->view('auth/general', $this->data);

	}


	public function bio(){

		if(!logged_in()){

			$this->load->view('auth/create_user');

			return;

		}


		//$this->data['title'] = __('user_account_title');

		$this->template->generate_title(__('user_account_title'), '|');

		$this->load->view('auth/bio', $this->data);

	}


	public function diabetes(){

		if(!logged_in()){

			$this->load->view('auth/create_user');

			return;

		}


		$this->scripts[] = 'bootstrap/dobPicker.min';

		$this->scripts[] = 'user-account';

		//$this->data['title'] = __('user_account_title');

		$this->template->generate_title(__('user_account_title'), '|');

		$this->load->view('auth/diabetes', $this->data);

	}


	public function create_user(){

		$this->data['title'] = $this->lang->line('create_user_heading');

		$tables = $this->config->item('tables','ion_auth');

		$identity_column = $this->config->item('identity','ion_auth');

		$this->data['identity_column'] = $identity_column;

		// validate form input

		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');

		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');

		$this->form_validation->set_rules(

			'email', 

			$this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]'

		);


		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');

		$this->form_validation->set_rules(

			'username', 

			$this->lang->line('create_user_validation_username_label'), 'trim|is_unique['.$tables['users'].'.username]|required');

		$this->form_validation->set_rules(

			'password', 

			$this->lang->line('create_user_validation_password_label'), 

			'required|

				min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|

				max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|

				matches[password_confirm]'

		);

		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');



		if ($this->form_validation->run() == true){

			$email	= strtolower($this->input->post('email'));

			$identity = ($identity_column==='email') ? $email : $this->input->post('identity');

			$password = $this->input->post('password');

			$additional_data = array(

				'first_name' => $this->input->post('first_name'),

				'last_name'  => $this->input->post('last_name'),

				'username' => $this->input->post('username'),

				'phone'	  => $this->input->post('phone')

			);

		}

		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)){

			// check to see if we are creating the user

			// redirect them back to the admin page

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			redirect("auth", 'refresh');

		}else{

			// display the create user form

			// set the flash data error message if there is one

			$this->data['message'] = 

				(validation_errors() ? validation_errors() : 

					($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))

				);

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'	=> 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);

			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'	=> 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);

			$this->data['email'] = array(
				'name'  => 'email',
				'id'	=> 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);

			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'	=> 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);

			$this->data['password'] = array(
				'name'  => 'password',
				'id'	=> 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);

			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'	=> 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->load->view('auth/create_user', $this->data);

		}

	}

	public function update(){

		$form = $this->input->post();

		if(!isset($form['form'])){
			return;
		}

		switch ($form['form']) {

			case 'general':
				$this->update_general($form);
				break;

			case 'bio':
				$this->update_bio($form);
				break;

			case 'diabetes':
				$this->update_diabetes($form);
				break;

			default:
				break;

		}

	}



	protected function update_general($new = array()){

		$id = $this->data['user']->id;

		$data = array();

		if($new['first_name']){

			$data['first_name'] = $new['first_name'];

		}

		if($new['last_name']){

			$data['last_name'] = $new['last_name'];

		}

		if($new['email']){

			$data['email'] = $new['email'];

		}

		if($this->ion_auth->update($id, $data)){

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			$message[] = $this->ion_auth->messages();

		}else{

			$this->session->set_flashdata('message', $this->ion_auth->errors());

			$message[] = $this->ion_auth->errors();

		}

		$meta = array();

		if($new['messure']){

			$meta['messure'] = $new['messure'];

		}

		if($new['low']){

			$meta['low'] = $new['low'];

		}

		if($new['high']){

			$meta['high'] = $new['high'];

		}

		if($this->ion_auth->update_meta($id, $meta)){

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			$message[] = $this->ion_auth->messages();

		}else{

			$this->session->set_flashdata('message', $this->ion_auth->errors());

			$message[] = $this->ion_auth->errors();

		}

		$no = true;

		if($no){

			redirect(base_url().$this->session->last_page(1));

		}

		var_dump($message);

	}



	public function update_bio($new = array()){



		//var_dump($new);

		$id = $this->data['user']->id;



		if(isset($new['phone'])){

			$data = array('phone'=> $new['phone']);

			if($this->ion_auth->update($id, $data)){

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$message[] = $this->ion_auth->messages();

			}else{

				$this->session->set_flashdata('message', $this->ion_auth->errors());

				$message[] = $this->ion_auth->errors();

			}

		}

		$meta = array();

		if(isset($new['gender'])){

			$meta['gender'] = $new['gender'];

		}

		if(isset($new['bio'])){

			$meta['bio'] = $new['bio'];

		}

		if(isset($new['birthdate'])){

			$meta['birthdate'] = $new['birthdate'];

		}

		if($new['country']){

			$meta['country'] = $new['country'];

		}

		if(isset($new['language'])){

			$meta['language'] = $new['language'];

		}

		if($this->ion_auth->update_meta($id, $meta)){

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			$message[] = $this->ion_auth->messages();

		}else{

			$this->session->set_flashdata('message', $this->ion_auth->errors());

			$message[] = $this->ion_auth->errors();

		}


		$no = true;

		if($no){

			redirect(base_url().$this->session->last_page(1));

		}



	}



	public function update_diabetes($new = array()){

		if(empty($new)){
			return;
		}

		//var_dump($new);

		$id = $this->data['user']->id;

		$meta = array();

		if(isset($new['diabetes_type'])){

			$meta['diabetes_type'] = $new['diabetes_type'];

		}

		if(isset($new['debut'])){

			$meta['debut'] = $new['debut'];

		}

		if($this->ion_auth->update_meta($id, $meta)){

			$message = $this->ion_auth->messages();

			$this->session->set_flashdata('success', true);

			$this->session->set_flashdata('medical_data_update_success', 'medical_data_update_success');

		}else{

			$message = $this->ion_auth->errors();

			$this->session->set_flashdata('error', true);

			$this->session->set_flashdata('medical_data_update_error', 'medical_data_update_error');

		}

		if((isset($new['insulin']) && !empty($new['insulin']))){

			if(isset($new['insulin'][0]) && !empty($new['insulin'][0])){

				if($this->ion_auth->add_insulin($id, $new['insulin'])){

					$message = $this->ion_auth->messages();

					$this->session->set_flashdata('success', true);

					$this->session->set_flashdata('insulin_update_success', 'insulin_update_success');

				}else{

					$message = $this->ion_auth->errors();

					$this->session->set_flashdata('error', true);

					$this->session->set_flashdata('insulin_update_error', 'insulin_update_error');

				}

			}

		}

		$no = true;

		if($no){

			redirect(base_url('user/diabetes'));

		}

	}


	public function delete_insulin($id = null, $insulin = null){

		$insulin = $this->input->post('data');

		$result = $this->ion_auth->delete_insulin($this->data['user']->id, $insulin);

		if($result){

			header('HTTP/1.1 200 OK');

			echo __('user_account_insulin_removed');

			return true;

		}else{

			header('HTTP/1.1 422');

			echo 'Error: ';

			return false;

		}

		return;

	}

	/**
	 * Not implemented yet:
	 * integrates facebook with the page
	 */
	public function check_facebook(){



	}

}



?>