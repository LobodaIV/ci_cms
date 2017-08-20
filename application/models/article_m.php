<?php

class Article_m extends CI_Model {

	protected $_timestamps = true;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exactlength[10]|xss_clean'
			),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
			),
		'tag' => array(
			'field' => 'tag', 
			'label' => 'Tag', 
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
			),
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
			),
	);

	public function get_new() {
		$article = new stdClass();
		$article->title = '';
		$article->tag = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	}


	public function get_recent_news($limit = 3) {
		$limit = (int)$limit;
		$this->db->where('pubdate <=', date('Y-m-d'));
		$this->db->limit($limit);
		$query = $this->db->get('articles');;
		return $query->result();
	}

	public function get_news() {
		$query = $this->db->get('articles');
		return $query->result();
	}

	public function get_news_by_id($id) {
		$query = $this->db->get_where('articles', array("id" => $id));
		return $query->row();
	}

	public function create_new($data) {
		$now = date('Y-m-d H:i:s');
		$data['created'] = $now;
		$this->db->set($data);
		$this->db->insert('articles');
		return $this->db->insert_id();
	}

	public function update($id,$data) {
		$now = date('Y-m-d H:i:s');
		$data['modified'] = $now;
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('articles');
		return $id;
	}

	public function delete($id) {
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('articles');
	}
}