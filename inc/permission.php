<?php
require_once ('database.php');


class Permission extends DBO{

	protected static $tableName="permission";
	protected static $tableFields=array('id', 'title');
	
	public $id;
	public $title;
		
} // end of : class Permission

?>