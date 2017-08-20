<?php

class Page extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('page_m');
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

	
	public function index() {
		//Get all pages
		$this->data['pages'] = $this->page_m->get_with_parent();
		//Load view
		$this->data['subview'] = 'admin/page/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order() {
		$this->data['sortable'] = true;
		$this->data['subview'] = '/admin/page/order';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function order_ajax() {

		if (isset($_POST['sortable'])) {
			$this->page_m->save_order($_POST['sortable']);
		}

		//Fetch all pages
		$this->data['pages'] = $this->page_m->get_nested();
		
		$this->load->view('admin/page/order_ajax',$this->data);
	}

	public function edit($id = null) {

		//Get a page or set a new one
		if ($id) {
			$this->data['page'] = $this->page_m->get_page_by_id($id);
			count($this->data['page']) || $this->data['errors'][] = 'page could not be found';
		} else {
			$this->data['page'] = $this->page_m->get_new();
		}

		//Pages for dropdown
		$this->data['pages_no_parents'] = $this->page_m->get_no_parents();

		// Set up the form
		$rules = $this->page_m->rules;
		
		//Process the form
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == true) {

			foreach ($_POST as $key => $value) {
				if(in_array($key,array('title','tag','body','template','parent_id'))) {
					$data[$key] = $value;	
				}
			}

			if(!$id) {
				$this->page_m->create_page($data);
				redirect('admin/page');
			} else {
				$this->page_m->update($id,$data);
				redirect('admin/page');
			}

		}

		//Load the view
		$this->data['subview'] = 'admin/page/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete($id) {
		$this->page_m->delete($id);
		redirect('admin/page');
	}

	public function _unique_tag($str) {
		
		$tag = $this->input->post('tag');
		$page = $this->page_m->get_page_by_tag($tag);
		if (count($page)) {
			$this->form_validation->set_message('_unique_tag', '%s should be unique');
			return false;
		}

		return true;
	}

}
