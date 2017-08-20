<?php

class User_m extends CI_Model {

	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
			),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
			)
	);

	public $rules_admin = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'trim|required|xss_clean'
			),
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
			),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
			),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
			)
	);

	public function get_user() {
		$query = $this->db->get_where('users', array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password'))
		));
		return $query->row();
	}

	public function get_all_users() {
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_by_id($id) {
		$query = $this->db->get_where('users',array('id' => $id));
		return $query->row();
	}

	public function create_user($data) {
		$this->db->set($data);
		$this->db->insert('users');
		return $this->db->insert_id();
	}

	public function update_user($id, $data) {
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('users');
		return $id;
	}

	public function delete_user($id) {
		$this->db->where('id', $id);
		$this->db->limit(1);
		$this->db->delete('users');
	}

	public function check_email($email) {
		$query = $this->db->get_where('users',array('email' => $email));
		return $query->row();
	}

	public function login() {

		$user = $this->get_user();

		if (count($user)) {

			$data = array(
				'name' => $user->name,
				'email' => $user->email, 
				'id' => $user->id, 
				'loggedin' => true
			);

			$this->session->set_userdata($data);
		}
	}

	public function logout() {
		$this->session->sess_destroy();
	}

	public function loggedin() {
		return (bool)$this->session->userdata('loggedin');
	}

	public function get_new() {
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}

	public function hash($str) {
		return hash('sha512', $str . config_item('encryption_key')); 
	}

}