<?php

class Page extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->data['errors'] = array();
		$this->load->model('page_m');
		$this->load->model('article_m');
		//Fetch navigation
		$this->data['menu'] = $this->page_m->get_nested();
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');
	}

	public function index() {
		$tag = (string)$this->uri->segment(1);
		$this->data['page'] = $this->page_m->get_page_by_tag($tag);

		if(!$this->data['page']) {
			show_404(current_url());
		}
		
		add_meta_title($this->data['page']->title);

		//Get the page data
		$method = '_' . $this->data['page']->template;
		if (method_exists($this, $method)) {
			$this->$method();//$this->_home()
		} else {
		  	show_error('Could not load template '. $method);
		}
		
		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_main_layout',$this->data);
		
	}

	private function _page() {
		$this->data['recent_news'] = $this->article_m->get_recent_news();
	}	

	private function _home() {
		$this->load->model('article_m');
		$this->db->where('pubdate <=', date('Y-m-d')); 
		$this->db->limit(6);
		$this->data['articles'] = $this->article_m->get_news();
	}

	private function _news_archive() {
		$this->load->model('article_m');
		$this->data['recent_news'] = $this->article_m->get_recent_news();
		$count = $this->db->count_all_results('articles');

		//Pagination settings
		$perpage = 4;
		if ($count >= $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count; 
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		} else {
			$this->data['pagination'] = '';
			$offset = 0;
		}

		$this->db->limit($perpage, $offset); 
		$this->data['articles'] = $this->article_m->get_news();
	}	

}