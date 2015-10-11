<?php
require_once ('database.php');
class FinalScore extends DBO {
	
	protected static $tableName = "final_score"; // view table
	protected static $tableFields = array (
			'group_id',
			'game_id',
			'host_id',
			'guest_id',
			't1_point',
			't2_point',
			'set_number',
			'duration',
			'game_date' 
	);
	
	public $group_id;
	public $game_id;
	public $host_id;
	public $guest_id;
	public $t1_point;
	public $t2_point;
	public $set_number;
	public $duration;
	public $game_date;
	
	public static function gameResult($gameId) {
		$result = self::findByGameId($gameId);
		if (( int ) $result->t1_point == ( int ) $result->t2_point) {
			return "draw";
		} else if (( int ) $result->t1_point > ( int ) $result->t2_point) {
			return "win";
		} else {
			return "loss";
		}
	}
	
	public static function pointDifference($gameId) {
		$result = self::findByGameId($gameId);
		return (( int ) $result->t1_point - ( int ) $result->t2_point);
	}
	
	public static function findByGameId($gameId) {
		global $mydb;
		$sql = "SELECT * FROM `" . self::$tableName . "` WHERE (`game_id` = ?) LIMIT 1";
		$parameter = array (
				$gameId 
		);
		$result = $mydb->execute ( $sql, $parameter );
		return array_shift ( $result );
	}
	
} // end of : class FinalScore
$finalScore = new FinalScore ();

?>