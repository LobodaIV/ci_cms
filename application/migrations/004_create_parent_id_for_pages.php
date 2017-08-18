<?php

class Migration_Create_parent_id_for_pages extends CI_Migration {
	
	public function up() {

		$fields = array(
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'default' => 0
			),
		);
		$this->dbforge->add_column('pages',$fields);
	}

	public function down() {
		$this->dbforge->drop_column('pages','parent_id');
	}
}