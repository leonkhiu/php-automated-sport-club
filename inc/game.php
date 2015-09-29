<?php
require_once ('database.php');


class Game extends DBO{

	protected static $tableName="game";
	protected static $tableFields=array('id', 'sport_id', 'first_team_id', 'second_team_id', 'date', 'update_uid');
	
	public $id;
	public $sport_id;
	public $first_team_id;
	public $second_team_id;
	public $date;
	public $update_uid;

	public static function findByTeamID($teamId=1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`first_team_id`=?) OR (`second_team_id`=?)";
		$data = array($teamId, $teamId);
		return $mydb->execute($sql, $data);
	}
	
} // end of : class Game
$game=new Game();

?>