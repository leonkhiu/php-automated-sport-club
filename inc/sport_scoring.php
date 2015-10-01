<?php
require_once ('database.php');


class SportScoring extends DBO{

	protected static $tableName="sport_scoring";
	protected static $tableFields=array('id', 'sport_id', 'win', 'draw', 'loss', 'update_uid');
	
	public $id;
	public $sport_id;
	public $win;
	public $draw;
	public $loss;
	public $update_uid;

	public static function findBySportId($sportId){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`sport_id` = ?) LIMIT 1";
		$parameter = array($sportId);
		$found = $mydb->execute($sql, $parameter);
		return !empty($found)? array_shift($found) : false;
	}
	
} // end of : class SportScoring
$sportScoring=new SportScoring();

?>