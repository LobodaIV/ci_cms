<?php

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->data['meta_title'] = "Dashboard";
	}

	//Get all users
	public function index() {
		$this->data['users'] = $this->user_m->get_all_users();
		//Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = null) {

		//Get a user or set a new one
		if ($id) {
			$this->data['user'] = $this->user_m->get_by_id($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		} else {
			$this->data['user'] = $this->user_m->get_new();
		}

		// Set up the form
		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		
		//Process the form
		$this->form_validation->set_rules($rules);
		//save user
		if ($this->form_validation->run() == true) {

			foreach ($_POST as $key => $value) {
				if(in_array($key,array('name','email','password'))) {
					$data[$key] = $value;	
				}
			}
			//$data = $this->user_m->array_from_post(array('name','email','password'));
			if(!$id) {
				$data['password'] = $this->user_m->hash($data['password']);
				$this->user_m->create_user($data);
				redirect('admin/user');
			} else {
				$data['password'] = $this->user_m->hash($data['password']);
				$this->user_m->update_user($id,$data);
				redirect('admin/user');
			}

		}

		//Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete($id) {
		$this->user_m->delete_user($id);
		redirect('admin/user');
	}

	public function login() {

		// Redirect user if already logged in
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == false || redirect($dashboard);

		//Set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);

		//Process form
		if ($this->form_validation->run() == true) {
			if ($this->user_m->login() == true) {
				redirect($dashboard);
			} else {
				$this->session->set_flashdata('error', 'Email/Password combination does not exist');
				redirect('admin/user/login', 'refresh');
			}
		}
		
		//Load view
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal',$this->data);
	}

	public function logout() {
		$this->user_m->logout();
		redirect('admin/user/login');
	}

	public function _unique_email($str) {
		
		$email = $this->input->post('email');
		$user = $this->user_m->check_email($email);  			
		if(count($user)) {
			$this->form_validation->set_message('_unique_email','%s should be unique');
			return false;
		}

		return true;
	}

}
