<?php

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	public function index() {
		//Get recently modified articles
		$this->load->model('article_m');
		$this->db->order_by('modified desc');
		$this->db->limit(5);
		$this->data['meta_title'] = "Dashboard";
		$this->data['recent_articles'] = $this->article_m->get_news();

		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function modal() {
		$this->load->view('admin/_layout_modal',$this->data);
	}

}