<?php
require_once ('database.php');


class Tournament extends DBO{

	protected static $tableName="tournament";
	protected static $tableFields=array('id', 'name', 'date', 'update_uid');
	
	public $id;
	public $name;
	public $date;
	public $update_uid;

	
} // end of : class Tournament
$tournament=new Tournament();

?>