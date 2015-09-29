<?php
require_once ('database.php');


class Sport extends DBO{

	protected static $tableName="sport";
	protected static $tableFields=array('id', 'name', 'permission_id', 'date', 'update_uid');
	
	public $id;
	public $name;
	public $permission_id;
	public $date;
	public $update_uid;

	
} // end of : class Sport
$sport=new Sport();

?>