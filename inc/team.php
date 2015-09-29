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

	public static function findNameById($id){
		global $mydb;
		$sql="SELECT `name` FROM `". self::$tableName. "` WHERE (`id` = ?) LIMIT 1";
		$parameter = array($id);
		$result = $mydb->execute($sql, $parameter);
		$result = array_shift($result);
		return $result->name;
	}
	
} // end of : class Game
$team=new Team();

?>