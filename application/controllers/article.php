<?php

class Article extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['errors'] = array();
		$this->load->model('page_m');
		$this->load->model('article_m');
		//Fetch navigation
		$this->data['menu'] = $this->page_m->get_nested();
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');
		$this->load->model('article_m');
		$this->data['recent_news'] = $this->article_m->get_recent_news();
	}

	public function index($id, $tag) {
		//Fetch the article
		$this->db->where('pubdate <=', date('Y-m-d'));
		$this->data['article'] = $this->article_m->get_news_by_id($id);
		//check tag
		$requested_tag = $this->uri->segment(3);
		//var_dump($requested_tag);//charlie-gard

		$set_tag = $this->data['article']->tag;
		if ($requested_tag != $set_tag) {
			redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->tag, 'location','301');
		}

		//Return 404 if article not exist
		count($this->data['article']) || show_404();

		add_meta_title($this->data['article']->title);
		$this->data['subview'] = 'article';
		$this->load->view('_main_layout',$this->data);
	}

}