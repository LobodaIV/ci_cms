<?php

class Migration extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->library('migration');
		//will run 001_create_users.php from migration
		if (!$this->migration->current()) {
			show_error($this->migration->error_string());
		} else {
			echo "Migration worked";
		}
	}
}