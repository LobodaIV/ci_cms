<?php

class Page_m extends My_Model {
	protected $_table_name = 'pages';
	protected $_order_by = 'parent_id, order';
	public $rules = array(
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent', 
			'rules' => 'trim|intval'
			),
		'template' => array(
			'field' => 'title', 
			'label' => 'Template', 
			'rules' => 'trim|required|xss_clean'
			),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
			),
		'tag' => array(
			'field' => 'tag', 
			'label' => 'Tag', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_tag|xss_clean'
			),
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
			),
	);


	public function get_new() {
		$page = new stdClass();
		$page->title = '';
		$page->tag = '';
		$page->body = '';
		$page->parent_id = 0;
		$page->template = $page;
		return $page;
	}

	public function get_archive_link() {
		$page = parent::get_by(array('template' => 'news_archive'),true);
		return isset($page->tag) ? $page->tag : '';
	}

	public function delete($id) {
		parent::delete($id);
		//Clean parent ID for children
		$this->db->set(array('parent_id' => 0))
		->where('parent_id',$id)
		->update($this->_table_name);
	}

	public function save_order($pages) {

		if (count($pages)) {

			foreach ($pages as $order => $page) {
				//dump($page);
				if ($page['item_id'] != '') {
					$data = array(
						'parent_id' => (int)$page['parent_id'],
						'order' => $order
					);
					$this->db->set($data)
					->where($this->_primary_key, $page['item_id'])
					->update($this->_table_name);
					//echo '<pre>' . $this->db->last_query() . '</pre>';
				}	
			}
		}
	}

	//fetch a navigation
	public function get_nested() {
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();

		$page_array = array();
		foreach ($pages as $page) {
			//if page does not have parent_id we just add it to the array
			if (!$page['parent_id']) {
				$page_array[$page['id']] = $page;
			} 
			//if it does have a parent_id, then will add it 
			//to that key but inside children array
			else {
				$page_array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $page_array;
	}

	public function get_no_parents() {
		//fetch pages without parents
		$this->db->select('id,title');
		$this->db->where('parent_id',0);
		$pages = parent::get();
		
		$arr = array(0 => 'No parent');

		if (count($pages)) {
			foreach ($pages as $page) {
				$arr[$page->id] = $page->title;
			}
		}

		return $arr;
	}

	public function get_with_parent($id = null, $single = false) {
		$this->db->select('pages.*, p.tag as parent_tag, p.title as parent_title');
		$this->db->join('pages as p','pages.parent_id=p.id','left');
		return parent::get($id,$single);
	}
}