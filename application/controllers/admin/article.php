<?php

class Article extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Dashboard CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('article_m');
	}

	
	public function index() {
		//Get all articles
		$this->data['articles'] = $this->article_m->get_news();
		//Load view
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = null) {
		//Get a article or set a new one
		if ($id) {
			$this->data['article'] = $this->article_m->get_news_by_id($id);
			count($this->data['article']) || $this->data['errors'][] 
			= 'article could not be found';
		} else {
			$this->data['article'] = $this->article_m->get_new();
		}

		// Set up the form
		$rules = $this->article_m->rules;
		
		//Process the form
		$this->form_validation->set_rules($rules);
		//save article
		foreach ($_POST as $key => $value) {
			if(in_array($key,array('pubdate','title','tag','body'))) {
				$data[$key] = $value;	
			}
			
		}

		if ($this->form_validation->run() == true) {
			if($id) {
				$this->article_m->update($id,$data);
				redirect('admin/article');
			} else {
				$this->article_m->create_new($data);
				redirect('admin/article');
			}
		}

		//Load the view
		$this->data['subview'] = 'admin/article/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete($id) {
		
		if(!$id) {
			return false;
		}
		
		$this->article_m->delete($id);
		redirect('admin/article');
	}

}
