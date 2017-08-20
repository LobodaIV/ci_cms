<?php

class Page_m extends CI_Model {

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

	public function get_page_by_tag($tag) {
		$query = $this->db->get_where('pages',array('tag' => $tag));
		return $query->row();//return an object
	}

	public function get_page_by_id($id = null) {
		$query = $this->db->get_where('pages',array('id' => $id));
		return $query->row();
	}

	public function get_page_by_template($template) {
		$query = $this->db->get_where('pages',array('template' => $template));
		return $query->row();
	}

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
		$page = $this->get_page_by_template('news_archive');
		return isset($page->tag) ? $page->tag : '';
	}

	public function create_page($data) {
		$this->db->set($data);
		$this->db->insert('pages');
		return $this->db->insert_id();
	}

	public function update($id,$data) {
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('pages');
		return $id;
	}

	public function delete($id) {
		
		$id = intval($id);
		
		if (!$id) {
			return false;
		}

		$this->db->where('id', $id);
		$this->db->limit(1);
		$this->db->delete('pages');
		//parent id for deleted page equal to 0
		//set function enables you to set values for insert, update operations.
		$this->db->set(array('parent_id' => 0))->where('parent_id',$id)->update('pages');
		//parent::delete($id);
		//Clean parent ID for children
		//$this->db->set(array('parent_id' => 0))->where('parent_id',$id)->update($this->_table_name);
	}

	public function save_order($pages) {

		if (count($pages)) {

			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array(
						'parent_id' => (int)$page['parent_id'],
						'order' => $order
					);
					$this->db->set($data)->where('id', $page['item_id'])->update('pages');
					//echo '<pre>' . $this->db->last_query() . '</pre>';
				}	
			}
		}
	}

	//navigation
	public function get_nested() {
		$this->db->order_by('parent_id, order');
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
		//$pages = parent::get();
		$pages = $this->db->get('pages')->result();

		$arr = array(0 => 'Thereis no parent');

		if (count($pages)) {
			foreach ($pages as $page) {
				$arr[$page->id] = $page->title;
			}
		}

		return $arr;
	}

	public function get_with_parent($id = null) {
		$this->db->select('pages.*, p.tag as parent_tag, p.title as parent_title');
		$this->db->join('pages as p','pages.parent_id=p.id','left');
		return $this->db->get('pages')->result();
	}
}