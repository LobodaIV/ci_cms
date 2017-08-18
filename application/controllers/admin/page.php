<?php

class Page extends Admin_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('page_m');
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
			$this->data['page'] = $this->page_m->get($id);
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
		//save page
		if ($this->form_validation->run() == true) {
			$data = $this->page_m->array_from_post(array(
				'title','tag','body','template','parent_id'
			));
			$this->page_m->save($data,$id);
			redirect('admin/page');
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
		
		// get id from uri
		$id = $this->uri->segment(4);
		$this->db->where('tag',$this->input->post('tag'));
		//assume that we have no page id
		!$id || $this->db->where('id !=',$id );

		$page = $this->page_m->get();  			
		if(count($page)) {
			$this->form_validation->set_message('_unique_tag','%s should be unique');
			return false;
		}

		return true;
	}

}
