<?php
require_once ('database.php');


class Team extends DBO{

	protected static $tableName="team";
	protected static $tableFields=array('id', 'club_id', 'name', 'permission_id', 'detail', 'date', 'last_update', 'update_uid');
	
	public $id;
	public $club_id;
	public $name;
	public $permission_id;
	public $detail;
	public $date;
	public $last_update;
	public $update_uid;

	
} // end of : class Team
$team=new Team();

?>