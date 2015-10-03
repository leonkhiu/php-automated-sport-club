<?php
require_once ('database.php');


class Groups extends DBO{

	protected static $tableName="groups";
	protected static $tableFields=array('id', 'sport_id', 'tournament_id', 'name', 'date');
	
	public $id;
	public $sport_id;
	public $tournament_id;
	public $name;
	public $date;
	
	public static function findBySportID($sportId=1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`sport_id`=?)";
		$data = array($sportId);
		return $mydb->execute($sql, $data);
	}
	
	public static function findBySportIdTournamentId($sportId=1, $tournamentId= 1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`sport_id`=?) AND (`tournament_id` = ?)";
		$data = array($sportId, $tournamentId);
		return $mydb->execute($sql, $data);
	}
	
	
} // end of : class Groups
$groups=new Groups();

?>