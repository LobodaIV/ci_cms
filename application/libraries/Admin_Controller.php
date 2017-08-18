<?php

class Admin_Controller extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Dashboard CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');

		// Login check 
		$exception_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);

		if (in_array(uri_string(), $exception_uris) == false) {
			if ($this->user_m->loggedin() == false) {
				redirect('admin/user/login');
			}
		}

	}
}