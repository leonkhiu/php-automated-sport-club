<?php
require_once ('database.php');


class Club extends DBO{

	protected static $tableName="club";
	protected static $tableFields=array('id', 'sport_id', 'union_id', 'name', 'permission_id', 'date', 'last_update', 'update_uid', 'detail');
	
	public $id;
	public $sport_id;
	public $union_id;
	public $name;
	public $permission_id;
	public $date;
	public $last_update;
	public $update_uid;
	public $detail;
	
} // end of : class Club
$club=new Club();

?>