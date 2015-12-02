<?php
require_once ('database.php');


class TeamSport extends DBO{

	protected static $tableName="team_sport";
	protected static $tableFields=array('teamId', 'sportId');
	
	public $teamId;
	public $sportId;
	
	public static function findBySportId($sportId){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`sportId`=?)";
		$data = array($sportId);
		return $mydb->execute($sql, $data);
	}
	
} // end of : class TeamSport


?>