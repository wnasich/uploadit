<?php
class UploaditSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $attachments = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
		'template_id' => array('type' => 'string', 'null' => false),
		'assembly_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'original_id' => array('type' => 'string', 'null' => true, 'default' => null),
		'versions' => array('type' => 'text', 'null' => false),
		'model' => array('type' => 'string', 'null' => false),
		'reference_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8')
	);

}