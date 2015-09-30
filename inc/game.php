<?php
require_once ('database.php');


class Game extends DBO{

	protected static $tableName="game";
	protected static $tableFields=array('id', 'sport_id', 'tournament_id', 'first_team_id', 'second_team_id', 'date', 'update_uid', 'done');
	
	public $id;
	public $sport_id;
	public $tournament_id;
	public $first_team_id;
	public $second_team_id;
	public $date;
	public $update_uid;
	public $done;
	

	public static function findByTeamID($teamId=1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`first_team_id`=?) OR (`second_team_id`=?)";
		$data = array($teamId, $teamId);
		return $mydb->execute($sql, $data);
	}
	
	public static function inTournament($sportId, $tournamentId, $done = false){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`sport_id` = ?) AND(`tournament_id` = ?)";
		if($done){
			$sql.= " AND (`done` = 1)";
		}
		$parameter = array($sportId, $tournamentId);
		return $mydb->execute($sql, $parameter);
	}
	
} // end of : class Game
$game=new Game();

?>